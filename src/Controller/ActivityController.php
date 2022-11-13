<?php

namespace App\Controller;

use App\Entity\PlannedActivity;
use App\Form\ActivityType;
use App\Form\PlannedActivityType;
use App\Repository\PlannedActivityRepository;
use App\Repository\LinkRepository;
use App\Service\SessionManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/activity')]
class ActivityController extends AbstractController
{
    private array $links;
    private LinkRepository $linkRepository;
    private SessionManager $sessionManager;

    public function __construct(LinkRepository $linkRepository, RequestStack $requestStack) {
        $this->links = $linkRepository->findAll();
        $this->linkRepository = $linkRepository;
        $this->sessionManager = new SessionManager($requestStack);
    }

    #[Route('/{pane}', name: 'activity')]
    public function index(PlannedActivityRepository $plannedActivityRepository, string $pane = 'now'): Response
    {

        $activityLink = $this->linkRepository->findOneBy(['slug' => 'activity']);
        if ($activityLink) {
            $defaultPanes = $activityLink->getChildren();
        } else {
            $defaultPanes = [];
        }


        $openedActivities = $this->sessionManager->getActivities('view');
        $editedActivities = $this->sessionManager->getActivities('edit');

        $id = (int) $pane;
        $activePane = null;

        foreach ($defaultPanes as $dp) {
            if ($dp->getSlug() == 'activity_' . $pane) {
                $activePane = $pane;
            }
        }

        $forms = [];

        foreach($openedActivities as &$activity)
        {
            $activity = $plannedActivityRepository->findIt($activity);
            $form = $this->createForm(PlannedActivityType::class, $activity, [
                'attr' => [
                        'id' => $activity->getId(),
                        'class' => 'plannedActivityForm'
                    ],
                ]
            );
            $forms[$activity->getId()] = $form->createView();

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
            'editedActivities' => $editedActivities,
            'forms' => $forms,
            'emptyForm' => $this->createForm(PlannedActivityType::class)->createView(),
            'js' => 'activity_form',
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

    /*
     *  For each method, his statement
     *  PUT : Post New entity
     *  PATCH : Update existing
     */
    #[Route('/plan/', name: 'activity_plan', methods: ['POST', 'PATCH'])]
    public function plan(Request $request, EntityManagerInterface $em): Response
    {
        // Create a form with an empty new PlannedActivity entity
        $id = $request->query->get('id') ?? null;

        $form = $this->createForm(PlannedActivityType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted())
        {
            $plannedActivity = $form->getData();
            $em->persist($plannedActivity);

            if ($form->isValid()) {

                // TODO : AddEvent on presubmit to nullify DayOfWeek or Date, depending on which one is choosen
                // Add a custom choice field in form to fill one or another

                $em->persist($plannedActivity);
                $em->flush();

            } else {
                if ($id) {

                }
            }

            $this->sessionManager->addActivity($id, 'edit');

            return $this->redirectToRoute('activity', [
                'pane' => $plannedActivity->getId(),
            ]);
        }

        return $this->redirectToRoute('activity', [
            'pane' => 'now'
        ]);
    }

    #[Route('/view/{plannedActivity}', name: 'activity_view', methods: ['GET'])]
    public function view(PlannedActivity $plannedActivity): Response {

        $this->sessionManager->addActivity($plannedActivity->getId(), 'view');

        return $this->redirectToRoute('activity', [
            'pane' => $plannedActivity->getId() .'-'. $plannedActivity->getActivity()->getSlug(),
        ]);
    }

    #[Route('/close/{plannedActivity}', name: 'activity_close', methods: ['GET'])]
    public function close(PlannedActivity $plannedActivity): Response {

        $this->sessionManager->removeActivity($plannedActivity->getId(), 'view');

        // TODO: Check activity is in edit mode and prevent user

        return $this->redirectToRoute('activity', [
            'pane' => 'now',
        ]);
    }
}
