## MANEJO DE FORMULARIOS HTML EN PHP
# Introducción

Presentar e interactuar con HTML es uno de los principales usos de PHP. Nuestro servidor toma cada archivo PHP (en nuestros ejemplos, esto es __index.php__) y los traduce a HTML para presentarlos al cliente en su navegador web.

Este proceso permite a los desarrolladores crear experiencias personalizadas para usuarios individuales.

PHP también proporciona la capacidad de manejar la entrada de los usuarios a través de formularios HTML de una manera directa. Antes de cubrir el trabajo con formularios, tómese un minuto para revisar cómo se puede incrustar el código PHP en HTML:

````
<p> Este HTML se entregará tal cual </p>
<? php echo "<p> PHP interpreta esto y lo convierte en HTML </p>";?>
<p> Este HTML se entregará tal cual </p>
````

Este ejemplo utiliza las etiquetas de apertura (`<?php`) y de cierre (`?>`) De PHP para insertar código PHP. Utiliza `echo` para agregar texto al HTML. Esta práctica es tan común que PHP proporciona una sintaxis abreviada. En lugar de usar `<?php echo` para comenzar la declaración, simplemente puede usar `<?=`.

Nuestro ejemplo se convierte en:

````
<p> Este HTML se entregará tal cual </p>
<?= "<p> PHP interpreta esto y lo convierte en HTML </p>";?>
<p> Este HTML se entregará tal cual </p>
````

----

# Solicitar superglobales

Dado que PHP se creó con el desarrollo web como un caso de uso principal, tiene funcionalidad para facilitar el procesamiento de solicitudes HTML. Cuando el cliente front-end realiza una solicitud a un servidor PHP de fondo, varios _súperglobales_ relacionados con la solicitud están disponibles para el script PHP. Las superglobales son variables globales automáticas que están disponibles en todos los ámbitos a lo largo de un script.

La lista de superglobales en PHP incluye lo siguiente:

+ `$GLOBALS`
+ `$_SERVER`
+ `$_GET`
+ `$_POST`
+ `$_FILES`
+ `$_COOKIE`
+ `$_SESIÓN`
+ `$_REQUEST`
+ `$_ENV`

Para esta lección, nos estamos centrando en tres de estos:

+ `$_GET`: contiene una matriz asociativa de variables pasadas al script actual usando parámetros de consulta en la URL
+ `$_POST`: contiene una matriz asociativa de variables pasadas al script actual mediante un formulario enviado con el método "POST"
+ `$_REQUEST`: contiene el contenido de `$_GET`, `$_POST` y` $_COOKIE`

----

# Manejo de formularios GET

En HTML, establecer el atributo de método (`"method"`) de un formulario para "obtener" (`"get"`) especifica que desea que el formulario se envíe utilizando el método GET. Cuando se utiliza este método, las entradas del formulario se pasan como parámetros en una cadena de consulta de URL.

Por ejemplo, esta es una solicitud a `www.codecademy.com` con los parámetros de URL `first` (establecido en el valor `"ellen"`) y `last` (establecido en el valor `"richards"`):

````
www.codecademy.com/?first=ellen&last=richards
````

Los nombres de los parámetros (`first` y `last`) provienen del atributo de nombre (`name`) de cada entrada de formulario.

Por ejemplo, el siguiente formulario podría usarse para recopilar el nombre de una persona utilizando el método GET:

````
<form method="get">
Nombre: <input type="text" name="first">
<br>
Apellido: <input type="text" name="last">
<br>
<input type="submit" value="Enviar nombre">
</form>
````

Cuando se envía el formulario, los datos del formulario están disponibles en la matriz superglobal `$_GET`. (También se puede acceder a los datos usando `$_REQUEST` si no le importa qué método utilizó el cliente).

En nuestro ejemplo, si un usuario escribió "ellen" en la primera (`first`) entrada y "richards" en la última (`last`) entrada, `print_r($_ GET)` se vería así:

````
Array ([first] => ellen [last] => richards)
````

----

# Manejo de formularios POST

En HTML, establecer el atributo de método (`method`) de un formulario para "publicar" (`"post"`) especifica que desea que el formulario se envíe utilizando el método POST. Cuando use POST para enviar formularios, no verá el cambio de URL. Los datos del formulario se envían utilizando los encabezados de la solicitud HTTP en lugar de los parámetros de URL.

Para usar los datos del formulario en PHP, cada entrada debe tener un atributo de nombre (`name`) único.

Cuando se envía el formulario, los datos de entrada están disponibles en el superglobal `$_POST`. Similar a GET, también está disponible en `$_REQUEST`.

Por ejemplo, si un usuario escribió "Katharine" en la primera entrada (`first`) y "McCormick" en la última entrada (`last`) de este formulario:

````
<form method = "post">
Nombre: <input type="text" name="first">
<br>
Apellido: <input type="text" name="last">
<br>
<input type="submit" value="Enviar nombre">
</form>
````

La URL no cambiaría y `print_r($_ POST)` se vería así:

````
Array ([first] => Katharine [last] => McCormick)
````

----

# Usando el Atributo "action"

Hasta ahora, hemos estado manejando la respuesta al envío del formulario en la misma página que el formulario en sí. Muchas veces no es necesario presentar a un usuario con el mismo formulario una y otra vez. Puede tener sentido moverlos a una nueva página o agradecerles por su envío.

Aquí es donde entra en juego el atributo de formulario `action`. Como todavía no hemos especificado un `action`, el HTML predeterminado es enviar los datos del formulario nuevamente al mismo script que definió el formulario.

Si desea que el usuario navegue a una nueva URL y maneje la entrada del formulario allí, puede especificar la URL en el atributo `action` del formulario. Dado que el atributo `action` especifica una URL relativa, también puede ingresar el nombre de un archivo PHP en el mismo directorio que el actual.

Por ejemplo, dado este directorio:

````
index.php
Receive_form.php
````

Para manejar un formulario usando __receive_form.php__ de __index.php__, usaría lo siguiente:

````
<form method = "get" action = "recibir_form.php">
````

Esto funciona para los métodos GET y POST.

----

# Repaso

¡Estás listo para comenzar a manejar formularios en PHP!

Para repasar:

+ `<?=` es la abreviatura de `<?php echo`.
+ PHP proporciona superglobales a los que se puede acceder desde cualquier parte del script.
    + `$_GET` es una matriz asociativa que contiene datos de una solicitud GET.
    + `$_POST` es una matriz asociativa que contiene datos de una solicitud POST.
    + `$_REQUEST` es una matriz asociativa que contiene datos de solicitudes GET y POST. Solo debe usarse si no le importa qué método se usó.
+ Las claves de matriz en las superglobales de solicitud de PHP se establecen mediante los atributos `name` en el formulario HTML, que deben ser únicos.
+ El atributo `action` se usa para especificar qué archivo debe manejar los datos de la solicitud de formulario

----
[Próxima Lección](https://github.com/sebastiantorres86/curso-php/blob/master/HTML-PHP-calculator/HTML-PHP-calculator.md)