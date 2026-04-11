<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\SettingsRepository;
use App\Repository\CategoryRepository;
use App\Repository\OptProductRepository;
use App\Repository\ProductRepository;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'category')]
    public function index(CategoryRepository $CategoryRepository, SettingsRepository $SettingsRepository): Response
    {
        $category = $CategoryRepository->findAll();   
        $settings = $SettingsRepository->findProcessedSettings();   



        return $this->render('category/index.html.twig', [
            'category' => $category,
            'settings' => $settings
        ]);
    }


    #[Route('/category{id}', name: 'category_with_id')]
    public function index_single(CategoryRepository $CategoryRepository, int $id, SettingsRepository $SettingsRepository, ProductRepository $productRepository): Response
    {
        $category = $CategoryRepository->find($id);
        $settings = $SettingsRepository->findProcessedSettings();
        $products = $productRepository->findBy(['category' => $id]);

        return $this->render('shop/index.html.twig', [
            'controller_name' => 'SingleServicesController',
            'settings' => $settings,
            'category' => $category,
            'product' => $products,
            'productJson' => json_encode(array_map(fn($p) => [
                'id' => $p->getId(),
                'image' => $p->getImg(),
                'name' => $p->getName(),
                'price' => $p->getPrice() ?? 0,
                'discount' => $p->getDiscount() ?? 0,
            ], $products),JSON_UNESCAPED_UNICODE),
        ]);
    }
}