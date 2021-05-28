<?php

namespace App\Form;

use App\Entity\Terminarz;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Terminarz1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('termin_rozpoczecia')
            ->add('termin_zakonczenia')
            ->add('klient')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Terminarz::class,
        ]);
    }
}
