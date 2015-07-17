<?php

// src/VinC2C/LandingPageBundle/Form/Type/CouleurType.php

namespace VinC2C\LandingPageBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CouleurType extends AbstractType {

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'choices' => array(
                'Rouge' => 'Rouge',
                'Blanc' => 'Blanc',
                'Rosé' => 'Rosé',
            )
        ));
    }

    public function getParent() {
        return 'choice';
    }

    public function getName() {
        return 'couleur';
    }

}
