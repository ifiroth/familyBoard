<?php

namespace App\DataFixtures;

use App\Entity\ActivityCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActivityCategoryFixtures extends Fixture
{
    const ACTIVITY_CATEGORIES = [
        // name, slug, color
        ['Travail', 'work', 'faa916'],
        ['Ecole', 'school', '96031a'],
        ['Sport', 'sport', '326771'],
        ['Musique', 'music', '9cec5b'],
        ['Lycée', 'high-school', 'e88873'],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::ACTIVITY_CATEGORIES as $k => $a) {
            $activityCategory = new ActivityCategory();
            $activityCategory
                ->setName($a[0])
                ->setSlug($a[1])
            ;
            $this->addReference('activity-category-'.$k, $activityCategory);

            $manager->persist($activityCategory);
        }

        $manager->flush();
    }
}
