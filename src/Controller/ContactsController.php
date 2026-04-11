<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\SettingsRepository;
use App\Repository\TasksRepository;
use App\Repository\BranchesRepository;

class ContactsController extends AbstractController
{
    #[Route('/contacts', name: 'contacts')]
    public function index(SettingsRepository $SettingsRepository, TasksRepository $tasksRepository,BranchesRepository $BranchesRepository): Response
    {

        $settings = $SettingsRepository->findProcessedSettings();
        $tasks = $tasksRepository->findAll();
        $branch = $BranchesRepository->findAll();
        $keywords = "";
        foreach($branch as $p){
            $name = $p->getTitle();
            $keywords.=$name.", ";
        } 

        return $this->render('contacts/index.html.twig', [
            'settings'=> $settings,
            'tasks' => $tasks,
            'branch' => $branch,
            
        ]);
        
    }
}
