<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Service\UserManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class FamilyMemberFixtures extends Fixture implements DependentFixtureInterface
{
    const USERS = [
        // firstname, lastname, birthdate, address_fk
        ['Louis',       'Fraineux', '2016-10-14', 4],
        ['Mathieu',     'Fraineux', '1988-09-20', 4],
        ['Noémie',      'Fraineux', '1988-06-02', 4],
        ['Maxime',      'Sajotte',  '2006-04-18', 4],
        ['Stéphanie',   'Idon',     '1989-06-25', 4],
        ['Benoit',      'Fraineux', '1988-05-09', 4],
    ];

    private UserManager $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    public function load(ObjectManager $manager): void
    {
        foreach (self::USERS as $k => $u) {
            $user = new User();
            $user
                ->setFirstname($u[0])
                ->setLastname($u[1])
                ->setBirthdate(new \DateTime($u[2]))
                ->setAddress($this->getReference('address-'. $u[3]))
            ;

            $this->addReference('user-'. $k, $user);

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
