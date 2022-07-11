<?php

namespace App\Controller\Admin;

use App\Entity\Country;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CountryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Country::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('photoflag')
                ->setBasePath('uploads/photoflag')
                ->setUploadDir('public/uploads/photoflag')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]'),
            TextField::new('country'),
            TextField::new('capitalcity'),
        ];
    }

}
