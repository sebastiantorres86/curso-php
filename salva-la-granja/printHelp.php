<?php

// Display Help Text
function printHelp(){
 $commands=["ayuda", "mira alrededor", "ir", "poner gafas", "quitar gafas", "poner lentes de contacto", "quitar lentes de contacto", "comer", "cocinar", "orinar", "recoger hongos", "mover armario", "buscar"];
 echo "\n**********BIENVENIDO***********\nBienvenido a la aventura! Tienes 25 rondas totales antes de que termine el juego. En cada ronda puede escribir uno de los siguientes comandos:\n* " ;
 echo implode("\n* ", $commands);
 echo "\nEstos comandos deben ingresarse con precisión, sin espacios adicionales. El comando \"ayuda\" volverá a imprimir este mensaje.\n";
}