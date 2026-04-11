<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\SettingsRepository;
use App\Repository\ProductRepository;


class ShopController extends AbstractController
{
    #[Route('/shop', name: 'shop')]
    public function index(SettingsRepository $settingsRepository, ProductRepository $productRepository): Response
    {
        $settings = $settingsRepository->findProcessedSettings();  
        $product = $productRepository->findAll();  
        $keywords = "";
        foreach($product as $p){
            $name = $p->getName();
            $keywords.=$name.", ";
        }        
        
        return $this->render('shop/index.html.twig', [
            'controller_name' => 'ShopController',
            'settings' => $settings,
            'product' => $product,
            'productJson' => json_encode(array_map(fn($p) => [
                'id' => $p->getId(),
                'image' => $p->getImg(),
                'name' => $p->getName(),
                'price' => $p->getPrice() ?? 0,
                'discount' => $p->getDiscount() ?? 0,
            ], $product),JSON_UNESCAPED_UNICODE),
            'keywords' => $keywords
        ]);
    }
}
