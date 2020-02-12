## INTRODUCCIÓN A PHP
# Historia de PHP

PHP fue creado en 1994 y es una de las tecnologías fundamentales del desarrollo web moderno. Dadas todas las nuevas tecnologías utilizadas hoy en día, ¿todavía hay un lugar para PHP?

PHP sigue siendo una de las tecnologías de servidor más utilizadas en Internet. Proporciona el código subyacente para muchos sistemas de gestión de contenido (CMS) populares, incluidos [WordPress](https://wordpress.com/), [Drupal](https://www.drupal.org/) y [Joomla](https://www.joomla.org/). Un _CMS_ permite a los usuarios crear y actualizar sus propios sitios web sin tener que escribir muchos códigos complejos.

PHP también proporciona el código subyacente para muchos sitios de comercio electrónico, incluidos [WooCommerce](https://woocommerce.com/) y [Magento](https://magento.com/). Estas plataformas de comercio electrónico ofrecen una serie de herramientas para vender productos en línea. De esta manera, las empresas pueden centrarse en otros aspectos de su negocio sin tener que implementar una lógica de programación compleja desde cero.

PHP contiene una funcionalidad incorporada para interactuar con datos web, _Vanilla_ PHP, o PHP sin ninguna otra herramienta, se puede usar por sí solo para crear aplicaciones web. ¡Pero no tenemos que reinventar la rueda cada vez! Una vez que nos sentimos cómodos con los conceptos básicos del lenguaje PHP, ¡tenemos nuestra selección de potentes marcos PHP para elegir! Estos marcos proporcionan andamios y soluciones a problemas comunes en el desarrollo web de back-end. Algunos marcos PHP populares son [Laravel](https://laravel.com/), [CakePHP](https://cakephp.org/) y [Symfony](https://symfony.com/).

![Apliacaciones de PHP](https://s3.amazonaws.com/codecademy-content/courses/introduction-to-php/php_ecosystem.svg)

----

# ¿Cómo se usa PHP en HTML?

PHP se usa a menudo para construir _páginas web dinámicas_. Una _página web dinámica_ es aquella en la que cada visitante del sitio web obtiene una página personalizada que puede verse de forma diferente a como se ve el sitio para otro visitante. Esto contrasta con las _páginas web estáticas_ que proporcionan el mismo contenido a cada visitante.

![Páginas web dinamicas vs páginas web estáticas](https://s3.amazonaws.com/codecademy-content/courses/introduction-to-php/php_static_dynamic.svg)

Para crear este comportamiento dinámico, PHP fue diseñado para trabajar estrechamente con HTML. PHP se puede usar directamente en línea con un documento HTML. Cuando el sitio web se entrega desde el back-end al front-end, el contenido de PHP se ejecuta y se agrega al HTML para formar un documento HTML. El inicio de PHP en línea se denota con `<?php` y el final se denota con `?>`.

Como ejemplo, considere el siguiente código:

````
<p>Este HTML se entregará tal cual</p>
<? php echo "<p>Pero este código es interpretado por PHP y convertido en HTML</p>";
?>
````
En PHP, la palabra clave `echo` se usa para generar texto. El texto en este caso es todo entre las comillas dobles (`"`). Una instrucción escrita en PHP se llama _declaración_. Se requiere un punto y coma (`;`) al final de cada declaración en PHP.

Entonces, cuando se ejecuta el código anterior, genera el texto en el archivo HTML y el front-end recibirá el siguiente documento HTML:

````
<p>Este HTML se entregará tal cual</p>
<p>Pero este código es interpretado por PHP y convertido en HTML</p>
````

----

# ¿Cómo se ejecuta PHP?

En el apartado anterior, exploramos cómo se puede enviar PHP desde el back-end al front-end donde se recibe como HTML para que lo muestre un navegador.

PHP es flexible y también se puede ejecutar desde la terminal. Podemos usar PHP como un lenguaje de programación de propósito general para escribir programas que dan instrucciones simples a la computadora sin involucrar HTML o la web. Cuando se hace esto, la salida del programa se registra en el terminal. Esto es útil cuando se prueba la funcionalidad o para escribir programas locales simples.

Al escribir un archivo de script PHP, aún debemos denotar que estamos comenzando nuestro código PHP usando `<?php`, pero la etiqueta de cierre ya no es necesaria. Por lo general, se excluye por convención.

Por ejemplo, si el siguiente código se colocó en __index.php__:

 ````
 <?php
echo "¡Hola, mundo!";
````

Cuando se ejecuta el código anterior, `"¡Hola, mundo!"` saldrá a la terminal.

En general, PHP ignora los espacios en blanco (tabulaciones, espacios, líneas nuevas), por lo que este código produce el mismo resultado que el ejemplo anterior:
 
 ````
 <? php
echo       "¡Hola, mundo!";
````

Te sorprenderá que este código también funcione:

````
<? php
Echo "¡Hola, mundo!";
````

A diferencia de muchos otros lenguajes, PHP no siempre distingue entre mayúsculas y minúsculas, por lo que `Echo` es una declaración válida en PHP. Sin embargo, se recomienda utilizar una carcasa estándar, en este caso, `echo`.

----

# Comentarios en PHP

A veces, queremos incluir texto en nuestros archivos que no queremos que la computadora ejecute o muestre al usuario final. Podemos hacer esto con _comentarios_. Los comentarios se pueden usar para anotar nuestro código para que sea más claro para nosotros u otros. También son útiles para evitar que se ejecuten líneas de código sin eliminarlas.

En PHP, hay dos formas principales de agregar comentarios a nuestro código. El primero son los comentarios de una sola línea. Por lo general, se usan para explicaciones cortas o puntos de aclaración. Se puede usar `#` o `//` para crear un comentario de una sola línea. PHP no ejecuta nada en la misma línea después de estos símbolos.

Por ejemplo:

````
// Siempre recordaré esto
echo "Hola mundo"; // Mi primera declaración PHP
````

o

````
# Siempre recordaré esto
echo "¡Hola, mundo!"; # Mi primera declaración PHP
````

El segundo tipo de comentario es un comentario de varias líneas. Esto se usa para descripciones más largas, una guía más detallada sobre cómo usar correctamente la sección de código o para evitar que se ejecuten varias líneas de código. Estos comentarios comienzan con `/*` y terminan con `*/`.

Por ejemplo:

````
/* "Nunca he pensado en PHP como más
que una simple herramienta para resolver problemas."
- Rasmus Lerdorf */
echo "¡Hola, mundo!";
````
----

# Todo: aprende PHP

Antes de continuar, echemos un vistazo rápido a una aplicación PHP que funcione.

Le mostraremos un ejemplo de PHP utilizado en el back-end para crear un sitio web dinámico enviado al navegador. Cuando el visitante del sitio web, en este caso usted, modifica la lista de tareas, se solicita una nueva página web, el código PHP se ejecuta nuevamente en el back-end y entrega una nueva versión del sitio con HTML actualizado.

El ejemplo de la lista de tareas se usa con frecuencia cuando se muestra un marco web o tecnología. Proporciona una manera de exhibir cómo se implementan los comportamientos CRUD (Crear, Leer, Actualizar, Eliminar) utilizando una tecnología específica.

Dentro de una aplicación todo, la funcionalidad es típicamente:

+ Agregar nuevos elementos a la lista (Create)
+ Ver la lista existente (Read)
+ Cambiar el estado de finalización de cada elemento (Update)
+ Eliminar elementos de la lista (Delete)

````
<?php
require 'vendor/autoload.php';
# Esta lógica maneja la conexión a la base de datos, donde almacenamos nuestro estado de tarea
$pdo = new \PDO("sqlite:" . "db/sqlite.db");

# Esta lógica PHP maneja las acciones del usuario.
# Nuevo TODO
if (isset($_POST['submit'])) 
{
  $description = $_POST['description'];
  $sth = $pdo->prepare("INSERT INTO todos (description) VALUES (:description)");
  $sth->bindValue(':description', $description, PDO::PARAM_STR);
  $sth->execute();
}
# Eliminar TODO
elseif (isset($_POST['delete']))
{ 
  $id = $_POST['id'];
  $sth = $pdo->prepare("delete from todos where id = :id");
  $sth->bindValue(':id', $id, PDO::PARAM_INT);
  $sth->execute();
}
# Actualizar estado de finalización
elseif (isset($_POST['complete']))
{
    $id = $_POST['id'];
    $sth = $pdo->prepare("UPDATE todos SET complete = 1 where id = :id");
    $sth->bindValue(':id', $id, PDO::PARAM_INT);
    $sth->execute();
}
# Aquí está el HTML:
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>Todo List</title>
</head>

<body class="container">
  <h1>Todo List</h1>
  <form method="post" action="">
    <input type="text" name="description" value="">
    <input type="submit" name="submit" value="Add">
  </form>
  <h2>Current Todos</h2>
  <table class="table table-striped">
    <thead><th>Task</th><th></th><th></th></thead>
    <tbody>

<?php
  # Entrar en modo PHP, 
$sth = $pdo->prepare("SELECT * FROM todos ORDER BY id DESC");
$sth->execute();

foreach ($sth as $row) {
  # Exiting PHP Mode
    ?> 
<tr>
  <td>
      <!-- Esta es la abreviatura de PHP para insertar texto dinámico en HTML -->
      <?=htmlspecialchars($row['description'])?></td>
  <td>
    <?php #Aquí estamos mezclando HTML y PHP para obtener el documento deseado
if (!$row['complete']) {
        ?>
    <form method="POST">
      <button type="submit" name="complete">Complete</button>
      <input type="hidden" name="id" value="<?=$row['id']?>">
      <input type="hidden" name="complete" value="true">
    </form>
    <?php
} else {
        ?>
    Task Complete!
    <?php
}
    ?>
  </td>
  <td>
    <form method="POST">
      <button type="submit" name="delete">Delete</button>
      <input type="hidden" name="id" value="<?=$row['id']?>">
      <input type="hidden" name="delete" value="true">
    </form>
  </td>
</tr>
<?php
}
?>
    </tbody>
  </table>
</body>
</html>
````

# Repaso

En la próxima lección, comenzará a crear su propio código PHP. Tómese un segundo y revise lo que ya sabe sobre PHP:

+ A pesar de su antigüedad, PHP sigue siendo una tecnología de uso común en el desarrollo web.
+ PHP está diseñado para interactuar con HTML para generar sitios web dinámicos.
+ La incrustación de PHP en HTML se realiza colocando el código PHP entre las etiquetas `<?php` y `?>`.
+ Cada declaración en PHP debe terminarse con un punto y coma `;`
+ Los archivos PHP tienen una extensión __.php__ y el archivo siempre comienza con la etiqueta PHP de apertura `<?php`. La etiqueta de cierre está implícita y se excluye por convención.
+ El espacio en blanco generalmente se ignora al ejecutar código PHP.
+ Las palabras clave no distinguen entre mayúsculas y minúsculas en PHP. Como convención, use la carcasa estándar.
+ Los comentarios de una sola línea se hacen en PHP usando `#` o `//`. Los comentarios de varias líneas se colocan entre `/*` y `*/`.

----
[Próxima Lección](https://github.com/sebastiantorres86/curso-php/blob/master/cadenas-y-variables-php.md)