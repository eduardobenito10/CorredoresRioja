<?php

namespace App\CorredoresRiojaDomain\Repository;

use App\CorredoresRiojaDomain\Model\Carrera;
use App\CorredoresRiojaDomain\Model\Organizacion;
use App\CorredoresRiojaDomain\Model\Corredor;

interface ICarreraRepository {

    public function findAll();
    
    public function findAllDisputadas();
    
    public function findAllPorDisputar();

    public function findCarreraBySlug($slug);
    
    public function findCarrerasByOrganizacionDisputadas(Organizacion $organizacion);
    
    public function findCarrerasByOrganizacionPorDisputar(Organizacion $organizacion);
    
    public function findCarrerasByParticipante(Corredor $corredor);

    public function findCarrerasByParticipanteDisputadas(Corredor $corredor);

    public function findCarrerasByParticipantePorDisputar(Corredor $corredor);

    public function findParticipantesByCarrera(Carrera $carrera);
    
    public function addParticipante(Carrera $carrera, Corredor $corredor);

    public function removeParticipante(Carrera $carrera, Corredor $corredor);
        
    public function esParticipante(Carrera $carrera, Corredor $corredor);

    public function actualizarTiempo(Carrera $carrera, Corredor $corredor, $tiempo);

    public function saveCarrera(Carrera $carrera);
    
    public function updateCarrera(Carrera $carrera);

    public function removeCarrera(Carrera $carrera);
}