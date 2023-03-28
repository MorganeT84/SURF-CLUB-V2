<?php

namespace App\Form;

use App\Entity\Spot;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpotType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'label' => 'Le nom du spot *',
                'attr' => [
                    'placeholder' => 'saisir le nom du spot',
                    'class' => 'form-control',
                ],
                'required' => true,
            ])
            ->add('place', null, [
                'label' => 'Adresse *',
                'attr' => [
                    'placeholder' => 'saisir l\'adresse du spot',
                    'class' => 'form-control info',
                ],
                'required' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Spot::class,
        ]);
    }
}
