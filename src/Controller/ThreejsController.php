<?php

namespace App\Controller;

use App\Repository\LinkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/threejs',)]
class ThreejsController extends AbstractController
{
    /**
     * @var \App\Entity\Link[]
     */
    private array $links;

    public function __construct(LinkRepository $linkRepository)
    {
        $this->links = $linkRepository->findAll();
    }
    
    #[Route('/', name: 'threejs')]
    public function index(): Response
    {
        return $this->render('threejs/index.html.twig', [
            'action' => 'threejs',
            'links' => $this->links,
            'js' => 'threejs',
        ]);
    }
}
