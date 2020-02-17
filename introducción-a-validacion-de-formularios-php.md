## INTRODUCCIÓN A LA VALIDACIÓN DEL FORMULARIO PHP

# Introducción

En esta lección, usaremos PHP para manejar las aportaciones de los usuarios enviadas a través de _formularios_ HTML. Realizaremos _validaciones de formulario_ en los datos enviados para proteger nuestro sitio web y sus usuarios.

Los sitios web y las aplicaciones en producción casi siempre usan validaciones frontales (validaciones HTML y JavaScript realizadas en el lado del cliente), pero estas validaciones están diseñadas para proporcionar una mejor experiencia de usuario, NO por seguridad. Un usuario puede eludir la validación de front-end apagando intencionalmente o accidentalmente JavaScript en su navegador. También necesitamos protegernos contra [ataques de hombre en el medio](https://en.wikipedia.org/wiki/Man-in-the-middle_attack), donde un actor malicioso cambia los datos __después__ de que el cliente los haya enviado.

El back-end __nunca__ debe confiar en los datos que recibe del cliente. Ya sea intencionalmente o no, los datos incorrectos del cliente tienen el potencial de exponer información confidencial, corromper nuestros datos o ralentizar significativamente nuestro servidor. En esta lección, trabajaremos con formularios sin validaciones de front-end. Esto simulará la naturaleza poco confiable de la validación del lado del cliente.

Utilizaremos PHP para manejar la lógica para recibir solicitudes POST, validar los datos, almacenar los datos en el back-end y mostrar comentarios significativos al usuario.

----

# Manejo de formularios

A lo largo de esta lección, utilizaremos un archivo PHP para presentar un formulario HTML a los usuarios. Utilizaremos el atributo `method` POST para un envío de entrada más seguro. Esto significa que todos los datos enviados estarán disponibles en la matriz asociativa superglobal: `$_POST`.

Para que la entrada del usuario se incluya en la matriz `$_POST`, proporcionamos un atributo `name` dentro del HTML. Después de enviar el formulario, este `name` será la clave en la matriz `$_POST` y la entrada del usuario será el valor asignado a esa clave.

````
<form method="post" action="">
Su lenguaje de programación favorito: <input type="text" name="lenguaje">
<input type="submit" value="Enviar idioma">
</form>
````

Arriba tenemos un formulario HTML con un `method` de `"post"`. Podríamos proporcionar una URL alternativa para que los usuarios naveguen después de enviar su formulario (por ejemplo, `action="some_page.php"`). Dado que queremos que los usuarios tengan la oportunidad de enviar el formulario nuevamente si tienen errores, dejaremos la acción como una cadena vacía; esto significa que una vez que se envíe, los usuarios recibirán el mismo archivo PHP que originalmente les entregó el formulario . Nuestro formulario contiene un `input` con el `name` `"lenguaje"`. Si un usuario ingresó "PHP" (como supondríamos...) en la entrada `lenguaje` del formulario anterior y luego envió el formulario, su URL no cambiaría. Sin embargo, dentro del código PHP, la matriz `$_POST` contendría un par _clave => valor_ de `"lenguaje" => "PHP"`.

````
echo $_POST["language"]; // Imprime: PHP`
````

----

# Validación simple

En la lección anterior, simplemente mostramos la entrada del usuario que recibimos. Ahora queremos proporcionar al usuario comentarios si su entrada no es correcta. _Validaremos_ (confirmaremos la corrección de) los datos que recibimos. Si la entrada se considera inválida, queremos darle al usuario comentarios significativos para que puedan corregir su error e intentar enviar el formulario nuevamente.

Tendremos que hacer varias modificaciones al archivo PHP que utilizamos para entregar nuestro formulario a los usuarios:

1. Agregue código PHP para verificar la validez de la entrada de un usuario si se ha enviado el formulario.
2. Agregue un elemento HTML para mostrar un mensaje de error al usuario si su envío no es válido.
3. Rellene cada campo en el formulario con la entrada enviada previamente por el usuario.

Nuestra tercera tarea tiene que ver con crear una experiencia de usuario mejorada. ¿Alguna vez ha tenido que rellenar cada campo en un formulario después de enviarlo incorrectamente? ¡Es muy frustrante! Al completar los valores enviados por el usuario, podrá corregir rápidamente cualquier campo con errores sin tener que comenzar desde cero. Para lograr esto, asignaremos cada uno de los atributos `value` del elemento de formulario HTML, aparte de la entrada `"enviar"`, a los datos enviados por el usuario para cada campo.

A los fines de este ejercicio, supongamos que "PHP" es el único envío válido para el idioma favorito del usuario. A continuación, le mostramos cómo podemos actualizar nuestro formulario del ejercicio anterior para realizar las tres tareas anteriores:

````
<?php
$validation_error = "";
$user_language = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
$user_language = $_POST["lenguaje"];
  if ($user_language != "PHP") {
    $validation_error = "* ¡Tu idioma favorito debe ser PHP!";
  }
}
?>

<form method="post" action="">
Su lenguaje de programación favorito: <input type="text" name="lenguaje" value = "<?php echo $user_language;?>">
<p class="error"> <?= $validation_error;?> </p>
<input type="submit" value="Enviar idioma">
</form>
````
Veamos el código anterior.

+ Primero asignamos `$validation_error` y `$user_language` a cadenas vacías. Usamos estos valores de PHP en nuestro HTML, pero, si un usuario aún no ha enviado su formulario, no queremos que estos elementos hayan completado los valores.
+ Recuerde que solo validamos los datos del formulario DESPUÉS de que el usuario los haya enviado al menos una vez. Para asegurarnos de eso, solo ejecutamos nuestro código de validación `if ($_SERVER["REQUEST_METHOD"] === "POST")`, que indica que se ha enviado el formulario actual.
+ Dentro de nuestro bloque `if`, tomamos el valor relevante de la matriz `$_POST`: `$_POST["lenguaje"]`. Asignamos este valor a nuestra variable `$user_language`. ¡Este único paso realmente logra dos cosas! Nos brinda una manera fácil de hablar sobre el valor que el usuario envió a este campo, y también significa que el valor del elemento HTML ahora será el envío del usuario en lugar de una cadena vacía.
+ Si el valor que envió el usuario NO es correcto, asignamos un mensaje de error a `$validation_error` para que esta parte del HTML ahora le dé al usuario comentarios importantes.

----

# Desinfección de datos básicos

En el ejercicio anterior, realizamos una validación simple para verificar la entrada del usuario, pero cometimos un error al mostrar directamente los datos que recibimos de ellos. Recuerde que nunca debemos confiar simplemente en los datos que recibimos del cliente. Para protegernos contra errores inocentes pero peligrosos de usuarios, usuarios maliciosos o ataques de intermediarios, necesitamos _desinfectar_ los datos, transformarlos en un formato seguro y estandarizado. En este ejercicio, nos centraremos en hacer que los datos sean seguros para mostrar en el navegador del usuario.

PHP proporciona varias funciones integradas para ayudar con la desinfección:

Podemos usar [la función incorporada de PHP `trim()`](https://www.php.net/manual/en/function.trim.php) para eliminar cualquier espacio en blanco desde el principio o el final de una cadena que recibimos como entrada de formulario. Aunque no es una preocupación de seguridad, esto puede ayudar a estandarizar los datos antes de la validación.

````
$email = "     aisle.nevertell@yahoo.com   ";
echo trim($email); // Imprime: aisle.nevertell@yahoo.com
````

Cuando queremos mostrar la entrada del usuario dentro de nuestro propio HTML, primero debemos ejecutarlo a través de `htmlspecialchars()`. [Esta función integrada](https://www.php.net/manual/en/function.htmlspecialchars.php) transforma los elementos HTML en [entidades HTML](https://developer.mozilla.org/en-US/docs/Glossary/Entity ) (caracteres que representan elementos HTML pero no se mostrarán como HTML), de modo que el intérprete de PHP no los reconozca como HTML. Esto evita, por ejemplo, un ataque man-in-the-middle en el que se inyecta HTML malicioso en la vista de un usuario de nuestro sitio.

````
$data = "<a href=\"https://www.evil-spam.biz/html/\">Your account has been compromised! Click here to get technical support!!</a>";

echo htmlspecialchars($data);

// Prints: &lt;a href=&quot;https://www.evil-spam.biz/html/&quot;&gt;Your account has been compromised! Click here to get technical support!&lt;/a&gt;
````

A veces también queremos realizar desinfecciones personalizadas que no se pueden lograr con funciones incorporadas, pero discutiremos esto más adelante en la lección.

----

# Desinfección básica con filter_var()

Todavía no hemos introducido la función PHP más poderosa para desinfectar datos: `filter_var()`. [Esta función](https://www.php.net/manual/en/function.filter-var.php) opera en una variable y la pasa a través de un "filtro" que produce el resultado deseado.

Como primer argumento, `filter_var()` toma una variable. Como segundo, toma una ID que representa el tipo de filtrado que se debe realizar. Existen [varios filtros para desinfectar tipos de entrada comunes](https://www.php.net/manual/en/filter.filters.sanitize), incluido `FILTER_SANITIZE_EMAIL`. La función devolverá la versión desinfectada de la entrada o `FALSE` si no pudo realizar la desinfección.

````
$bad_email = '<a href="www.evil-spam.biz">@gmail.com';
echo filter_var($bad_email, FILTER_SANITIZE_EMAIL);
// Prints: ahref=www.evil-spam.biz@gmail.com  
````

El filtro `FILTER_SANITIZE_EMAIL` recortó espacios en blanco en toda nuestra entrada y eliminó los caracteres peligrosos, evitando así cualquier inyección de HTML. Esencialmente, __filtró__ los caracteres no permitidos en los correos electrónicos. Una vez desinfectados, podemos mostrar de forma segura las entradas del usuario.

Por supuesto, `$bad_email` no almacenó un correo electrónico válido en primer lugar. Pero dado que a menudo queremos mostrar datos de formulario no válidos como una pista para el usuario, esta desinfección sería útil para evitar un ataque de intermediario. También podríamos haber usado `htmlspecialchars($bad_email)`, pero eso habría producido en su lugar `&lt;a href=&quot;www.evil-spam.biz&quot;&gt;@gmail.com`. Elija el método de desinfección en función de la salida que desea mostrar a los usuarios.

Puede consultar los [otros filtros de desinfección disponibles en el manual de PHP](https://www.php.net/manual/en/filter.filters.sanitize.php).

----

# Validación básica con filter_var()

¡Podemos usar la misma función `filter_var()` para validar y desinfectar! Existen varios [filtros de validación proporcionados](https://www.php.net/manual/en/filter.filters.validate.php), pero funcionan de manera un poco diferente a los filtros de desinfección. Si la variable se considera válida, `filter_var()` la devolverá; de lo contrario, devolverá `FALSE`:

````
$bad_email = 'fake - at - prank dot com';
if (filter_var($bad_email, FILTER_VALIDATE_EMAIL)){
  echo "Valid email!";
} else {
  echo "Invalid email!";
} 
// Prints: Invalid email!
````

Vale la pena señalar que el filtro `FILTER_VALIDATE_EMAIL` proporcionado es más estricto que las pautas que regulan las direcciones de correo electrónico aceptables. Si un sitio necesitara aceptar caracteres no latinos, por ejemplo, el filtro integrado `FILTER_VALIDATE_EMAIL` no sería suficiente.

Usar los filtros de validación provistos es realmente conveniente. Puede consultar la lista de [filtros de validación disponibles en el manual de PHP](https://www.php.net/manual/en/filter.filters.validate.php). Por ejemplo, `FILTER_VALIDATE_URL` es útil para verificar si una cadena corresponde a una posible URL.

----

# Usar opciones con filter_var()

La función `filter_var()` acepta un tercer argumento opcional que nos permite ajustar la operación de un filtro dado. Este argumento, a menudo llamado `$options`, toma la forma de una matriz asociativa anidada.

Por ejemplo, el argumento `$options` puede ayudarnos a validar que un entero esté dentro de un rango especificado cuando se usa el filtro de validación de enteros `FILTER_VALIDATE_INT`. Para hacer esto, configuramos `$options` en una matriz anidada que contiene las teclas `"min_range`" y `"max_range"` en un formato específico, que se muestra en el siguiente ejemplo:

````
function validateAdult ($age){
  $options = ["options" => ["min_range" => 18, "max_range" => 124]];  
  if (filter_var($age, FILTER_VALIDATE_INT, $options)) {
    echo("Tu tienes ${age} años de edad.");
  } else {
    echo("Esta no es una edad válida.");
  }
}

validateAdult(18); // Imprime: Tu tienes 18 años de edad.
validateAdult(124); // Imprime: Tu tienes 124 años de edad.
validateAdult(8); // Imprime: Tu tienes 8 años de edad.
validateAdult(200); // Imprime: Tu tienes 200 años de edad. 
````

En el código anterior, escribimos una función `validateAdult()` que toma un argumento entero `$age`. Luego, utilizamos la función `filter_var()` para validar que el número entero estaba entre 18 y 124 (inclusive) mediante el filtro `FILTER_VALIDATE_INT` y un argumento `$options` con el valor `["options" => ["min_range" => 1, "max_range" => 124]]`.

Puede ver [qué filtros aceptan opciones en el manual de PHP](https://www.php.net/manual/en/filter.filters.php).

----

# Validaciones personalizadas

A menudo consideramos que las validaciones que ofrecen las funciones integradas como `filter_var()` son insuficientes. Al validar todos los datos excepto los más simples, es probable que necesitemos escribir nuestras propias validaciones de entrada personalizadas.

Un método muy común para validar datos es comparar la entrada con un patrón que definimos con una expresión regular. La [función preg_match() de PHP](https://www.php.net/manual/en/function.preg-match.php) toma dos argumentos de cadena: una cadena de _patrón_ con una expresión regular y una cadena de _asunto_ para verificar. Devuelve `1` si coincide, `0` si no coincide y `FALSE` si hubo un error.

Por ejemplo, podemos usar la expresión regular `/^[(]*([0-9]{3})[-.)]*[0-9]{3}[-.]*[0-9]{4}$/` para probar números de teléfono de América del Norte de 10 dígitos. Permitirá espacios, guiones o puntos como separadores opcionales, así como paréntesis opcionales alrededor de los primeros tres números:

````
$pattern = '/^(]*([0-9]{3)[-.)]*[0-9]{3}[-.]*[0-9]{4}$/';

preg_match($pattern, "(999)-555-2222"); // Devuelve: 1

preg_match($pattern, "555-2222"); // Devuelve: 0
````

Antes de probar las coincidencias de expresiones regulares, queremos asegurarnos de que la entrada no sea demasiado larga. Las comprobaciones de expresiones regulares pueden requerir mucha potencia informática: una forma en que un mal actor puede dañar nuestro sitio web es mediante la presentación de entradas extremadamente largas, lo que ejerce presión sobre nuestros servidores. ¡Esto puede ralentizar o incluso bloquear nuestro sitio!

Podemos usar la [función integrada `strlen()` de PHP](https://www.php.net/manual/en/function.strlen.php) para verificar la longitud de una entrada dada. En última instancia, la longitud de entrada aceptable es una decisión decisiva para el ingeniero web. En este ejemplo, elegimos 100 caracteres, pero [algunos nombres pueden ser mucho más largos](https://en.wikipedia.org/wiki/Hubert_Blaine_Wolfeschlegelsteinhausenbergerdorff_Sr).

````
$name = "Aisle Nevertell";
$length = strlen($name);
if ($length > 2 && $length < 100){
  echo "Ese me parece un nombre razonable...";
} 
````
----

# Validar contra datos de back-end

Debido a que los sitios web modernos y las aplicaciones web necesitan almacenar una gran cantidad de datos, generalmente interactúan con bases de datos en el back-end. Un tipo común de validación personalizada implica comparar la entrada del usuario con la información de la base de datos. En este ejercicio, practicaremos la validación contra datos de back-end utilizando matrices PHP para sustituir bases de datos complicadas.

Una aplicación importante de este tipo de validación es manejar la creación de una cuenta de usuario. ¡Antes de crear la cuenta, es muy importante verificar que alguien más ya no esté utilizando un nombre de usuario enviado! Para hacer esto, necesitaremos verificar la base de datos para ese nombre de usuario.

En el siguiente ejemplo, modelamos la base de datos de usuarios con la matriz asociativa `$users`, que contiene claves en el formato `"username" => "password"`.

````
$users = ["coolBro123" => "password123!", "coderKid" => "pa55w0rd*", "dogWalker" => "ais1eofdog$"];

function isUsernameAvailable ($username){
  global $users;
  if (isset($users[$username])){
    echo "Ese nombre de usuario ya ha sido tomado.";
  } else {
    echo "${username} esta disponible.";
  }
}

isUsernameAvailable("coolBro123");
// Imprime: Ese nombre de usuario ya ha sido tomado.

isUsernameAvailable("aisleOfPHP");
// Imprime: aisleOfPHP esta disponible.
````
La función anterior `isUsernameAvailable` utiliza la función incorporada `isset()` para verificar si existe un nombre `$username` en la matriz `$users`. En producción, esta verificación se realizaría consultando la base de datos.

----

# Desinfección para almacenamiento de back-end

Además de desinfectar los datos que se muestran al usuario, siempre necesitamos desinfectar todos los datos antes de almacenarlos en nuestras propias bases de datos. Existen serios problemas de seguridad con el almacenamiento de datos en una base de datos: intentar almacenar entradas no desinfectadas en una base de datos puede permitir que un mal actor corrompa u obtenga acceso a información confidencial. Para desinfectar la seguridad del back-end, utilizaremos los métodos discutidos anteriormente en esta lección.

También queremos desinfectar el formato: asegúrese de que los datos almacenados en nuestra base de datos sigan un formato coherente. Si vamos a mostrar o utilizar los datos, nos aseguraremos de que siempre se vean igual. Por lo tanto, aunque deseemos permitir que los usuarios ingresen sus números de teléfono con o sin paréntesis o guiones, cuando lo almacenemos en la base de datos, querremos cambiar todos los números de teléfono al mismo formato.

Para desinfectar el formato de datos, podemos usar la función incorporada `preg_replace()`. `Preg_replace()` toma una expresión regular, texto de reemplazo y una cadena de asunto; Primero, busca en la cadena de asunto instancias que coincidan con la expresión regular. Luego, genera una copia de la cadena de asunto que tiene las instancias coincidentes reemplazadas por la cadena de reemplazo:

````
$one = "perropipo";
$two = "PerroPipo";
$three = "perro pipo";
$four = "Perro Pipo";

$pattern = "/[pP]erro\s*[pP]ipo/";
$perropipo = "Perropipo";

echo preg_replace($pattern, $perropipo, $one);
// Imprime: Perropipo

echo preg_replace($pattern, $perropipo, $two);
// Imprime: Perropipo

echo preg_replace($pattern, $codecademy, $three);
// Imprime: Perropipo

echo preg_replace($pattern, $codecademy, $four);
// Imprime: Perropipo
````

En el código anterior, utilizamos la expresión regular `/[pP]erro\s*[pP]ipo/` que coincide con la mayoría de las formas comunes en que las personas escriben mal Perropipo. La cadena de reemplazo tiene el formato correcto, `"Perropipo"`, lo que significa que reemplazamos las versiones mal escritas correspondientes con la ortografía y el formato correctos. Usando `preg_replace()`, pudimos transformar las cuatro versiones del nombre de nuestra compañía a la versión correcta: "Perropipo".

----

# Reenrutamiento

En esta lección, hemos aprendido algunas herramientas básicas para validar formularios HTML en el back-end usando PHP. Aprendimos a enviar comentarios significativos a nuestros usuarios cuando sus entradas no son válidas. Pero, ¿qué debemos hacer si el usuario ha enviado un formulario válido?

Hasta ahora, hemos estado enviando a los usuarios de vuelta al mismo formulario si hubo errores en su envío o no. Hemos indicado que el formulario se envió correctamente mostrando un mensaje condicionalmente, pero esto no siempre es una gran experiencia de usuario. Piense en lo que sucede cuando inicia sesión en su correo electrónico. Por lo general, una vez que un formulario se ha enviado correctamente, el usuario se redirige a una página completamente diferente.

Podemos usar la [función PHP `header()`](https://www.php.net/manual/en/function.header.php) para realizar redireccionamientos. Llamamos a la función `header()` en una cadena que comienza con `"Location: "`, seguida de la URL a la que queremos redirigir al usuario. Por ejemplo: `"Ubicación: https://www.best-puppy-pix.com/"`. Después de invocar la función de `header()`, querremos usar la construcción de lenguaje `exit` para terminar el script actual.

Para que funcione correctamente, la función de `header()` debe ejecutarse antes de que el script genere algo, esto incluye HTML. Así que lo incluiremos en nuestro script PHP antes de que nuestro archivo genere HTML:

````
if (/* Is the submission data validated? */) {
  header("Location: https://www.best-puppy-pix.com/");
  exit;
}
````
----

# Repaso

¡Buen trabajo! Cubrimos mucho en esta lección. Revisemos:

+ Realizar _validaciones de formulario_ back-end en los datos enviados es un paso esencial para proteger nuestro sitio web y sus usuarios.
+ El uso del atributo `method` POST en un formulario HTML le da a nuestro script PHP acceso a los datos enviados dentro de la matriz asociativa superglobal: `$_POST`.
+ Modificamos nuestro HTML y PHP para que cuando la entrada se considere no válida, se muestren comentarios significativos al usuario.
+ Si planeamos mostrar la entrada del usuario, primero debemos _desinfectarla_. Podemos usar métodos como `trim()` y `htmlspecialchars()` para la desinfección básica.
+ Podemos usar `filter_var()` con un filtro para desinfectar tipos de entrada comunes.
+ También podemos usar `filter_var()` con un filtro para realizar validaciones en tipos de entrada comunes.
+ A menudo queremos realizar validaciones personalizadas.
+ La función `preg_match()` compara verificaciones si una cadena dada coincide con una expresión regular.
+ Dado que las comparaciones de expresiones regulares pueden consumir una gran cantidad de potencia informática, querremos verificar la longitud de las entradas antes de realizar verificaciones de expresiones regulares.
+ Es común realizar validaciones comparando la entrada del usuario con los datos de fondo

Antes de almacenar la entrada del usuario en nuestro back-end, la desinfectaremos tanto por seguridad como por un formato consistente
Si se ha aceptado el envío del formulario de un usuario, podemos redirigirlo a una página diferente.
La validación y desinfección de datos es una parte extremadamente importante del desarrollo web. En esta lección, hemos cubierto algunas de las teorías y técnicas básicas. Al desarrollar para la producción, deberá investigar más y comprender las necesidades de los sitios o aplicaciones específicos, así como las herramientas disponibles con las bases de datos o marcos específicos en uso.

A medida que sus validaciones se vuelven cada vez más complejas, también debe practicar la modularidad y separar su lógica de validación de su lógica de visualización.

----
[Próxima lección]()