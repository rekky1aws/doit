<?php

namespace App\Controller;

use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{
  #[Route('/', name: 'app_main')]
  public function index(EntityManagerInterface $entityManager): Response
  {
    $tasks = $entityManager->getRepository(Task::class)->findAll();

    return $this->render('main/index.html.twig', [
      'page_title' => 'Home',
      'tasks' => $tasks,
    ]);
  }
}
