<?php

namespace VinC2C\LandingPageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Range;

class AnnonceSearchType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

//        $prix = array();
//
//        $maxPrixValue = 100000;
//
//        foreach (range(0, $maxPrixValue, 10000) as $i) {
//
//            $prix[$i] = $i;
//        }

        $maxmillesimeValue = 2015;

        foreach (range(1990, $maxmillesimeValue, 1) as $i) {

            $millesime[$i] = $i;
        }

        $couleur = array('Blanc' => 'Blanc', 'Rouge' => 'Rouge', 'Rosé' => 'Rosé');

        $builder
                ->add('titre', 'text', array('required' => false, 'label' => false, 'attr' => array(
                        'placeholder' => 'Rechercher un vin', 'class' => 'form-control', 'autofocus' => 'autofocus'
            )))
                ->add('millesime', 'choice', array('choices' => $millesime, 'label' => false, 'attr' => array('class' => 'form-control selectpicker', 'data-live-search' => 'true'
            )))
//                ->add('prix', 'choice', array('choices' => $prix, 'label' => false, 'attr' => array('class' => 'form-control min-range-bar'
//            )))
//                ->add('prix_Max', 'choice', array('choices' => $prix, 'label' => false, 'attr' => array('class' => 'form-control selectpicker'
//            )))
                ->add('prix', 'text', array('required' => false, 'label' => false, 'attr' => array(
                        'class' => 'range-bar', 'data-slider-min' => "0", 'data-slider-max' => "500", 'data-slider-step' => "1", 'data-slider-value' => "[0,500]", 'data-slider-tooltip' => "show"
            )))
//                ->add('prix_Max', 'text', array('required' => false, 'label' => false, 'attr' => array(
//                        'class' => 'range-bar', 'data-slider-min' => "0", 'data-slider-max' => "500", 'data-slider-step' => "1", 'data-slider-value' => "0", 'data-slider-tooltip' => "show"
//            )))
                ->add('couleur', 'choice', array('choices' => $couleur, 'label' => false, 'attr' => array('class' => 'form-control selectpicker'
            )))
        ;
    }

    public function getName() {

        return 'vinc2c_landingpagebundle_annoncesearch';
    }

}
