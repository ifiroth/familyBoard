<?php

namespace App\Controller;

use App\Repository\LinkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/hello', methods: 'GET', requirements: ['_locale' => 'fr'])]
class HelloController extends AbstractController
{
    /**
     * @var string[]
     */
    private array $links = [];

    public function __construct(LinkRepository $linkRepository) {
        $this->links = $linkRepository->findAll();
    }

    #[Route('/', name: 'hello')]
    public function index(): Response
    {
         return $this->render('hello/index.html.twig', [
            'controller_name' => 'HelloController',
            'action' => 'hello',
            'links' => $this->links,
        ]);
    }
}
