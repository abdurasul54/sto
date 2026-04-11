<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;


class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('name','имя '),
            AssociationField::new('category', 'категория'),
            ImageField::new('img', 'Картинка')
            ->setBasePath('/img/shop')
            ->setUploadDir('/public/img/shop')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false),
            Field::new('discount','старое цена'),
            Field::new('price','цена'),
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Магазин')
            ->setPageTitle('new', 'Добавить продукт');
    }
}
