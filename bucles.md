## Bucles

# ¿Por qué usar bucles?

Al intentar repetir el código una y otra vez, puede ser monótono volver a escribir o copiar y pegar el mismo código. Peor aún, los errores tipográficos involuntarios pueden causar errores en su programa.

Considere un ejemplo donde desea que su código imprima todos los números del 1 al 10. Sin bucles, esto se vería así:

````
echo "1 \ n";
echo "2 \ n";
echo "3 \ n";
echo "4 \ n";
echo "5 \ n";
echo "6 \ n";
echo "7 \ n";
echo "8 \ n";
echo "9 \ n";
echo "10";
````

¡Eso es escribir mucho! ¿Y si decide más adelante que desea cambiarlo para agregar `"El recuento es actualmente:"` al comienzo de cada declaración? Debería copiar y pegar eso en cada línea.

Afortunadamente, la mayoría de los lenguajes de programación contienen una función, llamada _bucles_, para repetir el código automáticamente hasta que se cumplan ciertas condiciones. A veces, la repetición se denomina _iteración_ y cada vez que se ejecuta el código se considera una _iteración_. Los bucles se pueden usar para reducir la cantidad de líneas de código y, al mismo tiempo, hacer que sea mucho más fácil modificarlos más adelante.

PHP no es una excepción y ofrece varias formas de repetir la ejecución de un bloque de código.

Esta lección cubrirá los siguientes tipos de bucles PHP:

+ `while`
+ `do` ... `while`
+ `for`
+ `foreach`

Cada uno de estos bucles contiene condiciones para detener la ejecución del bucle. La implementación incorrecta de estas condiciones puede causar un bucle _infinito_ y la computadora nunca dejará de ejecutar su bloque de código. En ese caso, si parece que su código está tardando demasiado o nunca se completa, considere actualizar la página y volver a examinar su estructura de bucle.

![](https://codecademy-content.s3.amazonaws.com/courses/php-loops/roundabout.gif)

----

# while
 
El primer bucle PHP que cubriremos es el bucle `while`. Este tipo de bucle continúa iterando mientras su condicional sea verdadero.

Este código genera los números del 1 al 10, de forma similar al ejemplo anterior:

````
$count = 1;
while ($count < 11)
{
  echo "El recuento es: " . $count. "\n";
  $count += 1;
}
````

La primera vez que el intérprete encuentra este código, verifica la condición. Si se evalúa como `TRUE`, se ejecuta el bloque de código. Luego verifica la condición nuevamente, y si es `TRUE`, ejecuta el bloque de código nuevamente. Continúa de esta manera hasta que la condición sea `FALSE`.

En este ejemplo, el código dentro de las llaves (`{}`) se ejecuta mientras que la declaración condicional dentro de las llaves (`$count < 11`) sigue siendo verdadera. `$count` comienza en un valor de `1`, por lo que el condicional es verdadero en la primera iteración.

La variable `$count` se incrementa en 1 durante cada iteración del bucle (`$count += 1`). Cuando `$count` es igual a 11, el condicional ya no es verdadero y el ciclo `while` finaliza. Cualquier código después de este bloque se ejecuta.

----

# do while

Un bucle `do` ... `while` es muy similar a un bucle `while`. La principal diferencia es que el bloque de código se ejecutará una vez sin que se verifique el condicional. Después de la primera iteración, se comporta igual que un ciclo `while`.

La sintaxis es ligeramente diferente y el condicional va al final del bloque de código. Nuestro ejemplo de contar hasta 10 se ve así:

````
$count = 1;
do {
   echo "El recuento es: " . $count . "\n";
   $count += 1;
} while ($count < 11);
````

A diferencia de los otros tipos de bucles, el bucle `do` ... `while` requiere un punto y coma al final.

En la práctica, solo use este tipo de bucle cuando siempre necesite el bloque de código para ejecutar al menos una vez.

Por ejemplo, si desea pedirle a un usuario que adivine un número secreto, puede usar un código como:

````
<? php
do {
   $guess = readline ("\nAdivina el número\n");
} while ($guess != "42");
echo "\n¡Has adivinado correctamente 42!";
````

Este código le pide al usuario que `"adivine el número"` y continúa preguntándole hasta que adivine con éxito 42.

----

# for

Un bucle `for` se usa comúnmente para ejecutar un bloque de código un número específico de veces.

````
for (#expresión 1; #expresión 2; #expresión 3)
{
  # bloque de código
}
````

La sintaxis del bucle `for` incluye 3 expresiones:

+ El primero se evalúa solo una vez antes de la primera iteración.
+ El segundo se evalúa antes de cada iteración. Si es `TRUE`, se ejecuta el bloque de código. De lo contrario, el bucle termina.
+ El tercero se evalúa después de cada iteración. Tenga en cuenta que las expresiones 1 y 2 tienen punto y coma después de ellas.

En nuestro ejemplo de contar hasta 10, la sintaxis se convierte en:

````
for ($count = 1; $count < 11; $count++)
{
  echo "El recuento es: " . $count . "\n";
}
````

La primera expresión es `$count = 1`, esto inicializa la variable `$count` a `1`.

En cada iteración, se evalúa la segunda expresión (`$count < 11`). Mientras esto sea `TRUE`, el bloque de código se ejecuta.

La expresión final (`$count++`) se ejecuta después de cada iteración. En este ejemplo, `$count` se incrementa en `1` en cada iteración.

Después de 10 iteraciones, el valor de la variable `$count` es `11`. Esto hace que la segunda expresión sea `FALSE` y la ejecución del ciclo finaliza.

----

# foreach

El bucle `foreach` se usa para iterar sobre una matriz. El bloque de código se ejecuta para cada elemento de la matriz y el valor de ese elemento está disponible para su uso en el bloque de código.

Nuestro ejemplo de contar hasta 10 se convierte en:

````
$counting_array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
foreach ($counting_array as $count) {
  echo "El recuento es: " . $count . "\n";
}
````

Aquí, estamos iterando sobre `$counting_array`. En cada iteración, el elemento actual en la matriz se asigna a la variable `$count`.

También podemos iterar sobre matrices de tipo diccionario con claves y valores:

````
$details_array = ["color" => "azul", "forma" => "cuadrado"];
foreach ($details_array as $ detail) {
  echo "El detalle es: " . $detail . "\n";
}
````

Esto imprimirá:

````
El detalle es: azul
El detalle es: cuadrado
````

Pero podemos cambiar ligeramente la sintaxis para obtener acceso a las claves, así como a los valores:

````
$details_array = ["color" => "azul", "forma" => "cuadrado"];
foreach ($details_array as $atributte => $detail) {
  echo "El/la". $atributte " es: " . $detail . "\n";
}
````

Esto imprimirá:

````
El/la color es: azul
El/la forma es: cuadrado
````

Dado que el ciclo está controlado por la estructura de la matriz, puede encontrar un comportamiento inesperado si comienza a modificar la matriz durante la ejecución del ciclo `foreach`. Si va a hacer esto, asegúrese de haber abordado las notas sobre esto en la [documentación de PHP](https://www.php.net/manual/en/control-structures.foreach.php).

----

# break y continue

Similar a las declaraciones `switch`, la palabra clave `break` se puede usar para terminar cualquiera de los tipos de bucle temprano. En nuestro ejemplo de conteo de un ciclo `while`, si agregamos un enunciado condicional y uno `break`:


````
$count = 1;
while ($count < 11)
{
  echo "El recuento es: " . $count . "\n";
  if ($count === 5) {
    break;
  }
  $count += 1;
}
````

El código ahora contará de 1 a 5 y luego se detendrá.

Una desventaja del uso intensivo de las declaraciones `break` es que el código puede volverse menos legible. En este ejemplo, un vistazo rápido puede dar a alguien la impresión de que el ciclo se repetirá hasta que `$count` sea `10`. En realidad, la declaración `break` sepultada controla la iteración final del ciclo.

La palabra clave `continue` es similar a `break`, excepto que solo finaliza la iteración actual antes, no el ciclo completo. Podríamos usar esto en nuestro ejemplo para omitir contar el número 5:

````
$count = 1;
while ($count < 11)
{
  if ($count === 5) {
    $count += 1;
    continue;
  }
  echo "El recuento es: " . $count . "\n";
  $count += 1;
}
````

Tenga en cuenta que necesitábamos agregar un incremento adicional antes de `continue` (`$count += 1;`) para evitar quedar atrapados en un bucle infinito.

----

# Repaso

Ahora tiene la capacidad de repetir la ejecución de bloques de código según sea necesario en sus programas PHP.

Aquí hay un resumen de los temas tratados en esta lección:

+ Los bucles `while` se ejecutan solo mientras su condicional se evalúe como `TRUE`.
+ Los bucles `do` ... `while` siempre se ejecutan al menos una vez y luego continúan ejecutándose mientras su condicional es `TRUE`.
+ Los bucles `for` contienen 3 expresiones y se utilizan con frecuencia para ejecutar un bloque de código un número específico de veces.
    + La primera expresión se ejecuta antes de la primera iteración.
    + La segunda expresión se evalúa antes de cada iteración. Si es VERDADERO, el bloque de código se ejecuta. De lo contrario, el bucle termina.
    + La tercera expresión se evalúa después de cada iteración.
+ Los bucles `foreach` se utilizan para iterar sobre los elementos de una matriz. La clave y el valor de cada elemento está disponible en el bloque de código.
+ `break` se usa para finalizar la ejecución de un ciclo temprano.
+ `continue` se usa para finalizar la ejecución de una iteración de bucle temprano y continúa a la siguiente iteración.

----
[Próxima lección]()