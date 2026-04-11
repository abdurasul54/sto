<?php

namespace App\Controller\Admin;

use App\Entity\Counter;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;


class CounterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Counter::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('title','загаловок'),
            Field::new('val','цифра'),
            Field::new('sym','символ'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Счетчик')
            ->setPageTitle('new', 'Добавить Счетчик');
    }
    
}
