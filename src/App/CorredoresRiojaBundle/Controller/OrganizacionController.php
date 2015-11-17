<?php

namespace App\CorredoresRiojaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OrganizacionController extends Controller {

    public function showOrganizacionAction($slug) {
        $organizacion = $this->get('organizacionrepository')->findOrganizacionBySlug($slug);
        return $this->render("AppCorredoresRiojaBundle:Default:organizacion.html.twig", array('organizacion' => $organizacion));
    }
    
    public function organizacionesAction() {
        return $this->render('AppCorredoresRiojaBundle:Default:portada.html.twig');
    }
    


}
