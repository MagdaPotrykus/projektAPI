<?php

namespace App\Form;

use App\Entity\Customer;
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
                        'BMW' => 'BMW',
                        'Dacia' => 'Dacia',
                        'Daewoo' => 'Daewoo',
                        'Ferrari' => 'Ferrari',
                        'Fiat' => 'Fiat',
                        'Ford' => 'Ford',
                        'Honda' => 'Honda',
                        'Hummer' => 'Hummer',
                        'Hyundai' => 'Hyundai',
                        'Jaguar' => 'Jaguar',
                        'Jeep' => 'Jeep',
                        'Kia' => 'Kia',
                        'Land Rover' => 'Land Rover',
                        'Lexus' => 'Lexus',
                        'Mazda' => 'Mazda',
                        'Mercedes-Benz' => 'Mercedes-Benz',
                        'Nissan' => 'Nissan',
                        'Opel' => 'Opel',
                        'Peugeot' => 'Peugeot',
                        'Porsche' => 'Porsche',
                        'Renault' => 'Renault',
                        'Rolls-Royce' => 'Rolls-Roycez',
                        'SEAT' => 'SEAT',
                        'Skoda' => 'Skoda',
                        'Toyota' => 'Toyota',
                        'Trabant' => 'Trabant',
                        'Uaz' => 'Uaz',
                        'Volksvagen' => 'Volksvagen',
                        'Volvo' => 'Volvo',
                        'Wartburg' => 'Wartburg',
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
                    'placeholder'=>'Podaj przebieg pojazdu',
                    'invalid_message' => 'Wartość jest nieprawidłowa',),
                    ])
            ->add('service',  ChoiceType::class, [
                'label'=>'Wybierz usługę serwisową: ',
                'choices' => [
                    'PRZEGLĄD SERWISOWY' => 'PRZEGLĄD SERWISOWY',
                    'PRZEGLĄD OKRESOWY WEDŁUG CZYNNOŚCI KARTY PRZEGLĄDOWEJ PO KONKRETNYM PRZEBIEGU LUB COROCZNY' => 'PRZEGLĄD OKRESOWY WEDŁUG CZYNNOŚCI KARTY PRZEGLĄDOWEJ PO KONKRETNYM PRZEBIEGU LUB COROCZNY',
                    'WYMIANA ROZRZĄDU' => 'WYMIANA ROZRZĄDU',
                    'WYMIANA SPRZĘGŁA' => 'WYMIANA SPRZĘGŁA',
                    'NAPRAWA ELEMENTÓW ZAWIESZENIA' => 'NAPRAWA ELEMENTÓW ZAWIESZENIA',
                    'NAPRAWA PODZESPOŁÓW ELEKTRYCZNYCH' => 'NAPRAWA PODZESPOŁÓW ELEKTRYCZNYCH',
                    'WYMIANA OPON' => 'WYMIANA OPON',
                    'WYMIANA KLOCKÓW HAMULCOWYCH LUB TARCZ' => 'WYMIANA KLOCKÓW HAMULCOWYCH LUB TARCZ',
                    'WYMIANA OLEJU' => 'WYMIANA OLEJU',
                    'NAPRAWA BLACHARSKO - LAKIERNICZA' => 'NAPRAWA BLACHARSKO - LAKIERNICZA',
                    'INNE USTERKI' => 'INNE USTERKI',
                ]
                ])
            ->add('reservationDate', DateTimeType::class, array(
                'label'=>'Wybierz datę rezerwacji: ',
                'date_widget' => 'choice',
                //'days' => min(date('d')),
                'years' => range(date('Y'),date('Y')+1),
                'months' => range(date('m'),12),
                'days' => range(date('d'),31),
                // 'months' => range(date('m'),date('m')+5),
                'time_widget' => 'choice',
                'hours' => range(8,16),
                'minutes' => range(0,0),
                'invalid_message' => 'Podana data jest nieprawidłowa',
                ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Customer::class,
        ]);
    }
}
