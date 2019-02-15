<?php

namespace App\Form;

use App\Entity\CentresFormations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CentresFormationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rs')
            ->add('nom')
            ->add('adresse')
            ->add('cp')
            ->add('tel')
            ->add('fax')
            ->add('email')
            ->add('tva')
            ->add('ape')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CentresFormations::class,
        ]);
    }
}
