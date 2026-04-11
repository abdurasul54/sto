<?php

namespace App\Controller\Admin;

use App\Entity\Services;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;


class ServicesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Services::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('title', 'имя'),
            Field::new('description', 'описание'),
            ImageField::new('prev_img', 'Картинка')
                ->setBasePath('/img/services')
                ->setUploadDir('/public/img/services')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            ImageField::new('desc_img', 'Картинка')
                ->setBasePath('/img/services')
                ->setUploadDir('/public/img/services')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the visible title at the top of the page and the content of the <title> element
            // it can include these placeholders:
            //   %entity_name%, %entity_as_string%,
            //   %entity_id%, %entity_short_id%
            //   %entity_label_singular%, %entity_label_plural%
            ->setEntityLabelInSingular('услугу')
            ->setEntityLabelInPlural('Услуги')
            ->setPageTitle('index', 'Услуги')
            ->setPageTitle('new', 'Добавить услуги');
    }
}
