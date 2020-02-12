## NÚMEROS PHP

# Números

Los números y las operaciones aritméticas son una parte fundamental de la programación. En esta lección, aprenderemos cómo usar y manipular números en PHP.

PHP tiene dos tipos de datos numéricos. El tipo de datos _enteros_ incluye números enteros positivos y negativos (como 3, 4599, -98 y 0). El tipo de datos de _coma flotante_ se usa para representar números decimales (como 4.98273, 2.1, -9.7, -182736.8).

````
echo 5; // Imprime: 5
echo -22.8; // Imprime: -22.8
````

También podemos declarar variables y asignar números como sus valores:

````
$my_int = 78;
$my_float = -897.21;

echo $my_int; // Imprime: 78
echo $my_float; // Imprime: -897.21
````

En el código anterior, creamos la variable `$my_int` y le asignamos el valor entero de 78. Luego, creamos la variable `$my_float` y le asignamos el valor de coma flotante de -897.21.

----

# Adición y sustracción

PHP proporciona varios operadores que podemos usar en números. Comencemos con dos que probablemente sean familiares: los operadores de suma (`+`) y resta (`-`):

````
echo 5 + 1; // Imprime: 6
echo 6.6 + 1.2; // Imprime: 7.8
echo 198263 - 263;  // Imprime: 198000
echo -22.8 - 19.1; // Imprime: -41.9
````

La mayoría de las veces, no tenemos que preocuparnos por el tipo de número que estamos usando. Podemos agregar un flotante a un entero, restar un entero de un flotante, y así sucesivamente.

Una peculiaridad es que los operadores devolverán enteros siempre que el resultado de la operación se evalúe como un número entero. Entonces `8.9 + 1.1` devolverá `10`, un número entero, y no `10.0` a pesar de que ambos operandos en el cálculo eran números de coma flotante.

----

# Usar variables numéricas

Podemos usar operadores numéricos en variables que contienen valores numéricos:

````
$tadpole_age = 7;
$lily_age = 6; 
$age_difference = $tadpole_age - $lily_age;
echo $age_difference; // Imprime 1
````

Veamos otro ejemplo de realizar operaciones con variables numéricas:

````
$favorite_num = 22;
echo $favorite_num + 1; // Imprime 23
echo $favorite_num; // Imprime 22
````

En el código anterior, creamos la variable `$favorite_num` y luego usamos `echo` para imprimir ese valor más 1. Tenga en cuenta que no reasignamos el valor de la variable `$favorite_num`, por lo que todavía tenía el valor 22 cuando lo imprimimos en el Última línea.

Reasignamos variables numéricas usando el operador de asignación:

````
$age = 82;
echo $age; // Prints: 82

$age = $age + 2;
echo $age; // Imprime: 84
````
----

# Multiplicación y división

PHP también nos da operadores para realizar multiplicación (`*`) y división (`/`).

````
echo 2 * 3; // Imprime: 6
echo -21 / 7; // Imprime: -3
````

Al igual que con la suma y la resta, cuando realizamos la multiplicación o división, la computadora devolverá un número entero cada vez que la operación se evalúe como un número entero.

Lo contrario también es cierto:

````
$num_cookies = 24;
$num_friends = 7;
$cookies_per_friend = $num_cookies / $num_friends;
echo $cookies_per_friend; // Imprime: 3.4285714285714
````

En el código anterior, realizamos una operación en dos enteros que no se dividieron entre sí de manera uniforme, por lo que la computadora devolvió un número de coma flotante.

----

# Potenciación

PHP nos da un operador para elevar un número a la potencia de otro número: el operador de potenciación (`**`).

Por ejemplo, podemos elevar un número al cuadrado elevándolo a la potencia de 2:

````
echo 4 ** 2; // Imprime: 16
````

También podemos usar este operador en flotantes y números negativos:

````
echo 2.89 ** 3.2; // Imprime: 29.845104015297
echo 10 ** -1; // Imprime: 0.1
````

Para que PHP interprete este operador correctamente, no puede haber espacios entre los dos `*` caracteres:

````
echo 2 * * 3; // Resultará en un error
````
----

# Módulo

PHP también proporciona un operador que podría ser menos familiar: módulo (`%`). El operador de _módulo_ devuelve el resto después de que el operando izquierdo se divide por el operando derecho.

````
echo 7 % 3; // Imprime: 1
````

En el código anterior, `7 % 3` devuelve `1`. ¿Por qué? Estamos tratando de encajar `3` en `7` tantas veces como podamos. `3` encaja en `7` como máximo dos veces. Lo que queda, el resto, es `1`, ya que `7` menos `6` es `1`.

![](https://s3.amazonaws.com/codecademy-content/courses/php-strings-variables/PHP_m2l2.gif)

El operador de módulo convertirá sus operandos a enteros antes de realizar la operación. Esto significa que `7.9 % 3.8` realizará el mismo cálculo que `7 % 3`; ambas operaciones devolverán `1`.

Veamos otro ejemplo del operador de módulo en acción:

````
$num_cookies = 27;
$cookies_per_serving = 4;
$leftover_cookies = $num_cookies % $cookies_per_serving;
echo $leftover_cookies; // Imprime: 3
````
----

# Orden de operaciones

Podemos encadenar varias operaciones juntas para obtener un único resultado:

````
echo 2 + 3 + 4 + 5 - 1.1; // Imprime: 12.9
echo 2 * 9/6; // Imprime: 3
````

Es posible que haya aprendido sobre las operaciones que tienen un orden de precedencia en una clase de matemáticas. Esto significa que las operaciones en una cadena no se realizan simplemente de izquierda a derecha; más bien cada operador recibe un rango especial.

Las operaciones se evaluarán en el siguiente orden:

1. Cualquier operación entre paréntesis (`()`)
2. Exponentes (`**`)
3. Multiplicación (`*`) y división (`/`)
4. Adición (`+`) y sustracción (`-`).

El acrónimo PEMDAS puede ser útil para recordar el orden de precedencia de estas operaciones aritméticas.

````
echo 1 + 3 * 9; // Imprime: 28
````

En el ejemplo anterior, `3 * 9` (27) se calcula primero y luego se agrega a 1 para obtener un resultado final de 28. Podemos cambiar lo que devuelve esta expresión usando paréntesis:

````
echo (1 + 3) * 9; // Impresiones: 36
````

Aquí, `1 + 3` (4) se calcula primero y luego ese valor se multiplica por 9, lo que devuelve 36.

----

# Operadores de asignación matemática

Una tarea común al manipular variables numéricas es reasignarlas a su valor anterior con alguna operación realizada en él.

````
$savings = 800;
$bike_cost = 75;
$savings = $savings - $bike_cost;
echo $savings; // Imprime: 725
````
Esta es una tarea tan común que PHP proporciona una sintaxis más corta utilizando operadores de asignación aritmética:

|Operación     |Sintáxis Larga|Sintáxis Corta|
|--------------|--------------|--------------|
|Suma          |$x = $x + $y  | $x += $y     | 
|Resta         |$x = $x - $y  | $x -= $y     |
|Multiplicación|$x = $x * $y  | $x *= $y     |
|División      |$x = $x / $y  | $x /= $y     |
|Módulo        |$x = $x % $y  | $x %= $y     |

Podríamos usar esta sintaxis más corta para reescribir el código anterior:

````
$savings = 800;
$bike_cost = 75;
$savings -= $bike_cost;
echo $savings; // Imprime: 725
````

Con los operadores de asignación matemática, PHP no permite espacios entre los dos caracteres.

¿Listo para un atajo más? Los operadores de incremento nos permiten restar o agregar uno a un número con solo dos caracteres.

````
$age = 89;
$age++;
echo $age; // Imprime: 90

$days_til_vacation = 7;
$days_til_vacation--;
echo $days_til_vacation; // Imprime: 6
````

En el código anterior, utilizamos el operador posterior al incremento (`++`) para agregar uno a $age y el operador posterior al decremento (`--`) para restar uno de $days_til_vacation.

----

# Repaso

¡Gran trabajo! En esta lección, aprendimos todo sobre el uso de números en PHP. Revisemos lo que cubrimos:

+ PHP tiene dos tipos de datos numéricos: enteros y números de coma flotante
+ Podemos usar operadores aritméticos para realizar operaciones matemáticas:

|Operación           |Ejemplo                           |
|--------------------|----------------------------------|
|Suma (`+`)          |echo 1 + 4.5; // Imprime: 5.5     |
|Resta (`-`)         |echo 9 - 1; // Imprime: 8         |
|Multiplicación (`*`)|echo -1.9 * 2.9; // Imprime: -5.51|
|División (`/`)      |echo 9 / 1; / Imprime: 9          |
|Módulo (`%`)        |echo 11 % 3; // Imprime: 2        |
|Potenciación (`**`) |echo 8**2; // Imprime: 64         |

+ Las operaciones tienen un orden de precedencia, lo que significa que ciertos tipos de operaciones en una cadena se evaluarán antes que otras: primero se evaluará cualquier operación entre paréntesis (`()`), siguientes exponentes (`**`), luego multiplicación (`*`) y división (`/`), y finalmente adición (`+`) y sustracción (`-`). El acrónimo PEMDAS puede ser una forma útil de recordar el pedido.
+ Podemos asignar valores numéricos a las variables y luego realizar operaciones numéricas con ellas.
+ Podemos usar operadores de asignación matemática como abreviatura al reasignar variables numéricas:

|Operación     |Sintáxis Larga|Sintáxis Corta|
|--------------|--------------|--------------|
|Suma          |$x = $x + $y  | $x += $y     | 
|Resta         |$x = $x - $y  | $x -= $y     |
|Multiplicación|$x = $x * $y  | $x *= $y     |
|División      |$x = $x / $y  | $x /= $y     |
|Módulo        |$x = $x % $y  | $x %= $y     |

----
[Próxima Lección](https://github.com/sebastiantorres86/curso-php/blob/master/introduccion-a-funciones-php.md)