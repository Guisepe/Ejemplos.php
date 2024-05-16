<?php

function imprimirMensaje($color) {
    switch ($color) {
        case 'r':
        case 'R':
            echo "¡Pare!";
            break;
        case 'a':
        case 'A':
            echo "¡Espera!";
            break;
        case 'v':
        case 'V':
            echo "¡Avanza!";
            break;
        default:
            echo "Color no válido.";
    }
}
echo "Ingresa el color del semáforo (R para rojo, A para amarillo, V para verde): ";
$color = trim(fgets(STDIN)); 

imprimirMensaje($color);
?>
