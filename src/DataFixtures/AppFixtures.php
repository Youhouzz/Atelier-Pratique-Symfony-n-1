<?php

namespace App\DataFixtures;

use App\Entity\AD;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class AppFixtures extends Fixture
{

    public function __construct()
    {
    }

    public function load(ObjectManager $manager): void
    {
        # Chargement de Faker
        $faker = Factory::create('fr_FR');

        # Création des annonces
        for ($i = 1; $i <= 20; $i++) {

            $title = $faker->sentence(8);
            $description = $faker->text(20);

            $ad = new Ad();
            $ad->setTitle($title)
                ->setDescription($description);


            $manager->persist($ad);
        }

        $manager->flush();
    }
}
