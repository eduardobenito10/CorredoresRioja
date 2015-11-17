<?php

namespace App\CorredoresRiojaInfrastructure\Repository;

use App\CorredoresRiojaDomain\Model\Participante;
use App\CorredoresRiojaDomain\Model\Carrera;
use App\CorredoresRiojaDomain\Model\Corredor;
use App\CorredoresRiojaDomain\Repository\IParticipanteRepository;

class InMemoryParticipanteRepository implements IParticipanteRepository {
    
    private $participantes;

    public function __construct() {
        //$this->$participantes[] = new Participante();
    }
   
    public function saveParticipante(Participante $participante){}

    public function removeParticipante(Participante $participante){}
}