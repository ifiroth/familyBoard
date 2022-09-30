<?php

namespace App\DataFixtures;

use App\Entity\Activity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActivityFixtures extends Fixture
{
    const activities = [
        ['2F2C', '', 'Travail'],
        ['St-Michel', '', 'Ecole'],
        ['Adam de Craponne', '', 'Lycée'],
        ['Basket', '', 'Sport'],
        ['Tennis', '', 'Sport'],
        ['Solfège', '', 'Musique'],
        ['Piano', '', 'Musique'],
        ['Natation', '', 'Sport'],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::activities as $a) {
            $activity = new Activity();
            $activity
                ->setName($a[0])
                ->SetDescription($a[1])
                ->SetType($a[2])
            ;
            $manager->persist($activity);
        }

        $manager->flush();
    }
}
