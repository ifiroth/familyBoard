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
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Component\Form\Form;
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
    private PlannedActivityRepository $plannedActivityRepository;

    public function __construct(LinkRepository $linkRepository, RequestStack $requestStack, PlannedActivityRepository $plannedActivityRepository) {
        $this->links = $linkRepository->findAll();
        $this->linkRepository = $linkRepository;
        $this->sessionManager = new SessionManager($requestStack);
        $this->plannedActivityRepository = $plannedActivityRepository;
    }

    #[Route('/{pane}/{submittedForm}', name: 'activity')]
    public function index(string $pane = 'now', $submittedForm = null): Response
    {
        $activityLink = $this->linkRepository->findOneBy(['slug' => 'activity']);

        if ($activityLink) {
            $defaultPanes = $activityLink->getChildren();

        } else {
            $defaultPanes = [];
        }

        $plannedActivityForms = $this->sessionManager->getPlannedActivityForms();

        $id = (int) $pane;
        $activePane = null;

        foreach ($defaultPanes as $dp) {
            if ($dp->getSlug() == 'activity_' . $pane) {
                $activePane = $pane;
            }
        }

        $openedActivities = [];
        foreach($plannedActivityForms as $key => $form)
        {
            $activity = $this->plannedActivityRepository->findIt($key);

            if ($id === $key) {
                $form = $submittedForm->createView();
            } else {
                $form = $this->createForm(PlannedActivityType::class, $activity)->createView();
            }

            $openedActivities[$key] = [
                'activity' => $activity,
                'form' => $form,
            ];

            if (!$activePane && $activity->getId() == $id) {
                $activePane = $id;
            }
        }

        if (!$activePane)
        {
            $this->addFlash('warning', 'Activité non trouvée, id :'. $id);
        }

        return $this->render('activity/index.html.twig', [
            'action' => 'activity',
            'links' => $this->links,
            'casualActivities' => $this->plannedActivityRepository->findAllWithDate(),
            'regularActivities' => $this->plannedActivityRepository->findAllWithDayOfWeek(),
            'dayStart' => PlannedActivityRepository::DAY_START,
            'dayEnd' => PlannedActivityRepository::DAY_END,
            'defaultPanes' => $defaultPanes,
            'activePane' => $activePane,
            'openedActivities' => $openedActivities,
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
        $form = $this->createForm(PlannedActivityType::class);
        $form->handleRequest($request);

        // Create a form with an empty new PlannedActivity entity
        $id = $request->get('id');

        if ($form->isSubmitted())
        {
            $plannedActivity = $form->getData();

            if ($form->isValid()) {

                $em->persist($plannedActivity);
                $em->flush();

                $this->addFlash('success', 'Formulaire mis à jour');
                $this->sessionManager->removePlannedActivityForm($id);

            } else {
                dump($form->getErrors());
                $this->sessionManager->addPlannedActivityForm($id);
            }

            return $this->index(pane: $id, submittedForm: $form);
        }

        return $this->redirectToRoute('activity', [
            'pane' => 'now'
        ]);
    }

    #[Route('/view/{plannedActivity}', name: 'activity_view', methods: ['GET'])]
    public function view(PlannedActivity $plannedActivity): Response {

        if (!$this->sessionManager->getPlannedActivityForms($plannedActivity->getId())) {

            $form = $this->createForm(PlannedActivityType::class, $plannedActivity, [
                    'attr' => [
                        'id' => $plannedActivity->getId(),
                        'class' => 'plannedActivityForm'
                    ],
                ]
            );

            $this->sessionManager->addPlannedActivityForm($plannedActivity->getId(), $form);
        }

        return $this->redirectToRoute('activity', [
            'pane' => $plannedActivity->getId() .'-'. $plannedActivity->getActivity()->getSlug(),
        ]);
    }

    #[Route('/close/{plannedActivity}', name: 'activity_close', methods: ['GET'])]
    public function close(PlannedActivity $plannedActivity): Response {

        if ($this->sessionManager->removePlannedActivityForm($plannedActivity->getId())) {
            $this->addFlash('success', 'Activité fermée');
        } else {
            $this->addFlash('warning', 'Activité non fermée');
        }

        // TODO: Check activity is in edit mode and prevent user

        return $this->redirectToRoute('activity', [
            'pane' => 'now',
        ]);
    }
}
