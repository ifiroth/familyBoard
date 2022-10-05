<?php

namespace App\DataFixtures;

use App\Entity\Link;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LinkFixtures extends Fixture
{
    const LINKS = [
        // slug, title, parent
        ['activity', 'Activités', null],
        ['activity_list', 'Liste des activités', 'activity'],
        ['activity_create', 'Ajouter une activité', 'activity'],
        ['home', 'Accueil', null],
        ['hello', 'Bonjour', null],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::LINKS as $l) {
            $link = new Link();
            $link
                ->setSlug($l[0])
                ->setTitle($l[1])
            ;
            if ($l[2]) $link->setParent($this->getReference($l[2]));

            $this->addReference($l[0], $link);
            $manager->persist($link);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            LinkFixtures::class,
        ];
    }
}
