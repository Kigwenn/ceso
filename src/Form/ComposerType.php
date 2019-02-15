<?php

namespace App\Form;

use App\Entity\Composer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComposerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id_Eleves')
            ->add('id_Salles')
            ->add('id_Formateurs')
            ->add('id_Materiels')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Composer::class,
        ]);
    }
}
