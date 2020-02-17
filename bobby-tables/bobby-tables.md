# Bobby Tables
## PROYECTO
Use PHP para proteger su sitio de intentos de infiltración.

----
# Bobby Tables

Es necesario recopilar información de los usuarios, pero los usuarios nefastos pueden usar esto como una oportunidad para meterse con las cosas.

Al igual que los padres de [Bobby Tables](https://xkcd.com/327/).

Hemos creado un formulario para que un usuario cree un perfil en nuestro sitio. Queremos recopilar el nombre, el carácter, el correo electrónico y el año de nacimiento del usuario. Nuestros usuarios han tenido un día de campo con esto y necesitamos limpiar nuestro formulario.

¡Vamos a empezar!

----
### Tareas

# ¿Qué hay en un nombre?

1. Intente enviar algo de HTML en el cuadro de entrada de nombre, como `<h1> HOLA </h1>`.

    ¿Puedes ver cómo esto podría causar problemas si otro usuario estaba navegando por este perfil?
#### Pista
El HTML se está interpretando y mostrando. Un usuario nefasto podría usar esto para cambiar el comportamiento de otros que vean su perfil.

----

2. Queremos permitir que los usuarios usen caracteres HTML en sus nombres, pero no queremos interpretarlos.

    Cuando estamos asignando `$name` al valor de entrada, use una función incorporada para transformar los caracteres HTML de la entrada en entidades HTML.
#### Pista
````
$name = htmlspecialchars($_POST["name"]);
````
----

3. También eliminemos cualquier espacio en blanco inicial o final del nombre.

    Use una función incorporada para esto.
#### Pista
````
$name = trim(htmlspecialchars($_POST["name"]));
````
----

4. También queremos evitar que las personas se hagan pasar por otros usuarios. Para hacer esto, necesitamos verificar el nombre de la entrada contra el contenido de la matriz `$existing_users`.

    En lugar de asignar directamente a la variable `$name`, asigne el valor transformado de la entrada a `$raw_name`.
#### Pista
````
$raw_name = trim(htmlspecialchars($_POST["name"]));
````
----

5. Compruebe si `$raw_name` está en `$existing_users`, utilizando la [función incorporada `in_array`](https://www.php.net/manual/en/function.in-array.php).

    Si es así, concatene `"Este nombre está en uso.<br>";` a `$validation_error`.

    Si es un nombre nuevo, asigne `$raw_name` a `$name`.
#### Pista
````
$raw_name = trim(htmlspecialchars($_POST["name"]));
if (in_array($raw_name, $existing_users)) {
  $validation_error .= "Este nombre está en uso. <br>";
} else {
  $name = $raw_name;
}
````
----

# Personajes extraños

6. Tenemos la intención de que los usuarios sean hechiceros, magos u orcos. A pesar de que el personaje es una selección de botón de opción, los usuarios pueden configurar algo además de estas opciones.

    Pruébelo usted mismo inspeccionando una de las opciones del navegador integrado (en Chrome, haga clic con el botón derecho en una de las opciones, como "Hechicero" e inspeccione).

    Puede cambiar el "valor" de la opción a una cadena diferente, como `"cachorro"`. Seleccione esa opción y envíe el formulario para ver qué sucede.
#### Pista
Recuerde, el usuario puede editar el código de front-end. Necesitamos validar su presentación en el back-end.

----

7. En lugar de asignar la entrada de caracteres a `$character`, guárdelo en una nueva variable `$raw_character` para que podamos validarlo.
#### Pista
````
$raw_character = $_POST["character"];
````
----

8. Use la [función incorporada `in_array`](https://www.php.net/manual/en/function.in-array.php) para verificar si `$raw_character` está en la matriz `["hechicero", "mago", "orco"]`.

    Si es así, asigne `$raw_character` a `$character`.

    Si no es así, concatene `"Debe elegir un hechicero, un mago o un orco. <br>"` a `$validation_error`.
#### Pista
````
$raw_character = $_POST["character"];
if (in_array($raw_character, ["hechicero", "mago", "orco"])) {
  $character = $raw_character;
} else {
  $validation_error .= "Debe elegir un hechicero, un mago o un orco. <br>";
}
````
----

# Correos electrónicos que no son correos electrónicos

9. Queremos evitar que los usuarios ingresen direcciones de correo electrónico que no son... bueno... direcciones de correo electrónico.

    Comience asignando la entrada de correo electrónico a una nueva variable `$raw_email`, para que podamos validarla.
#### Pista
````
$raw_email = $_POST["email"];
````
----

10. Use una función PHP integrada para verificar si `$raw_email` es una dirección de correo electrónico.

    Si es así, asigne `$raw_email` a `$email`.

    Si no es así, concatene `"Correo electrónico no válido. <br>"` a `$validation_error`.
#### Pista
````
if (filter_var($raw_email, FILTER_VALIDATE_EMAIL)){
  $email = $raw_email;
} else {
  $validation_error .= "Correo electrónico no válido. <br>";
} 
````
----

# ¿¿¿Cuántos años???

11. Estamos utilizando el año de nacimiento del usuario para mostrar una edad en el perfil del usuario. Intente ingresar un año de nacimiento en el futuro o en el pasado y vea qué sucede.
#### Pista
Al enviar años de nacimiento inválidos, podemos generar edades negativas o muy poco realistas.

----

12. En lugar de asignar la entrada del año de nacimiento a `$birth_year` directamente, asígnela a una nueva variable `$raw_birth_year`.
#### Pista
````
$raw_birth_year = $_POST["birth_year"];
````
----

13. Usaremos `filter_var` con algunas opciones para limitar el rango de años que los usuarios pueden enviar.

    Cree una variable `$options` para establecer los valores mínimos y máximos en años realistas.

    Puede obtener el año actual usando la `date("Y")`.
#### Pista
````
$options = ["options" => ["min_range" => 1900, "max_range" => date("Y")]];
````
----

14. Agregue un chequeo para asegurarse de que `$raw_birth_year` es un número entero en el rango definido por `$options`.

    Si es así, asigne `$raw_birth_year` a `$birth_year`.

    Si no es así, concatene `"Ese no puede ser su año de nacimiento. <br>`" a `$validation_error`.
#### Pista
````
if (filter_var($raw_birth_year, FILTER_VALIDATE_INT, $options)) {
  $birth_year = $raw_birth_year;
} else {
  $validation_error .= "Ese no puede ser su año de nacimiento. <br>";
}
````
----

# ¡Excelente!

15. ¡Felicitaciones, ahora debería tener un formulario que sea en su mayoría impermeable a los usuarios mal intencionados!

    Si desea más práctica, considere implementar lo siguiente:

    + Los magos tienen que nacer en años bisiestos
    + Todos los nombres deben comenzar con caracteres en minúscula
    + Los correos electrónicos deben terminar en .com

----
[Próxima lección](https://github.com/sebastiantorres86/curso-php/blob/master/clases-y-objetos.md)