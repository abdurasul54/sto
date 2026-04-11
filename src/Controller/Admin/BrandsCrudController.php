<?php

namespace App\Controller\Admin;

use App\Entity\Brands;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;

class BrandsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Brands::class; 
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('title', 'Заголовок'), 
            Field::new('description', 'Описание'),
            ImageField::new('img','Картинка')
                ->setBasePath('/img/brand')
                ->setUploadDir('/public/img/brand')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),

        ];
    } 

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Бренды')
            ->setPageTitle('new', 'Добавить бренд');
    }
}
