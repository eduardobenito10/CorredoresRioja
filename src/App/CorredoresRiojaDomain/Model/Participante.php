<?php

namespace App\CorredoresRiojaDomain\Model;

class Participante {

    private $corredor;
    private $carrera;
    private $tiempo;
    private $dorsal;

    function __construct($corredor, $carrera, $tiempo, $dorsal) {
        $this->corredor = $corredor;
        $this->carrera = $carrera;
        $this->tiempo = $tiempo;
        $this->dorsal = $dorsal;
    }

    function getCorredor() {
        return $this->corredor;
    }

    function getCarrera() {
        return $this->carrera;
    }

    function getTiempo() {
        return $this->tiempo;
    }

    function getDorsal() {
        return $this->dorsal;
    }

    function setDorsal($dorsal) {
        $this->dorsal = $dorsal;
    }

    function setCorredor($corredor) {
        $this->corredor = $corredor;
    }

    function setCarrera($carrera) {
        $this->carrera = $carrera;
    }

    function setTiempo($tiempo) {
        $this->tiempo = $tiempo;
    }

}
