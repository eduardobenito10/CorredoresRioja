<?php

namespace App\CorredoresRiojaDomain\Repository;

use App\CorredoresRiojaDomain\Model\Organizacion;

interface IOrganizacionRepository {

    public function findAll();

    public function findOrganizacionBySlug($slug);
    
    public function findOrganizacionByEmail($email);

    public function registraOrganizacion(Organizacion $organizacion);
    
    public function updateOrganizacion(Organizacion $organizacion);

    public function removeOrganizacion(Organizacion $organizacion);
}