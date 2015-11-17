<?php

namespace App\CorredoresRiojaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CarreraController extends Controller {

    public function carrerasAction() {
        $carrerasDisputadas = $this->get('carrerarepository')->findAllDisputadas();
        $carreras = $this->get('carrerarepository')->findAllPorDisputar();
        return $this->render("AppCorredoresRiojaBundle:Default:carreras.html.twig", array('carreras' => $carreras, 'carrerasDisputadas' => $carrerasDisputadas));
    }

    public function miscarrerasAction() {
        $userName = $this->getUser()->getUsername();
        $corredor = $this->get('corredorrepository')->findCorredorByDni($userName);
        $miscarreras = $this->get('carrerarepository')->findCarrerasByParticipantePorDisputar($corredor);
        $miscarrerasDisputadas = $this->get('carrerarepository')->findCarrerasByParticipanteDisputadas($corredor);
        return $this->render("AppCorredoresRiojaBundle:Default:carreras.html.twig", array('corredor' => $corredor, 'carreras' => $miscarreras, 'carrerasDisputadas' => $miscarrerasDisputadas));
    }

    public function carreraAction($slug) {
        $carrera = $this->get('carrerarepository')->findCarreraBySlug($slug);
        $esParticipante = false;
        if($this->getUser()){
            $userName = $this->getUser()->getUsername();
            $corredor = $this->get('corredorrepository')->findCorredorByDni($userName);
            $esParticipante = $this->get('carrerarepository')->esParticipante($carrera, $corredor);
        }
        return $this->render("AppCorredoresRiojaBundle:Default:carrera.html.twig", array('carrera' => $carrera, 'esParticipante' => $esParticipante));
    }

    public function inscribirAction($slug) {
        $carrera = $this->get('carrerarepository')->findCarreraBySlug($slug);
        $userName = $this->getUser()->getUsername();
        $corredor = $this->get('corredorrepository')->findCorredorByDni($userName);
        $this->get('carrerarepository')->addParticipante($carrera, $corredor);
        $this->get('session')->getFlashBag()->add('info', 'Enhorabuena, te has registrado en la carrera ' . $carrera->getNombre());
        return $this->redirect($this->generateUrl('miscarreras'));
    }

    public function desapuntarAction($slug) {
        $carrera = $this->get('carrerarepository')->findCarreraBySlug($slug);
        $userName = $this->getUser()->getUsername();
        $corredor = $this->get('corredorrepository')->findCorredorByDni($userName);
        $this->get('carrerarepository')->removeParticipante($carrera, $corredor);
        $this->get('session')->getFlashBag()->add('info', $corredor->getNombre() . ', te has desapuntado correctamente.');
        return $this->redirect($this->generateUrl('miscarreras'));
    }

}
