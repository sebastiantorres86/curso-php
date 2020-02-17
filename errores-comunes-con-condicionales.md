# Errores comunes con condicionales

## En este artículo repasaremos algunos errores que son fáciles de cometer al escribir programas más complejos con condicionales.

En este artículo, veremos algunos errores comunes que los programadores cometen cuando comienzan a trabajar con condicionales. Conocer los errores comunes no necesariamente nos impide cometerlos, ¡pero puede ayudarnos a detectarlos más rápidamente!

# Error 1: no tratar las expresiones como distintas:

Digamos que queremos imprimir algo si nuestra variable `$number` es igual a `1` o `2` o `3`. ¿Por qué no funciona el siguiente código?

````
$number = 5;
if ($number === 1 || 2 || 3)
{
  echo "Su número es 1, 2 o 3";
} else {
  echo "Su número NO es 1, 2 o 3";
}
````

El código anterior imprime `"Su número es 1, 2 o 3`" aunque nuestro número sea `5`... En una condición compuesta, cada expresión se trata por separado. Como `2` y `3` son valores _verdaderos_, la condición anterior es el equivalente de `FALSE || TRUE || TRUE` que se evalúa como `TRUE`. Aquí hay una forma en que podríamos reescribir el código roto:

````
$number = 5;
if ($number === 1 || $number === 2 || $number === 3)
{
  echo "Su número es 1, 2 o 3";
} else {
  echo "Su número NO es 1, 2 o 3";
}
````

La computadora tratará cada expresión como separada de la última, por lo que debemos tener eso en cuenta en nuestro código.

# Error 2: Omitir paréntesis:

Cuando hablamos de operadores lógicos, mencionamos su _precedencia de operadores_: el orden en que la computadora evaluará las expresiones con múltiples operadores. La precedencia de los operadores aritméticos puede sentirse un poco más cómoda, pero recordar que [todos los operadores tienen una precedencia](https://www.php.net/manual/en/language.operators.precedence.php) en relación con los demás puede tardar acostumbrarse a...

````
TRUE || FALSE && FALSE; // Evalúa a: TRUE

TRUE || FALSE and FALSE; // Evalúa a: FALSE

$my_bool = TRUE y FALSE; // $my_bool es TRUE
````

Es posible que esto no surja con tanta frecuencia, pero recuerde que podemos evitar cualquier riesgo mediante el uso de paréntesis para forzar expresiones a evaluar en el orden que pretendemos:

````
(TRUE || FALSE) && FALSE; // Evalúa a: FALSE
(TRUE || FALSE) and FALSE; // Evalúa a: FALSE

$ my_bool = (TRUE and FALSE); // $my_bool es FALSE
````

Veamos otro ejemplo:

````
$retiro = 120;
$saldo = 110;
if (!$saldo < $retiro) {
     echo "Éxito";
     $saldo -= $retiro;
} else {
  echo "Fondos insuficientes";
}
````

A pesar de que `$saldo` es menor que el monto de `$retiro`, el código anterior completa el retiro... ¿por qué? Sin paréntesis, la computadora primero evalúa `!$saldo` y luego verifica si ese valor es menor que `$retiro`. La expresión `!$saldo` se convierte al valor numérico falso de `0`, por lo tanto, la expresión `!$saldo < $retiro` devuelve `TRUE`.

Al usar el operador ! para negar una expresión lógica, debemos ajustar la expresión entre paréntesis.

````
$retiro = 120;
$saldo = 110;
if (!($saldo < $retiro)) {
     echo "Éxito";
     $saldo -= $retiro;
} else {
  echo "Fondos insuficientes";
}
````

Y mira el siguiente código roto:

````
if ($edad < 0) || ($edad > 120) {
  echo "¡Esa es una edad inválida!";
}
````

El código anterior causará un error. ¿Captó el error? Hemos incluido nuestras condiciones separadas entre paréntesis, ¡pero también debemos asegurarnos de que la condición completa esté entre paréntesis! Deberíamos reescribir ese código como:

````
if (($edad < 0) || ($edad > 120)) {
  echo "¡Esa es una edad inválida!";
}
````

# Error 3: No pensar como una computadora:

Una de las cosas más difíciles de aprender a codificar, es aprender a pensar como "piensa" una computadora. Es importante mirar las expresiones como lo haría una computadora. Considere el siguiente código para solicitar a un usuario si ingresa una respuesta no válida:

````
if ($respuesta  == "sí" || $respuesta !== "no") {
  echo "Debe escribir sí o no";
}
````

En el código anterior, teníamos la intención de detectar situaciones en las que el usuario no ingresó `"sí"` o `"no"`. Escribimos el código de la forma en que podríamos decirlo, "Si la respuesta no es sí o no..." Pero la expresión `$respuesta !== "sí" || $respuesta !== "no"` siempre se evaluará como `TRUE`, incluso cuando `$respuesta` fue realmente `"si"` o `"no"`! Si `$respuesta` fue `"no"`, por ejemplo, la expresión se evaluará como `TRUE || FALSE` que se evalúa como `TRUE`.

Podemos arreglar este código roto reemplazando el `||` operador con el operador `&&`:

````
if ($respuesta !== "si" && $respuesta !== "no") {
  echo "Debe escribir sí o no";
}
````

Cuando nuestro código no funciona de la manera que esperamos, deberíamos recorrerlo como una computadora, deberíamos "ser" la computadora y tratar de leer cada línea sin nuestro sesgo humano natural.