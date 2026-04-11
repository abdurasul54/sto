<?php

namespace App\Controller;

use App\Entity\Workers;
use App\Form\WorkersType;
use App\Repository\WorkersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\SettingsRepository;

#[Route('/')]
final class WorkersController extends AbstractController
{
    #[Route('workers', name: 'workers', methods: ['GET'])]
    public function index(WorkersRepository $workersRepository, SettingsRepository $settingsRepository): Response
    {
        return $this->render('workers/index.html.twig', [
            'workers'  => $workersRepository->findAll(),
            'settings' => $settingsRepository->findProcessedSettings(),
        ]);
    }

    #[Route('/new', name: 'app_workers_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $worker = new Workers();
        $form = $this->createForm(WorkersType::class, $worker);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($worker);
            $entityManager->flush();

            return $this->redirectToRoute('app_workers_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('workers/new.html.twig', [
            'worker' => $worker,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_workers_show', methods: ['GET'])]
    public function show(Workers $worker): Response
    {
        return $this->render('workers/show.html.twig', [
            'worker' => $worker,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_workers_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Workers $worker, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(WorkersType::class, $worker);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_workers_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('workers/edit.html.twig', [
            'worker' => $worker,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_workers_delete', methods: ['POST'])]
    public function delete(Request $request, Workers $worker, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$worker->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($worker);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_workers_index', [], Response::HTTP_SEE_OTHER);
    }
}
