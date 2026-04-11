<?php

namespace App\Controller\Admin;

use App\Entity\Branches;
use App\Entity\Brands;
use App\Entity\Category;
use App\Entity\OptProduct;
use App\Entity\Partners;
use App\Entity\Product;
use App\Entity\RepairRate;
use App\Entity\Services;
use App\Entity\Settings;
use App\Entity\SettingsOpt;
use App\Entity\Tasks;
use App\Entity\Workers;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(SettingsCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Админка');
    }

    public function configureMenuItems(): iterable
    {
        //yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Услуги', 'fas fa-concierge-bell', Services::class);
        yield MenuItem::linkToCrud('О нас', 'fas fa-cogs', Settings::class);
        yield MenuItem::linkToCrud('Филиалы', 'fas fa-code-branch', Branches::class);
        yield MenuItem::linkToCrud('Категория', 'fas fa-tags', Category::class);
        yield MenuItem::linkToCrud('Мастера', 'fas fa-user-gear', Workers::class);
        yield MenuItem::linkToCrud('Опт о нас', 'fas fa-tags', SettingsOpt::class);
       // yield MenuItem::linkToCrud('Партнеры', 'fas fa-handshake', Partners::class);
        yield MenuItem::linkToCrud('Магазин', 'fas fa-shop', Product::class);
      //d  yield MenuItem::linkToCrud('ОПТ Магазин', 'fas fa-shop', OptProduct::class);
        yield MenuItem::linkToCrud('Заявки', 'fas fa-tools', RepairRate::class);
        yield MenuItem::linkToCrud('Задачи', 'fas fa-tasks', Tasks::class);
        yield MenuItem::linkToCrud('Бренды', 'fas fa-tags', Brands::class);

        // yield MenuItem::linkToCrud('Счетчик', 'fas fa-tachometer-alt', Counter::class);

        //  yield MenuItem::linkToCrud('Запись на прием', 'fas fa-calendar-alt', Reservation::class);


    }
}
