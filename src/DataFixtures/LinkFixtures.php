<?php

namespace App\DataFixtures;

use App\Entity\Link;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LinkFixtures extends Fixture
{
    const LINKS = [
        // slug, title, parent_fk, sort_order
        ['activity', 'Activités', null, null],
        ['activity_now', 'Cette semaine', 0, 1],
        ['activity_regular', 'Hebdomadaire', 0, 2],
        ['activity_casual', 'Evenementiel', 0, 3],
        ['activity_plan', 'Planifier une activité', 0, 4],
        ['home', 'Accueil', null, null],
        ['hello', 'Bonjour', null, null],
        ['threejs', 'Three.js', null, null]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::LINKS as $k => $l) {
            $link = new Link();
            $link
                ->setSlug($l[0])
                ->setTitle($l[1])
            ;
            if ($l[2] !== null) $link->setParent($this->getReference('link-'. $l[2]));

            $this->addReference('link-'. $k, $link);
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
