## Matrices asociativas
# Introducción

Las matrices ordenadas son impresionantes cuando tenemos datos que se prestan a ser recopilados en una lista ordenada (indexada). Pero los datos se pueden recopilar y organizar de muchas maneras.

Imaginemos que deseamos una estructura de datos que contenga un montón de información sobre nosotros: nuestro nombre, edad, dirección de correo electrónico, fecha de nacimiento, número de documento y comida favorita. Queremos todos estos datos en una sola colección, pero no necesariamente en un orden particular. Y no tiene mucho sentido acceder a estos elementos de datos utilizando índices, como en una matriz ordenada. Sería difícil recordar, por ejemplo, que el índice `0` corresponde a nuestro nombre.

Es hora de conocer otro concepto fundamental en informática: el mapa. Un _mapa_ asocia claves con valores. Una clave es una cadena o un entero que utilizamos para acceder a un valor (de cualquier tipo). Podríamos crear un mapa con una clave `"nombre completo"` que apunte a un valor de `"Aisle Nevertell`"; esto es mucho más comprensible que asociar el nombre con el índice `0`. Siempre que necesitemos acceder a un valor, podremos usar la clave asociada para encontrarlo.

¡El tipo de matriz PHP con el que hemos estado trabajando se implementa realmente como un mapa! En una matriz ordenada de PHP, las ubicaciones de índice son las claves. Pero el tipo de matriz PHP también nos permite construir estructuras similares a mapas más tradicionales donde asignamos claves significativas a los valores (en oposición a los índices). Llamamos a estructuras de datos como estas _matrices asociativas_.

![](https://s3.amazonaws.com/codecademy-content/courses/learn-javascript-objects/javascript_illo.svg)

----

# Matrices asociativas

Las _matrices asociativas_ son colecciones de pares _clave => valor_. La clave en una matriz asociativa debe ser una cadena o un número entero. Los valores retenidos pueden ser de cualquier tipo. Usamos el operador `=>` para asociar una clave con su valor.

![Pares clave / valor](https://s3.amazonaws.com/codecademy-content/courses/learn-javascript-objects/key+value.svg)

Podemos pensar que las claves _apuntan_ a sus valores, ya que la clave apunta a la computadora al espacio en la memoria donde se almacena el valor.

````
$my_array = ["panda" => "muy lindo", "lagarto" => "lindo", "cucaracha" => "no muy lindo"];
````

En el código anterior, creamos una matriz asociativa utilizando una sintaxis de matriz corta. `$my_array` tiene tres pares _clave => valor_:

+ La clave `"panda"` apunta al valor `"muy lindo"`.
+ La clave `"lagarto"` apunta al valor `"lindo"`.
+ La clave `"cucaracha"` apunta al valor `"no muy lindo"`.

También podemos construir matrices asociativas usando la función PHP `array()`.

````
$about_me = array (
    "fullname" => "Aisle Nevertell",
    "dni" => 123456789
);
````

En el código anterior, creamos una matriz asociativa, `$about_me`, con dos pares _clave => valor_:

+ La clave `"fullname"` apunta al valor `"Aisle Nevertell"`.
+ La clave `"dni"` apunta al valor `123456789`.

----

# Impresión de matrices asociativas

Al igual que con las matrices ordenadas, usar `echo` para imprimir una matriz asociativa completa no es muy útil:

````
$grados = [
     "Jane" => 98,
     "Lily" => 74,
     "Dan" => 88,
];

echo $grados; // Imprime: matriz
````

Podemos combinar cada uno de los valores contenidos por la matriz en una sola cadena y usar `echo` para imprimir eso:

````
echo implode(",", $grados); // Imprime: 98, 74, 88
````

Un problema con esta técnica es que solo muestra los valores. No vemos las claves en la matriz o las relaciones entre las claves y los valores. Para mostrar esta información, podemos usar la función incorporada `print_r()`:

````
print_r($grados);
````

El código anterior producirá el siguiente resultado:

````
Array
(
     [Jane] => 98
     [Lily] => 74
     [Dan] => 88
)
````

----

# Accediendo y Agregando Elementos

Accedemos al valor que un punto clave dado utiliza entre corchetes (`[]`):

````
$my_array = ["panda" => "muy lindo", "lagarto" => "lindo", "cucaracha" => "no muy lindo"];
echo $my_array ["panda"]; // Imprime: muy lindo
````

En el código anterior, accedimos al valor `"muy lindo`" usando su clave, `"panda"`.

Para agregar nuevos elementos a una matriz asociativa, utilizamos el operador de asignación (`=`):

````
$my_array["capibara"] = "más lindo";
echo $my_array["capibara"]; // Imprime: más lindo
````

En el código anterior, agregamos un cuarto par de valores clave a la matriz. Accedimos al nuevo valor `"más lindo"` con su clave `"capibara"` y lo imprimimos con `echo`.

La computadora trata el código entre corchetes como una expresión, de modo que el código se evaluará antes de acceder a la matriz. Esto nos permite usar variables, funciones y operadores dentro de los corchetes:

````
$favourites = ["favorite_food" => "pizza", "favorite_place" => "my dreams", "FAVORITE_CASE" => "CAPS", "favorite_person" => "me" ";

echo $favourites ["favorito". "_". "comida"];
// Imprime: pizza

$clave = "lugar_ favorito";
echo $favoritos [$clave];
// Imprime: mis sueños

echo $favoritos[strtoupper("favorite_case")];
// Imprime: MAYÚSCULAS
````

----

# Cambio y eliminación de elementos

La misma sintaxis que agrega nuevos elementos de matriz se puede utilizar para cambiar los elementos existentes:

````
$new_arr = ["first" => "¡Soy el primero!", "second" => "¡Soy el segundo!"];

$new_arr ["third"] = "¡Soy el tercero!";

echo $new_arr["third"]; // Imprime: ¡Soy el tercero!

$new_arr["third"] = "¡Soy el *NUEVO* tercero!";

echo $new_arr ["tercero"]; // Imprime: ¡Soy el * NUEVO * tercero!
````

En el código anterior, usamos la misma sintaxis para agregar un par _clave => valor_ (`"tercero"` =>` "¡Soy el tercero!"`) Como para asignar a esa clave un nuevo valor (`"tercero"` => `"¡Soy el *NUEVO* tercero!"`).

Dado que PHP nos permitirá agregar un nuevo par _clave => valor_ _o_ cambiar un valor existente usando exactamente el mismo código, tendremos que tener precaución para evitar sobrescribir accidentalmente un valor existente.

Podemos eliminar un par _clave => valor_ completamente usando [la función PHP `unset()`](https://www.php.net/manual/en/function.unset.php). Nota: si la clave utilizada no existe en la matriz, no pasa nada.

````
$nums = ["one" => 1, "two" => 2];

echo implode(",", $ nums); // Imprime: 1, 2

unset($nums["one"]);

echo implode(",", $ nums); // Imprime: 2
````

En el código anterior, creamos una matriz asociativa con dos pares _clave => valor_. Luego eliminamos el par `"one"` => `1` usando la función `unset()`.

----

# Claves numéricas

Las matrices asociativas pueden usar enteros como claves, además de cadenas.

````
$num_array = [1000 => "mil", 100 => "cien", 600 => "seiscientos"];
echo $num_array [1000]; // Imprime: mil
````

Cuando construimos matrices ordenadas en PHP, la asociación con claves numéricas a los valores se realiza automáticamente. El primer elemento está asociado con la tecla 0, el segundo con 1, y así sucesivamente. Pero las matrices ordenadas siguen siendo la misma estructura que las matrices asociativas. Podemos mezclar y combinar:

````
$ordenado = [99, 1, 7, 8];
$ordenado ["especial"] = "¡Genial!";
echo $ordenado [3]; // Imprime: 8
echo $ordenado ["especial"]; // Imprime: ¡Genial!
````

Cuando agregamos un elemento a una matriz sin especificar una clave (por ejemplo, usando `array_push()`), PHP lo asociará con la clave entera "siguiente". Si no se han utilizado claves enteras, la asociará con la clave `0`; de lo contrario, la asociará una más que el entero más grande utilizado hasta ahora. Este comportamiento es el mismo si la matriz se usa como una matriz ordenada o una matriz asociativa. Veamos un ejemplo:

````
$num_array = [1000 => "mil", 100 => "cien", 600 => "seiscientos"];
$num_array [] = "Nuevo elemento en \$num_array";
echo $num_array [1001]; // Imprime: Nuevo elemento en $num_array

$animals_array = ["panda" => "muy lindo", "lagarto" => "lindo", "cucaracha" => "no muy lindo"];
array_push($animals_array, "Nuevo elemento en \$animals_array");
echo $animals_array[0]; // Imprime: Nuevo elemento en $ animals_array
````

Aunque las matrices asociativas y las ordenadas son técnicamente las mismas, recomendamos tratarlas como tipos de datos separados. Utilice solo la sintaxis de corchetes vacíos (o funciones como `array_push()`) con matrices ordenadas.

----

# Uniendo matrices

PHP también nos permite combinar matrices. El operador union (`+`) toma dos operandos de matriz y devuelve una nueva matriz con cualquier clave única de la segunda matriz añadida a la primera matriz.

````
$my_array = ["panda" => "muy lindo", "lagarto" => "lindo", "cucaracha" => "no muy lindo"];
$more_rankings = ["capibara" => "más lindo", "lagarto" => "no lindo", "perro" => "belleza máxima"];
$animal_rankings = $my_array + $more_rankings;
````

Los `$animal_rankings` que creamos anteriormente tendrán cada uno de los pares _clave => valor_ de `$my_array`. Además, contendrá los pares _clave => valor_ de `$more_rankings`: `"capibara"` => `"más lindo"` y `"perro"` => `"belleza máxima"`. Sin embargo, dado que `"lagarto"` no es una clave única, `$animal_rankings["lagarto"]` retendrá el valor de `$my_array["lagarto"]` (que es "lindo").

El operador unión puede ser un poco complicado... considere la siguiente unión:

````
$number_array = [8, 3, 7];

$string_array = ["primer elemento", "segundo elemento", "tercer elemento"];

$union_array = $number_array + $string_array;
````

¿Qué valores tiene `$union_array`? Tiene los elementos `8`, `3` y `7`. Dado que las dos matrices que se unen tienen claves idénticas (`0`, `1` y `2`), no se incluyen valores de la segunda matriz, `$string_array`, en `$union_array`.

----

# Asignar por valor o por referencia

Hay dos formas de asignar una variable a otra:

+ Por valor: esto crea dos variables que contienen copias del mismo valor pero siguen siendo entidades independientes.
+ Por referencia, esto crea dos nombres de variables (alias) que apuntan al mismo espacio en la memoria. ¡No se pueden modificar por separado!
Esto sigue siendo cierto cuando se trata de variables de matriz:

````
$favoritos = ["comida" => "pizza", "persona" => "yo mismo", "perro" => "Pipo"];
$copia = $favoritos;
$alias =& $favoritos;
$favourites ["food"] = "¡NUEVO!";

echo $favoritos ["comida"]; // Imprime: ¡NUEVO!
echo $copy ["comida"]; // Imprime: pizza
echo $alias ["comida"]; // Imprime: ¡NUEVO!
````

Al pasar matrices a funciones, tanto las funciones integradas como las que escribimos nosotros mismos, debemos ser conscientes de si las matrices se pasan por valor o por referencia.

````
function changeColor ($arr)
{
  $arr["color"] = "rojo";
}
$objeto = ["forma" => "cuadrado", "tamaño" => "pequeño", "color" => "verde"];
changeColor($objeto);
echo $objeto["color"]; // Imprime: verde
````

Nuestra función anterior no acepta su argumento de matriz por referencia. Por lo tanto, a `$arr` simplemente se le asigna una copia del valor del argumento. Esta matriz de copia cambia cuando se invoca la función, pero eso no afecta la matriz de argumento original (`$objeto`). Para hacer eso, deberíamos pasarlo por referencia:

```` 
function reallyChangeColor (&$arr)
{
  $arr["color"] = "rojo";
}
$objeto = ["forma" => "cuadrado", "tamaño" => "pequeño", "color" => "verde"];
reallyChangeColor ($objeto);
echo $objeto ["color"]; // Imprime: rojo
````

----

# Repaso

¡Aprendiste mucho en esta lección! Revisemos:

+ Las _matrices asociativas_ son estructuras de datos en las que las cadenas o _claves_ enteras están asociadas con _valores_.
+ Usamos el operador `=>` para asociar una clave con su valor. `$my_array = ["panda" => "muy lindo"]`
+ Para imprimir las claves de una matriz y sus valores, podemos usar la función `print_r()`.
+ Accedemos al valor asociado con una clave dada usando corchetes (`[]`). Por ejemplo: `$my_array["panda"]` devolverá `"muy lindo"`.
+ Podemos asignar valores a las teclas usando esta misma sintaxis de indexación y el operador de asignación (`=`): `$my_array["dog"] = "good cuteness";`
+ Esta misma sintaxis se puede usar para cambiar elementos existentes. `$my_array["dog"] = "ternura máxima";`
+ Podemos eliminar un par _clave => valor_ completamente usando la función PHP `unset()`.
+ Las claves pueden ser enteros. De hecho, las matrices ordenadas son solo matrices en las que se han asignado automáticamente claves enteras a los valores.
+ En PHP, las matrices asociativas y las matrices ordenadas son usos diferentes del mismo tipo de datos.
+ El operador union (`+`) toma dos operandos de matriz y devuelve una nueva matriz con cualquier clave única de la segunda matriz añadida a la primera matriz.
+ Al escribir la función con parámetros de matriz, podemos pasar la matriz por valor o por referencia dependiendo de nuestra intención.

¡Impresionante trabajo!

----
[Próxima Lección](https://github.com/sebastiantorres86/curso-php/blob/master/presupuesto-de-bob/presupuesto-de-bob.md)