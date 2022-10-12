<?php

namespace App\DataFixtures;

use App\Entity\Activity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ActivityFixtures extends Fixture implements DependentFixtureInterface
{
    const ACTIVITIES = [
        // name, description, address_fk, activity_category_slug
        ['2F2C', '', 6, 0],
        ['St-Michel', '',  7, 1],
        ['Adam de Craponne', '', 8, 4],
        ['Basket', '', 2, 2],
        ['Tennis', '', 0, 2],
        ['Solfège', '', 4, 3],
        ['Piano', '', 4, 3],
        ['Natation', '', 1, 2],
        ['Rugby', '', 3, 2],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::ACTIVITIES as $k => $a) {
            $activity = new Activity();
            $activity
                ->setName($a[0])
                ->setDescription($a[1])
                ->addAddress($this->getReference('address-'. $a[2]))
                ->setCategory($this->getReference('activity-category-'. $a[3]))
            ;

            $this->addReference('activity-'. $k, $activity);

            $manager->persist($activity);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            AddressFixtures::class,
            ActivityCategoryFixtures::class,
        ];
    }
}
