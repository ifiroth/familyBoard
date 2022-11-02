<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Entity\Link;
use App\Entity\PlannedActivity;
use App\Repository\PlannedActivityRepository;
use App\Repository\LinkRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use http\Client\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/activity')]
class ActivityController extends AbstractController
{
    private array $links;
    private RequestStack $requestStack;
    private LinkRepository $linkRepository;

    public function __construct(LinkRepository $linkRepository, RequestStack $requestStack) {
        $this->links = $linkRepository->findAll();
        $this->linkRepository = $linkRepository;
        $this->requestStack = $requestStack;
    }

    #[Route('/{pane}', name: 'activity')]
    public function index(PlannedActivityRepository $plannedActivityRepository, string $pane = 'now'): Response
    {

        $activityLink = $this->linkRepository->findOneBy(['slug' => 'activity']);
        $defaultPanes = $activityLink->getChildren();

        $session = $this->requestStack->getSession();
        $openedActivities = $session->get('viewActivities', []);

        $id = (int) $pane;
        $activePane = null;

        foreach ($defaultPanes as $dp) {
            if ($dp->getSlug() == 'activity_' . $pane) {
                $activePane = $pane;
            }
        }
        foreach($openedActivities as &$activity)
        {
            $activity = $plannedActivityRepository->findIt($activity);

            if (!$activePane && $activity->getId() == $id) {
                $activePane = $id;
            }
        }

        if (!$activePane)
        {
            $this->addFlash('warning', 'Acitivité non trouvée, id :'. $id);
        }

        return $this->render('activity/index.html.twig', [
            'action' => 'activity',
            'links' => $this->links,
            'casualActivities' => $plannedActivityRepository->findAllWithDate(),
            'regularActivities' => $plannedActivityRepository->findAllWithDayOfWeek(),
            'dayStart' => PlannedActivityRepository::DAY_START,
            'dayEnd' => PlannedActivityRepository::DAY_END,
            'defaultPanes' => $defaultPanes,
            'openedActivities' => $openedActivities,
            'activePane' => $activePane,
        ]);
    }

    #[Route('/regular/', name: 'activity_regular', methods: ['GET'])]
    public function regular(): Response
    {
        return $this->redirectToRoute('activity', [
            'pane' => 'regular',
        ]);
    }

    #[Route('/now/', name: 'activity_now', methods: ['GET'])]
    public function now(): Response
    {
        return $this->redirectToRoute('activity', [
            'pane' => 'now',
        ]);
    }

    #[Route('/casual/', name: 'activity_casual', methods: ['GET'])]
    public function event(): Response
    {
        return $this->redirectToRoute('activity', [
            'pane' => 'casual',
        ]);
    }

    #[Route('/plan/', name: 'activity_plan', methods: ['GET', 'POST', 'PATCH'])]
    public function plan(PlannedActivity $plannedActivity, EntityManager $em): Response
    {
        $plannedActivity = new PlannedActivity();

        $em->flush();
        $em->persist($plannedActivity);



        return $this->redirectToRoute('activity', [
            'pane' => $plannedActivity,
        ]);
    }

    #[Route('/view/{plannedActivity}', name: 'activity_view', methods: ['GET'])]
    public function view(PlannedActivity $plannedActivity): Response {

        $session = $this->requestStack->getSession();
        $viewActivities = $session->get('viewActivities', []);

        if (!in_array($plannedActivity->getId(), $viewActivities)) {
            $viewActivities[] = $plannedActivity->getId();
            $session->set('viewActivities', $viewActivities);
        }

        return $this->redirectToRoute('activity', [
            'pane' => $plannedActivity->getId() .'-'. $plannedActivity->getActivity()->getSlug(),
        ]);
    }

    #[Route('/close/{plannedActivity}', name: 'activity_close', methods: ['GET'])]
    public function close(PlannedActivity $plannedActivity): Response {

        $session = $this->requestStack->getSession();
        $viewActivities = $session->get('viewActivities', []);

        if (in_array($plannedActivity->getId(), $viewActivities)) {
            $key = array_search($plannedActivity->getId(), $viewActivities);

            unset($viewActivities[$key]);

            $session->set('viewActivities', $viewActivities);
        }

        dump($plannedActivity->getId());

        return $this->redirectToRoute('activity', [
            'pane' => 'now',
        ]);
    }

    #[Route('/edit/{plannedActivity}', name: 'activity_edit', methods: ['POST'])]
    public function edit(PlannedActivity $plannedActivity): Response {

        return $this->redirectToRoute('activity', [
            'pane' => $plannedActivity->getId(),
        ]);
    }
}
