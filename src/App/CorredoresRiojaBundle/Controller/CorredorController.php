<?php

namespace App\CorredoresRiojaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CorredorController extends Controller {

    public function indexAction() {
        //$entries = $this->get('corredorrepository')->findAll();
        return new Response("yeyeheehejehejeehjej");
        //return $this->render("BlogBlogBundle:Entries:entradas.html.twig", array('entries' => $entries));
    }

}
