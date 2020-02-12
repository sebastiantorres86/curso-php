## CADENAS Y VARIABLES PHP
# Cadenas

![cadenas](https://s3.amazonaws.com/codecademy-content/courses/php-strings-variables/PHP_m2l1e1.svg)

En las conversaciones cotidianas, usamos la palabra datos para referirnos a cualquier tipo de información. Esta información es a menudo una lista de números, como los gastos mensuales de una empresa o estadísticas sobre el rendimiento de un atleta. Sin embargo, en programación, los datos significan algo muy específico. Todavía es información, pero esa información toma la forma de algunos tipos específicos.

El lenguaje PHP tiene diferentes formas de manejar diferentes tipos de datos. Las acciones que puede realizar la computadora y cómo la computadora almacena los datos en la memoria variarán según el tipo. En esta lección, aprenderemos sobre el tipo de datos de _cadena_.

Las cadenas son palabras o fragmentos de texto que la computadora trata como un solo elemento. Una cadena es una secuencia de caracteres. Puede tener cualquier longitud y contener letras, números, símbolos o espacios entre comillas.

````
echo "Mi primera cadena"; // Imprime: Mi primera cadena
````

Es importante distinguir entre cadenas y el resto del código en un programa PHP. Cada parte de un programa es texto, pero las cadenas son las partes que pretendemos guardar como datos,no como instrucciones para ser ejecutadas por la computadora. En esta lección nos centraremos en las cadenas entre comillas dobles (si tiene curiosidad, puede consultar [la documentación oficial de PHP](http://php.net/manual/en/language.types.string.php) para ver otros tipos de cadenas de PHP).

En lecciones posteriores, usaremos PHP para crear documentos HTML personalizados que permitan páginas web dinámicas. Sin embargo, a medida que aprendamos los conceptos básicos, escribiremos programas simples de PHP que se ejecutan en el terminal.

----

# Secuencias de escape

Usamos comillas para indicar el inicio y el final de una cadena. Las comillas le dicen a la computadora que queremos que todo lo que contenga sea tratado como un solo dato. Pero, ¿cómo incluimos comillas dentro de una cadena?

Considere la siguiente secuencia: `"Ella dijo "hola" al perro."`

En el código anterior, las comillas alrededor de "hola" pretenden ser parte de la cadena, pero la computadora realmente verá dos cadenas `"Ella dijo "` y `" al perro."`. con hola en el medio. Como hola no será reconocido como PHP válido, se producirá un error:

````
echo "Ella dijo "hola" al perro."; //syntax error, unexpected 'hola' (T_STRING)
````

Para indicar qué comillas debe ver la computadora como instrucciones frente a las que debería ver simplemente como caracteres, PHP permite _secuencias de escape_. Una secuencia de escape generalmente consiste en una barra invertida (`\`) seguida inmediatamente por otro caracter.

````
echo "Ella dijo \"hola\" al perro."; // Imprime: Ella dijo "hola" al perro.
````

Las comillas no son el único símbolo que requiere una secuencia de escape. Cuando imprimimos varias cadenas, PHP las imprimirá en la misma línea por defecto:

````
echo "1. Ir al gimnasio";
echo "2. Cocinar la cena";
````

El código anterior generará  `1. Ir al gimnasio2. Cocinar la cena`. Para imprimir la segunda cadena en una nueva línea, podemos usar la secuencia de escape de nueva línea (`\n`):

````
echo "1. Ir al gimnasio";
echo "\n2. Cocinar la cena";
/ * Imprime
1. Ir al gimnasio
2. Cocinar la cena
* /
````

Aún no necesita preocuparse por otras secuencias de escape, pero si desea ver la lista completa, puede encontrar una en [la documentación de PHP](http://php.net/manual/en/language.types.string.php#language.types.string.syntax.double).

----

# Concatenación de cadenas

Puede ser útil combinar dos cadenas juntas. Este proceso se llama _concatenación de cadenas_, y podemos usar el operador de concatenación (`.`) Para hacer esto.

Un _operador_ es un caracter que realiza una tarea en nuestro código. La computadora tomará la secuencia a la izquierda del operador de concatenación, la combinará con la secuencia a la derecha y devolverá la secuencia individual resultante. Veamos un ejemplo de concatenación de cadenas:

````
echo "uno" . "dos"; // Imprime: unodos
````
Observe cómo se imprimió la cadena `"unodos"`. La computadora no hará suposiciones por nosotros: combinará las cadenas exactamente como están sin agregar espacios ni saltos de línea. Si queremos espacios, tendremos que agregar los espacios que queramos nosotros mismos. Aquí agregamos un espacio a la cadena `"uno "`:

````
echo "uno" . "dos"; // Imprime: uno dos
````
También podemos combinar o encadenar nuestras operaciones para obtener un resultado final:

````
echo "uno" . " " . "dos". " " . "tres"; // Imprime: uno dos tres
````

El operador de concatenación toma dos cadenas (los _operandos_) y produce una cadena como resultado (el valor de retorno). A medida que profundicemos en PHP, aprenderemos sobre otros tipos de operadores. La mayoría tomará uno o dos operandos, pero incluso hay uno que toma tres.

----

# Variables

Digamos que tengo una cadena muy larga en mi programa, y voy a necesitar usarla varias veces. ¿Tengo que escribir la cadena cada vez que necesito usarla? La respuesta es "no". Las variables son un concepto de programación fundamental diseñado para abordar esta preocupación. Con las variables, almacenamos valores para poder reutilizarlos fácilmente en un programa.

Antes de que podamos usar variables en nuestro código, necesitamos declararlas y asignarlas.

_Declarar_ una variable es el proceso de reservar una palabra, el _nombre de la variable_, al que podremos referirnos en nuestro código. Es una buena práctica nombrar la variable de una manera que describa los datos que contiene.

La _asignación_ es el proceso de asociar el nombre de esa variable con un valor específico para que cada vez que usemos el nombre de la variable, la computadora tome ese valor.

![](https://s3.amazonaws.com/codecademy-content/courses/php-strings-variables/PHP_m2l1e4n.gif)

![](https://s3.amazonaws.com/codecademy-content/courses/php-strings-variables/PHP_m2l1e4m.svg)

----

# Crear variables

Veamos un ejemplo de creación de una variable:

````
$my_name = "Aisle Nevertell";
````

En el código anterior, en realidad estamos haciendo dos cosas con una sola declaración: estamos _declarando_ una nueva variable dándole el nombre `my_name`. También le estamos _asignando_ el valor `"Aisle Nevertell"`. La variable `$my_name` ahora contiene el valor `"Aisle Nevertell"`.

Para declarar una variable, usamos el carácter de signo de dólar (`$`) seguido de nuestro nombre de variable elegido. El signo de dólar se conoce como _sigilo_; Es un caracter que permite que la computadora vea rápidamente que algo es una variable.

Para asignarle un valor, utilizamos otro operador: el operador de asignación (`=`) seguido del valor que le estamos asignando a la variable.

Aunque ocasionalmente puede ser útil separar estas acciones, con mayor frecuencia declararemos y asignaremos variables al mismo tiempo.

![](https://s3.amazonaws.com/codecademy-content/courses/php-strings-variables/PHP_m2l1e5.svg)

En PHP, los nombres de las variables pueden contener números, letras y guiones bajos (`_`), pero deben comenzar con una letra o un guión bajo. Los nombres de las variables distinguen entre mayúsculas y minúsculas, lo que significa que PHP tratará las variables `$my_example` y `$My_example` como dos variables diferentes.

Una convención común al nombrar variables PHP es usar un guión bajo entre palabras en nombres de variables con más de una palabra en su nombre. Esto se conoce como _snake case_:

 ````
$mood = ":)";
$favorite_food = "Curry rojo con berenjenas";
````
----

# Usando variables

Una vez que declaramos una variable y le asignamos un valor, podemos usarla tantas veces como queramos. Nos referimos a una variable usando el signo de dólar seguido del nombre de la variable.

````
$favorite_food = "Curry rojo con berenjenas, judías verdes y maní";
echo $favorite_food;
// Imprime: Curry rojo con berenjenas, judías verdes y maní
````

Excepto durante la asignación, cada vez que la computadora ve una variable en su código, reemplaza la variable con el valor asignado a esa variable.

````
$dog_name = "Pipo";
echo $dog_name;
// Imprime: Pipo
````

Dado que la computadora trata una variable como si fuera el valor que tiene, esto significa que podemos realizar operaciones en variables tal como lo haríamos con cualquier valor de ese tipo.

````
$dog_name = "Pipo";
echo "Mi perro se llama ". $dog_name;
// Imprime: mi perro se llama Pipo
````

En el código anterior, concatenamos la cadena `"Mi perro se llama "` al valor contenido en la variable `$dog_name` (`"Pipo"`). Veamos otro ejemplo que usa múltiples variables:

````
$dog_name = "Pipo";
$favorite_food = "salmón";
$color = "marrón";

echo "Tengo un " . $color . "perro llamado " . $dog_name. "y su comida favorita es " . $favorite_food . ".";
// Imprime: Tengo un perro marrón llamado Pipo y su comida favorita es el salmón.
````
----

# Procesamiento de variables

En la última lección, vimos cómo la concatenación de varias cadenas y variables de cadena se volvía molesta. ¡Hay una manera más fácil!

Las cadenas PHP nos permiten colocar variables directamente en cadenas dobles entre comillas. Estas variables se _procesarán_, lo que significa que la computadora leerá las variables como el valor que tienen en lugar de verlas solo como una secuencia de caracteres.

````
$dog_name = "Pipo";
$favorite_food = "salmón";
$color = "marrón";

echo "Tengo un perro $color llamado $dog_name y su comida favorita es $favorite_food";
// Impresiones: Tengo un perro marrón llamado Pipo y su comida favorita es el salmón.
````

El procesamiento de cadenas PHP es increíblemente útil. Siempre que PHP vea un signo de dólar (`$`) dentro de una cadena, asumirá que todos los caracteres al lado (hasta que llegue a un carácter que no se puede incluir en un nombre de variable) son parte del nombre de la variable.

A veces esto puede complicarse. Considere el siguiente ejemplo:

````
$toy = "frisbee";
echo "A Alex le gusta jugar con $toys";
````

El código anterior causará un error. ¿Por qué? La computadora estaba buscando la variable $toys y no pudo encontrar una.

¡No se asuste! PHP nos permite indicar específicamente el nombre de la variable envolviéndolo entre llaves para evitar confusiones. Incluiremos el signo de dólar seguido del nombre de la variable envuelto en llaves:

````
$dog_name = "Pipo";
$favorite_food = "golosina";
$color = "marron";

echo "Tengo un perro a${color}nado llamado $dog_name y su comida favorita son las ${favorite_food}s.";
// Imprime: Tengo un perro amarronado llamadoPipo y su comida favorita son las golosinas.
````
----

# Reasignación de Variables

La palabra variable proviene del latín variāre que significa "hacer cambiable". Este es un nombre apropiado porque el valor asignado a una variable puede cambiar.

![](https://s3.amazonaws.com/codecademy-content/courses/php-strings-variables/PHPVariable_m2l1e8.gif)

El proceso de asignar un nuevo valor a una variable se llama _reasignación_. Reasignamos una variable usando el operador de asignación en una variable que ya ha sido declarada:

````
$favorite_food = "Curry rojo con berenjenas";
echo $favorite_food; // Imprime: Curry rojo con berenjenas

// Reasigna el valor de $favorite_food a una nueva cadena
$favorite_food = "Pizza";
echo $favorite_food; // Imprime: Pizza
````

A menudo es útil crear nuevas variables asignadas al mismo valor que una variable existente:

````
$first_player_rank = "Principiante";
$second_player_rank = $first_player_rank;
````

En el código anterior, declaramos la variable `$first_player_rank` y le asignamos la cadena `"Principiante"`. Luego, declaramos `$second_player_rank` y lo asignamos a `$first_player_rank`.

Esto creó una nueva variable (`$second_player_rank`) asignada al valor `"Principiante"`. Observe cómo las variables pueden tratarse de manera diferente según dónde aparezcan en el código. Durante la asignación o reasignación de variables, la variable a la izquierda del operador de asignación se trata como una variable (almacenamiento denominado para mantener un valor) mientras que una variable a la derecha del operador se trata como el valor que almacena.

----

# Concatenando operadores de asignación

Podemos asignar y reasignar variables a los valores que resultan de las operaciones:

````
$full_name = "Aisle". " Nevertell";
echo $full_name; // Imprime: Aisle Nevertell
````

Durante la asignación, la computadora primero evaluará todo a la derecha del operador de asignación y devolverá un solo valor.

En el código anterior, la computadora concatenará las cadenas `"Aisle"` y `"Nevertell"` en el valor `"Aisle Nevertell`. Luego asignará esta cadena como el valor a la variable $full_name.

Esto es cierto incluso para operaciones más complejas:

````
$full_name = "Aisle". "". "Nevertell" . "". "Nomaderwat";
echo $full_name; // Imprime: Aisle Nevertell Nomaderwat
````

Un tema que puede observar a medida que aprende la sintaxis de un lenguaje de programación es que las acciones comunes que los programadores deben hacer mucho a menudo tienen un atajo. Considera lo siguiente:

````
$full_name = "Aisle";
$full_name = $full_name. " Nevertell";
echo $full_name; // Imprimes: Aisle Nevertell
````

En el código anterior, tenemos la variable `$full_name` asignada al valor `"Aisle"`. Queremos reasignar `$full_name` a su valor actual agregado con la cadena `" Nevertell"`.

Lo creas o no, esta es una tarea tan común que PHP ofrece una notación abreviada, el operador de asignación de concatenación (`.=`). Comparemos la misma acción pero usando este operador alternativo:

````
$full_name = "Aisle";
$full_name. = " Nevertell";
echo $full_name; // Imprime: Aisle Nevertell
````

Puede parecer divertido proporcionar un atajo para ahorrar solo unos pocos caracteres de escritura, pero cuando las operaciones se realizan con la suficiente frecuencia, esas pulsaciones de teclas realmente pueden sumar. Esta sintaxis también es más rápida y fácil de leer, lo que hace que el código sea más fácil de mantener.

Una cosa importante a tener en cuenta es que, aunque PHP a menudo es flexible sobre los espacios en blanco, es inflexible con el operador de asignación de concatenación: los caracteres `.` y `=` no deben tener espacios u otros caracteres de espacio en blanco entre ellos.

----

# Asignar por referencia

Cuando creamos una variable asignada a otra variable, la computadora encuentra un nuevo espacio en la memoria que asocia con el operando izquierdo, y almacena allí una copia del valor del operando derecho.

![](https://s3.amazonaws.com/codecademy-content/courses/php-strings-variables/PHPVariable_4_v3.gif)

Esta nueva variable contiene una _copia_ del valor de la variable original, pero es una entidad independiente; los cambios realizados en cualquiera de las variables no afectarán a la otra:

````
$first_player_rank = "Principiante";
$second_player_rank = $ first_player_rank;
echo $second_player_rank; // Imprime: principiante

$first_player_rank = "Intermedio"; // Reasigna el valor de $first_player_rank
echo $second_player_rank; // Todavía imprime: Principiante
````

También podemos crear un alias, o apodo, para una variable. En lugar de una copia del valor de la variable original, creamos un nuevo nombre que apunta al mismo lugar en la memoria.

![](https://s3.amazonaws.com/codecademy-content/courses/php-strings-variables/PHPVariable_5_v3.gif)

Para esto utilizamos un operador diferente: el operador de asignación de referencia (`=&`).

Cuando _asignamos por referencia_, estamos diciendo que la variable a la izquierda del operador debe apuntar, o referirse, exactamente a los mismos datos que la variable a la derecha. Con la asignación por referencia, los cambios realizados en una variable afectarán a la otra:

````
$first_player_rank = "Principiante";
$second_player_rank =& $first_player_rank;
echo $second_player_rank; // Imprime: principiante

$first_player_rank = "Intermedio"; // Reasigna el valor de $first_player_rank
echo $second_player_rank; // Imprime: Intermedio
````

----

# Repaso

¡Impresionante trabajo! Hemos cubierto mucho material en esta lección, así que repasemos:

+ Las cadenas son colecciones de texto que la computadora trata como una sola pieza de datos.
+ Una cadena puede tener cualquier longitud y contener letras, números, símbolos o espacios entre comillas.
+ Para incluir ciertos caracteres dentro de las cadenas, tenemos que usar secuencias de escape.
+ Un _operador_ es un caracter que realiza una tarea en nuestro código.
+ Podemos usar el operador de concatenación (`.`) Para combinar dos cadenas en una sola.
+ Las variables son un concepto de programación fundamental que nos permite reutilizar fácilmente los datos en nuestro código.
+ Declaramos una variable usando el signo de dólar (`$`) seguido del nombre de la variable y luego usamos el operador de asignación (`=`) para darle un valor.
+ PHP tiene un procesador de variables que nos permite incluir variables directamente en nuestras cadenas.
+ Una vez que se ha asignado una variable, podemos cambiar su valor. Esto se llama reasignación.
+ Podemos crear un alias para una variable, en lugar de solo una copia, utilizando el operador de asignación de referencia (`=&`).
+ Las operaciones a la derecha del operador de asignación se evaluarán antes de que se realice la asignación.
+ El operador de asignación de concatenación (`.=`) Es una notación abreviada para reasignar una variable de cadena a su valor actual junto con otro valor de cadena.

Si eso fue mucho para asimilar, no se preocupe por memorizar todo de inmediato. Recuerde que cuando desee explorar más sobre el lenguaje, [la documentación](http://php.net/manual/en/langref.php) es un gran lugar para sentirse cómodo explorando.

----
[Próxima Lección](https://github.com/sebastiantorres86/curso-php/blob/master/numeros-php.md)