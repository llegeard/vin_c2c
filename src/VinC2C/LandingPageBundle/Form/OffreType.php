<?php

namespace VinC2C\LandingPageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use VinC2C\LandingPageBundle\Form\ImageType;

class OffreType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {


        $maxmillesimeValue = 2015;

        foreach (range(1990, $maxmillesimeValue, 1) as $i) {

            $millesime[$i] = $i;
        }

        $couleur = array('Blanc' => 'Blanc', 'Rouge' => 'Rouge', 'Rosé' => 'Rosé');



        $builder
                ->add('titre', 'text', array('required' => false, 'label' => false, 'attr' => array(
                        'placeholder' => "Titre de l'annonce", 'class' => 'form-control', 'autofocus' => 'autofocus'
            )))
                ->add('description', 'textarea', array('required' => false, 'label' => false, 'attr' => array(
                        'placeholder' => "Description de l'annonce", 'class' => 'form-control'
            )))
                ->add('millesime', 'choice', array('choices' => $millesime, 'label' => false, 'attr' => array('class' => 'form-control selectpicker', 'data-live-search' => 'true'
            )))
                ->add('prix', 'text', array('required' => false, 'label' => false, 'attr' => array(
                        'class' => 'range-bar', 'data-slider-min' => "0", 'data-slider-max' => "500", 'data-slider-step' => "1", 'data-slider-value' => "0", 'data-slider-tooltip' => "show"
            )))
                ->add('couleur', 'choice', array('choices' => $couleur, 'label' => false, 'attr' => array('class' => 'form-control selectpicker'
            )))
                ->add('image', new ImageType()) // Ajoutez cette ligne
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'VinC2C\LandingPageBundle\Entity\Offre'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'vinc2c_landingpagebundle_offre';
    }

}
