## INTRODUCCIÓN A LAS FUNCIONES PHP

# Introducción

Podemos pensar en los programas como una serie de instrucciones que debe realizar la computadora. Hasta ahora en cada uno de nuestros programas PHP, cada paso se ha establecido explícitamente en el orden en que queremos que suceda.

A veces tendremos un grupo de acciones que queremos repetir en un programa. En estas situaciones, podríamos copiar y pegar las líneas de código que queremos volver a ejecutar, pero esto no es muy eficiente. En cambio, deberíamos usar _funciones_.

Una _función_ es un conjunto de instrucciones que empaquetamos como una unidad, a menudo con un nombre, para que podamos reutilizarla. _Definimos_ una función escribiendo la serie de pasos que deben suceder cada vez que usamos la función. Para usar la función la _llamamos_ o la _invocamos_.

En esta lección, vamos a comenzar a aprender la sintaxis para definir e invocar funciones PHP. Comenzaremos con funciones más simples y avanzaremos hacia las más complejas. Si es la primera vez que trabaja con funciones, puede parecer un gran salto. Tómese su tiempo y sea paciente consigo mismo.

----

# Definiendo funciones

Vayamos directamente a ello y creemos nuestra primera función:

````
function greetLearner()
{
  echo "¡Hola, aprendiz!\n";
  echo "¡Espero que estés disfrutando de PHP! \n";
  echo "Con cariño, Sebastian";
}
````

Veamos el código anterior:

+ Utilizamos la palabra clave `function` para comenzar nuestra definición de función.
+ Llamamos a la función `greetLearner`. Los nombres de funciones deben comenzar con una letra o un guión bajo, seguidos de cualquier número de letras, números o guiones bajos.
+ Creamos un _bloque de código_ con llaves (`{}`). El código dentro de este bloque de código se ejecutará cuando se invoque nuestra función.
+ Dentro de ese bloque escribimos tres instrucciones: `echo "¡Hola, aprendiz!\n!";`, `echo "¡Espero que estés disfrutando de PHP!\n";`, y `echo "Con cariño, Sebastian";`

Con nuestra función `greetLearner()` definida, podremos invocar la función varias veces e imprimir esas cadenas sin tener que copiar o volver a escribir las tres declaraciones `echo` una y otra vez.

Algunas notas sobre las convenciones de nomenclatura: normalmente escribimos mayúsculas y minúsculas (palabras separadas con guiones bajos) nuestros nombres de variables, pero, para distinguir fácilmente la diferencia entre variables y funciones en nuestro código, haremos algo diferente al nombrar funciones. Usaremos mayúsculas y minúsculas para nuestros nombres de funciones: comenzaremos con una letra minúscula y luego escribiremos con mayúscula la primera letra de cada palabra nueva: `camelCase` vs. `snake_case`. Otra buena práctica es nombrar funciones de una manera que describa lo que hacen; por lo general, comenzaremos los nombres de las funciones con un verbo.

----

# Invocando funciones

En nuestra última lección, vimos que cuando definimos una función, las instrucciones dentro del bloque de código no se ejecutan. La definición de una función solo le dice a la computadora que asocie un nombre con un conjunto de instrucciones. Para ejecutar realmente este código, necesitaremos _invocar_ o _llamar_ a la función. Invocar una función es el proceso de usar una función que se ha definido. Veamos un ejemplo:

````
function greetLearner()
{
  echo "¡Hola, aprendiz!\n";
  echo "¡Espero que estés disfrutando de PHP!\n";
  echo "Con cariño, Sebastian";
}

greetLearner ();
/ *
Imprime:
¡Hola, aprendiz!
¡Espero que estés disfrutando de PHP!
Con cariño, Sebastian
* /
````

Debajo de la definición de nuestra función `greetLearner`, invocamos la función escribiendo su nombre seguido de un paréntesis de apertura y cierre (`()`). Esto le dice a la computadora que tome las instrucciones especificadas en la definición de la función y las ejecute.

Cuando se hace referencia a funciones fuera del código o en los comentarios, es convencional referirse a ellas por su nombre seguido de paréntesis (por ejemplo, `greetLearner()`), por lo que lo haremos a partir de ahora.

----

# Declaraciones de devolución

A medida que creamos funciones más complicadas, a menudo las usaremos para procesar datos. Para que los datos sean útiles, las funciones tienen la capacidad de devolver un valor además de realizar instrucciones. Veamos un ejemplo:

````
function countdown()
{
   echo "4, 3, 2, 1";
   return "despegue!";
}
````

Cuando se invoca la función `countdown()`, imprimirá `4, 3, 2, 1`, pero ¿qué pasa con la cadena "despegue!"? Este valor será _devuelto_. Tenemos muchas opciones sobre qué hacer con un valor devuelto. Por ejemplo, podríamos capturarlo en una variable:

````
$return_value = contdown(); // Imprime: 4, 3, 2, 1,
echo $return_value; // Imprime: ¡despegue!
````

Este ejemplo es un poco tonto, ya que podríamos haber impreso la cadena dentro de la función, pero, a medida que continuamos creando funciones más complicadas, la capacidad de devolver un valor será extremadamente útil.

----

# Más sobre declaraciones de devolución

La palabra clave `return` detiene inmediatamente una función. Esto significa que no se ejecutará ningún código después de _return_.

Comparemos dos funciones diferentes: `announceRunning()` y `announceRunning2()`. El primero de ellos se define de la siguiente manera:

````
function announceRunning()
{
  echo "La primera función se está ejecutando!\n";
  return "Este es el valor de retorno de la primera función";
}

$first_result = announRunning();
echo $first_result;
````

Veamos el código anterior:

+ Definimos la función `announceRunning()`.
+ A continuación, definimos la variable `$first_result` y asignamos como su valor el resultado de invocar la función `announceRunning()`. Esto en realidad hizo dos cosas. Ejecutó la función haciendo que se imprimiera `"¡La primera función se está ejecutando!/n"`. También asignó "Este es el valor de retorno de la primera función". a `$first_result`.
+ Finalmente, imprimimos  `$first_result`.

Eso pareció funcionar como se esperaba. En nuestra terminal vimos:

````
¡La primera función se está ejecutando!
Este es el valor de retorno de la primera función.
````

Comparemos eso con el siguiente ejemplo:

````
función announceRunning2()
{
  return "Este es el valor de retorno de la segunda función";
  echo "PD, te quiero";
}

$second_result = announceRunning2();
echo $second_result;
````

En este ejemplo, la cadena `"PD, te quiero"` nunca se imprimirá. Tan pronto como se llegue a la declaración `return`, la función finalizará. Entonces, en la terminal, veríamos esta salida:

````
Este es el valor de retorno de la segunda función.
````

----

# Valores de retorno

El valor devuelto por una función es solo eso: un valor. Esto significa que puede usarse de cualquier manera que normalmente usaríamos un valor de ese tipo. Esto puede llevar un tiempo acostumbrarse. Echa un vistazo al siguiente código:

````
function returnFive()
{
  return 5;
}

echo returnFive(); // Imprime: 5
````

En el código anterior definimos una función tonta, `returnFive()`; todo lo que hace es devolver el número `5`. Luego usamos `echo` para imprimir la función invocada. La forma en que la computadora ejecuta las funciones y maneja sus retornos puede llevarse a acostumbrarse, pero es muy similar a lo que experimentamos con los números y las variables:

````
echo 5 + 3; // Imprime: 8

$num = 5;

echo $num + 3; // Imprime: 8

echo returnFive() + 3; // Imprime: 8
````

Una computadora evalúa `5 + 3` a `8`. De la misma manera, cuando una computadora encuentra una invocación de función, ejecutará el código en el cuerpo de la función y luego evaluará el valor devuelto de la función. Necesitamos pensar en las funciones como lo que hacen (las instrucciones en su bloque de código) y lo que _devuelven_.

----

# Devolviendo NULL

¿Qué pasa con las funciones sin declaracione `return`? Cualquier función sin `return` devuelve un valor especial `NULL`. `NULL` es un tipo de datos especial que representa la ausencia de un valor.

````
function returnNothing()
{
   echo "¡Estoy corriendo! ¡Estoy corriendo!\n";
}

$result = returnNothing(); // Imprime: !Estoy corriendo! ¡Estoy corriendo!

echo $result; // No se imprime nada
````

Veamos el código anterior:

+ Definimos una función `returnNothing()` - la función `returnNothing()` imprime `"¡Estoy corriendo! ¡Estoy corriendo!\n"` pero no tiene una declaración de retorno.
+ Definimos la variable `$result` y le asignamos el valor devuelto cuando invocamos `return_nothing()`.
+ Ya que invocamos la función, `!Estoy corriendo! ¡Estoy corriendo!` es impresa.
+ Debido a que la función no tiene una declaración de devolución, el valor asignado a `$result` es `NULL`
+ Finalmente, imprimimos la variable `$result`, pero, dado que su valor es `NULL`, no se imprime nada.

----

# Parámetros

Las funciones que hacen exactamente lo mismo cada vez que se ejecutan pueden evitar que tengamos que repetir el código en nuestros programas, pero las funciones pueden hacer más.

Al comienzo de esta lección, escribimos una función `greetLearner()` que imprime el mismo saludo amigable cada vez que se invoca. Está bien... suponemos... Pero lo que realmente nos gustaría es imprimir un saludo personalizado. ¡Podemos lograr esto usando parámetros!

Cuando definimos una función, también podemos definir parámetros. Un _parámetro_ es una variable que sirve como marcador de posición en todo el bloque de código de la función. Cuando se invoca la función, se invoca con un valor específico. A medida que la computadora ejecuta la función, reemplaza cada aparición del parámetro con el valor que se pasó. El valor real que se pasa se conoce como _argumento_.

Veamos un ejemplo:

````
function sayCustomHello($name)
{
echo "¡Hola, $name!";
};

sayCustomHello ("Aisle Nevertell"); // Imprime: ¡Hola, Aisle Nevertell!

sayCustomHello ("aprendiz de PHP"); // Imprime: ¡Hola, aprendiz de PHP!
````

En el código anterior, definimos la función `sayCustomHello()`. Tiene un parámetro `$name`. Invocamos la función dos veces:

+ La primera vez, pasamos en `"Aisle Nevertell"` como argumento. Durante esa invocación, la función asignó `"Aisle Nevertell"` a `$name`, así que `¡Hola, Aisle Nevertell!` Fue impreso.
+ La segunda vez que invocamos la función con el argumento `"Aprendiz de PHP"`, se le asignó ese valor a `$name` y `¡Hola, Aprendiz de PHP!` Fue impreso.

----

# Parámetros Múltiples

También podemos definir funciones con múltiples parámetros.

````
function divide($num_one, $num_two)
{
  return $num_one / $num_two;
};
````

En la función anterior, definimos la función `divide()`. Toma dos argumentos numéricos y devuelve el resultado de dividir el primer parámetro por el segundo. Veamos cómo invocamos esta función:

````
echo divide(12, 3); // Imprime: 4

echo divide(3, 12); // Imprime: 0.25
````

En el código de arriba:

+ Primero, imprimimos el valor devuelto al invocar nuestra función `divide()` con `12` y `3` como argumentos.
+ A continuación, imprimimos el valor devuelto al invocar nuestra función `divide()` con `3` y `12`.

Observe que el orden que pasamos en los argumentos decide a qué parámetros corresponden: el primer argumento que pasamos a `divide()` se asignará a `$num_one` y el segundo argumento a `$num_two`.

Invocar una función con menos argumentos de lo esperado dará como resultado un error:

````
function expectTwo($first, $second)
{
  return "lo que sea";
}

echo expectTwo("test"); // resultará en un error
````

----

# Parámetros predeterminados

Anteriormente escribimos una función `sayCustomHello()` que tomó un `$name` e imprimió un saludo personalizado. Si tratamos de invocar esta función sin un argumento, causaría un error; la función está diseñada para ejecutarse con un argumento, y no aceptará menos.

````
function sayCustomHello ($name)
{
  echo "¡Hola, $name!";
};

sayCustomHello(); // ¡Causa un error!
````

Podemos ser más flexibles acerca de los parámetros al definir nuestras funciones. Queremos imprimir `"¡Hola, [nombre pasado]!"` si se proporciona un argumento y `"¡Hola, viejo amigo!"` solo si no se pasa ningún argumento.

Podemos lograr esto proporcionando un valor predeterminado para el parámetro `$name`:

````
function greetFriend($name = "viejo amigo")
{
  echo "¡Hola, $name!";
};

greetFriend("Marvin"); // Imprime: ¡Hola, Marvin!

greetFriend (); // Imprime: ¡Hola, viejo amigo!
````

En el código anterior, definimos la función `greetFriend()`. Tiene un parámetro `$name` con un valor predeterminado de "viejo amigo". Invocamos la función dos veces:

+ La primera vez, pasamos a `"Marvin"` como argumento. Durante esa invocación, la función asignó `"Marvin"` a `$name`, así que `¡Hola, Marvin!` Fue impreso.
+ La segunda vez invocamos la función sin argumento. Por lo tanto, el valor predeterminado de `"viejo amigo"` se asignó a `$name` y `¡Hola, viejo amigo!` Fue impreso.

----

# Pasar por referencia

Podemos invocar funciones con variables o con valores directamente. Cuando invocamos una función con una variable como argumento, es como si estuviéramos asignando el valor contenido por esa variable al parámetro de la función. Asignamos una _copia_ del valor contenido por la variable de argumento. El argumento variable y el parámetro son entidades distintas; Los cambios realizados dentro de la función en el parámetro no afectarán a la variable que se pasó:

````
function addX($param)
{
  $ param = $param. "X";
  echo $param;
};
$word = "Hola";
addX ($word); // Imprime: HolaX
echo $word; // Imprime: Hola
````

Veamos el código anterior:

+ Definimos una función `addX()` que reasigna `$param` a su valor anterior agregado con "X".
+ Definimos la variable `$word` y le asignamos el valor `"Hola"`.
+ Invocamos `addX()` con `$word` como argumento.
+ Durante la invocación de la función, se reasignó `$param` y la función imprimió `"HolaX"`.
Cuando imprimimos `$word` después de invocar la función, se mantuvo su valor original: `"Hola"`.

Si queremos hacer cambios permanentes en una variable dentro de una función, podemos anteponer el nombre del parámetro con el signo de referencia (`&`). De esta manera, asignamos el parámetro para que sea un alias para la variable de argumento. Ambos se referirán al mismo punto en la memoria, y los cambios en el parámetro dentro de la función afectarán permanentemente la variable de argumento.

````
function addXPermanently (&$param)
{
  $param = $param. "X";
  echo $param;
};
$word = "Hola";
addXPermanently ($word); // Imprime: HelloX
echo $word; // Imprime: HelloX
````

En la función `addXPermanently()` hicimos de `$param` una referencia al argumento. Cuando invocamos la función con `$word`, los cambios realizados en `$param` afectaron permanentemente la variable `$word`.

----

# Alcance de la variable

Pasar argumentos a una función y devolver valores es una forma clara de definir la interfaz entre la función y el resto del código. Este es el método preferido para intercambiar información dentro de un programa, ya que es sencillo ver los datos de los que depende una función de la lista de parámetros de funciones.

Considere la siguiente función. Devuelve una cantidad de días restantes de alimentación según la cantidad de pollos y la velocidad a la que la consumen.

````
function CalculateDaysLeft($feed_quantity, $number, $rate)
{
  $result = $feed_quantity / ($number * $rate);
  return $result;
}
echo CalculateDaysLeft(300, 2, 30);
````

Puede ver de inmediato que esta función depende de tres datos para proporcionar una respuesta:

+ `$feed_quantity`
+ `$number`
+ `$rate`

También hacemos `echo` de lo que devuelve la función, en lugar de una variable desde el interior de la función. Si intentamos:

````
echo $result;
````

fuera de la función, arrojaría un error (`undefined variable`). Esto se debe al _alcance_ variable. Cada función tiene su propio _alcance local_. Esto significa que solo se puede acceder a cualquier variable definida dentro del bloque de código de la función dentro del bloque de código.

Sin embargo, si muchas funciones dependen de la misma información, puede ser beneficioso tener una variable a la que se pueda acceder desde cualquier lugar sin tener que pasarla. Para hacer esto, tenemos que usar la palabra clave `global` para decirle a PHP que busque en el _alcance global_ para la variable, en lugar del alcance local de la función.

````
$feed_quantity = 300;
function CalculateDaysLeft($number, $rate)
{
  global $feed_quantity;
  $result = $feed_quantity / ($number * $rate);
  return $result;
}
echo CalculateDaysLeft(2, 120);
````

Cuando se usa este patrón, se vuelve un poco más difícil determinar de qué información depende esta función. Asegúrese de considerar esta compensación al implementar sus propias funciones.

Tenga en cuenta que la palabra clave `global` no se utiliza al invocar funciones. Una vez que se ha definido una función, se puede usar dentro del mismo bloque de código o incluso dentro de otros bloques de código de función. Este código imprimirá "¡Esto funciona!" En la consola.

````
function first()
{
  echo "¡Esto funciona!\n";
}
function second()
{
  first();
}
second();
````
----

# Repaso

¡Gran trabajo! Repasemos lo que cubrimos en esta lección:

+ Podemos empaquetar un conjunto de instrucciones dentro de una _función_ con nombre para reutilizar cuando lo deseemos.
+ Cuando _invocamos_ una función, la computadora ejecutará el cuerpo de la función, especificado por el bloque de código que sigue a la lista de parámetros.
+ Las funciones pueden devolver un valor utilizando la palabra clave `return`; de lo contrario, devuelven `NULL`, lo que significa que no hay valor.
+ Podemos almacenar el valor de retorno de una función en una variable o usarlo de cualquier otra manera que usaríamos un valor.
+ Podemos definir funciones con _parámetros_ que son variables a las que podemos referirnos en todo el cuerpo de nuestra función.
+ Al invocar funciones, los valores que les damos se llaman _argumentos_.
+ Las funciones pueden tener múltiples parámetros.
+ El orden en que se pasan los argumentos decide a qué parámetros corresponden.
+ Puede hacer que un argumento sea opcional proporcionando su parámetro correspondiente con un valor predeterminado.
+ Si antepone un parámetro con el signo de referencia (`&`), ese argumento se pasará por referencia.
+ Las variables dentro de las funciones tienen alcance local y no se puede acceder desde fuera de la función.
+ Use la palabra clave `global` para usar variables del alcance global dentro de una función.

![](https://s3.amazonaws.com/codecademy-content/courses/php-functions/php_functions_syntax.png)

----
[Próxima Lección](#)