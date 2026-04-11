<?php

namespace App\Controller\Admin;

use App\Entity\RepairRate;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class RepairRateCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RepairRate::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('name', 'имя'),
            Field::new('phone_number', 'номер тел'),
            Field::new('email', 'email'),
            Field::new('messgae', 'сообщение'),

            AssociationField::new('tasks', 'задачи'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Оценка ремонта')
            ->setDefaultSort([
                'id' => 'DESC',
            ]);
    }
}