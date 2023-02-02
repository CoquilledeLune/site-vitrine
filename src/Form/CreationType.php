<?php

namespace App\Form;

use App\Entity\Creation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'attr' => ['class' => 'd-flex'],
                ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => ['class' => 'd-flex'],
            ] )
            ->add('size', TextType::class, [
                'label' => 'Taille',
                'attr' => ['class' => 'd-flex'],
                ])
            ->add('image', TextType::class, [
                'label' => 'Image',
                'attr' => ['class' => 'd-flex'],
                ])
            ->add('price', TextType::class, [
                'label' => 'Prix',
                'attr' => ['class' => 'd-flex'],
                ])
            ->add('category', TextType::class, [
                'label' => 'Catégorie',
                'attr' => ['class' => 'd-flex'],
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Creation::class,
        ]);
    }
}