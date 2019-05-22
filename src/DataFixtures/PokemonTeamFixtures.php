<?php

namespace App\DataFixtures;

use App\Entity\Trainer;
use App\Entity\Pokemon;
use App\Entity\PokemonTeam;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PokemonTeamFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getPokemonTeams() as [$trainer, $pokemon, $surName]) {
            $pokemonTeam = new PokemonTeam;
            $pokemonTeam
                ->setTrainer($trainer)
                ->setPokemon($pokemon)
                ->setSurName($surName)
                ->setHP($pokemon->getHP())
            ;

            $manager->persist($pokemonTeam);
        }

        $manager->flush();
    }

    public function getPokemonTeams()
    {
        // [trainer, pokemon]
        return [
            [$this->getReference('Sacha'), $this->getReference('TortueTank'), ''],
            [$this->getReference('Sacha'), $this->getReference('Dragonfeu'), ''],
            [$this->getReference('Pedro'), $this->getReference('FleurBizzare'), ''],
            [$this->getReference('Pedro'), $this->getReference('UgandaWarrior'), '']

            
        ];
    }

    public function getDependencies()
    {
        return [TrainerFixtures::class];

    }
}

?>