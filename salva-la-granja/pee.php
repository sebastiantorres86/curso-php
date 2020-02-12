<?php
  
function pee(){
	// Escribe tu código aquí:
	global $location, $needs_to_pee;
	if ($location === "baño" || $location === "bosque") {
		echo "Te alivias.\n";
		$needs_to_pee = FALSE;
	} else {
		echo "¿Estás loco? ¡No puedes orinar aquí!\n";
	} 
}