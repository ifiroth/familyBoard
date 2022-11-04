<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\PlannedActivity;
use App\Service\UserManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PlannedActivityFixtures extends Fixture implements DependentFixtureInterface
{
    const PLANNED_ACTIVITIES = [
        // [ activity_fk, [ ... user_fk ], (int) dayOfWeek, date, time_start, time_end
        [0, [ 5 ], 0, null, '09:00', '17:00'],
        [0, [ 5 ], 1, null, '09:00', '17:00'],
        [0, [ 5 ], 3, null, '09:00', '17:00'],
        [1, [ 0, 1, 2 ], 0, null, '08:30', '16:30'],
        [1, [ 0, 1, 2 ], 1, null, '08:30', '16:30'],
        [1, [ 0, 1, 2 ], 3, null, '08:30', '16:30'],
        [1, [ 0, 1, 2 ], 4, null, '08:30', '16:30'],
        [2, [ 3 ], 0, null, '08:00', '16:00'],
        [2, [ 3 ], 1, null, '08:00', '14:00'],
        [2, [ 3 ], 2, null, '08:00', '12:00'],
        [2, [ 3 ], 3, null, '09:00', '17:00'],
        [2, [ 3 ], 4, null, '09:00', '17:00'],
        [3, [ 2 ], 3, null, '14:00', '15:30'],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::PLANNED_ACTIVITIES as $pa) {
            $plannedActivity = new PlannedActivity();
            $plannedActivity
                ->setActivity($this->getReference('activity-'. $pa[0]))
                ->setDayOfWeek($pa[2]);

            if ($pa[3] !== null) $plannedActivity->setDate(new \DateTime($pa[3]));
            if ($pa[4] !== null) $plannedActivity->setTimeStart(new \DateTime($pa[4]));
            if ($pa[5] !== null) $plannedActivity->setTimeEnd(new \DateTime($pa[5]));

            foreach($pa[1] as $user) {
                $plannedActivity->addUser($this->getReference('user-'. $user));
            }

            $manager->persist($plannedActivity);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ActivityFixtures::class,
            UserFixtures::class,
        ];
    }
}
