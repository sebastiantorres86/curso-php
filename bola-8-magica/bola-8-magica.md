# Magic 8 Ball
## PROYECTO

En esta lección, aprendió sobre condicionales, una parte fundamental pero poderosa de la programación. Los condicionales son tan poderosos, de hecho, que pueden usarse para predecir el futuro. En este proyecto, creará una función que puede responder cualquier pregunta de "sí" o "no".

----

El Magic 8-Ball es un juguete popular utilizado para adivinar o buscar consejos.

En este proyecto, creará una función que puede responder cualquier pregunta de "sí" o "no".

![](https://s3.amazonaws.com/codecademy-content/courses/learn-cpp/conditionals-and-logic/magic8ball.gif)

Las respuestas dentro de un Magic 8-Ball estándar son:

+ `Es cierto.`
+ `Es decididamente así.`
+ `Sin duda.`
+ `Sí definitivamente.`
+ `Puedes confiar en ello.`
+ `Como yo lo veo, sí.`
+ `Más probable.`
+ `Perspectivas buena.`
+ `Si.`
+ `Las señales apuntan a que sí.`
+ `Respuesta confusa, intenta otra vez.`
+ `Pregunta de nuevo más tarde.`
+ `Mejor no decirte ahora.`
+ `No se puede predecir ahora.`
+ `Concéntrate y pregunta otra vez.`
+ `No cuentes con eso.`
+ `Mi respuesta es no.`
+ `Mis fuentes dicen que no.`
+ `La perspectiva no es tan buena.`
+ `Muy dudoso.`

Su `magic8Ball()` aceptará cualquier pregunta de "sí" o "no" (como una cadena) y dará una respuesta psíquica (aleatoria).

----

### Tareas

## Crear la función "Esqueleto"

1. Defina una función `magic8Ball()`.

#### Pista

````
function magic8Ball()
{

}
````

----

2. Su función `magic8Ball()` debe solicitar al jugador que ingrese una pregunta de sí o no que desea que se responda. Siéntase libre de agregar un toque personal a esto. Use la función `readline()` para tomar su pregunta. Guarda esto como una variable.

#### Pista

````
function magic8Ball()
{
  echo "Dime ... ¿Cuál es tu pregunta?\n";
  $pregunta = readline(">");
}
````
----

3. Use `echo` para imprimir un mensaje en la terminal. El mensaje debe indicar la pregunta recibida. Imprima la pregunta que recibió. Debería sentirse libre de agregar florituras más dramáticas.

#### Pista

````
echo "\nHmm ya veo... Tu pregunta es $pregunta... Entiendo por qué esto pesa sobre ti... He consultado al mundo espiritual.\nAquí está tu respuesta: ";
````
----

4. Su respuesta "mágica" estará determinada por un entero aleatorio. Tenemos 20 posibles respuestas. Genere un entero aleatorio entre 0 y 19 (inclusive) y guárdelo en una variable.

#### Pista

Debería usar la función integrada `rand()` de PHP para generar este número entero.

````
$opción = rand(0, 19);
````

Tenga en cuenta que el aspecto importante de esta tarea es que podemos generar aleatoriamente 20 opciones cada una con la misma probabilidad. En su lugar, es totalmente aceptable hacer esto:

````
$opción = rand(1, 20);
````

Pero optamos por lo primero.

----

5. Agregue una línea a su programa que use echo` para imprimir el número aleatorio. Comentaremos esta parte del código más adelante, pero hasta ahora será útil para probar nuestro código.

#### Pista

````
echo $opcion;
````

----

## Pon a prueba tu función

6. Probemos su proyecto hasta ahora. Después de la definición de su función, invoque su función varias veces.

#### Pista

````
magic8Ball();
magic8Ball();
magic8Ball();
````

----

7. Ejecute su programa, proporcionando diferentes preguntas cada vez que se le solicite. Asegúrese de que su mensaje con la pregunta y el número aleatorio se muestren como se esperaba.

#### Pista

Después de guardar su código, ejecute el programa escribiendo `php index.php` en la terminal y presionando enter.

----

## Agregar la lógica condicional

8. Ahora es el momento de agregar el poder de decisión a su programa. Puede lograr esto con una serie de declaraciones if / elseif o una declaración switch.

    Su función debe imprimir la respuesta asociada con el número aleatorio que generó:

+ Si el número es `0`, `es seguro. ` debe ser impreso
+ Si el número es `1`, `es decididamente así.` debe ser impreso
+ Si el número es `2`, `sin duda.` debe ser impreso
+ Si el número es `3`, `sí, definitivamente.` debe ser impreso
+ Si el número es `4`, `puede confiar en ello.` debe ser impreso
+ Si el número es `5`, `tal como lo veo, sí.` debe ser impreso
+ Si el número es `6`, `lo más probable.` debe ser impreso
… y así.

Consulte la sugerencia si desea obtener ayuda para comenzar.

#### Pista

Estas son las primeras condiciones que usan `if` / `else if`:

````
if ($opcion === 0) {
   echo "Es cierto.\n";
} elseif ($opcion === 1) {
   echo "Definitivamente es así.\n";
} elseif ($opcion === 2) {
   echo "Sin duda.\n";
}
````

Y aquí está la sintaxis para una declaración `switch`:

````
switch ($opcion) {
     case 0:
         echo "Es cierto.\n";
         break;
     case 1:
         echo "Definitivamente es así.\n";
         break;
     case 2:
         echo "Sin duda.\n";
         break;
}
````

----

9. Si aún no lo ha hecho, comente o elimine la línea de código donde se hace eco del número aleatorio y vuelva a ejecutar su código. ¡Debería ver todas sus preguntas respondidas!

----

## Retos extra

10. Ahora que ha completado el proyecto, considere estos desafíos adicionales:

+ Refactorice su código: intente que su código sea lo más conciso y fácil de leer posible.
+ Si usó sentencias `if` / `elseif`, intente reescribir el código utilizando una sentencia switch o viceversa.
+ Personaliza el programa a tu gusto: ¡sé creativo!

----
[Próxima lección](https://github.com/sebastiantorres86/curso-php/blob/master/adivinador-de-numeros-php/adivinador-de-numeros-php.md)