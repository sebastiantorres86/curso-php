<?php
  
function cookSoup(){
	// Escribe tu código aquí:
	global $location, $has_mushrooms, $has_soup;
     if (!($location === "cocina" && $has_mushrooms)) {
       echo "¡No puedes cocinar así! Necesitas algo para cocinar Y estar en la cocina.\n";
     }
     else {
       echo "Hiciste una sopa de champiñones. ¡El champiñón es la reina de todas las sopas!\n";
       $has_mushrooms = FALSE;
       $has_soup = TRUE;
     }  
}