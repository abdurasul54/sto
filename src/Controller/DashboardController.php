<?php
namespace App\Controller;

use App\Service\IncludesService;
use App\Repository\SettingsRepository;
use App\Repository\CounterRepository;
use App\Repository\ServicesRepository;
use App\Repository\TasksRepository;
use App\Repository\BrandsRepository;
use App\Repository\PartnersRepository;
use App\Repository\BranchesRepository;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractController
{
    private $includesService;
    private $settingsRepository;

    public function __construct(IncludesService $includesService, SettingsRepository $settingsRepository)
    {
        $this->includesService = $includesService;
        $this->settingsRepository = $settingsRepository;
    }

    #[Route('/', name: 'app_dashboard')]
    public function index(PartnersRepository $PartnersRepository, CounterRepository $counterRepository,BranchesRepository $BranchesRepository, ServicesRepository $ServicesRepository,TasksRepository $TasksRepository,BrandsRepository $BrandsRepository): Response
    {
       
        $settings = $this->settingsRepository->findProcessedSettings(); 
        $counter = $counterRepository->findAll(); 
        $services = $ServicesRepository->findAll();
        $tasks = $TasksRepository->findAll();
        $brands = $BrandsRepository->findAll();
        $partner = $PartnersRepository->findAll();
        
        $keywords = "";
        foreach($services as $service){
            $name = $service->getTitle();
            $keywords.=$name.", ";
        }

        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'settings' => $settings,
            'counter' => $counter,
            'services' => $services,
            'tasks' => $tasks,
            'brands' => $brands,
            'partner' => $partner,
            'keywords' => $keywords
            //'branch' => $branch
        ]);
    }
    
    
    
    
    
    
    
    
    
    
}
