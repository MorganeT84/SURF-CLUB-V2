<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Level;
use App\Entity\Session;
use App\Entity\Spot;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SessionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', null, [
                'label' => 'Le titre de la session *',
                'attr' => [
                    'placeholder' => 'saisir le titre de la session',
                    'class' => 'form-control',
                ],
                'required' => true,
            ])
            ->add('description', null, [
                'label' => 'Description *',
                'attr' => [
                    'placeholder' => 'saisir une description',
                    'class' => 'form-control info',
                ],
                'required' => true,
            ])
            ->add('dayTime', null, [
                "label" => "Début de session",
                'widget' => 'single_text',
            ])
            ->add('dayTimeEnd', null, [
                "label" => "Fin de session",
                'widget' => 'single_text',
            ])
            ->add('picture')
            ->add('numberOfPlace', ChoiceType::class, [
                'label' => 'Nombre de participants',
                'choices' => range(1, 10, 0.5),
            ])
            ->add('level', EntityType::class, [
                'class' => Level::class,
                'label' => 'Niveau',
                'expanded' => true,
                'multiple' => true,
                'required' => true,
            ])
            ->add('spot', EntityType::class, [
                'class' => Spot::class,
                'label' => 'Spot pour la session',
                'expanded' => true, 
                'required' => true,
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'label' => 'categorie',
                'expanded' => true,
                'required' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Session::class,
        ]);
    }
}
