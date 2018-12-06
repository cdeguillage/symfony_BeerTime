<?php

namespace App\Form;

use App\Entity\TEvent;
use App\Entity\TUser;
use App\Entity\TAddress;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class FCreateEventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array( 'label' => 'Event\'s name',
                                                  'required' => true,
                                                ))
            ->add('description', TextareaType::class, array( 'label' => 'Description',
                                                  'required' => true,
                                                ))
            // ->add('poster', TextType::class, array( 'label' => 'Poster',
            //                                       'required' => true,
            //                                     ))
            ->add('posterurl')
            ->add('posterfile', FileType::class)
            ->add('dateeventStart', DateTimeType::class, array( 'label' => 'Start date',
                                                  'required' => true,
                                                  'widget' => 'single_text',
                                                ))
            ->add('dateeventEnd', DateTimeType::class, array( 'label' => 'End date',
                                                  'required' => true,
                                                  'widget' => 'single_text',
                                                ))
            ->add('price', MoneyType::class, array( 'label' => 'Entrance price',
                                                    'currency' => 'EUR',
                                                    'data' => 0,
                                                ))  
            // ->add('createddate', HiddenType::class, array( 'data' => new \DateTime(), ))
            ->add('idaddress', null, array( 'choice_label' => 'name',
                                                            'class' => TAddress::class,
                                                            'required' => true,
                                                ))
            ->add('idusercreate', null, array( 'choice_label' => 'username',
                                                            'class' => TUser::class,
                                                            'required' => true,
                                                ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TEvent::class,
        ]);
    }

}
