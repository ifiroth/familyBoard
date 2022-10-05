<?php

namespace App\Controller;

use App\Manager\LinkManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    /**
     * @var string[]
     */
    private array $links;

    public function __construct() {
        $this->links = LinkManager::getLinks();
    }

    #[Route('/hello', name: 'app_hello')]
    public function index(): Response
    {
        return $this->render('hello/index.html.twig', [
            'controller_name' => 'HelloController',
            'action' => 'hello',
            'links' => $this->links
        ]);
    }
}
