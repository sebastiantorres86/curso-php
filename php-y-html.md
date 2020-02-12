## PHP Y HTML

# Introducción

PHP se puede usar de muchas maneras. Se puede usar para escribir programas independientes que se ejecutan en nuestro terminal:

````
echo "¡Hola, mundo!";
````

Cuando se ejecuta, el código anterior generará lo siguiente en el terminal:

````
¡Hola Mundo!
````

Pero PHP fue diseñado como un lenguaje de desarrollo web back-end, específicamente fue diseñado para funcionar bien con HTML. PHP permitió una forma conveniente para que los desarrolladores creen plantillas HTML y las completen programáticamente para enviar HTML personalizado a los visitantes de sus sitios.

PHP se ha convertido en un poderoso lenguaje de programación que se utiliza para más que plantillas HTML, pero el uso de PHP combinado con HTML sigue siendo una parte importante de los conjuntos de habilidades de muchos desarrolladores web.

En esta lección, profundizaremos en la diferencia entre el front-end y el back-end y aprenderemos cómo usar PHP para generar HTML.

----

# ¿Qué es el front-end?

Hablemos de la diferencia entre un idioma front-end y un idioma back-end. HTML es un lenguaje front-end, pero ¿qué significa eso exactamente?

Al navegar a un sitio web desde nuestro navegador web, el navegador realiza una solicitud de contenido en nuestro nombre. Lo que vemos y experimentamos como un único sitio web en realidad está compuesto por una serie de archivos que se unen para formar una experiencia coherente.

Los archivos que recibimos consisten en JavaScript, CSS, HTML, imágenes y otros _activos estáticos_. Un activo estático es un archivo que no cambia. Cuando navegamos a una página web, estos activos se envían a un navegador.

Es posible que haya escuchado el desarrollo front-end denominado desarrollo _del lado del cliente_. En el desarrollo web, generalmente nos referimos al navegador como el cliente. Un humano puede estar experimentando el sitio web, pero es el navegador el que realiza solicitudes de información y recibe las respuestas.

El front-end de un sitio web o aplicación web consta de todos los elementos del sitio web que se envían al cliente a pedido. Pero algo tiene que estar escuchando esas solicitudes y decidir qué enviar: es el back-end del sitio web que hace todo eso y más.

----

# ¿Qué es el back-end?

Los back-end de los sitios web diferirán según las necesidades del sitio. Por lo general, tendrán al menos los siguientes componentes:

+ Un _servidor web_: un servidor web es una computadora o programa que escucha las solicitudes de los clientes y envía respuestas. Este componente es muy adecuado para manejar la entrega de contenido estático.
+ Un _servidor de aplicaciones_: a menudo se trata de una colección de lógica de programación que se necesita para entregar contenido dinámico a un cliente. El servidor de aplicaciones a menudo manejará otras tareas, como la seguridad del sitio y la interacción con los datos.
+ Una _base de datos_: la información importante, como los nombres de usuario y las contraseñas, debe almacenarse y accederse en algún lugar. Una aplicación web grande a menudo tendrá múltiples bases de datos para almacenar todos los diferentes tipos de datos necesarios para ejecutar el sitio sin problemas.

PHP puede usarse en muchas capacidades en el back-end. Sin embargo, en esta lección, comenzaremos con algo pequeño al centrarnos en un pequeño papel que el servidor de aplicaciones PHP puede desempeñar en la generación de HTML que el servidor web enviará a un cliente.

![](https://s3.amazonaws.com/codecademy-content/courses/php-and-html/NodeAnimation_2_v1.gif)

----

# PHP en HTML

Podemos incrustar scripts PHP en documentos HTML con la etiqueta de apertura `<?php` y la etiqueta de cierre `?>.` El procesador PHP leerá todo el archivo, evaluará cualquier PHP, lo traducirá a HTML y lo pasará al servidor web para que pueda enviarse al cliente.

Considere el siguiente código:

````
<html>
 <head>
  <title> Mi primer sitio PHP </title>
 </head>
 <body>
 <? php
    echo "<h1> ¡Oh, hola! </h1>";
  ?>
 </body>
</html>
````

En el código anterior, el eco de línea `"<h1> ¡Oh, hola! </h1>"` generará un encabezado HTML de `¡Oh, hola!`.

Cuando usamos `echo` dentro de HTML ya no imprimimos en el terminal, sino que imprimimos en el documento HTML.

¿No habría sido más sencillo agregar `<h1> Oh hola! </h1>` directamente? Sí. Este ejemplo ciertamente no nos muestra __por qué__ queremos usar PHP dentro de nuestro HTML. A medida que aprendamos a desarrollar scripts PHP más robustos y aprovechemos algunas de las características más complejas del lenguaje, iremos entendiendo cuán poderoso puede ser.

Por ahora, comprendamos mejor __cómo__ podemos usar PHP en HTML.

----

# Más allá de las cadenas

También podemos incorporar PHP más complejo dentro de nuestros scripts.

````
<? php
$lucky_number = 5 * 2 - 1;

echo "<h1> Su número de la suerte es ${lucky_number} </h1>";
?>
````

El código anterior se traducirá a HTML con un encabezado que dice:` Su número de la suerte es el 9.`

Podemos incorporar todas las características del lenguaje que conocemos sobre PHP, incluidas las funciones:

````
<?php
function makeHeaderGreeting ($name) {
   return "<h1> ¡Hola, ${name}! </h1>";
}

echo makeHeaderGreeting("Mundo");
?>
````

El código anterior se traducirá a HTML con un encabezado que dice: `¡Hola, mundo!`.

----

# Repaso

En esta lección, ha comenzado a aprender a usar PHP para generar HTML. Esto se volverá aún más poderoso a medida que aprendamos cómo obtener información del cliente y usarla para crear sitios web dinámicos.

Repasemos lo que hemos aprendido hasta ahora:

+ El front-end de un sitio web consta de JavaScript, CSS, HTML, imágenes y otros _activos estáticos_ enviados al _cliente_.
+ Cuando navegamos a un sitio web, el navegador es el _cliente_ y envía una solicitud al back-end de todos los activos necesarios para ver e interactuar con el sitio web.
+ El back-end consta de un _servidor web_ y toda la lógica y los datos necesarios para crear y mantener un sitio web o una aplicación web.
+ PHP es un lenguaje de back-end.
+ PHP puede usarse para generar archivos HTML.
+ Incorporamos scripts PHP dentro de HTML insertando código PHP entre las etiquetas de apertura (`<?php`) y de cierre (`?>`).

----
[Próxima Lección](#)
