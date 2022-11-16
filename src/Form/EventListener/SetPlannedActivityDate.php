<?php

namespace App\Form\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class SetPlannedActivityDate implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        /*
        return [
            FormEvents::POST_SUBMIT   => 'onPostSubmit',
        ];
         */
        return [];
    }

    public function onPostSubmit(FormEvent $event): void
    {
        /*
        $plannedActivity = $event->getData();
        $form = $event->getForm();
        */
    }
}
