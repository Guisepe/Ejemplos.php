<?php

$primerNumero = 10;
$segundoNumero = 2;


function sumar($a, $b) {
    return $a + $b;
}

function restar($a, $b) {
    return $a - $b;
}

function multiplicar($a, $b) {
    return $a * $b;
}

function dividir($a, $b) {
    if ($b == 0) {
        return "No es divisible";
    }
    return $a / $b;
}

function potencia($a, $b) {
    return pow($a, $b);
}

function raiz($a) {
    if ($a < 0) {
        return "No se puede calcular la raíz cuadrada de un número negativo";
    }
    return sqrt($a);
}


echo "Operaciones con $primerNumero y $segundoNumero:\n";
echo "Suma: " . sumar($primerNumero, $segundoNumero) . "\n";
echo "Resta: " . restar($primerNumero, $segundoNumero) . "\n";
echo "Multiplicación: " . multiplicar($primerNumero, $segundoNumero) . "\n";
echo "División: " . dividir($primerNumero, $segundoNumero) . "\n";
echo "Potencia: " . potencia($primerNumero, $segundoNumero) . "\n";
echo "Raíz cuadrada del primer número: " . raiz($primerNumero) . "\n";
?>
