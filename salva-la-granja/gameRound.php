<?php
// One Turn
function gameRound(){
    global $rounds_left, $location, $wearing_glasses, $wearing_contacts, $has_mushrooms, $moved_cupboard, $has_soup, $is_hungry, $needs_to_pee;

 //Skip Turn If It's Been Used Up
    if ($rounds_left <= 0){
        return;
    }

    printStatus();

 //Read Command And Respond
    $cmd = readline ("> ");
    $cmd =  strtolower($cmd);
    echo "\n";
    switch ($cmd) {
        case "ayuda":
            printHelp();
            break;
      	case "poner gafas":
            echo "Tus gafas estan puestas.";
            $wearing_glasses = TRUE;
            break;
        case "poner lentes de contacto":
            echo "Tienes los lentes de contacto puestos.";
            $wearing_contacts = TRUE;
            break;
        case "quitar lentes de contacto":
            echo "Te quitaste los lentes de contacto.";
            $wearing_contacts = FALSE;
            break;
        case "quitar gafas":
            echo "Te quitaste las gafas.";
            $wearing_glasses = FALSE;
            break;
        case "ir":
            changeLocation();
            break;
        case "mirar alrededor":
            lookAround();
            break;
        case "orinar":
            pee();
            break;
        case "recoger hongos":
            pickMushrooms();
            break;
       case "cocinar":
            cookSoup();
            break;
        case "comer":
            eatSoup();
            break;
        case "mover armario":
            moveCupboard();
            break;
       case "revisar":
            searchSafe();
            break;
        case "revisar toilet":
            if ( $location === "baño"){
            	echo "El baño contiene un secreto increíble. El cuenco está lleno de agua ordinaria, pero en el tanque: la estatuilla del ratón dorado. La nariz del ratón parece seguirte mientras te mueves. ¡El ratón es hermoso! ¡Lo amas! ¡Nunca lo vas a vender! ¡Olvídate de la granja emú de la tía abuela Natasha!\n¡PIERDES EL JUEGO!\n\n";
            $rounds_left = 1;
            }
            break;
        default:
            echo "Lo sentimos, eso no funciona :( Utilice uno de los comandos válidos. Puede ver la lista de comandos válidos ingresando 'ayuda'.\n";
    } // End of command switch

    // Use Up A Round
    $rounds_left = $rounds_left - 1;
    echo "\nAhora tienes $rounds_left rondas restantes.\n\n";
} // End of gameRound() function