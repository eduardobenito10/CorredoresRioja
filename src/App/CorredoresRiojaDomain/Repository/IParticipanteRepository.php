<?php

namespace App\CorredoresRiojaDomain\Repository;

use App\CorredoresRiojaDomain\Model\Corredor;

interface IParticipanteRepository {

    public function saveParticipante(Participante $participante);

    public function removeParticipante(Participante $participante);
}
