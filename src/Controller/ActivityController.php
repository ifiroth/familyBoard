<?php

namespace App\Controller;

use App\Repository\LinkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActivityController extends AbstractController
{
    private array $links;

    public function __construct(LinkRepository $linkRepository) {
        $this->links = $linkRepository->findAll();
    }

    #[Route('/activity', name: 'activity')]
    public function index(): Response
    {
        return $this->render('activity/index.html.twig', [
            'action' => 'activity',
            'links' => $this->links,
        ]);
    }

    #[Route('/activity/create', name: 'activity_create')]
    public function create(): Response
    {
        return $this->render('activity/create.html.twig', [
            'action' => 'activity_create',
            'links' => $this->links,
        ]);
    }
}
