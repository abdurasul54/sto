<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PageListController extends AbstractController
{
    #[Route('/page/list', name: 'app_page_list')]
    public function index(): Response
    {
        return $this->render('page_list/index.html.twig', [
            'controller_name' => 'PageListController',
        ]);
    }
}
