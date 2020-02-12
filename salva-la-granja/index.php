<?php

// Inicialización de variables globales
$rounds_left = 25;
$location = "cocina";
$wearing_glasses = TRUE;
$wearing_contacts = FALSE;
$has_mushroom = FALSE;
$has_soup = FALSE;
$moved_cupboard = FALSE;
$is_hungry = TRUE;
$needs_to_pee = TRUE;

// Incluya cada una de las definiciones de funciones
include "printHelp.php";
include "gameRound.php";

include "printStatus.php";
include "changeLocation.php";
include "lookAround.php";

include "pickMushrooms.php";
include "cookSoup.php";
include "eatSoup.php";

include "pee.php";

include "moveCupboard.php";
include "searchSafe.php";




//Display Intro Text
printHelp();
echo "\nOk, el juego está por comenzar. ¿Podrás encontrar la estatuilla del ratón dorado y salvar la granja de tu tía abuela? ¡Te deseamos buena suerte!\n********** COMIENZA EL JUEGO ***********\n";

echo "\nHola a todos. Han sido unas semanas desgarradoras. ¡Primero tu problema con las uñas de los pies, y ahora la granja de emúes de la tía abuela Natasha está en peligro de ser embargada! Así que aquí estás --- después de una breve parada en la clínica Mayo --- en la remota cabaña del tío Boris en el corazón del Bosque del Terror. La leyenda familiar sostiene que una estatua dorada de inmenso valor está escondida en algún lugar dentro de estas paredes. Desafortunadamente, tienes muchas cosas que hacer hoy, por lo que solo puedes dedicar unos 25 minutos a encontrar la estatua. Supongo que veremos qué pasa ;)\n\n";


// Play 25 rounds
gameRound();
gameRound();
gameRound();
gameRound();
gameRound();
gameRound();
gameRound();
gameRound();
gameRound();
gameRound();
gameRound();
gameRound();
gameRound();
gameRound();
gameRound();
gameRound();
gameRound();
gameRound();
gameRound();
gameRound();
gameRound();
gameRound();
gameRound();
gameRound();
gameRound();


// Game Is Over
echo "\n********** ATENCIÓN ***********\n¡El juego ha terminado!";



