<?php

function searchSafe(){
	// Escribe tu código aquí:
	global $location, $moved_cupboard, $rounds_left;
	if ($location !== "cocina" || !$moved_cupboard) {
		echo "¡No ves ninguna caja fuerte aquí!\n";
	} else {
		echo "Buscas en la caja fuerte (el código de acceso es \"1234\"). ¡Con la respiración contenida, sacas el contenido! Es un Mickey Mouse de chocolate, envuelto en papel de oro. ¡Delicioso!\n¡¡¡GANAS EL JUEGO!\n\n";
		$rounds_left = 1;
	}
}  