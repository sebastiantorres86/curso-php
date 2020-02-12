<?php
// Mover el armario
  
function moveCupboard(){
    global $is_hungry, $wearing_contacts, $wearing_glasses, $needs_to_pee, $location, $moved_cupboard;

	// Escribe tu código aquí:
    $ready_to_work = !$is_hungry && $wearing_contacts && !$wearing_glasses &&!$needs_to_pee;

    if ($location !== "cocina") {
        echo "¡No ves un armario aquí!\n";
    } elseif ($moved_cupboard) {
        echo "¡Ya moviste el armario!\n";
    } elseif (!$ready_to_work) {
        echo "¡No estás listo para trabajar! Necesitas estar bien alimentado, tener la vejiga vacía y tener una visión corregida (sin lidiar con esos molestos anteojos). Sin estas cosas, no tiene sentido ni siquiera intentar mover el armario.\n";
    } else {
        echo "Mueves el armario a un lado. Has revelado una caja fuerte encajada en la pared detrás de donde estaba el armario.\n";
        $moved_cupboard = TRUE;
    }
 
}