<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\Creation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
                ])
            ->add('size', FileType::class, [
                'label' => false,
                'multiple' => true,
                'mapped' => false,
                'required' => false
                ])
            ->add('image', TextType::class, [
                'label' => 'Image',
                'attr' => ['class' => 'd-flex'],
                ])
            ->add('price', TextType::class, [
                'label' => 'Prix',
                'attr' => ['class' => 'd-flex'],
                ])
            ->add('categories', null, [
                'choice_label' => 'name'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Creation::class,
        ]);
    }
}
