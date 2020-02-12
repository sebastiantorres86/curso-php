# ¡Salva la granja!

## PROYECTO

_Hola a todos. Han sido unas semanas desgarradoras. ¡Primero tu problema con las uñas de los pies, y ahora la granja emú de la tía abuela Natasha está en peligro de ser embargada! Así que aquí estás, después de una breve parada en la clínica Mayo, en la remota cabaña del tío Boris en el corazón de Terror Woods. La leyenda familiar sostiene que una estatua dorada de inmenso valor está escondida en algún lugar dentro de estas paredes..._

Bienvenido al mundo de la [ficción interactiva](https://en.wikipedia.org/wiki/Interactive_fiction). ¡En este proyecto construirás un juego de aventuras de texto llamado __Salva la granja__!

Practicarás todo lo que has aprendido sobre booleanos, condicionales y operadores lógicos para crear un juego divertido y tonto. Puedes personalizar el juego a tu gusto. Una vez que haya completado este proyecto, comprenderá la mecánica de construir un juego de texto interactivo, por lo que, a partir de ahí, el mundo es su ostra (como solía decir el tío Boris).

¡Tómate tu tiempo y diviértete!

----

### Tareas

# Recorrer la base de código:

1. Aprender a leer el código es tan importante como aprender a escribir el código. Para comenzar este proyecto, practicaremos nuestras habilidades de lectura de códigos recorriendo el [código base](https://en.wikipedia.org/wiki/Codebase) existente (colección de código existente) para el juego. Utilizará las habilidades que ha estado desarrollando hasta ahora para comprender el código proporcionado. A partir de ahí, ¡podrás hacer que el programa se convierta en algo realmente poderoso y divertido!

    Hemos proporcionado mucha estructura y funcionalidad básica para el juego. El programa del juego se encuentra en el archivo __index.php__.

    El juego aún no es muy interesante (esas son las partes que escribirás), pero vamos a ejecutarlo para ver qué tenemos hasta ahora.

#### Pista
Ingrese `php index.php` en el terminal.

----

2. Al comienzo del archivo __index.php__, declaramos varias variables globales que necesitaremos a lo largo del juego. A continuación, incluimos (`include`) todas las funciones útiles que necesitaremos para que el juego funcione.

    Lea las instrucciones que se han impreso en la terminal. La lista de comandos se imprime cuando se invoca la función `getHelp()`.

    Puede ver dónde se imprimen las otras partes con declaraciones `echo` en el archivo __index.php__. A continuación, invocamos la función `gameRound()` 25 veces, una vez por cada ronda del juego.

    Tenga en cuenta que el terminal está esperando la entrada del usuario.

----

3. Ejecute varios comandos en la terminal.

    Puede escribir cualquiera de los comandos válidos para `poner gafas`, `quitar gafas`, `poner lentes de contacto`, `quitar lentes de contacto`, `comer`, `cocinar`, `orinar`, `recoger hongos`, `mover armario`, `mirar a su alrededor`, `buscar con seguridad`, `ir` o puede escribir un comando inválido.

    En este momento, solo `ayuda` y un comando no válido deberían funcionar como se esperaba. Los otros deberían usar una ronda. Escribirás las funciones para que cada uno de estos comandos tenga sentido.

    Puede ejecutar 25 comandos para finalizar el programa o presionar `control` `c` en el terminal para salir del programa.

----

4. Ahora que hemos visto cómo funciona el programa en términos generales, veamos los detalles de la función `gameRound()`: aquí es donde sucede la acción real.

    Navega al archivo __gameRound.php__ en tu editor de código.

    Escanee a través de la función `gameRound()` por su cuenta. En la próxima tarea, lo veremos juntos.

----

5. Veamos juntos la función:

    + Primero declaramos todas las variables globales (`global`) a las que tendremos que tener acceso dentro de la función.
    + A continuación, verificamos cuántas rondas le quedan al jugador. Ganar o perder el juego elimina todas las rondas restantes. Entonces, aunque invoquemos la función `gameRound()` 25 veces, es posible que no queramos que haga algo cada vez que se ejecuta. En esas situaciones, simplemente volveremos (`return`) de la función.
    + Invocamos la función `printStatus()`. Estarás escribiendo esta función. En este momento, no hace nada.
    + Solicitamos al usuario con `readline()` y guardamos su respuesta como `$cmd`.
    + Proporcionamos una declaración `switch` grande con muchos casos para manejar los diferentes comandos que un usuario puede haber ingresado. Lo veremos con más detalle en el siguiente paso.
    + Usamos una ronda disminuyendo la variable `global` `$rounds_left`.
    + Terminamos la función imprimiendo un mensaje para que el usuario sepa cuántas rondas les quedan.

----

6. Analicemos la declaración `switch` con más detalle:

    + Si el usuario escribe `ayuda`, se ejecuta la función `printHelp()`. Esta función se encuentra en __printHelp.php__.
    + Los siguientes casos son similares entre sí. Para los comandos de `poner gafas`, `poner lentes de contacto`, `quitar lentes de contacto` y `quitar gafas`, la variable `global` correspondiente se cambia y se imprime un mensaje al jugador confirmando su acción.
    + Para los próximos 8 casos, escribirá las funciones que los hacen funcionar:
        + Si el comando es `ir`, se ejecuta la función `changeLocation()`.
        + Si el comando es `mirar alrededor`, se ejecuta la función `lookAround()`.
        + Si el comando es `orinar`, se ejecuta la función `pee()`.
        + Si el comando es `recoger hongos`, se ejecuta la función `pickMushrooms()`.
        + Si el comando es `cocinar`, se ejecuta la función `cookSoup()`.
        + Si el comando es `comer`, se ejecuta la función `eatSoup()`.
        + Si el comando es `mover armario`, se ejecuta la función `moveCupboard()`.
        + Si el comando es `busqueda segura`, se ejecuta la función `searchSafe()`.
    + Agregamos un pequeño [huevo de pascua](https://en.wikipedia.org/wiki/Easter_egg_(media)): si el jugador está en el baño y entra `buscar toilet`, pierde el juego de una manera tonta.
    + Finalmente, hay un valor predeterminado (`default`) para capturar cualquier comando no reconocido.

    Como puede ver, hay mucho código para que escriba. ¡Empecemos!

----

# Escriba la función printStatus():

7. Lo primero que debemos hacer es escribir una función `printStatus(`). Esta función imprimirá el estado actual del jugador para que pueda tomar una decisión informada sobre qué hacer a continuación.

    Navegue hasta el archivo __printStatus.php__. Declaramos las variables globales (`global`) y agregamos la primera línea de la función, que imprime la ubicación actual de los jugadores. Pero necesitan más información.

----

8. Si el jugador usa lentes de contacto, debe imprimir `"Está usando lentes de  contacto.\n"`.

    Si el jugador usa anteojos, debe imprimir `"Está usando anteojos.\n"`.

    Puede ser una tontería, pero no hay nada que impida que alguien use lentes de contacto y anteojos, por lo que no hacemos eso en nuestro juego.
#### Pista

Tenga en cuenta que no queremos usar `else` porque el jugador puede usar lentes de contacto y lentes. Así es como se ve nuestra función hasta ahora:

````
function printStatus() {
     global $location, $wearing_glasses, $wearing_contacts, $has_mushrooms, $has_soup, $is_hungry, $needs_to_pee;

     echo "Estás en: $ubicación\n";

     if ($wearing_contacts) {
         echo "Estás usando lentes de contacto.\n";
     }
     if ($wearing_glasses) {
         echo "Estás usando anteojos.\n";
     }
}
````

----

9. Hagamos un poco más:

    + Si el jugador tiene hongos, debe imprimir `"Está sosteniendo hongos.\n"`.

    + Si el jugador tiene sopa, debes imprimir `"Estás sosteniendo un tazón hirviendo de sopa de champiñones.\n"`.

    + Si el jugador necesita orinar, debe imprimir `"¡Necesitas orinar!\n"`.
#### Pista
````
function printStatus() {
     global $location, $wearing_glasses, $wearing_contacts, $has_mushrooms, $has_soup, $is_hungry, $needs_to_pee;

     echo "Estás en: $location\n";

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
}
````

----

10. Si el jugador tiene hambre, debe imprimir `"Tienes hambre.\n"`. De lo contrario, debe imprimir `"Está bien alimentado y enérgico.\n"`.
#### Pista
````
función printStatus() {
     global $location, $wearing_glasses, $wearing_contacts, $has_mushrooms, $has_soup, $is_hungry, $needs_to_pee;

     echo "Estás en: $location\n";

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
````

----

11. Pon a prueba tu función! Ingrese __php index.php__ en el terminal nuevamente. Ahora deberías ver el estado del jugador impreso al comienzo de cada ronda. Realice algunas acciones que deberían cambiar su estado (`poner gafas`, `poner lentes de contacto`, `quitar lentes de contacto` y `quitar gafas`) y asegúrese de que todo funcione como se espera.

----

# Escriba la función changeLocation():

12. Nuestro jugador comienza en la cocina, pero el juego tiene múltiples ubicaciones. Desde la cocina, un jugador puede entrar al baño o salir al bosque. Desde cada uno de esos lugares, pueden volver a la cocina.

    Es hora de escribir la función `changeLocation()` que se ejecutará cuando el jugador escriba `ir`.

    Navegue hasta el archivo __changeLocation.php__. Para esta función, necesitará acceso a la variable global `$location`, así que declare eso al comienzo del cuerpo de la función.
#### Pista
````
function changeLocation(){
    global $location;

}
````

----

13. Después de que un jugador ingresa `ir`, todavía necesitamos saber a dónde quiere ir. Tendremos que solicitarles la función `readline()`.

    Primero debes imprimir `"¿Dónde quieres ir?\n"`. A continuación, debe invocar `readline()` pasando `">> "` como la cadena de solicitud. Nos gusta usar `>` o `>>` para preguntar al jugador porque deja en claro dónde se espera que escriba.

    Guarde la respuesta del jugador como una variable.

    Es posible que desee convertir su respuesta a minúsculas para que sea más flexible. También puede hacer esto con la función incorporada `strtolower()`.
#### Pista
````
function changeLocation(){
    global $location;

    echo "¿Dónde quieres ir?\n";

     $go_to = readline (">> ");

     $go_to = strtolower($go_to);

}
````

----

14. Deberá escribir varias condiciones `if` / `elseif` para manejar los posibles escenarios:

+ Si su ubicación actual es cocina _y_ su comando era ir al baño, debe imprimir `Vas a: baño.\n`, y debe cambiar su ubicación actual a `"baño"`.

+ Si su ubicación actual es la cocina _y_ su orden era ir al bosque, debe imprimir `Sigues el camino sinuoso, temblando mientras se adentra en el Bosque del Terror`, y debe cambiar su ubicación actual a `"bosque"` .

+ Si su ubicación actual es el baño _y_ su comando era ir a la cocina, debe imprimir `Vas a: cocina.\n`, y debe cambiar su ubicación actual a `"cocina"`.

+ Si su ubicación actual es bosque _y_ su comando era ir a la cocina, debe imprimir `Vas a: cocina.\n`, y debe cambiar su ubicación actual a `"cocina"`.

+ De lo contrario, si su orden era ir al bosque _o_ su orden era ir a la cocina _o_ su orden era ir al baño, debe imprimir `No puede ir directamente allí desde su ubicación actual. Intenta ir a otro lugar primero.\n`.

+ Y finalmente, debe manejar la situación en la que no ingresaron un comando válido, por lo que debe imprimir `Eso no tiene sentido. ¿Estas confundido? Intenta "mirar alrededor".\n`.
#### Pista
````
function changeLocation() {
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
````

----

15. Pon a prueba tu función! Ingrese `php index.php` en el terminal nuevamente. Desde que escribió la función `printStatus()`, puede ver la impresión del estado del jugador al comienzo de cada ronda.

    Use el comando `ir` para probar cada una de las acciones que escribió dentro de la función `changeLocation()`. Asegúrese de que todo funcione como se esperaba.

    Cuando escribes un comando no válido, le decimos al jugador que `mire a su alrededor`... pero la función `lookAround()` aún no está escrita... ¡vamos a eso!

----

# Escribe la función lookAround ()

16. En cada ubicación, el jugador debe recibir una descripción de la ubicación en la que se encuentra actualmente. La descripción les dará ideas de lo que pueden y deben hacer a continuación.

    Es hora de escribir la función `lookAround()` que se ejecutará cuando el jugador escriba `mirar alrededor`.

    Navega hasta el archivo __lookAround.php__. Para esta función, necesitará acceso a varias variables globales (`global`): `$location`, `$wearing_glasses`, `$wearing_contacts` y `$moved_cupboard`, por lo que debe declararlas al comienzo del cuerpo de la función.
#### Pista
````
function lookAround(){
  global $location, $wearing_glasses, $wearing_contacts, $moved_cupboard;

}
````

----

17. Permitimos que el jugador use lentes o lentes de contacto, ninguno o ambos. Solo deberían poder ver si usan lentes de contacto _o_ lentes, _pero no ambos_.

    Si el jugador usa lentes de contacto _o_ lentes _pero no ambos_, proporcionaremos una declaración `switch` para imprimir una descripción basada en su ubicación actual. De lo contrario, simplemente deberíamos imprimir `"Es realmente difícil distinguir los detalles...\n"`.
#### Pista
Así es como debería verse la función hasta ahora:

````
function lookAround() {
    global $location, $wearing_glasses, $wearing_contacts, $moved_cupboard;
   if ($wearing_glasses xor $ wearing_contacts) {
     // Nuestro switch irá aquí:

   } else {
     echo "Es realmente difícil distinguir los detalles...\n";
   }
}
````

----
18. Vamos a escribir una declaración `switch` basada en $location.

    En el caso de que estén en la cocina, queremos insinuar que pueden ir al baño o al bosque, y también que tal vez quieran descubrir cómo cocinar sopa de champiñones...

    Imprimir `"Esta cocina viene con todas las herramientas e ingredientes necesarios para cocinar sopa de champiñones --- ¡excepto los champiñones!\ n\nDesde aquí, ves la puerta del *baño* y la puerta trasera, que conduce al *bosque*.\n\n"`.

    El juego se gana haciendo a un lado el armario y buscando en la caja fuerte, por lo que si aún no lo han hecho, querremos insinuarlos: si ya han movido el armario, imprima `"El armario ha sido movido a un lado, y revela una caja fuerte integrada en la pared.\n"`. De lo contrario, imprima `"Además, hay un armario notablemente grande contra una pieza de la pared especialmente gastada.\n"`.
#### Pista
````
function lookAround() {
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
     }
   } else {
     echo "Es realmente difícil distinguir los detalles...\n";
   }
}
````

----

19. En el caso de que estén en el baño, escriba `"Baño normal. Aquí hay un espejo. Puede volver a la *cocina*. Siente una presencia mágica en el inodoro, pero decide ignorarlo.\n"`.

    Queremos resaltar que desde el baño, pueden ir a la cocina. También queremos arrojar una pequeña pista hacia el huevo de pascua.
#### Pista
````
function lookAround() {
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
     }
   } else {
     echo "Es realmente difícil distinguir los detalles...\n";
   }
}
````

----

20. En el caso de que estén en el bosque, imprima `"Estos bosques no son realmente tan terroríficos. A menos que tenga miedo a los hongos. ¡Hay millones de ellos aquí!\nVes el camino que conduce de regreso a la *cocina* de tu cabaña.\n"`.

    Queremos resaltar que desde el bosque pueden ir a la cocina. También queremos alertarlos de todos los hongos alrededor...
#### Pista
````
function lookAround() {
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
````

----

# Escriba más funciones de ayuda:

21. El jugador comienza con hambre pero necesita estar bien alimentado antes de que pueda hacer su arduo trabajo de mover el armario a un lado. Pueden llenarse yendo al bosque a recoger setas, cocinando esas setas en la cocina y luego comiendo la sopa que preparan.

    Comencemos por recoger los champiñones. Cuando el jugador escribe el comando `recoger champiñones`, se invoca la función `printMushrooms()`. Navegue hasta el archivo __pickMushrooms.php__.

    Dentro de la función `pickMushrooms()`, necesitará acceso a las variables globales (`global`) `$location` y `$has_mushrooms`.

    Si la ubicación actual del jugador no es el bosque, imprima `"¡No hay hongos para recoger!\n"`.

    De lo contrario, imprima `"Ha elegido algunas setas.\n"` y cambie el valor de la variable `$has_mushrooms` a `TRUE`.
#### Pista
````
function pickMushrooms() {
     global $location, $has_mushrooms;
     if ($location !== "bosque") {
      echo "¡No hay hongos para recoger!\n";
     } else {
        echo "Recoges algunas setas.\n";
        $has_mushrooms = TRUE;
     }
}
````

----

22. Cuando el jugador escribe el comando `cocinar`, se invoca la función `cookSoup()`. Navegue hasta el archivo __cookSoup.php__.

    Necesitará acceso a las variables globales (`global`) `$location`, `$has_mushrooms` y `$has_soup`.

    Si _no_ es el caso de que la ubicación actual del jugador es la cocina _y_ que actualmente tienen hongos, escriba `"¡No puede cocinar así! Necesita algo para cocinar Y estar en la cocina.\n"`. De lo contrario, debe imprimir "Hiciste un poco de sopa de champiñones. `¡El champiñón es la reina de todas las sopas!\n"` y cambia el valor de `$has_mushrooms` a `FALSE` y el valor de `$has_soup` a `TRUE`.
#### Pista
````
function cookSoup() {
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
````

----

23. Finalmente, el jugador necesita poder comer su sopa. Cuando el jugador escribe el comando `comer`, se invoca la función `eatSoup()`. Navega hasta __eatSoup.php__.

    Necesitará acceso a las variables globales (`global`) `$has_soup` y `$is_hungry`. Si el jugador no tiene sopa, escriba `"¡No tiene comida cocinada para comer!\n"`. De lo contrario, imprima `"¡Ha comido la sopa!\n"` y asigne a `$has_soup` y `$is_hungry` el valor `FALSE`.
#### Pista
````
function eatSoup() {
     global $has_soup, $is_hungry;
     if (!$has_soup) {
         echo "¡No tienes comida cocinada para comer!\n";
     } else {
           echo "¡Has comido la sopa!\n";
         $ has_soup = FALSE;
         $ is_hungry = FALSE;
     }
}
````

----

24. El jugador no podrá mover el armario y revelar la caja fuerte si tiene que orinar. Cuando ingresan al comando `orinar`. Se invoca la función `pee()`. Navegue a __pee.php__ para escribir esta función.

    Necesitará acceso a las variables globales (`global`) `$location` y `$needs_to_pee`.

    Si la ubicación actual del jugador es el baño _o_ la ubicación actual del jugador es el bosque, debes imprimir `"Te alivias.\n"` y cambiar el valor de `$needs_to_pee` a `FALSE`. De lo contrario, debe imprimir `"¿Estás loco? ¡No puedes orinar aquí!\n"`.
#### Pista
````
function pee() {
     global $location, $needs_to_pee;
     if ($location === "baño" || $location === "bosque") {
         echo "Te alivias.\n";
         $needs_to_pee = FALSE;
     } else {
         echo "¿Estás loco? ¡No puedes orinar aquí!\n";
     }
}
````

----

25. El juego ha llevado al jugador a mover el armario. Navegue hasta el archivo __moveCupboard.php__ para que pueda escribir la función `moveCupboard()` que se invocará cuando el jugador ingrese al comando `mover armario`.

    Hemos declarado todas las variables globales (`global`) que debería necesitar. Debe declarar una variable `$ready_to_work` para decidir si el jugador está preparado para mover el armario. `$ready_to_work` debería ser `TRUE` si el jugador _no_ tiene hambre _y_ usa lentes de contacto _y_ no usa anteojos _y_ no necesita orinar.

    + Si la ubicación actual del jugador no es la cocina, debes imprimir `"¡No ves un armario aquí!\n"`.
    + De lo contrario, si el armario ya se ha movido, debe imprimir `"¡Ya ha movido el armario!\n"`.
    + De lo contrario, si `$ready_to_work` no es `TRUE`, debe imprimir `"¡No está listo para trabajar! Necesita alimentarse adecuadamente, tener la vejiga vacía y tener visión corregida (sin tener que lidiar con esos molestos anteojos). Sin estas cosas, no tiene sentido ni siquiera intentar mover el armario.\n "`.
    + De lo contrario, debe imprimir `"Mueve el armario a un lado. Has revelado una caja fuerte encajada en la pared detrás de donde solía estar el armario.\n"` y debes cambiar el valor de `$moved_cupboard` a `TRUE`.
#### Pista
````
function moveCupboard() {
     global $is_hungry, $wearing_contacts, $wearing_glasses, $needs_to_pee, $location, $moved_cupboard;
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
````

----

26. ¡Está casi terminado! Una vez que se revela la caja fuerte, ¡el jugador puede `buscar` la caja fuerte y ganar el juego! Navegue hasta el archivo __searchSafe.php__ para poder escribir la función `searchSafe()`.

    Necesitará acceso a las variables globales (`global`) `$location`, `$moved_cupboard` y `$rounds_left`.

    Si la ubicación actual del jugador _no_ es la cocina _o_ aún no ha movido el armario, debes imprimir `"¡Aquí no ves ninguna caja fuerte!\n"`. De lo contrario, debe imprimir "`Buscas en la caja fuerte (el código de acceso es \"1234\"). ¡Con la respiración contenida, sacas el contenido! Es un Mickey Mouse de chocolate, envuelto en papel de oro. ¡Delicioso!\n ¡¡¡GANAS EL JUEGO!!!\n\n"`y debe cambiar el valor de `$rounds_left` a `1`.
#### Pista
````
function searchSafe() {
     global $location, $moved_cupboard, $rounds_left;
     if ($location !== "cocina" || !$moved_cupboard) {
         echo "¡No ves ninguna caja fuerte aquí!\n";
     } else {
         echo "Buscas en la caja fuerte (el código de acceso es \"1234\"). ¡Con la respiración contenida, sacas el contenido! Es un Mickey Mouse de chocolate, envuelto en papel de oro. ¡Delicioso!\n¡¡¡GANAS EL JUEGO!\n\n";
         $rounds_left = 1;
     }
}
````

----

# Juega y personaliza tu juego:

27. ¡Impresionante trabajo! Has creado un juego de aventura de texto real. Es hora de jugar, prueba el juego y asegúrate de que todo funcione. Ingrese `php index.php` en el terminal y juegue a través del juego.

28. ¡Lo hiciste increíble! Date una palmadita en la espalda. Si te sientes inspirado, deberías ver el juego tan lejos como un punto de partida. Puedes personalizar el juego a tu gusto. Puedes agregar aún más acciones para que el jugador realice.

    Y una vez que hayas agotado este juego, intenta crear un nuevo juego de ficción interactivo desde cero. ¡Tu imaginación es el limite! Nos encantaría ver lo que construyes, ¡así que definitivamente comparte cualquier juego que hagas con nosotros!