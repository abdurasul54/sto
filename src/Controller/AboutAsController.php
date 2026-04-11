<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\SettingsRepository;
use App\Repository\CounterRepository;
class AboutAsController extends AbstractController
{
    #[Route('/about', name: 'about')]
    public function index(SettingsRepository $SettingsRepository, CounterRepository $counterRepository): Response
    {
        $settings = $SettingsRepository->findProcessedSettings();
        $counter = $counterRepository->findAll();

        return $this->render('about_as/index.html.twig', [
            'settings' => $settings,
            'counter' => $counter
        ]);
    }
}
