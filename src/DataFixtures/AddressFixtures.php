<?php

namespace App\DataFixtures;

use App\Entity\Address;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AddressFixtures extends Fixture
{
    const ADDRESSES = [
        // name, description, streetNumber, streetName, city, postalCode
        ['Tennis', null, null, null, 'Mallemort', '13370'],
        ['Natation', null, null, null, 'Lambesc', '13410'],
        ['Basket', null, null, null, 'Sénas', '13560'],
        ['R.C.S. : Rugby Club de Sénas', null, null, null, 'Sénas', '13560'],
        ['Ecole de musique de Sénas', 'Musique + solfège', null, null, 'Sénas', '13560'],
        ['Maison', null, 4193, 'Route nationale 7', 'Mallemort', '13370'],
        ['2F2C', null, null, null, 'Eguilles', '13510'],
        ['Ecole St-Michel', null, null, null, 'Pont Royal', '13370'],
        ['Lycee Adam de Craponne', 'Lycée', null, null, 'Salon-de-Provence', '13300'],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::ADDRESSES as $a) {
            $address = new Address();
            $address
                ->setName($a[0])
                ->setDescription($a[1])
                ->setStreetNumber($a[2])
                ->setStreetName($a[3])
                ->setCity($a[4])
                ->setPostalCode($a[5])
            ;
            $this->addReference($a[0], $address);
            $manager->persist($address);
        }

        $manager->flush();
    }
}
