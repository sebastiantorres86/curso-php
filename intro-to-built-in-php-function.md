# Trabajando con variables

PHP incluye funciones útiles incorporadas para obtener información sobre variables. [La función `gettype()`](https://www.php.net/manual/en/function.gettype.php) toma una variable como argumento y devuelve un valor de cadena que representa el tipo de datos del argumento.

````
$name = "Aisle Nevertell";
$age = 1000000;

echo gettype ($name); // Imprime: string

echo gettype ($age); // Imprime: integer
````

Tenga en cuenta que nosotros no escribimos una definición para la función      `gettype()`, está integrada en PHP. Dado que la función está incluida dentro del lenguaje en sí, podemos llamarla en cualquier lugar dentro de nuestro código PHP.

¡Echemos un vistazo a otra función incorporada! [La función `var_dump()`](https://www.php.net/manual/en/function.var-dump.php) también toma un argumento variable. Imprime detalles sobre el argumento que recibe.

````
var_dump($name); // Imprime: string(15) "Aisle Nevertell"

var_dump($age); // Imprime: int(1000000)
````

En el código anterior, primero usamos `var_dump()` para imprimir información sobre la variable `$name.string(15)` —el tipo y la longitud de la variable— se imprimieron seguidos por el valor contenido por la variable.

Luego, usamos `var_dump()` para imprimir información sobre la variable `$age`. Aquí, el entero se imprime entre paréntesis.

A medida que aprendamos más tipos de datos, especialmente tipos de datos cada vez más complejos, veremos cuán útiles pueden ser estas dos funciones.

----

# Funciones de cadena

Podemos encontrar funciones integradas de PHP para realizar tareas comunes. ¿Necesitas invertir una cadena? ¡Hay una función incorporada para eso!

La [función `strrev()`](https://www.php.net/manual/en/function.strrev.php) toma una cadena como argumento y devuelve una cadena con todos los caracteres de la cadena original en orden inverso.

Veámoslo en acción:

````
echo strrev("¡Hola, mundo!"); // Imprime:!odnum ,aloH¡
````

Recuerde que podemos usar los valores devueltos por las funciones directamente (en lugar de guardarlos en variables). En el código anterior, usamos `echo` para imprimir el valor devuelto al invocar la función `strrev()` con la cadena `"¡Hola, mundo!"` como argumento

PHP también viene con funciones integradas para cambiar la capitalización de una cadena. Podemos usar la [función `strtolower()`](https://www.php.net/manual/en/function.strtolower.php) para transformar una cadena de argumento en todas las letras minúsculas:

````
echo strtolower("HoLa"); // Imprime: hola
````

Las funciones incorporadas a menudo tienen múltiples parámetros. La [función `str_repeat()`](https://www.php.net/manual/en/function.str-repeat.php) toma una cadena como su primer argumento y un número como su segundo. Devuelve una cadena que contiene la cadena de argumento repetida el número de argumento varias veces.

````
echo str_repea("hola", 10); // Imprime: holaholaholaholaholaholaholaholaholahola
````

En el código anterior usamos `echo` para imprimir el valor devuelto de invocar `str_repeat()` con `"hola"` y `10` como argumentos: `"hihihihihihihihihihi"`.

----

# Trabajando con subcadenas

Una _subcadena_ es una porción de una cadena. Por ejemplo, `"hola"` es una subcadena de la cadena `"Oh, hola, ¿cómo estás?"` y `"ol"` es una subcadena de la cadena `"hola"`. La manipulación de cadenas es muy común en la programación, y a menudo es necesario trabajar con subcadenas.

La [función `substr_count()`](https://www.php.net/manual/en/function.substr-count.php) devuelve el número de instancias de una subcadena dentro de una cadena. Se necesitan dos argumentos, la cadena para buscar _por dentro_, a veces llamado _el pajar_, y el hilo para buscar, a veces llamado _la aguja_.

````
$story = "Estaba como," Amigo, solo dime lo que te gusta pensar porque como todos los demás es como ser totalmente honesto, y solo quiero saber lo que te gusta pensar. "Así que no saber...";

echo substr_count($story, "lo"); // Imprime: 5
````

En el código anterior, invocamos la función `substr_count()`, pasando `$story` como el pajar y `"lo"` como la aguja. Usamos `echo` para imprimir el resultado devuelto: `5`, que es el número de veces que aparece la subcadena `"lo"` en la cadena `$story`.

----

# Funciones numéricas

Otra tarea común en la programación es trabajar con números, por lo que no debería sorprendernos que PHP venga con algunas funciones integradas útiles para trabajar con números.

La [función `abs(`)](https://www.php.net/manual/en/function.abs.php) devuelve el valor absoluto de su argumento numérico:

````
echo abs(-10.99); // Imprime: 10,99

eco abs (127); // Imprime: 127
````

Otra función útil es la [función `round()`](https://www.php.net/manual/en/function.round.php) que devuelve el entero más cercano a su argumento numérico:

````
echo round(1.2); // Imprime: 1

echo round(1.5); // imprime: 2

echo round(1298736.821763876); // Imprime: 1298737
````

----

# Generando números aleatorios

La generación de números aleatorios puede no parecer obviamente útil, pero, a medida que sus programas se vuelven cada vez más complicados, verá que en realidad es una tarea común, por ejemplo, aleatorizar datos para pruebas.

La función `rand()` devuelve un entero aleatorio. Tenemos cierta flexibilidad con la forma en que lo invocamos. Invocar `rand()` sin argumentos devolverá un número entre 0 y el número más grande que permitirá nuestro entorno actual; Esta es una peculiaridad de PHP. Podemos averiguar cuál es este número invocando una función incorporada diferente, `getrandmax()`:

````
$max = getrandmax();

echo $ max;

echo rand(); // Imprime un número entre 0 y $max
```` 

En el código anterior, asignamos el mayor entero aleatorio posible a la variable `$max` invocando la función `getrandmax()`.

Luego, usamos `echo` para imprimir un entero aleatorio. Este entero será un número entre 0 y `$max`.

Las funciones a menudo tienen una definición estricta que dicta exactamente con qué argumentos espera ser invocada y, de lo contrario, da como resultado un error. La función `rand()`, sin embargo, es algo flexible.

Si queremos tener más control sobre el número aleatorio que generamos, podemos invocar la función `rand()` con dos argumentos enteros que representan el número aleatorio más pequeño permitido y el número aleatorio más grande permitido. Dato curioso: el segundo argumento proporcionado puede ser mayor que `getrandmax()`. Estos números son inclusivos, lo que significa que los argumentos que pasamos podrían ser generados por la función.

````
echo rand (1, 2); // Imprime 1 o 2

echo rand (5, 10); // Imprime un número entre 5 y 10 (inclusive)

echo rand (1, 100); // Imprime un número entre 1 y 100 (inclusive)
````

----

# Documentación

Con el fin de comprender las funciones integradas que nunca antes habíamos usado, querremos entender cómo están representadas en la documentación. La documentación generalmente incluye:

+ El nombre de la función.
+ Las versiones del lenguaje PHP en las que está disponible la función.
+ Una descripción general de cómo funciona la función.
+ Detalles adicionales sobre los parámetros y el valor de retorno.
+ Ejemplos de la función en uso.
+ Comentarios de los usuarios que explican más las características de la función.

La sección de descripción puede ser confusa, por lo que lo desglosaremos.

Aquí está la descripción de la función `abs()`:

**`abs ( mixed $number ) : number`**

Aquí vemos el nombre de la función seguido de paréntesis. Los paréntesis contienen información sobre los parámetros de la función, primero el tipo de parámetro seguido de su nombre. El parámetro para `abs()` tiene el tipo mixto porque hay varios tipos de datos que la función aceptará (un entero o un flotante). El parámetro para `abs()` se llama `$number`. Después de los paréntesis hay dos puntos (`:`) seguidos de `number`; Este es el tipo de datos que devolverá la función.

Una función que imprime algo pero no devuelve un valor tendrá `:void` (nulo) en lugar de un tipo de retorno. Del mismo modo, una función que no acepta parámetros tendrá `void` entre paréntesis.

Veamos un ejemplo más complicado. Aquí está la descripción de la función `substr_count()`:

**`substr_count ( string $haystack , string $needle [, int $offset = 0 [, int $length ]] ) : int`**

Anteriormente en esta lección, invocamos `substr_count()` con solo los dos parámetros de cadena (`$haystack` y `$needle`). Pero las funciones pueden tener parámetros opcionales. Esto significa que trabajarán con o sin ellos. Estos parámetros están entre corchetes (`[]`) en la descripción de la función. Un parámetro opcional puede tener un _valor predeterminado_, este es el valor que se utilizará si no se pasa ningún argumento a la función. El valor predeterminado se indica con un signo igual (`=`).

La función `substr_count()` acepta dos argumentos enteros adicionales: `$offset` y `$length`. `$offset` tiene un valor predeterminado de `0`. Eche un vistazo a [la documentación](https://www.php.net/manual/en/function.substr-count.php) y vea si puede averiguar qué hacen.

----

# Encontrar funciones

Para conocer las funciones integradas (y otras características del lenguaje), querrá sentirse cómodo explorando la [documentación de PHP](https://www.php.net/manual/en/langref.php). Los documentos pueden ser un poco abrumadores; por ejemplo, [este índice aparentemente infinito de funciones PHP](https://www.php.net/manual/en/indexes.functions.php) es bastante difícil de manejar.

La documentación contiene algunas listas organizadas por tema: esta es una lista de [funciones de cadena PHP](https://www.php.net/manual/en/ref.strings.php) y esta es una [lista de funciones matemáticas](https://www.php.net/manual/en/ref.math.php).

A menudo es más rápido usar Google para navegar a la parte correcta de la documentación oficial ([php.net](https://www.php.net/manual/en/langref.php)). Por ejemplo, cuando busqué en Google "PHP absolute value", el primer resultado fue un enlace a [la función `abs()`](https://www.php.net/manual/en/function.abs.php) en la documentación de PHP.

----

# Repaso

En esta lección, aprendió que las funciones integradas son funciones proporcionadas por PHP. Aprendió sobre varias funciones integradas específicas, cómo comprender la descripción de una función en la documentación y cómo descubrir nuevas funciones integradas.

Solo hemos comenzado a arañar la superficie de todas las funciones integradas en el lenguaje PHP. A medida que continúe aprendiendo PHP, se encontrará con muchas funciones integradas útiles. Mientras escribe su propio código, si una tarea que está realizando se siente tediosa pero común, ¡verifique si hay una función incorporada que lo haga por usted!

Una nota final: a lo largo de esta lección, es posible que haya notado que las funciones integradas de PHP a menudo no siguen las convenciones de nomenclatura de funciones que describimos. Las funciones integradas de PHP no se nombran siguiendo una sola convención: algunas están en forma de serpiente, mientras que otras tienen palabras no separadas. Son peculiaridades como esta que pueden hacer que PHP sea un poco frustrante de aprender. Tenga paciencia consigo mismo mientras se sienta cómodo con las funciones integradas que le son más útiles, y no dude en buscar cosas.

----
[Próxima Lección](https://github.com/sebastiantorres86/curso-php/blob/master/guia-del-autoestopista/guia-del-autoestopista.md)
