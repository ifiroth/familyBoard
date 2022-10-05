<?php

namespace App\Controller;

use App\Manager\LinkManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActivityController extends AbstractController
{
    /**
     * @var string[]
     */
    private array $links;

    public function __construct() {
        $this->links = LinkManager::getLinks();
    }

    #[Route('/activity', name: 'activity')]
    public function index(): Response
    {
        return $this->render('activity/index.html.twig', [
            'controller_name' => 'ActivityController',
            'action' => 'activity',
            'links' => $this->links,
        ]);
    }
}
