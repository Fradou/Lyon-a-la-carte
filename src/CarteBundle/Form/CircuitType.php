<?php

namespace CarteBundle\Form;

use CarteBundle\CarteBundle;
use CarteBundle\Entity\Location;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CircuitType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('category')
            ->add('description')
            ->add('cost')
            ->add('users')
            ->add('locations', EntityType::class, array(
                'class' => Location::class,
                'multiple' => true,
                'expanded' => true
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CarteBundle\Entity\Circuit'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cartebundle_circuit';
    }


}
