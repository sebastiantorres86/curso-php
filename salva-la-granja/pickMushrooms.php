<?php
  
function pickMushrooms(){
	// Write your code here:
	global $location, $has_mushrooms;
     if ($location !== "bosque") {
      echo "¡No hay hongos para recoger!\n";
     } else {
        echo "Recoges algunas setas.\n";
        $has_mushrooms = TRUE;
     }
}  