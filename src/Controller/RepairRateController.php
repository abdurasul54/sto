<?php

namespace App\Controller;

use App\Entity\RepairRate;
use App\Entity\Tasks;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
class RepairRateController extends AbstractController
{

    private $entityManager;

    public function __construct( EntityManagerInterface $entityManager )
    {
      
        $this->entityManager = $entityManager;
    
    }



    #[Route('/repair/rate', name: 'app_repair_rate')]
    public function index(): Response
    {
        return $this->render('repair_rate/index.html.twig', [
            'controller_name' => 'RepairRateController',
        ]);
    }

    #[Route('repair_add', name: 'app_repair_add', methods: ['POST'])]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $name = $request->request->get('name');
        $email = $request->request->get('Email');
        $phone_number = $request->request->get('phone');
        $message = $request->request->get('message');
        $tasksId = $request->request->get('tasks_id');
    
        $repair = new RepairRate();
        $repair->setName($name);
        $repair->setEmail($email);
        $repair->setPhoneNumber($phone_number);
        $repair->setMessgae($message);
    
        $task = $entityManager->getRepository(Tasks::class)->find($tasksId);
        if ($task) {
            $repair->setTasks($task);
        }
    
        $entityManager->persist($repair);
        $entityManager->flush();
    
        return $this->redirectToRoute('app_dashboard');
    }
}
