<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use App\Repository\SettingsRepository;

class IncludesController extends AbstractController
{
    #[Route('/includes', name: 'app_includes')]
    public function getIncludes(SettingsRepository $settingsRepository): Response
    {

        $settings = $settingsRepository->findProcessedSettings(); 


        return [
            'controller_name' => 'IncludesController',
            'settings' => $settings
        ];
    }
}
