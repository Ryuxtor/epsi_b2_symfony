<?php

namespace App\DataFixtures;

use App\Entity\Potion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PotionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getPotions() as [$name, $healingRate]) {
            $potion = new Potion;
            $potion
                ->setName($name)
                ->setHealingRate($healingRate)
            ;

            $manager->persist($potion);
            $reference = $this->addReference($name, $potion);
        }

        $manager->flush();
    }

    public function getPotions()
    {
        // [name, healingRate]
        return [
            ['Ptite pot', 20],
            ['Super Pot', 50],
            ['Hyper Pot', 100],
            ['Rozana', 9999]
            
        ];
    }
}

?>