<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OrganizacionUserProvider
 *
 * @author edu
 */

namespace App\CorredoresRiojaBundle\Security;

use App\CorredoresRiojaBundle\Security\OrganizacionUser;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use App\CorredoresRiojaDomain\Repository\IOrganizacionRepository;

class OrganizacionUserProvider implements UserProviderInterface {

    private $organizacionrepository;

    public function __construct(IOrganizacionRepository $repository) {
        //Inyectamos el repositorio
        $this->organizacionrepository = $repository;
    }

    public function loadUserByUsername($username) {
        //buscamos el usuario
        $userData = $this->organizacionrepository->findOrganizacionBySlug($username);
        
        //si existe el corredor,devolvemos un CorredorUser de
        //lo contrario devolvemos una excepción
        if ($userData) {
            $password = $userData->getPassword();
            $salt = $userData->getSalt();
            return new OrganizacionUser($username, $password, $salt);
        }

        throw new UsernameNotFoundException(
        sprintf('No existe una organizacion con nombre "%s".', $username)
        );
    }

    //La definición de estas dos funciones es casi siempre la misma
    public function refreshUser(UserInterface $user) {
        if (!$user instanceof OrganizacionUser) {
            throw new UnsupportedUserException(
            sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }
        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class) {
        return $class === 'Corredores\Rioja\CorredoresBundle\Security\OrganizacionUser';
    }

}
