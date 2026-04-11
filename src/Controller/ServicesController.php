<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\SettingsRepository;
use App\Repository\ServicesRepository;

class ServicesController extends AbstractController
{
    #[Route('/services', name: 'services')]
    public function index(SettingsRepository $SettingsRepository, ServicesRepository $servicesRepository): Response
    {
        $settings = $SettingsRepository->findProcessedSettings();   
        $services = $servicesRepository->findAll();   


        return $this->render('services/index.html.twig', [

            'settings' => $settings,
            'services' => $services
        ]);
    }


    #[Route('/service{id}', name: 'service')]
    public function index_single(SettingsRepository $SettingsRepository,int $id, ServicesRepository $servicesRepository): Response
    {
        $settings = $SettingsRepository->findProcessedSettings(); 
        $service = $servicesRepository->find($id);
        return $this->render('single_services/index.html.twig', [
            'controller_name' => 'SingleServicesController',
            'settings' => $settings,
            'service' => $service
        ]);
    }
}
