<?php

namespace App\Form;

use App\Entity\Subject;
use App\Entity\Contact;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name', TextType::class, array('label'=>'Your Name', 'attr' => array(
                'title' => 'Your Name',
                'placeholder' => "Robin Banks"
              )))
            ->add('Email', EmailType::class, array('label'=>'Your Email', 'attr' => array(
                'title' => 'Your Email',
                'placeholder' => 'robinbanks@gmail.com'
                )))
            ->add('Subject', EntityType::class, [
                'class' => Subject::class,
                'label' => 'Choose a subject',
                'choice_label' => 'name'])
        
            ->add('Content', TextareaType::class, array('label'=>'Your message', 'attr' => array(
                'title' => 'Your message',
                'placeholder' => "Tell us..."
              )));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
