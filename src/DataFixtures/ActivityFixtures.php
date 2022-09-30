<?php

namespace App\DataFixtures;

use App\Entity\Activity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ActivityFixtures extends Fixture implements DependentFixtureInterface
{
    const ACTIVITIES = [
        ['2F2C', '', 'Travail', 6],
        ['St-Michel', '', 'Ecole', 7],
        ['Adam de Craponne', '', 'Lycée', 8],
        ['Basket', '', 'Sport', 2],
        ['Tennis', '', 'Sport', 0],
        ['Solfège', '', 'Musique', 4],
        ['Piano', '', 'Musique', 4],
        ['Natation', '', 'Sport', 1],
        ['Rugby', '', 'Sport', 3],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::ACTIVITIES as $a) {
            $activity = new Activity();
            $activity
                ->setName($a[0])
                ->setDescription($a[1])
                ->setType($a[2])
                ->addAddress($this->getReference(AddressFixtures::ADDRESSES[$a[3]][0]))
            ;

            $manager->persist($activity);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            AddressFixtures::class,
        ];
    }
}
