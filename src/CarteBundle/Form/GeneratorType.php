<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02/02/17
 * Time: 14:51
 */

namespace CarteBundle\Form;


use CarteBundle\Entity\Location;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GeneratorType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categories', ChoiceType::class, array(
                'choices' => array(null => "Toutes catégories", "EQUIPEMENT" =>"Equipement", "PATRIMOINE_CULTUREL" => "Culture", "COMMERCE_ET_SERVICE" => "Commerce", "HOTELLERIE" => "Hotellerie", "HEBERGEMENT_LOCATIF" => "Hebergement locatif", "DEGUSTATION" => "Degustation", "RESTAURATION" => "Restauration" ),
                'expanded' => true,
                'multiple' => true,
                'label' => "Thématique(s)",
                'required' => true,
                'empty_data'  => "Toutes catégories"
            ))
            ->add('steps', ChoiceType::class, array(
                'choices' => array(3 => 3 , 4 => 4, 5 => 5, 6 => 6 ),
                'choices_as_values' => true,
                'expanded' => true,
                'multiple' => false,
                'label' => "Nombre d'étapes",
                'required' => true
            ))
            ->add('restaurant', CheckboxType::class, array(
                'required' => false,
                'label' => 'Un restaurant ?',
            ))
            ->add('localisations', EntityType::class, array(
                'class' => Location::class,
                'property' => 'postalcode',
                'required' => false,
                'expanded' => false,
                'multiple' => true
            ))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
        ));
    }

}