<?php

namespace App\Form;

use App\Entity\MapService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MapServiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name')
            ->add('Photo')
            ->add('PostCode')
            ->add('Comment')
            ->add('Service')
            ->add('Status')
            ->add('coordinate')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MapService::class,
        ]);
    }
}
