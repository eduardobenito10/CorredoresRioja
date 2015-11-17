<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CorredorType
 *
 * @author edu
 */

namespace App\CorredoresRiojaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\CorredoresRiojaBundle\Form\Transformer\RegistroCorredorTransformer;

class CorredorType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('dni')
                ->add('nombre')
                ->add('apellidos')
                ->add('email')
//Pedimos confirmación de la contraseña
                ->add('password', 'repeated', array('type' => 'password',
                    'invalid_message' => 'La contraseña debe ser la misma',
                    'options' => array('label' => 'Contraseña:')))
//El tipo de fechanacimiento debe ser birthday de lo contrario sólo muestra
//fechas hasta el año 2000.
                ->add('fechanacimiento', 'birthday', array('label' => 'Fecha de nacimiento:'))
                ->add('direccion', 'textarea', array('label' => 'Dirección:'))
//Por último añadimos el botón de envío.
                ->add('registro', 'submit', array('label' => 'Registro'));
        $builder->addViewTransformer(new RegistroCorredorTransformer());
    }

    public function getName() {
        return'corredor';
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'App\CorredoresRiojaBundle\Form\DTO\RegistroCorredorCommand',
            'error_mapping' => array('passwordLegal' => 'password',
                'mayorEdad' => 'fechanacimiento')
        ));
    }

}
