## OPERADORES LÓGICOS Y CONDICIONES COMPUESTAS

# Declaraciones condicionales anidadas

En la lección anterior, exploramos los fundamentos de la toma de decisiones en la programación: booleanos y condicionales. En esta lección, profundizaremos la complejidad de las capacidades de toma de decisiones de nuestros programas: podremos hacer programas donde cada decisión tomada envíe nuestro programa en una ruta diferente donde podría encontrar decisiones adicionales.

Escribimos un código para ilustrar nuestro proceso de toma de decisiones al tomar un elevador. Lea el código para dar sentido al proceso:

````
  $is_elevator_here = true;
  $elevator_direction = "down";
  $my_direction = "arriba";
  $is_button_pushed = false;

  if ($is_elevator_here) {
      if ($elevator_direction === $my_direction) {
        echo "Estoy en el elevador";
      } else {
          if ($is_button_pushed) {
            echo "Estoy esperando ...!";
          } else {
              echo "Estoy presionando el botón";
          }
     }
  } else {
      if ($is_button_pushed) {
          echo "Estoy esperando ...";
      } else {
          echo "Estoy presionando el botón";
      }
   }
````

Tenga en cuenta que para implementar este proceso de toma de decisiones con código, _anidamos_ condicionales uno dentro del otro. Esta es una forma de hacer programas más complicados. En esta lección, también aprenderemos un nuevo conjunto de operadores que nos permitirán diseñar programas de toma de decisiones más elaborados. Al final, estarás equipado para crear programas potentes y dinámicos.

----

# El Operador ||

Las expresiones que usan _operadores lógicos_ evalúan valores booleanos.

El operador lógico `||` toma dos valores booleanos o expresiones diferentes como sus operandos y devuelve un solo valor booleano. Devuelve `TRUE` __si__ su operando izquierdo __o__ su operando derecho se evalúan como `TRUE`. Podemos usar `||` en situaciones donde más de una condición debería conducir al mismo resultado.

````
TRUE || TRUE; // Evalúa a: TRUE

FALSE || TRUE; // Evalúa a: TRUE

TRUE || FALSE; // Evalúa a: TRUE

FALSE || FALSE; // Evalúa a: FALSE
````

Pensemos en un ejemplo que podríamos encontrar en el desarrollo web: al solicitar un cambio de contraseña para una aplicación web, la contraseña solo puede cambiarla el usuario o un administrador.

````
$is_admin = FALSE;
$is_user = TRUE;
if ($is_admin || $is_user) {
  echo "Puedes cambiar la contraseña";
}
````

En el código anterior, la condición `$is_admin || $is_user` se evalúa como `TRUE` y `"Puedes cambiar la contraseña"` se imprime en el terminal. Tenga en cuenta que mientras `$is_admin` es `FALSE`, `$is_user` es `TRUE`. El operador `||` es inclusivo: se evalúa como `TRUE` si uno o ambos operandos son `TRUE`.

----

# El operador &&

A menudo, nos encontramos con situaciones en las que tenemos más de una condición que necesitamos satisfacer para tomar una acción.

El operador lógico `&&` devuelve `TRUE` solo si sus dos operandos se evalúan como `TRUE`. Devuelve `FALSE` si uno o ambos de sus operandos se evalúan como falsos.

````
TRUE && TRUE; // Evalúa a: TRUE
FALSE && TRUE; // Evalúa a: FALSE
TRUE && FALSO; // Evalúa a: FALSE
FALSE && FALSE; // Evalúa a: FALSE
````

Pensemos en un ejemplo del mundo real: al intentar retirar dinero de un cajero automático, el titular de la cuenta debe proporcionar el PIN correcto __y__ tener suficiente dinero en su cuenta.

````
$correct_pin = TRUE;
$enough_funds = TRUE;
if ($correct_pin && $enough_funds) {
  echo "Puedes hacer el retiro";
}
````

El operador `&&` tiene una [precedencia de operador](https://www.php.net/manual/en/language.operators.precedence.php) más alta que el operador `||`. Esto significa que en una declaración compleja que incluye ambos operadores, la computadora evaluará la parte de la expresión con `&&` primero:

````
TRUE || TRUE && FALSE // Evalúa a: TRUE
````

Si queremos controlar el orden en que se evalúa la expresión, podemos usar paréntesis para forzar el orden:

````
(TRUE || TRUE) && FALSE // Evalúa a: FALSE
````

----

# El operador not

El operador lógico not (`!`) Solo toma un operando correcto. Invierte el valor booleano de su operando.

````
!TRUE; // Evalúa a: FALSE
!FALSE; // Evalúa a: TRUE
````

El operador not tiene prioridad de operador muy alta; asegúrese de usar paréntesis para que la evaluación del código se realice según lo previsto:

````
!10 < 11; // Evalúa a: TRUE
!(10 < 11); // Evalúa a: FALSE
!TRUE || TRUE; // Evalúa a: TRUE
!(TRUE || TRUE); // Evalúa a: FALSE
````

El operador not es útil cuando solo queremos tomar un curso de acción si una condición no es verdadera. Por ejemplo, si un usuario __no__ ha iniciado sesión, una aplicación web puede mostrar una ventana emergente diciéndole que debe hacerlo para continuar.

````
$is_logged_in = FALSE;
if (!$is_logged_in) {
   echo "Debe iniciar sesión para continuar";
}
````

Podríamos lograr esta misma funcionalidad sin usar el operador `!`, pero mira cuánto más engorroso es ese código:

````
$is_logged_in = FALSE;
if ($is_logged_in) {
  // Hacer nada...
} else {
   echo "Debe iniciar sesión para continuar";
}
````

# El operador Xor

El operador lógico `xor` significa `exclusivo o`. Toma dos valores booleanos o expresiones diferentes como sus operandos y devuelve un solo valor booleano. A diferencia del `or` regular que se evalúa como `TRUE` __si__ su operando izquierdo __o__ su operando derecho se evalúan como `TRUE`, `xor` se evalúa como `TRUE` solo si su operando izquierdo __o__ su operando derecho se evalúan como `TRUE`, pero __no ambos__.

````
TRUE xor TRUE; // Evalúa a: FALSE

FALSE xor TRUE; // Evalúa a: TRUE

TRUE xor FALSE; // Evalúa a: TRUE

FALSE xor FALSE; // Evalúa a: FALSE
````

Podemos usar `xor` para responder una o dos preguntas: ¿Usó anteojos o lentes de contacto hoy?

+ Si ninguno de los dos, la respuesta es "No": no usaba anteojos ni lentes de contacto. Mi visión está deteriorada.
+ Si usaba ambos, la respuesta es "No": no usaba anteojos _ni_ lentes de contacto. Mi visión está deteriorada.
+ Si usaba contactos, la respuesta es "Sí". Llevaba contactos, por lo que mi visión se corrigió.
+ Si usaba anteojos, la respuesta es "Sí"; usaba anteojos, por lo que mi visión se corrigió. 

Codifiquemos este ejemplo:

````
$is_wearing_glasses = TRUE;
$is_wearing_contacts = TRUE;

if ($is_wearing_glasses xor $is_wearing_contacts) {
    echo "¡Tu visión está corregida!";
} else {
    echo "Tu visión está deteriorada";
}
````

----

# Sintaxis Alternativa

Una sintaxis alternativa para el operador lógico `||` es el operador `or`, y una sintaxis alternativa para el operador lógico `&&` es el operador `and`. Estos operadores tienen la ventaja de hacer que nuestro código sea más legible para los humanos.

````
// El Operador or:
TRUE or TRUE; // Evalúa a: TRUE
FALSE or TRUE; // Evalúa a: TRUE
TRUE or FALSE; // Evalúa a: TRUE
FALSE or FALSE; // Evalúa a: FALSE

// El operador and:
TRUE and TRUE; // Evalúa a: TRUE
FALSE and TRUE; // Evalúa a: FALSE
TRUE and FALSE; // Evalúa a: FALSE
FALSE and FALSE; // Evalúa a: FALSE
````

La computadora trata a estos operadores de manera ligeramente diferente de los operadores de símbolos debido a la [precedencia del operador](https://www.php.net/manual/en/language.operators.precedence.php). Los operadores lógicos el `or` y `and` tienen una precedencia menor que `||` y `&&`.

````
TRUE || TRUE && FALSE // Evalúa a: TRUE
TRUE || TRUE and FALSE // Evalúa a: FALSE
````

Como mencionamos anteriormente, podemos evitar la confusión de precedencia de operadores usando paréntesis para forzar la evaluación que queremos:

````
(TRUE || TRUE) && FALSE // Evalúa a: FALSE
TRUE || (TRUE and FALSE) // Evalúa a: TRUE
````

----

# Programas de varios archivos: include

La separación de las preocupaciones es el principio de diseño de programación de organizar el código en secciones distintas, cada una de las cuales maneja una tarea específica. Nos permite navegar rápidamente por nuestro código y saber dónde buscar si algo no funciona. Hemos visto cómo las funciones pueden permitirnos practicar la separación de preocupaciones: al empaquetar ciertas rutinas en las funciones, podemos escribir un código más limpio. Pero cuando los programas comienzan a ser muy largos, las funciones no siempre son suficientes.

Otra forma de mejorar nuestro código y las preocupaciones por separado es con la _modularidad_, separando un programa en fragmentos distintos y manejables donde cada uno proporciona una parte de la funcionalidad general. En lugar de tener un programa completo ubicado en un solo archivo, el código se organiza en archivos separados. Cada archivo se __incluye__ en nuestro programa principal con la palabra clave `include`. Una declaración `include` traerá el código de un archivo al archivo actual y también ejecutará el código. Es como si todo el código de ese archivo estuviera escrito allí mismo. Proporcionamos la ruta al archivo para que se incluya como una cadena.

Por ejemplo, supongamos que teníamos tres archivos __one.php__, __two.php__ e __index.php__, y queremos incluir el código de los archivos __one.php__ y __two.php__ dentro de __index.php__:

````
// one.php
echo "¿Cómo está";
````
````
// two.php
echo " usted?";
````
````
// index.php
echo "¡Hola!";
incluye "one.php";
incluye "two.php";
// Imprime: ¡Hola! ¿Cómo está usted?
````

Cuando ejecutamos __index.php__ `¡Hola! ¿Cómo está usted?` es impreso en el terminal.

----

# Repaso

¡Gran trabajo! Has aprendido las herramientas necesarias para crear programas con poderosas capacidades de toma de decisiones. Revisemos lo que cubrimos:

+ Al anidar condicionales entre sí, podemos crear decisiones de ramificación.
+ El operador lógico `||` toma dos valores booleanos o expresiones diferentes como sus operandos y devuelve un solo valor booleano. Devuelve `TRUE` si su operando izquierdo o su operando derecho se evalúan como `TRUE`.
+ El operador lógico `&&` devuelve `TRUE`solo si sus dos operandos se evalúan como `TRUE`. Devuelve `FALSE` si uno o ambos de sus operandos se evalúan como `FALSE`.
+ El operador lógico no (`!`) Solo toma un operando correcto. Invierte el valor booleano de su operando.
+ La lógica exclusiva u operador (`xor`) devuelve `TRUE` solo si su operando izquierdo o su operando derecho se evalúan como `TRUE`, pero __no ambos__ o __ninguno__.
+ PHP incluye sintaxis alternativa para `||` y operadores de `&&`: podemos usar o en lugar de `||`, y podemos usar y en lugar de `&&`. Estos operadores funcionan de la misma manera pero tienen una [precedencia de operador](https://www.php.net/manual/en/language.operators.precedence.php) diferente.
+ Podemos __incluir__ código de un archivo dentro de otro con `include` que nos permite escribir programas modulares en modo.

¡Impresionante trabajo!

----
[Próxima Clase]()