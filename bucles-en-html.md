# ¿Por qué usar notación abreviada?

El uso de la sintaxis de bucle tradicional en PHP con corchetes ({}) para abrir y cerrar bloques de código se puede usar al incrustar código PHP en HTML:

````
<ul>
<? php
for ($i = 0; $i < 2; $i) {
?>
<li> Pato </li>
<?php
}
?>
<li> Ganso </li>
</ul>
````

Sin embargo, al agregar bucles anidados, la legibilidad del código puede verse afectada. Para determinar dónde terminan los bucles, tenemos que contar y hacer coincidir las llaves.

Afortunadamente, PHP ofrece una sintaxis alternativa que es especialmente útil cuando se trabaja con HTML. En lugar de usar una llave de apertura (`{`), usamos dos puntos (`:`) y en lugar de usar una llave de cierre (`}`), usamos una palabra clave de cierre y un punto y coma (`;`). Para el bucle `for`, la palabra clave de cierre es `endfor`. Nuestro ejemplo de pato, pato y ganso se convierte en:

````
<ul>
<?php
for ($i = 0; $i < 2; $i):
?>
<li> Pato </li>
<?php
endfor
?>
<li> Ganso </li>
</ul>
````

Ahora, al leer este código, se hace evidente de inmediato que la palabra clave `endfor` está cerrando el ciclo `for`.

----

# Loop abreviado

Ya hemos cubierto la abreviatura de bucles `for` PHP. Las versiones para bucles `while` y `foreach` son muy similares.

La única diferencia son las palabras clave de cierre. Para un ciclo `while`, la palabra clave de cierre es `endtime`, y para el ciclo `foreach`, la palabra clave de cierre es `endforeach`.

Nuestro ejemplo de duck, duck y goose para el bucle `while` se convierte en:

````
<ul>
<?php
$ i = 0;
mientras que ($i <2):
?>
<li> Pato </li>
<? php
$i++;
mientras tanto
?>
<li> Ganso </li>
</ul>
````

Y el mismo ejemplo usando foreach se convierte en:

````
<ul>
<?php
$array = [0, 1];
foreach ($array as $ i):
?>
<li> Pato </li>
<?php
endforeach
?>
<li> Ganso </li>
</ul>
````
----

# Consideraciones sobre bloques de código

Un patrón frecuente que encontramos es iterar sobre una matriz usando un bucle `foreach` y crear elementos HTML usando los elementos de la matriz. El siguiente enfoque no funciona como cabría esperar:

````
<?php
$array = ["Alice", "Bob", "Charlie"];
foreach ($array as $name):?>
<p>$name</p>
<?php endforeach; ?>
````

Dado que estamos en modo HTML y no en modo PHP cuando usamos `$name` aquí, simplemente imprimirá `$name`, en lugar del elemento correspondiente de la matriz.

Debido a este comportamiento, es importante recordar volver a ingresar al modo PHP antes de usar variables PHP. Esto se puede hacer usando las etiquetas de apertura `<?php` y `?>` de cierre. Si simplemente va a imprimir la variable usando `echo`, también puede usar la etiqueta de apertura abreviada `echo` (`<?=`).

Con esto, nuestro ejemplo se puede solucionar así:

````
<?php
$array = ["Alice", "Bob", "Charlie"];
foreach ($array as $name):?>
<p><?=$name?></p>
<?php endforeach; ?>
````
----

# Repaso

Con los métodos abreviados de PHP que acaba de aprender, ahora puede crear archivos HTML más legibles con bucles PHP integrados.

Estas son las ideas clave de esta lección:

+ La abreviatura de PHP para bucles usa dos puntos (`:`) en lugar de una llave (`{`) para abrir el bloque de código.
+ Los métodos abreviados utilizan palabras clave para cerrar el bloque de código en lugar de una llave (`}`):
    + Use `endfor` para cerrar un bucle `for`
    + Use `endforeach` para cerrar un bucle `foreach`
    + Use `endwhile` para cerrar un ciclo `while`
+ La palabra clave de cierre debe ir seguida de un punto y coma (`;`).
+ Asegúrese de volver a ingresar al modo PHP usando `<?php` o la abreviatura de `echo` `<?=` antes de usar variables PHP en el bucle

----
[Próxima lección](https://github.com/sebastiantorres86/curso-php/blob/master/cafe-repetitivo/cafe-repetitivo.md)