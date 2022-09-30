<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    const users = [
        ['Louis',       'Fraineux', '2016-10-14'],
        ['Mathieu',     'Fraineux', '1988-09-20'],
        ['Noémie',      'Fraineux', '1988-06-02'],
        ['Maxime',      'Sajotte',  '2006-04-18'],
        ['Stéphanie',   'Idon',     '1989-06-25'],
        ['Benoit',      'Fraineux', '1988-05-09'],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::users as $u) {
            $user = new User();
            $user
                ->setFirstname($u[0])
                ->setLastname($u[1])
                ->setBirthdate(new \DateTime($u[2]))
            ;
            $manager->persist($user);
        }

        $manager->flush();
    }
}
