<?php

namespace App\DataFixtures;

use App\Entity\Attack;
use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AttackFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getAttacks() as [$name, $power, $type]) {
            $attack = new Attack;
            $attack
                ->setName($name)
                ->setPower($power)
                ->setType($type)
            ;

            $manager->persist($attack);
            $reference = $this->addReference($name, $attack);
        }

        $manager->flush();
    }

    public function getAttacks()
    {
        // [name, power, type]
        return [
            ['Crachefeu', 50, Type::TYPE_FIRE],
            ['Lance incendie', 70, Type::TYPE_WATER],
            ['succ', 40, Type::TYPE_PLANT],
            ['octogone', 20, Type::TYPE_NORMAL],
            ['Way', 100, Type::TYPE_NORMAL],
            ['HelloLady', 50, Type::TYPE_NORMAL]
        ];
    }
}
