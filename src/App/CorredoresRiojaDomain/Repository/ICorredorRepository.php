<?php

namespace App\CorredoresRiojaDomain\Repository;

use App\CorredoresRiojaDomain\Model\Corredor;

interface ICorredorRepository {

    public function findAll();

    public function findCorredorByDni($dni);

    public function registraCorredor(Corredor $corredor);
    
    public function updateCorredor(Corredor $corredor);

    public function removeCorredor(Corredor $corredor);
}
