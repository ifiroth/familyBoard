<?php

namespace App\DataFixtures;

use App\Entity\Child;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ChildFixtures extends Fixture implements DependentFixtureInterface
{
    const CHILDREN = [
        // [ user_fk as parent, [...user_fk as children] ]
        [4, [0, 1, 2, 3]],
        [5, [0, 1, 2]],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::CHILDREN as $c) {

            $child = new Child();
            $child->setParent($this->getReference('user-'. $c[0]));

            foreach ($c[1] as $cc) {

                $child->addUser($this->getReference('user-'. $cc));
            }
            $manager->persist($child);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
        ];
    }
}
