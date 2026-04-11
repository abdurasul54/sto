<?php

namespace App\Controller\Admin;

use App\Entity\Settings;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class SettingsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Settings::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('phone_number','номер тел'),
            Field::new('email','email'),
            Field::new('facebook','facebook'),
            Field::new('instagram','instagram'),
            Field::new('youtube','youtube'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'О нас')
            ->setPageTitle('new', 'Добавить информацию')
            ->setPageTitle('edit', 'Изменить информацию');
    }
    
}
