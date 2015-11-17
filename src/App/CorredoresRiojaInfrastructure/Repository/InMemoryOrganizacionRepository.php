<?php

namespace App\CorredoresRiojaInfrastructure\Repository;

use App\CorredoresRiojaDomain\Model\Organizacion;
use App\CorredoresRiojaDomain\Repository\IOrganizacionRepository;

class InMemoryOrganizacionRepository implements IOrganizacionRepository {
    
    private $organizaciones;

    public function __construct() {
        $o1 = new Organizacion("Matute", "matute@gmail.com");

        $pass='$2a$10$Wy6TYDL04YhOwSE6I10gGOzgPSaga7qBObv2956yMejWc0uqHsJBC';
        $o1->setPassword($pass);
        
        $this->registraOrganizacion($o1);
    }
   
    public function findAll(){}

    public function findOrganizacionBySlug($slug){
        foreach($this->organizaciones as $organizacion){
            if($organizacion->getSlug() == $slug){
                return $organizacion;
            }
        }
    }
    
    public function findOrganizacionByEmail($email){}

    public function registraOrganizacion(Organizacion $organizacion){
        $this->organizaciones[$organizacion->getSlug()] = $organizacion;
        
    }
    
    public function updateOrganizacion(Organizacion $organizacion){}

    public function removeOrganizacion(Organizacion $organizacion){}
}