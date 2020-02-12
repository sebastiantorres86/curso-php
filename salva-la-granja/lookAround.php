<?php
  // Describe tu ubicación actual
	function lookAround(){
	// Escribe tu código aquí:
	global $location, $wearing_glasses, $wearing_contacts, $moved_cupboard;
	if ($wearing_glasses xor $wearing_contacts) {
	  switch ($location) {
		case "cocina":
		  echo "Esta cocina viene con todas las herramientas e ingredientes necesarios para cocinar sopa de champiñones --- ¡excepto los champiñones!\n\nDesde aquí, ves la puerta del *baño* y la puerta trasera, que conduce al *bosque*.\n\n";
		  if ($moved_cupboard) {
			echo "El armario se ha movido a un lado y revela una caja fuerte integrada en la pared.\n";
		  } else {
			echo "Además, hay un armario notablemente grande contra una pieza de la pared especialmente gastada.\n";
		  }
		  break;
		case "baño":
		  echo "Baño normal. Hay un espejo aquí. Puedes volver a la *cocina*. Sientes una presencia mágica en el inodoro, pero decides ignorarlo.\n";
		  break;
		case "bosque":
		  echo "Estos bosques no son realmente tan aterradoras. A menos que tengas miedo a los hongos. ¡Hay millones de ellos aquí!\n Ves el camino que conduce de regreso a la *cocina* de tu cabaña.\n";
		  break;
	  }
	} else {
	  echo "Es realmente difícil distinguir los detalles...\n";
	} 
}