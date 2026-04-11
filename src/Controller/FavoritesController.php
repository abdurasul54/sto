<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\SettingsRepository;
use App\Repository\CounterRepository;
use App\Repository\ServicesRepository;
use App\Repository\TasksRepository;
use App\Repository\BrandsRepository;

class FavoritesController extends AbstractController
{
    #[Route('/favorites', name: 'favorites')]
    public function index(
        SettingsRepository $settingsRepository, 
        CounterRepository $counterRepository, 
        ServicesRepository $servicesRepository,
        TasksRepository $tasksRepository, 
        BrandsRepository $brandsRepository
    ): Response {
        // Используем переданные параметры напрямую
        $settings = $settingsRepository->findProcessedSettings(); 
        $counter = $counterRepository->findAll(); 
        $services = $servicesRepository->findAll();
        $tasks = $tasksRepository->findAll();
        $brands = $brandsRepository->findAll();

        return $this->render('favorites/index.html.twig', [
            'controller_name' => 'DashboardController',
            'settings' => $settings,
            'counter' => $counter,
            'services' => $services,
            'tasks' => $tasks,
            'brands' => $brands
        ]);
    }
}

