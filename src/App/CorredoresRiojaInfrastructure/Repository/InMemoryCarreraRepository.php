<?php

namespace App\CorredoresRiojaInfrastructure\Repository;

use App\CorredoresRiojaDomain\Model\Carrera;
use App\CorredoresRiojaDomain\Model\Organizacion;
use App\CorredoresRiojaDomain\Model\Corredor;
use App\CorredoresRiojaDomain\Model\Participante;
use App\CorredoresRiojaDomain\Repository\ICarreraRepository;

class InMemoryCarreraRepository implements ICarreraRepository {

    private $carreras;

    public function __construct() {
        $carrera = new Carrera("Carrera de Matute", "Carrera técnica de montaña", time() - 3600 * 1000, 10, time() - 3600 * 1000, 100, "matutrail.jpg", "matute@gmail.com");
        $this->saveCarrera($carrera);
        $carrera2 = new Carrera("Maratón de Logroño", "Maratón internacional Ciudad de Logroño", time() + 60 * 3600 * 1000, 21, time() + 30 * 3600 * 1000, 1000, "matutrail.jpg", "ferrer@gmail.com");
        $this->saveCarrera($carrera2);

        $corredor = new Corredor("16611334K", "Eduardo", "Benito", "eduardobenito10@gmail.com", "1234", "19/08/1985", "");
        $this->addParticipante($carrera, $corredor);
        $this->actualizarTiempo($carrera, $corredor, 30 * 60 + 15);
        $corredor2 = new Corredor("1234", "Pepe", "Perez", "", "1234", "19/08/1985", "");
        $this->addParticipante($carrera2, $corredor2);
        $this->actualizarTiempo($carrera2, $corredor2, 45 * 60);
    }

    public function findAll() {
        return $this->carreras;
    }

    public function findAllDisputadas() {
        $carreras = array();
        foreach ($this->carreras as $carrera) {
            if ($carrera->getFechaCelebracion() < time()) {
                $carreras[] = $carrera;
            }
        }
        return $carreras;
    }

    public function findAllPorDisputar() {
        $carreras = array();
        foreach ($this->carreras as $carrera) {
            if ($carrera->getFechaCelebracion() > time()) {
                $carreras[] = $carrera;
            }
        }
        return $carreras;
    }

    public function findCarreraBySlug($slug) {
        foreach ($this->carreras as $carrera) {
            if ($carrera->getSlug() == $slug) {
                return $carrera;
            }
        }
    }

    public function findCarrerasByOrganizacionDisputadas(Organizacion $organizacion) {
        $carreras = array();
        foreach ($this->carreras as $carrera) {
            if ($carrera->getFechaCelebracion() < time()) {
                $carreras[] = $carrera;
            }
        }
        return $carreras;
    }

    public function findCarrerasByOrganizacionPorDisputar(Organizacion $organizacion) {
        $carreras = array();
        foreach ($this->carreras as $carrera) {
            if ($carrera->getFechaCelebracion() > time()) {
                $carreras[] = $carrera;
            }
        }
        return $carreras;
    }

    public function findCarrerasByParticipante(Corredor $corredor) {
        $carreras = array();
        foreach ($this->carreras as $carrera) {
            if ($carrera->getFechaCelebracion() < time()) {
                $carreras[] = $carrera;
            }
        }
        return $carreras;
    }

    public function findCarrerasByParticipanteDisputadas(Corredor $corredor) {
        $carreras = array();
        foreach ($this->carreras as $carrera) {
            if ($carrera->getFechaCelebracion() < time()) {
                foreach ($carrera->getParticipantes() as $dni => $participante) {
                    if ($dni == $corredor->getDni()) {
                        $carreras[] = $carrera;
                        break;
                    }
                }
            }
        }
        return $carreras;
    }

    public function findCarrerasByParticipantePorDisputar(Corredor $corredor) {
        $carreras = array();
        foreach ($this->carreras as $carrera) {
            if ($carrera->getFechaCelebracion() > time()) {
                foreach ($carrera->getParticipantes() as $dni => $participante) {
                    if ($dni == $corredor->getDni()) {
                        $carreras[] = $carrera;
                        break;
                    }
                }
            }
        }
        return $carreras;
    }

    public function findParticipantesByCarrera(Carrera $carrera) {
        return $carrera->getParticipantes();
    }

    public function addParticipante(Carrera $carrera, Corredor $corredor) {
        $participante = new Participante($corredor, $carrera, 0, count($carrera->getParticipantes()) + 1);
        $carrera->addParticipante($corredor->getDni(), $participante);
    }
    
    public function removeParticipante(Carrera $carrera, Corredor $corredor){
        $carrera->removeParticipante($corredor->getDni());
    }

    public function esParticipante(Carrera $carrera, Corredor $corredor) {
        foreach ($carrera->getParticipantes() as $dni => $participante) {
            if ($dni == $corredor->getDni()) {
                return true;
            }
        }
    }

    public function actualizarTiempo(Carrera $carrera, Corredor $corredor, $tiempo) {
        $p = null;
        foreach ($carrera->getParticipantes() as $dni => $participante) {
            if ($dni == $corredor->getDni()) {
                $p = $participante;
                break;
            }
        }
        $p->setTiempo($tiempo);
        $carrera->addParticipante($corredor->getDni(), $p);
    }

    public function saveCarrera(Carrera $carrera) {
        $this->carreras[$carrera->getSlug()] = $carrera;
    }

    public function updateCarrera(Carrera $carrera) {
        
    }

    public function removeCarrera(Carrera $carrera) {
        
    }

}
