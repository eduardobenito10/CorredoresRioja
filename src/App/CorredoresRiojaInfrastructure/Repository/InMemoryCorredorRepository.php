<?php

namespace App\CorredoresRiojaInfrastructure\Repository;

use App\CorredoresRiojaDomain\Model\Corredor;
use App\CorredoresRiojaDomain\Repository\ICorredorRepository;

class InMemoryCorredorRepository implements ICorredorRepository {

    private $corredores;

    public function __construct() {
        $corredor = new Corredor("16611334K", "Eduardo", "Benito", "eduardobenito10@gmail.com", "1234", "19/08/1985", "");
        $pass='$2a$10$3eCg3WdG0I7MCJgXjQ/YWul9QEnpUT6fF6HsFtEQkM/0bUQ4NPrnm';
        $corredor->setPassword($pass);
        
        $corredor2 = new Corredor("1234", "Pepe", "Perez", "pepe@gmail.com", "1234", "19/08/1985", "");
        $pass='$2a$10$3eCg3WdG0I7MCJgXjQ/YWul9QEnpUT6fF6HsFtEQkM/0bUQ4NPrnm';
        $corredor2->setPassword($pass);
        
        $this->registraCorredor($corredor);
        $this->registraCorredor($corredor2);
    }

    public function findAll() {
        return $this->corredores;
    }

    public function findCorredorByDni($dni) {
        foreach($this->corredores as $corredor){
            if($corredor->getDni() == $dni){
                return $corredor;
            }
        }
        return null;
    }

    public function registraCorredor(Corredor $corredor) {
        $this->corredores[$corredor->getDni()] = $corredor;
    }

    public function updateCorredor(Corredor $corredor) {
        $this->corredores[] = $corredor;
    }

    public function removeCorredor(Corredor $corredor) {
        $this->corredores[] = $corredor;
    }

}
