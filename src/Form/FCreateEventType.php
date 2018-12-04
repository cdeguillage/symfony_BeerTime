<?php

namespace App\Form;

use App\Entity\TEvent;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

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
            ->add('dateeventStart', DateTimeType::class, array( 'label' => 'Start date',
                                                  'required' => true,
                                                ))
            ->add('dateeventEnd', DateTimeType::class, array( 'label' => 'End date',
                                                  'required' => true,
                                                ))
            ->add('price', null, array( 'label' => 'Entrance price',
                                                  'data' => 0,
                                                ))  
            // ->add('createddate', HiddenType::class, array( 'data' => new \DateTime(), ))
            // ->add('idaddress', HiddenType::class, array( 'data' => null, ))
            // ->add('idusercreate', HiddenType::class, array( 'data' => null, ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TEvent::class,
        ]);
    }

}
