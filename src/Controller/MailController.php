<?php

namespace App\Controller;

use App\Repository\LinkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/mail', name: 'mail')]
class MailController extends AbstractController
{
    public function __construct(LinkRepository $linkRepository)
    {
        $this->links = $linkRepository->findAll();
    }

    #[Route('/send/', name: 'mail_send')]
    public function send(MailerInterface $mailer)
    {
        $mail = (new Email())
            ->from('fraineux.benoit@gmail.com')
            ->to('fraineux.benoit@gmail.com')
            ->subject('This mail is for testing purpose')
            ->text('This is the text version')
            ->html('<p>This is the HTML version</p>')
        ;


        $mailer->send($mail);

        return $this->render('base.html.twig', [
            'links' => $this->links,
            'action' => 'activity',
        ]);
    }
}
