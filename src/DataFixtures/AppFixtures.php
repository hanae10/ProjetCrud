<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
  
         // create 20 Ingredients! Bam!
         for ($i = 0; $i < 20; $i++) {
            $ingredient = new Ingredient();
            $ingredient ->setName('Ingredient  '.$i);
            $ingredient ->setPrice(mt_rand(10, 100));          
            $manager->persist($ingredient);

        $manager->flush();
    }
}
}
