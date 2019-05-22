<?php

namespace App\DataFixtures;

use App\Entity\Pokemon;
use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PokemonFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getPokemons() as [$name, $type, $HP, $attack, $attack2]) {
            $pokemon = new Pokemon;
            $pokemon
                ->setName($name)
                ->setType($type)
                ->setHP($HP)
                ->addAttack($attack)
                ->addAttack($attack2)
            ;

            $manager->persist($pokemon);
            $reference = $this->addReference($name, $pokemon);
        }

        $manager->flush();
    }

    public function getPokemons()
    {
        // [name, type, HP, attack, attack2]
        return [
            ['Dragonfeu', Type::TYPE_FIRE, 150, $this->getReference('Crachefeu'), $this->getReference('octogone')],
            ['TortueTank', Type::TYPE_WATER, 200, $this->getReference('Lance incendie'), $this->getReference('octogone')],
            ['FleurBizzare', Type::TYPE_PLANT, 110, $this->getReference('succ'), $this->getReference('octogone')],
            ['UgandaWarrior', Type::TYPE_FIRE, 1, $this->getReference('Way'), $this->getReference('HelloLady')]

        ];
    }
}
