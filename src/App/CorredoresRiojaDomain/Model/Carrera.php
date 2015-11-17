<?php

namespace App\CorredoresRiojaDomain\Model;

class Carrera {

    private $nombre;
    private $descripcion;
    private $fechaCelebracion;
    private $distancia;
    private $fechaLimiteInscripcion;
    private $participantesMax;
    private $imagen;
    private $slug;
    private $organizador;
    private $listaParticipantes;

    function __construct($nombre, $descripcion, $fechaCelebracion, $distancia, $fechaLimiteInscripcion, $participantesMax, $imagen, $organizador) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->fechaCelebracion = $fechaCelebracion;
        $this->distancia = $distancia;
        $this->fechaLimiteInscripcion = $fechaLimiteInscripcion;
        $this->participantesMax = $participantesMax;
        $this->imagen = $imagen;
        $this->organizador = $organizador;
        $this->slug = self::generateSlug($nombre);
        $this->listaParticipantes = array();
    }
    
    // Función para utilizar en la plantilla twig
    function isInscribible(){
        return ($this->fechaLimiteInscripcion > time()) && (count($this->listaParticipantes) < $this->participantesMax);
    }
    
    function isDisputada(){
        return ($this->fechaCelebracion < time());
    }

    function addParticipante($key, $participante){
        $this->listaParticipantes[$key] = $participante;
    }
    
    function removeParticipante($key){
        unset($this->listaParticipantes[$key]);
    }
        
    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFechaCelebracion() {
        return $this->fechaCelebracion;
    }

    function getDistancia() {
        return $this->distancia;
    }

    function getFechaLimiteInscripcion() {
        return $this->fechaLimiteInscripcion;
    }

    function getParticipantesMax() {
        return $this->participantesMax;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getOrganizador() {
        return $this->organizador;
    }

    function getSlug() {
        return $this->slug;
    }
    
    function getParticipantes() {
        return $this->listaParticipantes;
    }

    static public function generateSlug($cadena, $separador = '-') {
        // Código copiado de http://cubiq.org/the-perfect-php-clean-url-generator
        $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $cadena);
        $slug = preg_replace("/[^a-zA-Z0-9\/_|+-]/", '', $slug);
        $slug = strtolower(trim($slug, $separador));
        $slug = preg_replace("/[\/_|+-]+/", $separador, $slug);
        return $slug;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
        $this->slug = self::generateSlug($nombre);
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setFechaCelebracion($fechaCelebracion) {
        $this->fechaCelebracion = $fechaCelebracion;
    }

    function setDistancia($distancia) {
        $this->distancia = $distancia;
    }

    function setFechaLimiteInscripcion($fechaLimiteInscripcion) {
        $this->fechaLimiteInscripcion = $fechaLimiteInscripcion;
    }

    function setParticipantesMax($participantesMax) {
        $this->participantesMax = $participantesMax;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    function setOrganizador($organizador) {
        $this->organizador = $organizador;
    }

    public function __toString() {
        return $this->nombre . " - Organizada por: " . $this->organizador;
    }

}
