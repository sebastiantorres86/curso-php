<?php
function eatSoup(){
	// Escribe tu código aquí:
	global $has_soup, $is_hungry;
     if (!$has_soup) {
         echo "¡No tienes comida cocinada para comer!\n";
     } else {
           echo "¡Has comido la sopa!\n";
         $has_soup = FALSE;
         $is_hungry = FALSE;
     } 
}