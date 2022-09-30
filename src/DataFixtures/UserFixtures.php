<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    const USERS = [
        ['Louis',       'Fraineux', '2016-10-14', 5],
        ['Mathieu',     'Fraineux', '1988-09-20', 5],
        ['Noémie',      'Fraineux', '1988-06-02', 5],
        ['Maxime',      'Sajotte',  '2006-04-18', 5],
        ['Stéphanie',   'Idon',     '1989-06-25', 5],
        ['Benoit',      'Fraineux', '1988-05-09', 5],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::USERS as $u) {
            $user = new User();
            $user
                ->setFirstname($u[0])
                ->setLastname($u[1])
                ->setBirthdate(new \DateTime($u[2]))
                ->setAddress($this->getReference(AddressFixtures::ADDRESSES[$u[3]][0]))
            ;
            $manager->persist($user);
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
