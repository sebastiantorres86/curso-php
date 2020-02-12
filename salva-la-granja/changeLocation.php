<?php
  // Cambia ubicación del jugador
function changeLocation(){	
  // Escribe tu código aquí:
  global $location;
  echo "¿A dónde quieres ir?\n";
   $go_to = readline(">> ");
   $go_to = strtolower($go_to);
   echo "\n";
    if ($location === "cocina" && $go_to === "baño") {
      echo "Vas a: $go_to.\n";
      $location = $go_to;
    } elseif ($location === "cocina" && $go_to === "bosque") {
      echo "Sigues el sinuoso camino, temblando mientras te abres camino hacia el Bosque del Terror";
      $location = $go_to;
    } elseif ($location === "baño" && $go_to === "cocina") {
      echo "Vas a: $go_to.\n";
      $location = $go_to;
    } elseif ($location === "bosque" && $go_to === "cocina") {
      echo "Vas a: $go_to.\n";
      $location = $go_to;
    } elseif ($go_to === "bosque" || $go_to === "cocina" || $go_to === "baño") {
       echo "No puedes ir directamente a $go_to. Intenta ir a otro lugar primero.\n";
    } else {
      echo "Eso no tiene sentido. ¿Estás confundido? Intenta 'mirar alrededor'.\n";
    }
}  
  
  
  
