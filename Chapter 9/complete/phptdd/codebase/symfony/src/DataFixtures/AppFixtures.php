<?php

namespace App\DataFixtures;

use App\Entity\Color;
use App\Entity\Manufacturer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $manufacturerNames = [
            "Williams",
            "McLaren",
            "Ferrari",
            "Sauber",
            "Red Bull",
            "Mercedes",
        ];

        $colorNames = [
            "White",
            "Black",
            "Red",
            "Blue",
            "Silver",
        ];

        $this->createDefaultItems($manager, Color::class, $colorNames);
        $this->createDefaultItems($manager, Manufacturer::class, $manufacturerNames);

        $manager->flush();
    }

    private function createDefaultItems(ObjectManager $manager, string $entityName, array $items): void
    {
        foreach ($items as $name) {
            $entity = new $entityName();
            $entity->setName($name);
            $manager->persist($entity);
        }
    }
}
