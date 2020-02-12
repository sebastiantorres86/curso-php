# La guía del autoestopista para las funciones matemáticas de PHP

## PROYECTO
Explore el universo de la documentación de PHP y encuentre las funciones de PHP que necesita para su viaje. Aplicarlos correctamente dará la respuesta a la vida, el universo y todo.

+ Disculpas a [Douglas Adams](https://en.wikipedia.org/wiki/The_Hitchhiker%27s_Guide_to_the_Galaxy)

Cada paso del proyecto proporciona una operación matemática que puede completarse utilizando funciones PHP integradas. Use la documentación para encontrarlos y aplicarlos correctamente para obtener la respuesta.

----
## Tareas
### Funciones
1. Le hemos dado un valor `$inicial` para comenzar desde una cadena octal. (octal es un sistema de notación de base 8, en lugar del sistema decimal probablemente más familiar de base 10).

    Usando la [documentación PHP](https://www.php.net/docs.php), encuentre una función PHP para convertir esta cadena octal a un número decimal.

    A veces puede ser más fácil usar su motor de búsqueda favorito para localizar la página correcta dentro de la documentación de PHP.

    Guarde el resultado en una variable `$a`. A lo largo de este proyecto, imprima su resultado en cada paso y compárelo con la pista. Asegúrese de agregar una nueva línea al final de cada declaración impresa.

#### Pista
Use la [función `octdec()`](https://www.php.net/manual/en/function.octdec.php).

`$a` debería ser `365`.

----

2. El valor de `$a` es una cantidad de grados. Use una función PHP para convertirlo a radianes y almacenar el resultado en una nueva variable, `$b`.

#### Pista
Use la [función deg2rad()](https://www.php.net/manual/en/function.deg2rad.php).

`$b` debe ser `6.3704517697793`.

----

3. Use una función PHP incorporada para tomar el coseno de `$b` y almacenarlo en una nueva variable, `$c`.

#### Pista 
Use la [función `cos()`](https://www.php.net/manual/en/function.cos.php).

`$c` debe ser `0.99619469809175`.

----

4. Use una función PHP incorporada para redondear `$c` a 3 decimales y almacenar el resultado en una nueva variable, `$d`.

#### Pista
Use la [función `round()`](https://www.php.net/manual/en/function.round.php).

Asegúrese de pasar `3` como segundo argumento para establecer el número de lugares decimales.

`$d` debería ser `0.996`.

----

5. Encuentre una función PHP para obtener el logaritmo natural de `$d` y almacenar el resultado en una nueva variable, `$e`.

#### Pista
Use la [función `log()`](https://www.php.net/manual/en/function.log.php).

`$e` debería ser `-0.0040080213975388`.

----

6. Use una función PHP para obtener el valor absoluto de `$e` y almacenarlo en `$f`.

#### Pista
Usa la [función `abs()`](https://www.php.net/manual/en/function.abs.php).

`$f` debe ser `0.0040080213975388`.

----

7. Use una función PHP para obtener el inverso o arco coseno de `$f` y almacenar el resultado en `$g`.}

#### Pista
Use la [función `acos()`](https://www.php.net/manual/en/function.acos.php).

`$g` debe ser `1.5667882946663`.

----

8. `$g` es un número en radianes. Use una función PHP para convertir esto a varios grados y guárdelo como `$h`.

#### Pista
Use la [función rad2deg()](https://www.php.net/manual/en/function.rad2deg.php).

`$h` debe ser `89.770356674879`.

----

9. Use una función PHP para subir (redondear) `$h` y almacenar el resultado en `$i`.

#### Pista 
Use la [función `floor()`](https://www.php.net/manual/en/function.floor.php).

`$i` debería ser `89`.

----

10. Resta 47 de `$i` para llegar a la solución, `$j`.

#### Pista 
La solución debe ser 42.

----
[Próxima lección](https://github.com/sebastiantorres86/curso-php/blob/master/matrices-ordenadas.md)
