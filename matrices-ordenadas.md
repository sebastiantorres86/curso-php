## MATRICES ORDENADAS

# Crear matrices con array()

Podemos construir matrices ordenadas con una [función PHP incorporada: `array()`](https://www.php.net/manual/en/function.array.php).

La función `array()` devuelve una matriz. Cada uno de los argumentos con los que se invocó la función se convierte en un elemento en la matriz (en el orden en que se pasaron).

Las matrices son más útiles cuando las almacenamos en variables. Creamos una variable de matriz de la misma manera que creamos variables de otros tipos de datos, con el operador de asignación.

````
$my_array = array(0, 1, 2);
````

En el código anterior, construimos una matriz usando la función `array()` que capturamos con la variable `$my_array`. `$my_array` es una matriz con tres elementos: `0` se encuentra en el índice 0, `1` en el primero y `2` en el segundo.

Las matrices PHP pueden almacenar elementos de cualquier tipo de datos:

````
$string_array = array("primer elemento", "segundo elemento");
````

En el código anterior, `$string_array` contiene dos elementos de cadena. La cadena `"primer elemento"` se encuentra en el índice de ubicación 0, y la cadena `"segundo elemento"` se encuentra en el 1er.

Las matrices PHP también pueden almacenar elementos de múltiples tipos de datos:

````
$mixed_array = array(1, "pollo", 78.2, "¡las burbujas están locas!");
````

Arriba, `$mixed_array` contiene cuatro elementos: algunos son cadenas mientras que otros son números.

Podemos usar la [función PHP incorporada `count()`](https://www.php.net/manual/en/function.count.php) para obtener el número de elementos en una matriz. Esto es especialmente útil ya que trabajamos con matrices más grandes y más complicadas:

````
echo count($my_array); // Imprime: 3
echo count($string_array); // Imprime: 2
echo count($mixed_array); // Imprime: 4
````

----

# Crear matrices con sintaxis corta

Además de usar `array()`, también podemos crear una matriz envolviendo elementos separados por comas entre corchetes (`[]`). Esta característica a veces se conoce como sintaxis de matriz corta y se parece más a lo que puede ver en otros lenguajes de programación.

````
$number_array = [0, 1, 2];
````

En el código anterior, creamos la variable `$number_array` y asignamos como su valor una matriz que contiene los números `0`, `1` y `2`. El número `0` se encuentra en el índice de ubicación 0, el número `1` en el primero y el número `2` y el 2do.

Comparemos el uso de la sintaxis de matriz corta con la invocación de la función `array()`:

````
$string_array = array("primer elemento", "segundo elemento");
$str_arr_short = ["primer elemento", "segundo elemento"];

$mixed_array = array(1, "pollo", 78.2, "¡las burbujas están locas!");
$mix_arr_short = [1, "pollo", 78.2, "¡las burbujas están locas!"];
````

Aquí, independientemente del método que utilizamos, obtuvimos los mismos resultados.

Al construir matrices, también podemos colocar cada elemento en su propia línea para que sea más fácil de leer:

````
$long_array = [
  1,
  2,
  3,
  4,
  5,
  6 
];
````

----

# Imprimiendo matrices

Dado que las matrices son un tipo de datos más complicado que las cadenas o los enteros, imprimirlos es un poco más difícil. Usar `echo` no tendrá el resultado deseado:

````
$number_array = [0, 1, 2];
echo $number_array; // Imprime: Array
````

Cuando intentamos usar echo para imprimir `$number_array`, imprimió la palabra "Array" en lugar del contenido de la matriz. Para imprimir el contenido de la matriz, podemos usar las funciones integradas de PHP. La [función incorporada `print_r()`](https://php.net/manual/en/function.print-r.php) genera matrices en un formato legible para humanos:

````
print_r($number_array);
````

Esto generará la matriz en el siguiente formato:

````
Array
(
    [0] => 0
    [1] => 1
    [2] => 2
)
````

Si simplemente queremos imprimir los elementos en la matriz de la lista, podemos convertir la matriz en una cadena usando la [función incorporada `implode()`](https://www.php.net/manual/en/function.implode.php). La función `implode()` toma dos argumentos: una cadena para usar entre cada elemento (el `$glue`), y la matriz a unir (las `$pieces`):

````
echo implode(", ", $number_array);
````

Esto generará el siguiente formato:

````
0, 1, 2
````

----

# Accediendo a un elemento

Se puede acceder a los elementos individuales de una matriz utilizando el nombre de la variable de matriz y el índice de ubicación rodeado de corchetes (`[]`), por ejemplo:

````
$my_array = ["tic", "tac", "toe"];

echo $my_array[1]; // Imprime: tac
````

Este proceso a veces se denomina _indexar_ una matriz.

Recuerde que la computadora _evalúa_ las variables que encuentra (fuera de la asignación): las reemplaza con los valores que contienen. Veamos un ejemplo de indexación de una matriz con una variable numérica:

````
$num_var = 2;

$important_info = ["pollo parlanchin", 181, "imanes?!", 99];

echo $important_info[$num_var]; // Imprime: imanes?!
````

----

# Agregar y cambiar elementos

Podemos hacer ajustes a las matrices existentes: no tenemos que crear una nueva matriz cuando queremos que nuestra matriz cambie.

Agregamos elementos al final de una matriz tomando el nombre de la variable y agregando corchetes (`[]`), el operador de asignación (`=`) y el elemento que queremos agregar:

````
$string_array = ["primer elemento", "segundo elemento"];

$string_array [] = "tercer elemento";

echo implode (",", $ string_array);
// Imprime: primer elemento, segundo elemento, tercer elemento
````

También podemos reasignar los elementos individuales en una matriz:

````
$string_array = ["primer elemento", "segundo elemento", "tercer elemento"];

$string_array [0] = "¡NUEVO! primer elemento diferente";

echo $string_array [0]; // Imprime: ¡NUEVO! primer elemento diferente"
````

En el código anterior, reemplazamos la cadena original contenida en la matriz (`"primer elemento`") con un nuevo valor de cadena: `"¡NUEVO! Primer elemento diferente"`.

----

# Más métodos de matriz: Pushing y Popping

En el ejercicio anterior, aprendimos cómo agregar elementos de matriz individuales y cambiar los elementos de matriz en un índice dado. PHP también nos proporciona métodos integrados para eliminar elementos de la matriz y para agregar muchos elementos a la vez.

La [función `array_pop()`](https://www.php.net/manual/en/function.array-pop.php) toma una matriz como argumento. Elimina el último elemento de una matriz y devuelve el elemento eliminado.

````
$my_array = ["tic", "tac", "toe"];
array_pop($my_array);
// $ my_array es ahora ["tic", "tac"]
$popped = array_pop($my_array);
// $popped es "tac"
// $my_array es ahora ["tic"]
````

Tenga en cuenta que `array_pop()` no solo establece el último elemento en `NULL`. En realidad, lo elimina de la matriz, lo que significa que la longitud de la matriz disminuirá en uno (lo que podemos verificar usando `count()`).

La [función `array_push()`](https://www.php.net/manual/en/function.array-push.php) toma una matriz como primer argumento. Los argumentos que siguen son elementos que se agregarán al final de la matriz. `array_push()` agrega cada uno de los elementos a la matriz y devuelve el nuevo número de elementos en la matriz.

````
$new_array = ["eeny"];
$num_added = array_push ($ new_array, "meeny", "miny", "moe");
echo $num_added; // Imprime: 4
echo implode (",", $ new_array); // Imprime: eeny, meeny, miny, moe
````

----

# Shifting y Unshifting

Vimos que `array_pop()` y `array_push()` tratan exclusivamente con el final de la matriz (el índice a la longitud de la matriz menos 1). PHP también proporciona funciones para agregar y eliminar elementos desde el comienzo de una matriz (índice 0).

La [función array_shift()](https://www.php.net/manual/en/function.array-shift.php) elimina el primer elemento de una matriz y devuelve ese valor. Cada uno de los elementos de la matriz se _desplazará_ hacia abajo un índice. Por ejemplo, el elemento que anteriormente estaba en el 3er índice ahora se ubicará en el 2do.

````
$adjetivos = ["malo", "bueno", "genial", "fantástico"];
$eliminado = array_shift ($adjetivos);
echo $eliminado; // Imprime: mal
echo implode(",", $adjetivos); // Impime: bueno, genial, fantástico
````

Al igual que `array_pop()`, `array_shift()` reduce la longitud de la matriz y el elemento eliminado desaparece para siempre.

La [función `array_unshift()`](https://www.php.net/manual/en/function.array-unshift.php) toma el primer argumento de una matriz. Los argumentos que siguen son elementos que se agregarán al comienzo de la matriz. Devuelve el nuevo número de elementos en la matriz.

````
$foods = ["pizza", "galletas", "manzanas", "zanahorias"];
$arr_len = array_unshift($foods, "pasta", "albóndigas", "lechuga");
echo $arr_len; // Imprime: 7
echo implode(",", $ comidas);
// Imprime: pasta, albóndigas, lechuga, pizza, galletas, manzanas, zanahorias
````

----

# Matrices Anidadas

Mencionamos que las matrices pueden contener elementos de cualquier tipo, ¡esto incluso incluye otras matrices! Podemos usar operaciones encadenadas para acceder y cambiar elementos dentro de una matriz anidada:

````
$nested_arr = [[2, 4], [3, 9], [4, 16]];
$first_el = $ nested_arr [0] [0];
echo $first_el; // Imprime: 2
````

Arriba, `$nested_arr` es una matriz con tres elementos de matriz. El primero, ubicado en el índice 0, es la matriz `[2, 4]`. La expresión `$nested_arr[0]` devuelve esa matriz. Luego indexamos el primer elemento de _esa_ matriz agregando un `[0]` adicional.

Esto puede tomar práctica para acostumbrarse. Una técnica útil es actuar como la computadora; evalúa cada parte de la expresión de izquierda a derecha. Al descomponer una expresión compleja en sus partes más simples, se vuelve más fácil de entender. Veamos juntos un ejemplo más complicado:

````
$very_nested = [1, "b", 33, ["cat", 6.1, [9, "¡PERDIDO!", 6], "mouse"], 7.1];
````

Queremos cambiar el elemento que actualmente está `"¡PERDIDO!"`. a `"¡Encontrado!"` Desglosemos los pasos:

+ Primero necesitamos la matriz más externa: `$very_nested[3]` se evalúa como la matriz `["cat", 6.1, [9, "¡PERDIDO!", 6], "mouse"]`
+ A continuación, necesitamos la matriz ubicada en el segundo índice de ubicación: `$very_nested[3][2]` se evalúa como matriz [9, "¡PERDIDO!", 6]
+ Y finalmente, el elemento que estamos buscando: `$very_nested[3][2][1]` se evalúa como `"¡PERDIDO!"`

````
$ very_nested [3] [2] [1] = "¡Encontrado!";
````

----

# Repaso

¡Cubrimos mucho en esta lección! Gran trabajo. Tómese un segundo para revisar todo lo que aprendió:

+ Las _matrices_ son colecciones ordenadas de datos que son un tipo de estructura de datos fundamental para la informática.
+ En PHP, nos referimos a esta estructura de datos como _matrices ordenadas_.
+ La ubicación de un elemento en una matriz se conoce como su _índice_.
+ Los elementos en una matriz ordenada se ordenan en orden numérico ascendente comenzando con el índice cero.
+ Podemos construir matrices ordenadas con una función PHP incorporada: `array()`.
+ Podemos construir matrices ordenadas con sintaxis de matriz corta, p. ej. `[1,2,3]`.
+ Podemos imprimir matrices usando la función incorporada `print_r()` o convirtiéndolas en cadenas usando la función `implode()`.
+ Utilizamos corchetes (`[]`) para acceder a los elementos de una matriz por su índice.
+ Podemos agregar elementos al final de una matriz agregando corchetes (`[]`) a un nombre de variable de matriz y asignando el valor con el operador de asignación (`=`).
+ Podemos cambiar elementos en una matriz usando la indexación de la matriz y el operador de asignación.
+ La función `array_pop()` elimina el último elemento de una matriz.
+ La función `array_push()` agrega elementos al final de una matriz.
+ La función `array_shift()` elimina el primer elemento de una matriz.
+ La función `array_unshift()` agrega elementos al comienzo de la matriz.
Podemos usar corchetes encadenados (`[]`) para acceder y cambiar elementos dentro de una matriz anidada.

----
[Próxima Lección](#)