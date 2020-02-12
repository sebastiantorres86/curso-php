# Adivinación de números PHP
## PROYECTO

En este proyecto, crearás un juego de adivinanzas numéricas. Tu programa generará un número aleatorio entre 1 y 10. Ejecutarás el juego 10 veces y le contarás al usuario cierta información sobre sus habilidades para adivinar.

----

### Tareas

# Crea el juego:

1. En este programa, veremos con qué frecuencia el jugador puede adivinar un número generado aleatoriamente. Después de varias rondas, le diremos al jugador qué porcentaje de las veces adivinó correctamente y si tenía una tendencia a adivinar demasiado alto o demasiado bajo.

    Para que nuestro programa funcione, necesitaremos realizar un seguimiento de algunas variables. Cree cuatro variables y asigne `0` como valor para cada una:

+ `$play_count` hará un seguimiento de cuántas rondas del juego se han jugado.
+ `$correct_guesses` hará un seguimiento de cuántas veces adivinan correctamente.
+ `$guess_high` hará un seguimiento de cuántas de sus conjeturas fueron más altas que el número real.
+ Y` $guess_low` hará un seguimiento de cuántas de sus conjeturas fueron inferiores al número real.

#### Pista

````
$play_count = 0;

$correct_guesses = 0;

$guess_high = 0;

$guess_low = 0; 
````

----

2. Antes de comenzar el juego, debes explicarle al jugador cómo funciona. Use `echo` para imprimir un mensaje que explique el juego al jugador. Puede consultar la pista para ver lo que escribimos.

#### Pista

````
echo "Voy a pensar en números entre 1 y 10 (inclusive). ¿Crees que puedes adivinar correctamente?\n";
````

----

3. La jugabilidad real tendrá lugar dentro de una función. Declarar una función `guessNumber()`. No toma ningún argumento.

#### Pista

````
function guessNumber()
{

}
````

----

4. Necesitaremos acceso a las variables que declaró dentro de la función, por lo que debe declararlas como variables globales (`global`) dentro del cuerpo de su función.

#### Pista

````
global $guess_high, $guess_low, $correct_guesses, $play_count;
````

----

5. Incremente la variable `$play_count`.

#### Pista

````
$play_count++;
````

----

6. Genere el número aleatorio para esta ronda. Debe estar entre 1 y 10 (inclusive).

    Asegúrese de guardar este número como una variable.

#### Pista

````
$num = rand(1, 10);
````

----

7. En el siguiente paso, le pediremos al jugador que adivine, pero antes de hacerlo, recordémoslo.

    Use `echo` para imprimir un mensaje al jugador. Recomendamos poner un carácter de nueva línea (`\n`) a cada lado de su mensaje para que el formato se vea mejor al final.

#### Pista

````
echo "\nAdivina...\n";
````

----

8. ¡Okay! Es hora de obtener la conjetura jugador. Use la función `readline()` para obtener la entrada del jugador desde la terminal.

    Sugerimos pasar la cadena de solicitud `">> "`. Ayuda al jugador a ver dónde está escribiendo.

    Asegúrese de guardar su respuesta como una variable.

#### Pista

````
$guess = readline(">> ");
````

----

9. ¡Increíble! Ahora tenemos la suposición del jugador. La función `readline()` toma la entrada del usuario como una cadena... Como vamos a realizar cálculos con la suposición del jugador, necesitaremos convertirlo en un número...

    Encuentre una función PHP incorporada para convertir una cadena en un valor entero.

#### Pista

Utilizamos la función `intval()`.

Puede convertir el número como un segundo paso como este:

````
$guess = readline(">> ");

$guess = intval($guess);
````

o puedes hacer todo esto en el mismo paso:

````
$guess = intval(readline (">> "));

````

----

10. Imprimamos alguna información sobre la ronda actual para el jugador. Hágales saber en qué número redondo están, cuál era el número aleatorio y qué adivinaron.

#### Pista

````
echo "Round: $play_count\nMi número: $numb Su conjetura: $guess";
````

----

11. Ajuste las variables globales comparando su estimación con el número aleatorio:

+ Si su suposición era la misma que el número aleatorio, incremente la variable `$correct_guesses`.
+ Si su estimación fue mayor que el número aleatorio, incremente la variable `$guess_high`.
+ Si su estimación fue menor que el número aleatorio, incremente la variable `$guess_low`.

#### Pista

Así es como se vería su función `guessNumber()`:

````
function guessNumber()
{
    global $guess_high, $guess_low, $correct_guesses, $play_count;

        $play_count++;

    $num = rand(1, 10);

      echo "\nHaz tu conjetura...\n";

    $guess = intval(readline(">> "));

    echo "Round: $play_count\nMi numero: $num\nTu conjetura: $guess";

    if ($guess === $num){
        $correct_guesses++; 
    }

    if ($guess > $num){
        $guess_high++;
    }

    if ($guess < $num){
        $guess_low++;
    }
}
````

----

12. Invoque la función `guessNumber()` tantas veces como desee que haya rondas. Comenzamos con 10.

#### Pista

````
guessNumber();
guessNumber();
guessNumber();
guessNumber();
guessNumber();
guessNumber();
guessNumber();
guessNumber();
guessNumber();
guessNumber();
````

----

13. Calcule el porcentaje de conjeturas que el jugador acertó y guarde este valor como una variable.

#### Pista

````
$percent_correct = $correct_guesses/$play_count * 100;
````

----

14. Deje que el jugador sepa qué porcentaje de las veces adivinó correctamente.

#### Pista

````
echo "\nDespués de las rondas de $play_count, aquí hay algunos datos sobre sus conjeturas: \nAdivinó el número correctamente $percent_correct% del tiempo.\n";
````

----

15. Casi termina. Analicemos un poco las conjeturas de nuestros jugadores.

Si el jugador tenía más conjeturas altas que conjeturas bajas, escriba `"Cuando adivinó mal, tendió a adivinar alto"`. De lo contrario, si el jugador tiene más conjeturas bajas que conjeturas altas, escriba `"Cuando adivinó mal, tendió a adivinar bajo"`.

#### Pista

Si construye este condicional correctamente, debe imprimir un mensaje solo si una condición u otra es verdadera. Si ninguna de las dos condiciones es verdadera, significa que el jugador acertó el mismo número de veces que acertó (¡tal vez incluso acertó correctamente cada vez!) En esas situaciones, no imprimiremos un mensaje en absoluto.

````
if ($ guess_high > $ guess_low) {
     echo "Cuando adivinaste mal, tendías a adivinar alto";
} else if ($ guess_high <$ guess_low) {
     echo "Cuando adivinaste mal, tendías a adivinar bajo";
}
````

16. ¡Es hora de jugar, prueba tu juego! Puede ejecutar su programa escribiendo `php index.php`.

Está bien si su programa no se ejecuta correctamente. Sé paciente contigo mismo y resuelve cualquier problema en tu código.

Una vez que el programa se esté ejecutando, reprodúzcalo para asegurarse de que se ejecuta como se esperaba.

Si desea salir del programa, puede escribir `control``c` en el terminal.

Si desea borrar el terminal para poder ver la salida de su programa con mayor claridad, puede ingresar `clear` en el terminal.

----

17. Ahora que tu juego funciona correctamente, ¡hazlo tuyo! Agregue elementos a su programa y personalícelos a su gusto.

Buscando ideas? Aquí hay algunas tareas de desafío:

+ No permita que el jugador ingrese un número inferior a 1 o superior a 10.
+ Realice análisis más complicados sobre sus conjeturas: ¿el jugador a menudo adivinó muy alto? ¿Muy bajo?
+ Haga una versión diferente del juego de adivinanzas: tal vez lanzar una moneda.
Si creas algo que te entusiasme, ¡a nosotros también nos entusiasma! ¡Por favor compártelo con nosotros!

