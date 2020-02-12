## BOOLEANS Y OPERADORES DE COMPARACIÓN

# Introducción

¿Alguna vez has notado que los hipervínculos cambian de color después de hacer clic en ellos? __Si__ se ha hecho clic en el enlace, el navegador web lo muestra en púrpura, en lugar de azul. El concepto de programación que lo hace posible se llama _condicionales_.

Este podría ser un ejemplo simple, pero los condicionales subyacen el comportamiento complejo de los programas de computadora desde Gmail, juegos de Mario, hasta Microsoft Office. Los condicionales permiten que los programas decidan cómo reaccionar ante una amplia variedad de situaciones.

Pero las computadoras no son inteligentes, para que puedan tomar decisiones deben ser programadas con un conjunto de reglas a seguir.

En esta lección, exploraremos cómo escribimos programas que puedan tomar decisiones con condicionales.

![](https://s3.amazonaws.com/codecademy-content/courses/learn-cpp/conditionals-and-logic/streetsign.gif)

----

# Declaraciones If

Vamos a aprender sobre un tipo específico de condicional llamado _declaración if_. Una declaración if sigue esta estructura básica:

````
if (/*alguna condición*/) {
 // Hacer algo...
}
````

Los paréntesis contienen la condición que queremos que verifique la computadora. __Si__ la condición es verdadera, se ejecutará el código dentro del bloque de código (`{}`); Si no es cierto, el código no se ejecutará.

La base de cualquier condicional es el tipo de datos _booleanos_. Un booleano puede tener uno de dos valores: `TRUE` o `FALSE`. Tenga en cuenta que estas son las palabras sin comillas: la cadena `"TRUE"` no es lo mismo que el valor booleano `TRUE`. Estos valores no distinguen entre mayúsculas y minúsculas, pero seguimos la convención de ponerlos en mayúsculas.

Si quisiéramos escribir código para aproximar nuestro ejemplo de hipervínculo del ejercicio anterior, podríamos escribir algo como esto:

````
$is_clicked = TRUE;
if ($is_clicked) {
  $link_color = "purple";
  echo $link_color;
}
````
En el código anterior, le pedimos a la computadora que verifique la variable `$is_clicked` como condición. Si su valor es `TRUE`, el valor de `$link_color` se asignará `"purple"` y se imprimirá.

En el código anterior, si nuestra condición __no__ se cumpliera, omitiríamos el código volviendo el enlace morado, pero ¿qué deberíamos hacer en su lugar? __Si__ se ha hecho clic en el enlace, el color debe ser morado; de lo contrario, debe ser azul. Podemos incluir un bloque de código para ejecutar cuando la condición no se cumpla con la palabra clave `else`:

````
$is_clicked = FALSE;
if ($is_clicked) {
  $link_color = "purple";
  echo $link_color;
} else {
  $link_color = "blue";
  echo $link_color;
}
````
Cambiamos el valor de `$is_clicked` a `FALSE` para que el bloque `if` no se ejecute. Por el contrario, el bloque `else` se ejecutará y `blue` se imprimirá en el terminal.

----

# Operadores de comparación

La condición, o _expresión_, en una instrucción `if` puede contener un valor booleano, como `TRUE` o `FALSE`, una variable asignada a uno de esos valores, o una expresión que se evalúa como `TRUE` o `FALSE`.

Del mismo modo que podemos representar un valor de cinco con `5` o con una expresión que evalúe a cinco, p.ej. `3 + 2`, podemos escribir expresiones que evalúen como `TRUE` o `FALSE`. Los _operadores de comparación_ evalúan una relación entre dos operandos y devuelven un valor booleano.

El operador menor que (`<`) devolverá `TRUE` si el operando izquierdo es menor que el operando derecho y `FALSE` si no es:

````
1 < 10; // Evalúa a: TRUE
11 < 3; // Evalúa a: FALSE
````

El operador menor o igual que (`<=`) devolverá `TRUE` si el operando izquierdo es menor o igual que el operando derecho y `FALSE` si no es:

````
1 <= 10; // Evalúa a: TRUE
4 <= 4; // Evalúa a: TRUE
18 <= 2; // Evalúa a: FALSE
````

El operador mayor que (`>`) devolverá `TRUE` si el operando izquierdo es mayor que el operando derecho y `FALSE` si no lo es. Y el operador mayor o igual que (`>=`) devolverá `TRUE` si el operando izquierdo es mayor o igual que el operando derecho y `FALSE` si no es:

````
1 > 10; // Evalúa a: FALSE
11 > 3; // Evalúa a: TRUE
1 >= 10; // Evalúa a: FALSE
11 >= 11; // Evalúa a: TRUE
54 >= 10; // Evalúa a: TRUE
````
----

# Operadores idénticos y no idénticos

En esta lección aprenderemos algunos operadores de comparación más y veremos cómo podemos usarlos para comparar más que solo valores numéricos.

El operador idéntico (`===`) devolverá `TRUE` si el operando izquierdo es el mismo que el operando derecho y `FALSE` si no es:

````
$num = 5;
$num === 5; // Evalúa a: TRUE
10 === 10; // Evalúa a: TRUE
$num === 20; // Evalúa a: FALSO
````

Cuando pensamos en comparar dos valores, tendremos que pensar como una computadora. ¿Son `"hola"` y `"Hola"` lo mismo?

````
$saludo = "hola";
$saludo === "hola"; // Evalúa a: TRUE
"hola" === "hol" . "a"; // Evalúa a: TRUE
$saludo === "HOLA"; // Evalúa a: FALSE
````

El operador no idéntico (`!==`) devolverá `TRUE` si los dos operadores son diferentes y `FALSE` si son iguales:

````
$num = 5;
$num !== 5; // Evalúa a: FALSO
10 !== 10; // Evalúa a: FALSO
$num !== 20; // Evalúa a: TRUE

$saludo = "hola";
"hola" !== "hola"; // Evalúa a: FALSO
$greeting !== "HOLA"; // Evalúa a: VERDADERO
````

Al mirar a través del código PHP, puede encontrar otro operador: el operador igual (`==`). Al igual que el operador idéntico, el operador igual devolverá `TRUE` si el operando izquierdo es el mismo que el operando derecho y `FALSE` si no lo es. Pero el operador igual es menos estricto que el operador idéntico y puede tener algunos resultados difíciles de predecir, por lo que preferimos usar solo el operador idéntico.

----

# Declaraciones elseif

Hasta ahora, hemos estado escribiendo condicionales que solo pueden manejar una condición. __Si__ se cumple esa condición, hacemos una cosa, de lo contrario hacemos __otra__. Esto solo nos permite uno o dos cursos de acción. Pero los programas pueden ser mucho más complejos.

Considere las calificaciones con letras en una tarea escolar:

+ Si la calificación es inferior a 60, es una F
+ O bien, si la calificación es inferior a 70, es una D.
+ O bien, si la calificación es inferior a 80, es una C.
+ O bien, si la calificación es inferior a 90, es una B.
+ O de lo contrario, es una A.

Podemos escribir condicionales con declaraciones `if` múltiples usando la construcción `elseif`. La computadora continuará con cada condición hasta que encuentre una condición que se cumpla o llegue al final, lo que ocurra primero.

Implementemos nuestro ejemplo de calificaciones con letras en el código:

````
$grado = 88;
si ($grado < 60) {
  echo "Tienes una F";
} elseif ($grado < 70) {
  echo "Tienes una D";
} elseif ($grado < 80) {
  echo "Tienes una C";
} elseif ($grado < 90) {
  echo "Tienes una B";
} más {
  echo "Tienes una A";
}
```` 

En el código anterior, `$grado` tiene un valor de `88`. La computadora verificará cada condición hasta que se cumpla una y ejecutará ese bloque de código. Cuando llega a la condición `$grado < 90`, se evalúa como `TRUE`. Ese bloque de código se ejecuta y `Tienes una B` registrada en el terminal.

Tenga en cuenta que el orden de nuestros condicionales es importante. El grado 55 satisfaría la condición `$grado < 90`, pero cumple con la condición prevista para ello, `$grado < 60` primero. ¿Qué pasaría si las declaraciones elseif estuvieran en un orden diferente?

````
$grado = 55;
si ($grado <90) {
  echo "Tienes una B";
} elseif ($grado < 80) {
  echo "Tienes una C";
} elseif ($grado < 70) {
  echo "Tienes una D";
} elseif ($grado < 60) {
  echo "Tienes una F";
} más {
  echo "Tienes una A";
}
```` 

El código anterior mostrará  `Tienes una B` en la terminal ya que la computadora ejecutará la primera condición `TRUE`. Al construir nuestros condicionales, debemos tener cuidado de que tengan el resultado que queremos.

Nota: puede encontrar [las palabras clave `else if`](https://www.php.net/manual/en/control-structures.elseif.php) con un espacio que separa las dos palabras. En muchas situaciones, `else if` funcionará de la misma manera que `elseif`. Como `elseif` funciona de manera más universal, eso es lo que elegimos usar.

----

# Declaración switch

A menudo queremos comparar un valor, una expresión o una variable con muchos valores posibles diferentes y ejecutar un código diferente según el que coincida. Podemos usar una serie de declaraciones `if` / `elseif` que usan el operador idéntico (`===`) o podemos usar una declaración `switch`, una sintaxis alternativa.

Escribimos un código con declaraciones `if` / `elseif` para imprimir una cadena basada en la calificación de la letra del estudiante:

````
if ($letter_grade === "A") {
  echo "fabuloso";
} elseif ($letter_grade === "B") {
  echo "bueno";
} elseif ($letter_grade === "C") {
  echo "Justo";
} elseif ($letter_grade === "D") {
  echo "Necesita mejorar";
} elseif ($letter_grade === "F") {
  echo "¡Véame!";
} más {
  echo "Grado inválido";
}
````

Dado que este código involucra una serie de comparaciones, ¡está listo para una declaración `switch`! Vamos a verlo refactorizado con `switch`:

````
switch ($letter_grade) {
  case"A":
    echo "fabuloso";
    break;
  case "B":
    echo "bueno";
    break;
  case "C":
    echo "Justo";
    break;
  case "D":
    echo "Necesita mejorar";
    break;
  case "F":
    echo "¡Véame!";
    break;
  default:
    echo "Grado inválido";
}
````

Comenzamos con la palabra clave `switch` seguido del valor (o expresión) que compararemos, en este caso, `$letter_grade`. Proporcionamos posibles coincidencias para la expresión con la palabra clave `case`, el valor de coincidencia potencial y los dos puntos. Para cada `case`, proporcionamos código que debe ejecutarse si ese caso coincide. Después de cada `case`, incluimos la palabra clave `break` para _salir_ de la declaración `switch`. Podemos proporcionar un valor `default` que debería ejecutarse si ninguno de los casos proporcionados coincide.

Una declaración `switch` es un buen ejemplo de código que podría ser preferible _no_ porque sea más corto, sino porque indica claramente el propósito del código; al mirar una declaración `switch` podemos identificar rápidamente los aspectos importantes del código; Esto hace que sea más fácil de entender, ampliar y depurar.

----

# Declaraciones switch: caída

En la lección anterior, le enseñamos a usar la palabra clave `break` después del bloque para cada `case`. Sin la palabra clave `break`, no solo se ejecutará el primer bloque de casos coincidentes, sino que también se ejecutará todo el código en los casos posteriores. Esto se conoce como _caída_. La palabra clave `break` le dice a la computadora que __salga__ de la declaración `switch`, sin ella, __caerá__ en el resto del `switch` ejecutando todo el código hasta que llegue a un `break`, un `return` o el final de la declaración:

````
$letra = "a";
switch ($letra) {
  case "a":
    echo "a";
  case "b":
    echo "b";
  case "c":
    echo "c";
  case "d":
    echo "d";
}
````

El código anterior generará `abcd`. Solo el primer caso (`case "a"`) coincide realmente con el valor de `$letra`, pero dado que el código anterior no tiene `break`s, se ejecutará todo el código `switch`. La caída puede parecer un lastre, pero puede ser útil cuando queremos que varios casos ejecuten el mismo código:

````
switch ($day_of_week) {
  case "lunes":
  case "martes":
    echo "¡Recién comienza!";
    break;
  case "miércoles":
    echo "Humpday!";
    break;
  case "jueves":
  case "viernes":
    echo "¡Casi el fin de semana!";
    break;
  case "Sábado":
  case "domingo":
    echo "¡Disfruta!";
    break;
}
````

En el código de arriba, usamos la caída a nuestro favor colocando casos que deberían ejecutar el mismo código uno al lado del otro y haciendo que compartan un bloque de código. Entonces, por ejemplo, si `$day_of_week` tiene el valor `"Lunes"` o `"Martes"`, la cadena `"¡Recién comienza!"` será impreso

Está bien si no encuentra que la caída sea útil en su propio código. ¡Pero saber cómo usarlo debería recordarle que existe y que necesita esos `break`s!

----

# Operador ternario

PHP ofrece una sintaxis abreviada para devolver (`return`) un valor condicionalmente. Antes de aprenderlo, consideremos un código de ejemplo:

````
$isClicked = FALSE;
if ($isClicked) {
  $link_color = "purple";
} else {
  $link_color = "azul";
}
````

En el código anterior, nuestra condición verifica el valor de la variable `$isClicked`. Si es `TRUE`, asignamos `$link_color` a `"purple"`; de lo contrario, le asignamos el valor `"blue"`. Nuestro código es algo repetitivo: el código en cada bloque de código es solo ligeramente diferente.

Un operador ternario (`?:`) es otro operador condicional. Toma tres operandos y devuelve un valor:

+ El primer operando es una condición para verificar. Esto es seguido por un signo de interrogación `?`.
+ El segundo operando es una expresión para devolver (`return`) si la condición es `TRUE`. Esto es seguido por dos puntos (`:`).
+ El tercer operando es una expresión para devolver (`return`) si la condición es `FALSE`.

Veamos nuestro ejemplo anterior refactorizado con el operador ternario:

````
$isClicked = FALSE;
$link_color = $isClicked ? "purple" : "blue";
````

El operador ternario nos permite escribir menos líneas de código manteniendo la legibilidad.

Tenga en cuenta que el código en la expresión se ejecutará, pero el uso previsto del ternario es devolver condicionalmente un valor para _no_ ejecutar el código.

----

# Verdad y falsedad

Hasta ahora en nuestros condicionales, hemos estado tratando con expresiones que evaluarían valores booleanos en cualquier contexto. En la práctica, __cualquier__ valor o expresión en la condición se __convertirá__ en `TRUE` o `FALSE`. Eche un vistazo al siguiente código PHP real y funcional:

````
if ("¿Qué está pasando?") {
  echo "Vamos a explicar...";
}
// Imprime: vamos a explicar...
````

En el código anterior, la condición verifica la _veracidad_ de la cadena `"¿Qué está pasando?"`. La computadora convierte este valor a `TRUE` y, por lo tanto, ejecuta el código en el bloque. A veces nos referimos al código que se convertirá en `TRUE` como _verdadero_ y al código que se convertirá en `FALSO` como _falso_ ya que en realidad no son equivalentes a esos valores booleanos, pero se tratarán como tales en ciertos contextos. La mayoría de los valores y expresiones se tratan como verdaderos, por lo que nos centraremos en aquellos que son falsos:

+ Cadenas vacías
+ `null`
+ una variable indefinida o no declarada
+ una matriz vacía
+ el numero `0`
+ la cadena `"0"`

Veamos esto en acción:

````
if ("") {
  echo "esto no se imprimirá";
} elseif (null) {
  echo "esto no se imprimirá";
} elseif ([]) {
  echo "esto no se imprimirá";
} elseif (0) {
  echo "esto no se imprimirá";
} elseif ("0") {
  echo "esto no se imprimirá";
} más {
  echo "¡Por fin!";
}
````

Como ninguna de las condiciones anteriores contiene valores verdaderos, el código se imprimirá `¡Por fin!`

----

# Entrada del usuario: readline ()
Los resultados de los programas que hemos estado escribiendo hasta ahora han sido predeterminados. A menos que cambiemos nuestro código manualmente, producirá los mismos resultados cada vez que se ejecute. Pero esto no es muy realista. Los programas a menudo reciben entradas o resultados inesperados, por lo que necesitamos condicionales. Los condicionales nos permiten escribir programas flexibles que manejan esta variabilidad.

Una razón común por la que nuestros programas necesitan ser flexibles es cuando tienen interacción con el usuario. Cuando creamos un sitio web, no sabemos exactamente cuándo un usuario presionará un botón o exactamente qué texto ingresará en un formulario. Escribir programas que puedan manejar la interacción única del usuario es una gran parte del desarrollo de software.

La interacción del usuario no está restringida al desarrollo web. También podemos habilitar la interacción del usuario en nuestros programas basados ​​en terminales.

La [función incorporada `readline()`](https://www.php.net/manual/en/function.readline.php) toma una cadena con la que solicitar al usuario. Espera a que el usuario ingrese texto en el terminal y devuelve ese valor como una cadena.

````
echo "Hola, soy Aisle Nevertell. ¿Cómo te llamas?\n";
$nombre = readline (">> ");
echo "\n Encantado de conocerte, $nombre";
````

El código anterior imprime: `Hola, soy Aisle Nevertell. ¿Cuál es tu nombre?`. Luego, imprime `>>` en el terminal para pedirle al usuario que escriba y espera su entrada que guardará en la variable $name. Si el usuario ingresó a `Alex`, por ejemplo, el programa luego imprimirá `Encantado de conocerte, Alex` en la terminal.

Al incorporar en condicionales, podemos tomar diferentes acciones dependiendo de la entrada del usuario:

````
echo "\n¿Cuál es tu color favorito? \n";
$color = readline (">>");
if ($color === "verde") {
  echo "\nCool, ¡ese es mi favorito también!";
} más {
  echo "\nOh, $color es bueno, supongo...";
}
````
En el código anterior, solicitamos al usuario que ingrese su color favorito. Si dicen nuestro color favorito (verde), damos una respuesta, de lo contrario damos una respuesta diferente.

----

# Repaso

Woah! Cubrimos mucho en esta lección. Buen trabajo. Repasemos lo que aprendimos:

+ Los condicionales permiten que los programas decidan cómo reaccionar ante una amplia variedad de situaciones.
+ Las declaraciones `if` nos permiten ejecutar un bloque de código si se cumple una condición.
+ El tipo de datos booleanos es el valor `TRUE` o `FALSE` y es la base de la toma de decisiones programáticas.
+ Usamos `else` para incluir un bloque de código para ejecutar cuando no se cumple la condición.
+ Los operadores de comparación evalúan una relación entre dos operandos y devuelven un valor booleano.
    + El operador menor que (`<`)
    + El operador menor o igual que (`<=`)
    + El operador mayor que (`>`)
    + El operador mayor o igual que (`>=`)
    + El operador idéntico (`===`)
    + El operador no idéntico (`!==`)
+ Podemos escribir condicionales con declaraciones `if` múltiples usando la construcción `elseif`.
+ En lugar de usar una serie de sentencias `if` cuando queremos comparar un valor, expresión o variable con muchos valores posibles diferentes y ejecutar un código diferente según el que coincida, podemos usar una sentencia `switch`.
+ La palabra clave `break` le dice a la computadora que salga de la declaración del interruptor, sin ella, _caerá_ en el resto del switch ejecutando todo el código hasta que llegue a un `break` o al final de la declaración.
+ Un operador ternario (`?:`) es un operador condicional abreviado. Se necesitan tres operandos (una condición para verificar, una expresión para devolver si la condición es `TRUE` y una expresión para devolver si la condición es `FALSE`).
+ Cualquier valor o expresión dentro de una condición se convertirá en `TRUE` o `FALSE`. Consideramos que los valores que se convertirán en TRUE son _verdaderos_ y los valores que se convertirán en `FALSE` son _falsos_.
+ Podemos obtener la entrada del usuario desde el terminal con la función `readline()`.

Eso es realmente mucho ... ¡Tómate un tiempo para practicar y revisar! Lo estás haciendo genial.

----
