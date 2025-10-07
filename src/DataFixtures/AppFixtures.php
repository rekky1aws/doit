<?php

namespace App\DataFixtures;

use App\Entity\Group;
use App\Entity\Tag;
use App\Entity\Task;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
  public function load(ObjectManager $manager): void
  {
    $data = [
      "group" => [
        "Default" => "#aaaaaa",
        "Perso" => "#d6c28b",
        "Pro" => "#b4d69a"
      ],
      "tag" => [
        "code",
        "php",
        "symdony",
        "halloween"
      ],
      "task" => [
        [
          "group" => "Perso",
          "name" => "Finir le costume d'Halloween",
          "date" => "2025-10-31 15:00:00",
          "signifiance" => 3,
          "urgency" => 4,
          "tags" => ["halloween"],
          "is_done" => false,
          "done_date" => null
        ],
        [
          "group" => "Pro",
          "name" => "Coder DoIt",
          "date" => null,
          "signifiance" => 3,
          "urgency" => 3,
          "tags" => ["code", "php", "symfony"],
          "is_done" => false,
          "done_date" => null
        ]
      ]
    ];

    // TODO : read fixtures from data

    $manager->flush();
  }
}
