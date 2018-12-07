<?php

namespace App\Form;

use App\Entity\TUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class FLoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, array( 'label' => 'Utilisateur',
                                                  'required' => true,
                                                ))
            ->add('password', PasswordType::class, array( 'label' => 'Mot de passe',
                                                  'required' => true,
                                                ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TUser::class,
        ]);
    }
}
