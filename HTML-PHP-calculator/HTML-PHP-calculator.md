# Calculadora HTML-PHP

## PROYECTO

Usa PHP y HTML para construir una calculadora. Creará un front-end en HTML con formularios y manejará las matemáticas en el back-end con PHP.

Aplique su conocimiento sobre el manejo de formularios HTML en PHP para crear una calculadora.

----
### Tareas

# Formularios front-end

1. Vas a construir una calculadora para sumar y dividir dos números enteros.

    Cada calculadora aparecerá como un formulario separado para el usuario en la página inicial, que estará contenida en __index.php__.

    Comience creando los dos formularios. Dé a cada uno un título que indique lo que hará la calculadora. Asegúrese de incluir dos entradas numéricas para cada formulario y un botón de envío.

    No se preocupe por dar los nombres de las entradas o las acciones del formulario en este paso.

#### Pista

Hay varias formas de crear estos formularios. Aquí está nuestro ejemplo:

````
<h3> Adición </h3>
<form>
Primer número: <input type="number"> <br>
Segundo número: <input type="number"> <br>
<button type="submit"> Sumar </button> <br>
</form>
<h3> División </h3>
<form>
Numerador: <input type="number"> <br>
Denominador: <input type="number"> <br>
<button type="submit"> Dividir </button> <br>
</form>
````
----

2. Cada formulario debe enviarse a su propio archivo en el back-end para que se realicen las matemáticas correctas con los dos números.

    Ya hemos creado `adicion.php` y `division.php` para usted.

    Actualice sus formularios para que cada uno se envíe al archivo de fondo correcto.

#### Pista

Para el formulario de adición, establezca `action="adicion.php"`.

Para el formulario de división, establezca `action="division.php"`.

----

3. Necesitamos decidir qué método usar para nuestros formularios. Como nos gustaría poder compartir nuestros cálculos con amigos a través de la URL, usemos GET como método de formulario.

    Establezca esto en ambas formas.

#### Pista

Técnicamente, GET es el valor predeterminado para los formularios HTML, pero es una buena práctica establecerlo explícitamente:

````
<form method="get">
````

----

4. Para habilitar el procesamiento de las entradas con PHP, asigne a cada entrada un nombre único.

#### Pista

Use el atributo de nombre en las entradas para establecer nombres únicos.

Aquí están los formularios hasta ahora:

````
<h3> Adición </h3>
<form action = "adicion.php" method="get">
Primer número: <input type="number" name="add_first"> <br>
Segundo número: <input type="number" name="add_second"> <br>
<button type="submit"> Agregar </button> <br>
</form>
<h3> División </h3>
<form action="division.php" method="get">
Numerador: <input type="number" name="div_num"> <br>
Denominador: <input type="number" name="div_den"> <br>
<button type="submit"> Divide </button> <br>
</form>
````

----

# Procesamiento de fondo

5. En este punto, es posible que desee imprimir el contenido de la superglobal apropiada dentro de __adicion.php__ y __division.php__ para asegurarse de que sus datos lleguen al backend.

    Si no es así, asegúrese de que cada acción de formulario esté establecida en el archivo correspondiente y que las entradas tengan nombres.

#### Pista

Agregue esta línea a adicion.php y division.php:

````
<? php print_r($_GET)?>
````

----

6. Ahora, intente imprimir solo el resultado correcto dentro de __adicion.php__.

#### Pista

Esto se puede hacer usando el operador `+`:

````
<?= $_ GET['add_first'] + $_GET['add_second']?>
````

----

7. Actualiza adicion.php para tener un mensaje más útil que incluya los números que se agregaron.

    Puedes jugar con el estilo para obtenerlo como quieras.

#### Pista

Nosotros usamos:

````
<?= "La suma de ${_GET['add_first']} y ${_GET['add_second']} es:"?>
<h4><?=$_GET['add_first']+$_GET['add_second']?> </h4>
````

----

8. Ahora, implemente el procesamiento de back-end para __division.php__.

#### Pista

Nosotros usamos:

````
<?= "${_GET['div_num']} dividido por ${_GET['div_den']} es:"?>
<h4><?=$_GET['div_num']/$_GET['div_den']?> </h4>
````

----

# Mucho más allá

9. Si desea un desafío mayor, podría:

    + Implemente operaciones matemáticas más complicadas, como el [teorema de Pitágoras](https://es.wikipedia.org/wiki/Teorema_de_Pit%C3%A1goras). La calculadora podría devolver la longitud de una hipotenusa dados los otros dos lados.
    + Agregue más estilo CSS a la aplicación.
    + Combina los dos formularios en uno solo. Para enviar los formularios al archivo correcto, use el [atributo `formaction`](https://www.w3schools.com/tags/att_button_formaction.asp).

----
[Próxima lección](https://github.com/sebastiantorres86/curso-php/blob/master/booleans-y-peradores-de-comparacion.md)