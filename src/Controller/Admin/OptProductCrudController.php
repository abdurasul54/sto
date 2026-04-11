<?php

namespace App\Controller\Admin;

use App\Entity\OptProduct;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;


class OptProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return OptProduct::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('title','заголовок '),
            Field::new('description','описание'),
            ImageField::new('img', 'Картинка')
            ->setBasePath('/img/OptProduct')  
            ->setUploadDir('/public/img/OptProduct')  
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false),
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Оптовый продукт')
            ->setPageTitle('new', 'Добавить продукт');
    }
}
