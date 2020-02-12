<?php
// Imprime estado actual
function printStatus(){
    global $location, $wearing_glasses, $wearing_contacts, $has_mushrooms, $has_soup, $is_hungry, $needs_to_pee;
  
    echo "Estas en: $location\n";
  
  // Escribe tu código aquí:

    if ($wearing_contacts) {
        echo "Estás usando lentes de contacto.\n";
    }
    if ($wearing_glasses) {
        echo "Estás usando anteojos.\n";
    }
    if ($has_mushrooms) {
        echo "Estás sosteniendo hongos.\n";
    }
    if ($has_soup) {
        echo "Estás sosteniendo un tazón hirviendo de sopa de champiñones.\n";
    }
    if ($needs_to_pee) {
        echo "¡Necesitas orinar!\n";
    }
    if ($is_hungry) {
        echo "Tienes hambre.\n";
    } else {
        echo "Estás bien alimentado y enérgico.\n";
    }
}
