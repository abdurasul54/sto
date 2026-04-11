<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\SettingsOptRepository;
use App\Repository\OptProductRepository;


class OptProductController extends AbstractController
{
    #[Route('/opt-product', name: 'app_opt_product')]
    public function index(SettingsOptRepository $settingsRepository, OptProductRepository $productRepository): Response
    {
        $settings = $settingsRepository->findProcessedSettings();  
        $product = $productRepository->findAll();  
        $keywords = "";
        foreach($product as $p){
            $name = $p->getTitle();
            $keywords.=$name.", ";
        }        
        
        return $this->render('opt_product/index.html.twig', [
            'controller_name' => 'OptProductController',
            'settings' => $settings,
            'product' => $product,
            'productJson' => json_encode(array_map(fn($p) => [
                'id' => $p->getId(),
                'image' => $p->getImg(),
                'name' => $p->getTitle(),
            ], $product),JSON_UNESCAPED_UNICODE),
            'keywords' => $keywords
        ]);
    }
}
