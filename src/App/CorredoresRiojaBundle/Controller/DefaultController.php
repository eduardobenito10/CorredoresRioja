<?php

namespace App\CorredoresRiojaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\CorredoresRiojaBundle\Form\CorredorType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $carreras = $this->get('carrerarepository')->findAllPorDisputar();
        return $this->render('AppCorredoresRiojaBundle:Default:portada.html.twig', array('carreras' => $carreras));
    }

    public function registroAction() {
        $peticion = $this->getRequest();
        $form = $this->createForm(new CorredorType());
        $form->handleRequest($peticion);
        if ($form->isValid()) {
//Recogemos el corredor que se ha registrado
            $corredor = $form->getData();
//Codificamos la contraseña del corredor
            $encoder = $this->get('security.encoder_factory')->getEncoder($corredor);
            $password = $encoder->encodePassword($corredor->getPassword(), $corredor->getSalt());
            $corredor->saveEncodedPassword($password);
//Lo almacenamos en nuestro repositorio de corredores
            $this->get('corredorrepository')->registraCorredor($corredor);
//Creamos un mensaje flash para mostrar al usuario que
//se ha registrado correctamente
            $this->get('session')->getFlashBag()->add('info', '¡Enhorabuena' . $corredor->getNombre() . ' te has registrado en
CorredoresPorLaRioja!');
//Redirigimos al usuario a la portada
            return $this->redirect($this->generateUrl('portada'));
        }
        return $this->render("AppCorredoresRiojaBundle:Default:registro.html.twig", array('formulario' => $form->createView()));
    }
}
