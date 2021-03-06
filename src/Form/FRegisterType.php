<?php

namespace App\Form;

use App\Entity\TUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
// Teste la répétition du mot de passe
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class FRegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, array( 'label' => 'Utilisateur',
                                                  'required' => true,
                                                ))
            ->add('email', EmailType::class, array( 'label' => 'Email',
                                                    'required' => true,
                                                ))
            ->add('password', PasswordType::class, array( 'label' => 'Mot de passe',
                                                  'required' => true,
                                                ))
            // ->add('roles', null, array( 'choice_label' => 'username',
            //                                                 'class' => TUser::class,
            //                                                 'required' => true,
            //                                     ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TUser::class,
        ]);
    }
}
