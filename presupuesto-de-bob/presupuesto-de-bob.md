# Presupuesto de Bob

## PROYECTO

Usa todo lo que has aprendido sobre cadenas, números, matrices y variables de PHP para ayudar a un amigo a calcular su presupuesto anual.

Practica todo lo que has aprendido hasta ahora sobre escribir programas PHP.

----

## Tareas
### ¡Impuestos!

1. ¡Bob acaba de conseguir un nuevo trabajo y necesita ayuda para calcular su presupuesto!

    Tiene un salario, gastos anuales, gastos mensuales y gastos semanales. Quiere saber cuánto de su salario puede ahorrar en el transcurso de un año.

    La carta de oferta de su trabajo tiene un salario antes de impuestos de 48,150. Hemos almacenado este valor en `$salarioBruto`.

    Donde vive Bob, hay un sistema fiscal progresivo. Paga el 12% (mantiene el 88%) en los primeros 9.700, el 22% (mantiene el 78%) en los próximos 29.775 y paga el 24% (mantiene el 76%) en el resto de su salario. Estos datos se almacenan en `$ingresosSegmentos`.

    `$ingresosSegmentos` es una matriz que contiene una matriz para cada segmento de ingresos con la cantidad gravada y el porcentaje que puede mantener.

    Comencemos a calcular el salario anual de Bob después de impuestos.

    Use `$ingresosSegmentos` para calcular el `$ingresoNeto` de Bob después de este conjunto de impuestos.

    Debería sumar los productos de cada porción de los impuestos. La primera porción es 8.536 (9.700 * 0,88).

#### Pista

````
$ingresoNeto = ($ingresosSegmentos[0][0] * $ingresosSegmentos[0][1]) + ($ingresosSegmentos[1][0] * $ingresosSegmentos[1][1]) + ($ingresosSegmentos[2][0] * $ingresosSegmentos[2][1]);
````

----

2. Bob también tiene un impuesto de seguridad social que es un porcentaje de su salario total. Esta cantidad se almacena en `$seguridadSocial`. Resta esto de `$ingresoNeto`.

    Almacene el ingreso anual después de impuestos en `$ingresoAnual` e imprímalo en la pantalla.

#### Pista

````
$ingresoNeto -= $seguridadSocial;
$ingresoAnual = $ingresoNeto;
echo "Ingresos anuales antes de deducir gastos anuales: \n$ingresoAnual\n";
````

----

### Gastos anuales

3. Bob tiene dos gastos anuales por vacaciones y reparaciones de automóviles. Estos se almacenan en `$gastosAnuales`.

    `$gastosAnuales` es una matriz asociativa con las teclas `'vacaciones'` y `'reparacionesAuto'`.

    Reste cada uno de estos de `$ingresoAnual` e imprima la cantidad resultante en la pantalla.

#### Pista

````
$ingresoAnual -= $gastosAnuales["vacaciones"];
$ingresoAnual -= $gastosAnuales["reparacionesAuto"];

echo "\nIngresos anuales después del cálculo:\n$ingresoAnual\n";
````
----

### Gastos mensuales

4. Antes de deducir los gastos mensuales de Bob, determine su $ingresoMensual del `$ingresoAnual`.
Imprima este valor en la pantalla.

#### Pista

````
$ingresoMensual = $ingresoAnual / 12;

echo "\nIngresos mensuales antes de deducir gastos mensuales:\n$ingresoMensual\n";
````
----

5. Bob tiene tres gastos mensuales. Estos se almacenan en `$gastosMensuales` con las claves:

    + `'alquiler'`
    + `'serviciosPublicos'`
    + `'seguroMedico'`

    Dedúzcalos de `$ingresoMensual` e imprima el resultado en la pantalla.

#### Pista

````
$ingresoMensual -= $gastosMensuales["alquilar"];
$ingresoMensual -= $gastosMensuales["serviciosPublicos"];
ingresoMensual -= $gastosMensuales["seguroMedico"];

echo "\nIngresos mensuales después del cálculo:\n$ingresoMensual \n";
````
----

### Gastos semanales

6. Antes de deducir los gastos semanales de Bob, determine su `$ingresoSemanal` a partir del `$ingresoMensual` actual. (suponga un promedio de 4.33 semanas en un mes para este ejercicio)

    Imprima este valor en la pantalla.

#### Pista

````
$ingresoSemanal = $ingresoMensual / 4.33;

echo "\nIngresos semanales antes del cálculo:\n$ingresoSemanal\n";
````
----

7. Esta vez, creará la matriz con los $gastosSemanales de Bob. Use los siguientes gastos:

    + combustible: 25
    + comida: 90
    + entretenimiento: 47

    Crea esta matriz.

#### Pista

````
$gastosSemanales = [
    "combustible" => 25,
    "comida" => 90,
    "entretenimiento" => 47
];
````
----

8. Deduzca los gastos semanales de $ingresosSemanales e imprima el resultado en la pantalla.

#### Pista

````
$ingresoSemanal -= $gastosSemanales["combustible"];
$ingresoSemanal -= $gastosSemanales["comida"];
$ingresoSemanal -= $gastosSemanales["entretenimiento"];

echo "\nIngresos semanales después del cálculo:\n$ingresoSemanal\n";
````
----

### ¡Ahorros!

9. En este momento, ha deducido todos los impuestos y gastos de Bob y tiene una cantidad que él puede ahorrar cada semana en $ingresoSemanal.

    Multiplique esto por 52 para determinar cuánto puede ahorrar para el año e imprimirlo en la pantalla.

#### Pista

````
$dineroSobrante = $ingresoSemanal * 52;

echo "\nIngresos restantes: $dineroSobrante";
````

----
[Próxima lección](https://github.com/sebastiantorres86/curso-php/blob/master/php-y-html.md)
