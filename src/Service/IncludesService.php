<?php

namespace App\Service;

use App\Repository\BranchesRepository;
use App\Repository\CategoryRepository;
use App\Repository\TasksRepository;
use App\Repository\PageListRepository;
use App\Repository\RepairRateRepository;
use App\Repository\ReservationRepository;
use App\Repository\SettingsRepository;
use App\Repository\ServicesRepository;

class IncludesService
{
    public function someFunction(
        CategoryRepository $categoryRepository,
        BranchesRepository $branchesRepository,
        TasksRepository $tasksRepository,
        PageListRepository $pageListRepository,
        RepairRateRepository $repairRateRepository,
        ReservationRepository $reservationRepository,
        SettingsRepository $settingsRepository,
        ServicesRepository $servicesRepository
    ): array {
        $categories = $categoryRepository->findAll();
        $branches = $branchesRepository->findAll();
        $tasks = $tasksRepository->findAll();
        $pageLists = $pageListRepository->findAll();
        $repairRates = $repairRateRepository->findAll();
        $reservations = $reservationRepository->findAll();
        $settings = $settingsRepository->findAll();
        $services = $servicesRepository->findAll();

        return [
            'categories' => $categories,
            'branches' => $branches,
            'tasks' => $tasks,
            'page_lists' => $pageLists,
            'repair_rates' => $repairRates,
            'reservations' => $reservations,
            'settings' => $settings,
            'services' => $services,
        ];
    }
}
