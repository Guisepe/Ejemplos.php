<?php

class Animal {
    public $nombre; 
    public $color;
    public $estaExtincion;
    public $archivoSonido;

    public function __construct($nombre, $color, $estaExtincion, $archivoSonido) {
        $this->nombre = $nombre; 
        $this->color = $color;
        $this->estaExtincion = $estaExtincion; 
        $this->archivoSonido = $archivoSonido;
    }

    public function obtenerInformacion() { 
        $colortext = $this->color === "Verde" ? "\033[32m" : "";
        $mensaje = "Nombre: {$this->nombre}\nColor: {$colortext}{$this->color}\033[0m\nEn Extinción: " . ($this->estaExtincion ? "Sí" : "No");
        return $mensaje;
    }

    public function hacerSonido() {
        try {
            $audiofile = "C:\\xampp\\htdocs\\php-examples\\" . $this->archivoSonido;
            shell_exec("start wmplayer " . escapeshellarg($audiofile));
        } catch (Exception $e) {
            echo "Error al reproducir el sonido: " . $e->getMessage();
        }
    }
}

class Perro extends Animal {
    public function hacerSonido($sonido = "") {
        $sonidoPerro = "Guau";
        if (!empty($sonido)) {
            $sonidoPerro = $sonido;
        }
        return $sonidoPerro;
    }
}