# FizzBuzz
## PROYECTO

Implemente soluciones para el problema de la entrevista FizzBuzz usando diferentes tipos de bucles en PHP.

FizzBuzz es una de las preguntas de entrevista más utilizadas para los solicitantes de puestos de programación. Cada entrevistador tiene su propia variante, pero el aviso suele ser algo como:

````
Escriba un código que imprima los números del 1 al 100 (inclusive), excepto en estos casos:
- Si un número es múltiplo de 3, escriba "Fizz".
- Si un número es múltiplo de 5, escriba "Buzz".
- Si un número es múltiplo de 3 y 5, escriba "FizzBuzz".
````
----
### Tareas

# Use un bucle while

1. Hay muchas formas de resolver este problema usando PHP. Comencemos usando un ciclo `while` para contar de `1` a `100`.

    Por ahora, cree una variable `$counter` para realizar un seguimiento del número e imprimirlo en la pantalla en cada iteración.

    Asegúrese de poner una nueva línea antes del final de cada iteración.

    También deberá aumentar su variable `$counter` dentro del bloque de código.

#### Pista
````
$counter = 1;
while ($counter <= 100) {
  echo $counter;
  echo "\n";
  $counter++;
}
````

----

2. Dentro del ciclo, establezca algunas declaraciones `if`, `elseif`, `else` para determinar qué imprimir en cada iteración.

    A pesar del orden en que el entrevistador presenta las diversas condiciones, en realidad primero debe verificar los números divisibles por `15`. Si marca primero por divisible por `3`, imprimirá `"Fizz"` y saltará el `elseif` que chequea el `15`.

    Recuerde usar el operador de módulo (`%`) para verificar si un número es divisible por otro. El módulo es `0` cuando dos números son divisibles.

#### Pista
````
while ($counter <= 100) {
  if ($counter % 15 === 0) {

  } elseif ($counter % 3 === 0) {

  } elseif ($counter % 5 === 0) {

  } else {

  }
  echo $counter;
  echo "\n";
  $counter++;
}
````

----

3. Mueve el `echo $counter;` dentro de la declaración condicional correcta. Recuerde, solo imprimimos el número si no se cumple ninguna de las otras condiciones.

#### Pista
````
} else {
  echo $counter;
}
````

----

4. Coloque declaraciones dentro de los otros tres condicionales para `"FizzBuzz"`, `"Fizz"` y `"Buzz"`.

¡Su código ahora debería imprimir la salida completa para FizzBuzz!

#### Pista
````
# while loop
$counter = 1;
while ($counter <= 100) {
  if ($counter % 15 === 0) {
    echo "FizzBuzz";
  } elseif ($counter % 3 === 0) {
    echo "Fizz";
  } elseif ($counter % 5 === 0) {
    echo "Buzz";
  } else {
    echo $counter;
  }
  echo "\n";
  $counter++;
}
````

----

# Use un bucle for y foreach

5. Implementemos la solución nuevamente, pero esta vez haremos uso de un bucle `for` y `foreach`.

En lugar de imprimir las declaraciones en cada paso, las colocaremos en una matriz e imprimiremos todas al final.

Comience creando una matriz vacía `$output` para almacenar las declaraciones en.

#### Pista
````
$output = [];
````

----

6. Agregue un bucle `for` que cuente de `1` a `100`. Use `$i` como su variable de contador de bucles.

#### Pista
Hay algunas formas de hacer esto. Fuimos con:

````
for ($i = 1; $i <= 100; $i++) {

}
````

----

7. Agregue condiciones dentro de su ciclo `for` para determinar qué agregar a la salida en cada iteración. Deben ser los mismos que antes, utilizando el operador de módulo (`%`).

#### Pista
````
if ($i % 15 === 0) {

} elseif ($i % 3 === 0) {

} elseif ($i % 5 === 0) {

} else {

}
````

----

8. En lugar de agregar declaraciones de `echo` dentro de cada condicional, inserte la declaración apropiada en la matriz `$output`.

Puede usar la función incorporada `array_push` para esto.

#### Pista
````
if ($i % 15 === 0) {
  array_push($output, "FizzBuzz");
} elseif ($i % 3 === 0) {
  array_push($output, "Fizz");
} elseif ($i % 5 === 0) {
  array_push($output, "Buzz");
} else {
  array_push($output, $i);
}
````

----

9. Ahora tiene una matriz `$output` con las declaraciones de impresión correctas, pero no tiene un formato muy agradable. Usemos un bucle `foreach` para recorrerlo e imprimir las declaraciones.

Cree un bucle `foreach` que recorra en iteración `$output`. Use `$value` para la variable en cada posición de la matriz.

#### Pista
````
foreach ($output as $value) {
  echo $value . "\n";
}
````

----

10. Imprima `$value` en cada iteración del bucle seguido de una nueva línea.

Esto debería coincidir con la salida de la implementación del bucle `while`.

#### Pista
````
foreach ($output as $value) {
  echo $value . "\n";
}
````

----

# break y continue

11. Tener el resultado almacenado en una matriz es bueno ya que podemos volver a imprimir el mismo resultado pero agregar nuevas condiciones.

Cree una copia del bucle `foreach` anterior que itera sobre `$output`.

#### Pista
````
foreach ($output as $value) {
  echo $value . "\n";
}
````

----

12. El entrevistador le ha pedido que ahora evite imprimir cualquier cosa cuando un número es divisible por `3` (`"Fizz"`).

Agregue una instrucción `if` y `continue` para evitar imprimir cualquier cosa cuando `$value` es `"Fizz"`.

Cuando se desplaza hacia la parte inferior, su última salida solo debe tener números, `"Buzz"` y `"FizzBuzz"`.

#### Pista
````
foreach ($output as $value) {
  if ($value === "Fizz") {
    continue;
  }
  echo $value . "\n";
}
````

----

13. Como paso final, el entrevistador le ha pedido que ahora deje de imprimir valores después del primer `"FizzBuzz"`.

Agregue una declaración `elseif` a su condicional. Dentro de él, debe imprimir `$value` y salir del bucle.

#### Pista
````
foreach ($output as $value) {
  if ($value === "Fizz") {
    continue;
  } elseif ($value === "FizzBuzz") {
    echo $value;
    break;
  }
  echo $value . "\n";
}
````

----
[Próxima lección]()