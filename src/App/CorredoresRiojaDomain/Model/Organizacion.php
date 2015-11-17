<?php

namespace App\CorredoresRiojaDomain\Model;

class Organizacion {

    private $nombre;
    private $email;
    private $slug;
    private $salt;
    private $password;

    function __construct($nombre, $email) {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->slug = self::generateSlug($nombre);
        $this->salt = md5(time());
    }

    function getNombre() {
        return $this->nombre;
    }
    
    function getEmail() {
        return $this->email;
    }

    function getSalt() {
        return $this->salt;
    }
    
    function getSlug() {
        return $this->slug;
    }
    
    static public function generateSlug($cadena, $separador = '-') {
    // Código copiado de http://cubiq.org/the-perfect-php-clean-url-generator
        $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $cadena);
        $slug = preg_replace("/[^a-zA-Z0-9\/_|+-]/", '', $slug);
        $slug = strtolower(trim($slug, $separador));
        $slug = preg_replace("/[\/_|+-]+/", $separador, $slug);
        return $slug;
    }
    
    function getPassword() {
        return $this->password;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
        $this->slug = self::generateSlug($nombre);
    }
    
    function setEmail($email) {
        $this->email = $email;
    }
}
