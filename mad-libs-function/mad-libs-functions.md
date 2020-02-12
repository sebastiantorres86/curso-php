## LEARN PHP

# Funciones de Mad Lib

¡En este proyecto, usaremos PHP para escribir una función para completar una historia de Mad Libs! Mad Libs son historias cortas con espacios en blanco, que el usuario completa. El resultado suele ser divertido (o extraño).

Mad Libs requieren:

+ Una historia corta con espacios en blanco (solicitando diferentes tipos de palabras).
+ Palabras para completar esos espacios en blanco.

Ejemplo del poema "Las rosas son rojas" (en inglés):

![](https://s3.amazonaws.com/codecademy-content/courses/mad-lib-functions-php/madlibs.svg)

Para este proyecto, proporcionamos la historia, pero dependerá de usted crear una función que:

1. Toma las palabras deseadas como argumentos.
2. Devuelve la historia con las palabras en blanco en el lugar correcto.

¡Vamos a empezar!

----
# Tareas

## Crear una función

1. Crear una función `generarHistoria` con tres parámetros de entrada:

    + `$sustantivoSingular`
    + `$verbo`
    + `$color`

### Pista
````
function generarHistoria($sustantivo_singular, $verbo, $color)
{

}
````

----
2. Dentro de la función, cree una variable `$historia` y asígnele la última estrofa de "Pasando por árboles en una tarde nevada" de Robert Frost:

````
Los bosques son hermosos, oscuros y profundos.
Pero tengo promesas que cumplir,
Y millas por recorrer antes de dormir
Y millas por recorrer antes de dormir.
````

Use líneas nuevas (`\n`) para garantizar que las líneas se rompan en la ubicación correcta. También use uno al principio y al final para ayudar con el formateo.

### Pista
````
$historia = "\nEl bosque es encantador, oscuro y profundo.\nPero tengo promesas que cumplir,\nY millas para ir antes de dormir, \nY millas para ir antes de dormir.\n";
````
----
3. Por ahora, antes de agregar los "espacios en blanco", retornemos la historia de la función.

### Pista
````
return $historia;
````
----
4. Después de la definición de la función, use `echo` en tres invocaciones separadas de `generarHistoria` con entradas únicas. Use un sustantivo singular, un verbo y un color, como describen los parámetros de la función.

### Pista
````
echo generarHistoria ("perro", "comer", "púrpura");
echo generarHistoria ("coche", "cocinar", "bermellón");
echo generarHistoria ("espacio vacío", "hablar", "beige");
````
----
5. Hasta ahora, la función no es súper útil, ya que está devolviendo la misma historia cada vez.

Dentro de la función, cambie la cadena `$historia` para que analice la variable `$sustantivoSingular` donde está actualmente la palabra `bosques`, `$verbo` donde aparece la palabra `dormir` (ambas ubicaciones) y `$color` donde aparece `oscuro`.

### Pista
````
$historia = "\ Los ${sustantivosingulare}s son encantadores, ${color}s y profundos. \ Pero tengo promesas que cumplir,\nY millas por recorrer antes de ${verbo},\nY millas por recorrer antes de ${ verbo}.\n";
````
----
6. ¡Excelente! Ahora, agreguemos un parámetro más a nuestra función y permitamos que la palabra millas se reemplace con `$unidadDeDistancia` cuando se llama a la función (ambos lugares).

Recuerde actualizar las llamadas a `generarHistoria` para agregar este argumento adicional.

### Pista
````
función generarHistoria($sustantivoSingular, $verbo, $color, $unidadDeDistancia)
{
   $ story = "\nLos ${sustantivoSingular}s son encantadores, ${color}s y profundos.\nPero tengo promesas de mantener,\nY ${unidadDeDistancia} para ir antes de ${verbo},\nY $ {unidadDeDistancia} para ir antes de ${verbo}.\n ";
   return $historia;
}
````
----
7. ¡Ahora nuestra historia es un poco más divertida! Si lo desea, reemplace la historia con la suya.

También puede intentar usar la función de reemplazo de cadena integrada de PHP [str_replace](https://www.php.net/manual/en/function.str-replace.php) para simplificar su código.