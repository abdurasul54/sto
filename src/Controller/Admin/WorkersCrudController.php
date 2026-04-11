<?php

namespace App\Controller\Admin;

use App\Entity\Workers;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class WorkersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Workers::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Мастера')
            ->setEntityLabelInPlural('Мастера')
            ->setPageTitle('index', 'Список мастеров')
            ->setPageTitle('new', 'Добавить мастера')
            ->setPageTitle('edit', 'Редактировать мастера');
    }


    public function configureFields(string $pageName): iterable
    {

        return [

            TextField::new('name', 'Имя'),

            TextField::new('surname', 'Фамилия'),

            TelephoneField::new('phone_number', 'Номер телефона'),

            AssociationField::new('service', 'Услуги')
                ->setHelp('Выберите услуги, которые предоставляет мастер'),

            ImageField::new('img', 'Фото мастера')
                ->setBasePath('img/workers/') // Путь для отображения в браузере (от папки public)
                ->setUploadDir('public/img/workers/') // Путь для загрузки на сервере
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]')
                ->setRequired(false),
        ];
    }



}
