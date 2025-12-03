<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\EditTaskType;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EditController extends AbstractController
{
    #[Route('/edit', name: 'app_edit')]
    public function edit(): Response
    {
        $form = $this->createForm(EditTaskType::class);

        return $this->render('edit/index.html.twig', [
            'task_form' => $form,
            'controller_name' => 'basic edit',
        ]);
    }

    #[Route('/edit/{id}', name: 'app_edit_by_id')]
    public function editById (EntityManagerInterface $entityManager, int $id): Response
    {
        // TODO : Process form if submitted
            // TODO : Check data viability
            // TODO : Save data to DB
            // TODO : Flash message to inform user
        
        $task = $entityManager->getRepository(Task::class)->find($id);

        $form = $this->createForm(EditTaskType::class, $task);

        return $this->render('edit/index.html.twig', [
            'task' => $task,
            'task_form' => $form,
            'controller_name' => 'edit task '.$id,
        ]);
    }
}
