<?php

function magic8Ball()
{
    echo "Dime ... ¿Cuál es tu pregunta?\n";
    $pregunta = readline(">");
    echo "\nHmm ya veo... Tu pregunta es $pregunta... Entiendo por qué esto pesa sobre ti... He consultado al mundo espiritual.\nAquí está tu respuesta: ";
    $opcion = rand(0, 19);
    switch ($opcion) {
        case 0:
            echo "Es cierto.\n";
            break;
        case 1:
            echo "Definitivamente es así.\n";
            break;
        case 2:
            echo "Sin duda.\n";
            break;
        case 3:
            echo "Sí, definitivamente.\n";
            break;
        case 4:
            echo "Puede confiar en ello.\n";
            break;
        case 5:
            echo "Tal como lo veo, sí.\n";
            break;
        case 6:
            echo "Lo más probable.\n";
            break;
        case 7:
            echo "Perspectivas buena.\n";
            break;
        case 8:
            echo "Si.\n";
            break;
        case 9:
            echo "Las señales apuntan a que sí.\n";
            break;
        case 10:
            echo "Respuesta confusa, intenta otra vez.\n";
            break;
        case 11:
            echo "Pregunta de nuevo más tarde.\n";
            break;
        case 12:
            echo "Mejor no decirte ahora.\n";
            break;
        case 13:
            echo "No se puede predecir ahora.\n";
            break;
        case 14:
            echo "Concéntrate y pregunta otra vez.\n";
            break;
        case 15:
            echo "No cuentes con eso.\n";
            break;
        case 16:
            echo "Mi respuesta es no.\n";
            break;
        case 17:
            echo "Mis fuentes dicen que no.\n";
            break;
        case 18:
            echo "La perspectiva no es tan buena.\n";
            break;
        case 19:
            echo "Muy dudoso.\n";
            break;
   }
}

magic8Ball();
magic8Ball();
magic8Ball();