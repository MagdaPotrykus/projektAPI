<?php

namespace App\Controller\Admin;

use App\Entity\Customer;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use Twig\Environment;

class CustomerCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Customer::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Rezerwację')
            ->setEntityLabelInPlural('Zarezerwowane wizyty')
            ->setSearchFields(['id', 'phone', 'email','registrationNumber','service','reservationDate','lastname'])
            ->setDefaultSort(['reservationDate' => 'ASC']);
        ;
    }
    
    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('id')
            ->add('lastname')
            ->add('service')
            ->add('registrationNumber')
            ->add('reservationDate')
        ;
    }

    
    public function configureFields(string $pageName): iterable
    {

        yield IdField::new('id')
            ->onlyOnIndex();
        yield TextField::new('firstname','Imię');
        yield TextField::new('lastname','Nazwisko');
        yield TextField::new('phone','Nr telefonu')
            ->hideOnIndex();
        yield EmailField::new('email','Email')
            ->hideOnIndex();
        yield TextField::new('registrationNumber','Numer rejestracyjny pojazdu')
            ->hideOnIndex();
        yield TextField::new('brand','Marka pojazdu')
            ->hideOnIndex();
        yield TextField::new('model','Model pojazdu')
            ->hideOnIndex();
        yield TextField::new('engineCapacity','Pojemność silnika')
            ->hideOnIndex();
        yield TextField::new('productionYear','Rok produkcji')
            ->hideOnIndex();
        yield TextField::new('enginePower','Moc silnika')
            ->hideOnIndex();
        yield TextField::new('vinNumber','Nr VIN')
            ->hideOnIndex();
        yield TextField::new('mileage','Przebieg pojazdu')
            ->hideOnIndex();
        yield TextField::new('service','Usługi serwisowe');  
        yield DateTimeField::new('reservationDate','Data rezerwacji');


        // if (Crud::PAGE_EDIT === $pageName) {
        //     yield $createdAt->setFormTypeOption('disabled', true);
        // } else {
        //     yield $createdAt;
        // }
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            // ...
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->add(Crud::PAGE_EDIT, Action::SAVE_AND_ADD_ANOTHER)
        ;
    }
    
}
