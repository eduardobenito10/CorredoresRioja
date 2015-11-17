<?php

namespace App\CorredoresRiojaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller {

    public function loginAction(Request $request) {
        $authenticationUtils = $this->get('security.authentication_utils');

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('AppCorredoresRiojaBundle:Security:login.html.twig', array(
                    'last_username' => $lastUsername,
                    'error' => $error));
    }
    
    public function organizacionLoginAction(Request $request) {
        $authenticationUtils = $this->get('security.authentication_utils');

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('AppCorredoresRiojaBundle:Security:organizacionLogin.html.twig', array(
                    'last_username' => $lastUsername,
                    'error' => $error));
    }

}
