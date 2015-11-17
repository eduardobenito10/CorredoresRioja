<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegistroCorredorTransformer
 *
 * @author edu
 */

namespace App\CorredoresRiojaBundle\Form\Transformer;

use Symfony\Component\Form\DataTransformerInterface;
use App\CorredoresRiojaBundle\Form\DTO\RegistroCorredorCommand;
use App\CorredoresRiojaDomain\Model\Corredor;

class RegistroCorredorTransformer implements DataTransformerInterface {

    public function reverseTransform($value) {
        $corredor = new Corredor($value->getDni(), $value->getNombre(), $value->getApellidos(), $value->getEmail(), $value->getPassword(), $value->getDireccion(), $value->getFechanacimiento());
        return $corredor;
    }

    public function transform($value) {
        if ($value === null) {
            return null;
        }
        $registroCorredorCommand = new RegistroCorredorCommand();
        $registroCorredorCommand->setDni($value->getDNI());
        $registroCorredorCommand->setNombre($value->getNombre());
        $registroCorredorCommand->setApellidos($value->getApellidos());
        $registroCorredorCommand->setEmail($value->getEmail());
        $registroCorredorCommand->setPassword($value->getPassword());
        $registroCorredorCommand->setDireccion($value->getDireccion());
        $registroCorredorCommand->setFechanacimiento($value->getFechanacimiento());
        return $registroCorredorCommand;
    }

}
