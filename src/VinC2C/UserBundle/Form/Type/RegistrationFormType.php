<?php

namespace VinC2C\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationFormType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        // add your custom field
        $builder
                ->add('lastname', 'text')
                ->add('firstname', 'text')
                ->add('email', 'text')
                ->add('password', 'text')
        ;
    }

//    public function getParent() {
//        return 'fos_user_registration';
//    }

    public function getName() {
        return 'vinc2c_user_registration';
    }

}
