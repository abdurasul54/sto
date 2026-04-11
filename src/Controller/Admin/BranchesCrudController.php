<?php

namespace App\Controller\Admin;

use App\Entity\Branches;
use App\Entity\Services;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Field\TextField; 
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;


class BranchesCrudController extends AbstractCrudController 
{
    public static function getEntityFqcn(): string
    {
        return Branches::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('title', 'Заголовок'), 
            Field::new('phone_number', 'номер тел'),
            Field::new('email', 'email'),
            Field::new('address', 'Адрес'),
            NumberField::new('latitude', 'Широта'),
            NumberField::new('longitude', 'Долгота'),
            ImageField::new('img','Картинка')
                ->setBasePath('/img/branch')
                ->setUploadDir('public/img/branch')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),

        ]; 
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Филиалы')
            ->setPageTitle('new', 'Добавить филиалы');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

 
    

}
