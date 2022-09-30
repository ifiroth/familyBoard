<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActivityController extends AbstractController
{
    private string $title;

    public function __construct() {
        $this->title = 'Page sans titre';
    }

    /**
     * @param string $user
     * @param Request $request
     * @return Response
     */
    #[Route('/activity/{user}', name: 'activity')]
    public function index(string $user = '', Request $request): Response
    {
        $this->title = 'Tableaux des activités';

        if ($user) {
            $this->title = sprintf('Tableau des activités de %s', htmlspecialchars($user));
        }

        dump($request);

        return $this->render('activity/index.html.twig', [
            'title' => $this->title,
        ]);
    }

    #[Route('/studi', name: 'studi')]
    public function studi(Request $request) : Response
    {

        return $this->render('studi/index.html.twig', [
            'title' => $this->title,
        ]);
    }
}
