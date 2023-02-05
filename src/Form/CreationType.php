<?php

namespace App\Form;

use App\Entity\Creation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

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
            ->add('size', TextType::class, [
                'label' => 'Taille',
                'attr' => ['class' => 'd-flex'],
                ])
            ->add('imageFile', VichFileType::class, [
                'label' => 'Image',
                'mapped' => false,
                'required' => false,
                'allow_delete'  => true, 
                'download_uri' => true
            ])
            ->add('price', TextType::class, [
                'label' => 'Prix',
                'attr' => ['class' => 'd-flex'],
                ])
            ->add('categories', null, [
                'choice_label' => 'name'
                ])
            ->add('updatedAt', DateType::class, [
                'label' => 'Mise à jour',
                'attr' => ['class' => 'col-2 d-flex'],
                'format' => 'dd-MMM-yyyy',
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Creation::class,
        ]);
    }
}
