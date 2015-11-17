<?php

namespace App\CorredoresRiojaDomain\Model;

class Corredor {

    private $dni;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $fechaNacimiento;
    private $direccion;
    private $club;
    private $salt;
    
    private $encodedPassword;

    function __construct($dni, $nombre, $apellidos, $email, $password, $fechaNacimiento, $direccion) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->password = $password;
        $this->fecha_nacimiento = $fechaNacimiento;
        $this->direccion = $direccion;
        $this->salt = md5(time());
    }

    function getId() {
        return $this->id;
    }
    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getDni() {
        return $this->dni;
    }

    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    function getClub() {
        return $this->club;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    
    function setDni($dni) {
        $this->dni = $dni;
    }

    function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    function setClub($club) {
        $this->club = $club;
    }

    function getSalt() {
        return $this->salt;
    }
    
    function saveEncodedPassword($encodedpassword){
        $this->encodedPassword = $encodedpassword;
    }

    public function __toString() {
        return $this->nombre . " " . $this->apellidos;
    }

}
