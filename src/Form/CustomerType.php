<?php

namespace App\Form;

use App\Entity\Customer;
use App\Entity\Service;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label'=>'Imię: ',
                'attr'=> array(
                'placeholder'=>'Wprowadź swoje imię',
                'autofocus' => true),
                ])
            ->add('lastname', TextType::class, [
                'label'=>'Nazwisko: ',
                'attr'=> array(
                'placeholder'=>'Wprowadź swoje nazwisko'),
                ])
            ->add('phone', TelType::class, [
                'label'=>'Nr telefonu: ',
                'attr'=> array(
                    'placeholder'=>'601102203',
                    'pattern' => '\d{9}',
                    'title'=>'9-cio cyfrowy numer telefonu'),
                    ])
            ->add('email', EmailType::class, [
                'label'=>'Email: ',
                'attr'=> array(
                    'placeholder'=>'jan.kowalski@domena.pl'),
                    ])
            ->add('registrationNumber', TextType::class, [
                'label'=>'Numer rejestracyjny pojazdu: ',
                'attr'=> array(
                    'placeholder'=>'Wprowadź numer rejestracyjny pojazdu'),
                    ])
            ->add('brand', ChoiceType::class, [
                'label'=>'Marka pojazdu: ',
                'choices' => [
                    'Popularne marki' => [
                        'Alfa Romeo' => 'Alfa Romeo',
                        'Audi' => 'Audi',
                    ],
                    'Mniej znane marki' => [
                        'Acura' => 'Acura',
                    ]
                ]
                ])
            ->add('model', TextType::class, [
                'label'=>'Model pojazdu: ',
                'attr'=> array(
                    'placeholder'=>'Wprowadź model pojazdu'),
                    ])
            ->add('engineCapacity', TextType::class, [
                'label'=>'Pojemność silnika: ',
                'attr'=> array(
                    'placeholder'=>'Wprowadź pojemność'),
                    ])
            ->add('productionYear', NumberType::class, [
                'label'=>'Rok Produkcji: ',
                'attr'=> array(
                    'placeholder'=>'Wprowadź rok produkcji'),
                    ])
            ->add('enginePower', TextType::class, [
                'label'=>'Moc silnika: ',
                'attr'=> array(
                    'placeholder'=>'Wprowadź moc silnika'),
                    ])
            ->add('vinNumber', TextType::class, [
                'label'=>'Nr VIN: ',
                'attr'=> array(
                    'placeholder'=>'Wprowadź VIN'),
                    ])
            ->add('mileage', NumberType::class, [
                'label'=>'Przebieg pojazdu: ',
                'attr'=> array(
                    'placeholder'=>'Podaj przebieg pojazdu'),
                    ])
            ->add('service', EntityType::class, [
                'class' => Service::class,
                'label'=>'Wybierz usługę serwisową: ', ])
            ->add('reservationDate', DateTimeType::class, [
                'label'=>'Wybierz datę rezerwacji: ',
                'placeholder' => [
                    'year' => 'Rok', 'month' => 'Miesiąc', 'day' => 'Dzień',
                    'hour' => 'Godzina',
                    ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Customer::class,
        ]);
    }
}
