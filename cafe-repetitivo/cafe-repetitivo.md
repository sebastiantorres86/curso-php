# Cafe repetitivo
## PROYECTO

Use sus habilidades de bucle PHP para crear una página de menú para Café Repetitivo.

Utilice algunas de las abreviaturas del bucle PHP para crear HTML para un menú de restaurante. Practique el uso de los diferentes tipos de bucles con HTML.

----
### Tareas

# Deberes

1. Esta es una página de menú para la cafetería. Vamos a agregar algunas bebidas que tienen un precio único y algunos pasteles que cada uno se vende por $2.

    Vamos a almacenar los nombres y precios (de las bebidas) de los artículos en PHP e incorporar PHP en nuestro HTML para mostrarlos.

    Comience creando una sección PHP en la parte superior del archivo para almacenar los detalles del elemento.

    Crea una matriz de `$bebidas` y llénala con varias bebidas que te gustaría servir en tu cafetería. El nombre de la bebida debe ser la clave y el precio debe ser el valor.

#### Pista
Fuimos con:
````
<?php
$bebidas = [
   "Latte" => 3.99,
   "Café" => 2.00,
   "Té" => 2.50,
   "Mocha" => 4.50
];
?>
````

----

2. Agregue una lista de pasteles para servir en su cafetería. Como todos cuestan $2, no hay necesidad de agregar precios.

#### Pista
Fuimos con:
````
$pasteles = [
   "Croissant",
   "Muffin",
   "Rebanada de tarta",
   "Rebanada de pastel",
   "Cupcake",
   "Brownie"
];
````
----

# Bucle foreach

3. Dentro de la sección `<ul>` debajo de bebidas, cree un bucle `foreach` usando la sintaxis abreviada. Debe iterar sobre los elementos en `$bebidas` y proporcionar acceso a las claves y valores.

#### Pista
Un enfoque que puede usar sus propias variables para $bebida y $precio:
````
<?php foreach($bebidas as $bebida=>$precio):?>
<?php endforeach;?>
````

----

4. Dentro de ese ciclo `foreach`, agregue un elemento `li` para cada artículo de bebida.

#### Pista
El elemento `li` va dentro del bucle:
````
<?php foreach($bebidas as $bebida=>$precio):?>
<li></li>
<?php endforeach;?>
````
----

5. Dentro del elemento `li`, vuelva a ingresar al modo PHP para imprimir el nombre de la bebida y el precio. Siéntase libre de usar su moneda local.

#### Pista
Usando signo peso:
````
<?php foreach($bebidas as $bebida=>$precio):?>
<li><?="$bebida: $$precio"?></li>
<?php endforeach;?>
````

----

# Bucle for

6. A continuación, debemos agregar nuestra lista de pasteles al menú.

    Comience agregando un bucle `for` dentro del elemento `ul` debajo del encabezado “¡Pasteles!”. La variable del ciclo debe inicializarse en 0 e incrementarse en cada iteración del ciclo.

#### Pista
````
<ul>
<?php for($i=0; ; $i++):?>

<?php endfor;?>
</ul>
````

----

7. Vamos a usar la variable de bucle para acceder a elementos dentro de `$pasteles`, por lo que necesitamos que continúe el bucle `for` mientras nuestro contador de bucles sea menor que la cantidad de elementos en `$pasteles`.

    Agregue esta condición a su bucle `for`.

#### Pista
Hay un par de formas de abordar esto, pero esta es la más común:
````
<ul>
<?php for ($i = 0; $i<count($pasteles); $i++):?>

<?php endfor;?>
</ul>
````
----

8. Cree un elemento `li` para cada iteración de bucle.

#### Pista
````
<ul>
<?php for($i=0; $i<count($pasteles); $i++):?>
<li></li>
<?php endfor;?>
</ul>
````
----

9. Dentro del elemento `li`, use la variable de bucle para indexar en `$pasteles` e imprimir el nombre de cada pastel.

#### Pista
Nuestra variable de bucle es `$i`, por lo que estamos indexando así:
````
<ul>
<?php for ($i = 0; $i<count($pasteles); $i++):?>
<li><?=$pasteles[$i]?> </li>
<?php endfor;?>
</ul>
````
----
# Ideas adicionales

10. ¡Excelente! Ahora tiene un menú de bebidas y pasteles para la cafetería. Tenga en cuenta cómo puede actualizar fácilmente las matrices al comienzo del archivo y el sitio web HTML se actualiza en consecuencia.

    Si desea seguir practicando, intente agregar una sección de alimentos al menú y use un ciclo `while` para iterar sobre los elementos.

    ¿Qué tipo de bucle es el más legible para usted?

    ¿Cuál fue el más fácil de crear para este tipo de aplicación?

----
[Próxima lección]()
