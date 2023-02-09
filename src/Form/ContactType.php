<?php
namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class, [
                'label' => 'Nom',
                'attr' => ['class' => 'rounded-3'],
            ])
            ->add('lastname',TextType::class, [
                'label' => 'Prénom',
                'attr' => ['class' => 'rounded-3'],
            ])
            ->add('email',EmailType::class, [
                'label' => 'Email',
                'attr' => ['class' => 'd-flex rounded-3'],
                ])
            ->add('message', TextareaType::class, [
                'label' => 'Message',
                'attr' => ['rows' => 6, 'class' => 'd-flex rounded-3 col-12'],
            ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([]);
    }
}