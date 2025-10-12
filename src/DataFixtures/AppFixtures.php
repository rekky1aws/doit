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
      "groups" => [
        "Default" => "#aaaaaa",
        "Perso" => "#d6c28b",
        "Pro" => "#b4d69a"
      ],
      "tags" => [
        "code",
        "php",
        "symfony",
        "halloween"
      ],
      "tasks" => [
        [
          "group" => "Perso",
          "name" => "Finir le costume d'Halloween",
          "date" => "2025-10-31 15:00:00",
          "signifiance" => 3,
          "urgency" => 4,
          "tags" => ["halloween"],
          "is_done" => false,
          "done_date" => null,
          "description" => "Costume d'Halloween"
        ],
        [
          "group" => "Pro",
          "name" => "Coder DoIt",
          "date" => null,
          "signifiance" => 3,
          "urgency" => 3,
          "tags" => ["code", "php", "symfony"],
          "is_done" => false,
          "done_date" => null,
          "description" => "Bah faut coder quoi"
        ],
        [
          "group" => "Default",
          "name" => "Tache de test",
          "date" => null,
          "signifiance" => 1,
          "urgency" => 5,
          "tags" => [],
          "is_done" => false,
          "done_date" => "2025-08-31 15:00:00",
          "description" => "Tache de test deja réalisée avec une date"
        ]
      ]
    ];

    // Groups
    $groups = [];

    foreach ($data['groups'] as $groupName => $groupColor) {
      $newGroup = new Group();
      $newGroup->setName($groupName)->setColor($groupColor);
      $groups[$groupName] = $newGroup;
      $manager->persist($newGroup);
    }

    // Tags
    $tags = [];

    foreach ($data['tags'] as $tagName) {
      $newTag = new Tag();
      $newTag->setName($tagName);
      $tags[$tagName] = $newTag;
      $manager->persist($newTag);
    }

    // Tasks
    foreach ($data['tasks'] as $task) {
      $newTask = new Task();
      $newTask
        ->setName($task['name'])
        ->setTaskGroup($groups[$task['group']])
        ->setSignifiance($task['signifiance'])
        ->setUrgency($task['urgency'])
        ->setDescription($task['description'])
        ->setIsDone($task['is_done']);
      
      if ($task['date']) {
        $newTask->setDate(\DateTime::createFromFormat('Y-m-d H:i:s', $task['date']));
      } else {
        $newTask->setDate(null);
      }

      if ($task['done_date']) {
        $newTask->setDoneDate(\DateTime::createFromFormat('Y-m-d H:i:s', $task['done_date']));
      } else {
        $newTask->setDoneDate(null);
      }

      foreach ($task['tags'] as $tagName) {
        $newTask->addTag($tags[$tagName]);
      }

      $manager->persist($newTask);
    }

    $manager->flush();
  }
}
