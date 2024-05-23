<?php

class Calculadora {
    public $primerNumero;
    public $segundoNumero;

    public function __construct($num1 = 0, $num2 = 0) {
        $this->primerNumero = $num1;
        $this->segundoNumero = $num2;
    }

    public function sumar() {
        return $this->primerNumero + $this->segundoNumero;
    }

    public function restar() {
        return $this->primerNumero - $this->segundoNumero;
    }

    public function multiplicar() {
        return $this->primerNumero * $this->segundoNumero;
    }

    public function dividir() {
        if ($this->segundoNumero == 0) {
            return "No es divisible";
        } else {
            return $this->primerNumero / $this->segundoNumero;
        }
    }

    public function potencia() {
        return pow($this->primerNumero, $this->segundoNumero);
    }

    public function raiz() {
        return sqrt($this->primerNumero);
    }
}