## INTRODUCCIÓN A LAS EXPRESIONES REGULARES
# Introducción

Al registrar una cuenta para una nueva aplicación de redes sociales o completar un pedido de un regalo en línea, se valida casi toda la información que ingrese en un formulario web. ¿Ingresó un correo electrónico con el formato correcto que incluye un símbolo `@`? ¿Ingresó un número de teléfono de `10` dígitos, con o sin `-`s y paréntesis? Y luego está el rey de todos ellos: ¿cumplió su nueva contraseña el aparentemente creciente número de requisitos para la inclusión (y exclusión) de símbolos, dígitos y letras mayúsculas y minúsculas?

Si bien corregir cada campo en nuestras vidas digitales para obtener el formato adecuado puede ser una molestia, es esencial para garantizar que nuestras cuentas estén seguras, nuestros paquetes se entreguen con éxito y que podamos contactarnos por teléfono y correo electrónico.

La tecnología que alimenta este sistema de verificación en casi todos los sitios web y aplicaciones es el lenguaje siempre confiable, a menudo peculiar de las __*expresiones regulares*__, comúnmente abreviado como regex, como lo usaremos aquí, o regexp ([la pronunciación está en debate](https://english.stackexchange.com/questions/94371/what-is-the-correct-pronunciation-of-regex)). Una _expresión regular_ es una secuencia especial de caracteres que describe un patrón de texto que debe encontrarse o coincidir en una cadena o documento. Al hacer coincidir el texto, podemos identificar con qué frecuencia y dónde ocurren ciertos fragmentos de texto, así como tener la oportunidad de reemplazar o actualizar estos fragmentos de texto si es necesario.

Las expresiones regulares tienen una variedad de casos de uso que incluyen:

+ validando la entrada del usuario en formularios HTML
+ verificar y analizar texto en archivos, código y aplicaciones
+ examinar los resultados de la prueba
+ encontrar palabras clave en correos electrónicos y páginas web

Si bien hay [una variedad de implementaciones de expresiones regulares en todas las plataformas](https://en.wikipedia.org/wiki/Regular_expression#History), en esta lección aprenderá los conceptos básicos que se aplican en todas partes. ¡Al final de la lección, podrás usarlos en tus propios proyectos ([y convertirte en un superhéroe regex](https://xkcd.com/208/))!

![](https://s3.amazonaws.com/codecademy-content/courses/regex/regular_expressions_xkcd_2.png)

----

# Literales

El texto más simple que podemos combinar con expresiones regulares son __*literales*__. Aquí es donde nuestra expresión regular contiene el texto exacto que queremos hacer coincidir. La expresión regular `a`, por ejemplo, coincidirá con el texto `a`, y la expresión regular `bananas` coincidirán con el texto `bananas`.

Además, podemos hacer coincidir solo una parte de un texto. Quizás estamos buscando un documento para ver si aparece la palabra `monos`, ya que amamos a los monos. Podríamos usar el regex `monos` para que coincida con el `monos` en el texto `A los monos les gusta comer bananas`.

No solo podemos unir caracteres alfabéticos, ¡los dígitos también funcionan! ¡La expresión regular `3` coincidirá con el `3` en el texto `34`, y la expresión regular `5 gibones` coincidirá por completo con el texto `5 gibones`!

Las expresiones regulares operan moviendo carácter por carácter, de izquierda a derecha, a través de un fragmento de texto. Cuando la expresión regular encuentra un carácter que coincide con la primera parte de la expresión, busca encontrar una secuencia continua de caracteres coincidentes.

----

# Alternancia

¿Te gustan los babuinos y los gorilas? ¡Puedes encontrar cualquiera de ellos con la misma expresión regular usando *__alternancia__*! La alternancia, realizada en expresiones regulares con el símbolo de tubería, `|`, nos permite hacer coincidir los caracteres que preceden a `|` O los caracteres después del `|`. El regex `babuinos|gorilas` coincidirán con los `babuinos` en el texto `Me encantan los babuinos`, pero también coincidirán con los `gorilas` en el texto `Me encantan los gorilas`.

¿Estás pensando en cómo combinar todo el texto `Me encantan los babuinos` o `Me encantan los gorilas`? ¡Ya llegaremos a eso más adelante!

----

# Conjuntos de caracteres

Los exámenes de ortografía pueden parecer un recuerdo lejano de la escuela primaria, pero finalmente los tomamos todos los días mientras escribimos. Es fácil cometer errores en palabras comúnmente mal escritas como `consenso`, y además de eso, a veces hay ortografías alternativas para la misma palabra.

Los __conjuntos de caracteres__, denotados por un par de corchetes `[]`, permiten unir un carácter de una serie de caracteres, lo que permite coincidencias con ortografía incorrecta o diferente.

La expresión regular `con[sc]en[sc]o` coincidirá con `consenso`, la ortografía correcta de la palabra, pero también coincidirá con las siguientes tres ortografías incorrectas: `concenso`, `consenco` y `concenco`. Las letras dentro de los primeros corchetes, `s` y `c`, son las diferentes posibilidades para el carácter que viene después de `con` y antes de `en`. Del mismo modo para los segundos corchetes, `s` y `c` son las diferentes posibilidades de caracteres que vendrán después de `en `y antes de `so`.

Por lo tanto, la expresión regular `[gato]` coincidirá con los caracteres `g`, `a` , `t` _u_ `o`, pero no con el texto `gato`.

¡La belleza de los conjuntos de caracteres (y la alternancia) es que permiten que nuestras expresiones regulares se vuelvan más flexibles y menos rígidas que simplemente combinando con literales!

Podemos hacer que nuestros juegos de caracteres sean aún más poderosos con la ayuda del símbolo de caret `^`. Colocado al frente de un conjunto de caracteres, el `^` niega el conjunto y coincide con cualquier carácter que no se indique. Estos se llaman _conjuntos de caracteres negados_. Por lo tanto, la expresión regular [^gato] coincidirá con cualquier carácter que no sea `g`, `a`, `t` _u_ `o`, y coincidiría completamente con cada carácter `p`, `e`, `r` _u_ `o`.

¿Tenemos un consenso de que las expresiones regulares son bastante geniales?

----

# Salvaje por comodines

A veces no nos importa exactamente QUÉ caracteres hay en un texto, solo que hay ALGUNOS caracteres. Ingrese el comodín `.`! Los __comodines__ coincidirán con cualquier carácter individual (letra, número, símbolo o espacio en blanco) en un fragmento de texto. Son útiles cuando no nos importa el valor específico de un personaje, ¡sino solo que existe un personaje!

Digamos que queremos hacer coincidir cualquier texto de 9 caracteres. ¡La expresión regular `.........` coincidirá completamente con  `orangután` y `marsupial`! Del mismo modo, la expresión regular `comí . plátanos` coincidirán completamente con `comí 3 plátanos` y `comí 8 plátanos`!

¿Qué sucede si queremos coincidir con un punto real, `.`? Podemos usar el carácter de escape, `\`, para escapar de la funcionalidad comodín del `.` y coincidir con un punto real. El regex `Los monos aulladores son realmente vagos\.` coincidirá completamente con el texto `Los monos aulladores son realmente vagos.`.

----

# Rangos

Los conjuntos de caracteres son geniales, pero su verdadero poder no se realiza sin rangos. Los __rangos__ nos permiten especificar un rango de caracteres en el que podemos hacer una coincidencia sin tener que escribir cada carácter individual. La expresión regular `[abc]`, que coincidiría con cualquier carácter `a`, `b` o `c`, es equivalente al rango de expresión regular `[a-c]`. El carácter `-` nos permite especificar que estamos interesados en hacer coincidir un rango de caracteres.

La expresión regular `adopté [2-9] [p-g]atos` coincidirá con el texto que `adopté 4 gatos`, así como también `adopté 8 gatos` e incluso `adopté 5 patos`.

Con los rangos podemos hacer coincidir cualquier letra mayúscula con la expresión regular `[A-Z]`, la letra minúscula con la expresión regular `[a-z]`, cualquier dígito con la expresión regular `[0-9]`. ¡Incluso podemos tener múltiples rangos en el mismo conjunto de caracteres! Para hacer coincidir cualquier carácter alfabético en mayúscula o minúscula, podemos usar la expresión regular `[A-Za-z]`.

Recuerde, dentro de cualquier conjunto de caracteres `[]` solo coincidimos con _un_ carácter.

----

# Clases de caracteres abreviados

Si bien los rangos de caracteres son extremadamente útiles, pueden ser engorrosos escribir cada vez que desee hacer coincidir rangos comunes, como los que designan caracteres alfabéticos o dígitos. Para aliviar este dolor, hay __clases de caracteres abreviados__ que representan rangos comunes, y hacen que escribir expresiones regulares sea mucho más simple. Estas clases de abreviaturas incluyen:

+ `\w`: la clase "palabra carácter" representa el rango de expresiones regulares `[A-Za-z0-9_]`, y coincide con un solo carácter en mayúscula, minúscula, dígito o guión bajo
+ `\d`: la clase "carácter de dígitos" representa el rango de expresiones regulares `[0-9]`, y coincide con un carácter de un solo dígito
+ `\s`: la clase "carácter de espacio en blanco" representa el rango de expresiones regulares `[ \t\r\n\f\v]`, que coincide con un solo espacio, tabulación, retorno de carro, salto de línea, avance de formulario o tabulación vertical

Por ejemplo, la expresión regular `\d\s\w\w\w\w\w\w\w` coincide con un carácter de dígitos, seguido de un carácter de espacio en blanco, seguido de caracteres de 7 palabras. Por lo tanto, la expresión regular coincide completamente con el texto `3 monitos`.

¡Además de las clases de caracteres abreviados `\w`, `\d` y `\s`, también tenemos acceso a las _clases de caracteres abreviados negados_! Estas abreviaturas coincidirán con cualquier caracter que NO esté en las clases regulares de taquigrafía. Estas clases de abreviaturas negadas incluyen:

+ `\W`: la clase "caracteres que no son palabras" representa el rango de expresiones regulares `[^A-Za-z0-9_]`, que coincide con cualquier carácter que no esté incluido en el rango representado por `\w`
+ `\D`: la clase "caracteres sin dígitos" representa el rango de expresiones regulares `[^0-9]`, que coincide con cualquier carácter que no esté incluido en el rango representado por `\d`
+ `\S`: la clase "caracteres que no son espacios en blanco" representa el rango de expresiones regulares `[^ \t\r\n\f\v]`, que coincide con cualquier carácter que no esté incluido en el rango representado por `\s`

----

# Agrupamiento

¿Recuerdas cuando estábamos enamorados de babuinos y gorilas hace unos ejercicios? Pudimos emparejar `babuinos` o `gorilas` usando el regex `gorilas|babuinos`, aprovechando el símbolo `|`.

Pero, ¿qué pasa si queremos unir todo el texto `me encantan los babuinos` y `me encantan los gorilas` con la misma expresión regular? Su primera suposición podría ser utilizar la expresión regular `me encantan los babuinos|gorilas`. Esta expresión regular, si bien coincidiría completamente con la cadena `me encantan los babuinos`, no coincidiría con `me encantan los gorilas` y, en cambio, coincidiría con `gorilas`. Esto es porque el símbolo `|` coincide con la expresión _completa_ antes o después de sí misma.

Agrupando al rescate! La __agrupación__, denotada con el paréntesis abierto `(` y el paréntesis de cierre `)`, nos permite agrupar partes de una expresión regular, y nos permite limitar la alternancia a parte de la expresión regular.

La expresión regular `me encantan los (babuinos|gorilas)` coincidirá con el texto `me encantan los` y _luego_ coincidirá con `babuinos` o `gorilas`, ya que la agrupación limita el alcance del `|` al texto entre paréntesis.

Estos grupos también se denominan _grupos de captura_, ya que tienen el poder de seleccionar o capturar una subcadena de nuestro texto coincidente.

----

# Cuantificadores fijos

Aquí es donde las cosas comienzan a ponerse realmente interesantes. Hasta ahora solo hemos hecho coincidir el texto carácter por carácter. Pero en lugar de escribir la expresión regular `\w\w\w\w\w\w\s\w\w\w\w\w\w`, que coincidiría con 6 caracteres de palabras, seguidos de un espacio en blanco, y luego seguido de más caracteres de 6 palabras, como en el texto `rhesus monkey`, ¿hay una mejor manera de denotar la cantidad de caracteres que queremos unir?

¡La respuesta es sí, con la ayuda de cuantificadores! Los __cuantificadores fijos__, denotados con llaves `{}`, nos permiten indicar la cantidad exacta de un caracter que deseamos igualar, o nos permiten proporcionar un rango de cantidad para igualar.

+ `\w{3}` coincidirá _exactamente_ con palabras de 3 caracteres
+ `\w{4,7}` coincidirá con palabras de _mínimo_ 4 caracteres y de _máximo_ 7 caracteres 

La expresión regular `roa{3}r` coincidirá con los caracteres `ro` seguidos de `3` `a`, y luego el carácter `r`, como en el texto `roaaar`. La expresión regular `roa{3,7}r` coincidirá con los caracteres `ro` seguidos de _al menos_ `3` `a` y `7` `a` _como máximo_, seguidos de una `r`, que coincida con las cadenas `roaaar`, `roaaaaar` y `roaaaaaaar`.

Una nota importante es que los cuantificadores se consideran _codiciosos_. Esto significa que coincidirán con la mayor cantidad de caracateres que posiblemente puedan. Por ejemplo, la expresión regular `mo{2,4}` coincidirá con el texto `moooo` en la cadena `moooo`, y no devolverá una coincidencia de `moo` o `mooo`. Esto se debe a que el cuantificador fijo quiere igualar el mayor número de `o`s posible, que es `4` en la cadena `moooo`.

----

# Cuantificadores Opcionales

Estás trabajando en un proyecto de investigación que resume los hallazgos de los científicos conductuales de primates de todo el mundo. De particular interés para usted son las observaciones del humor de los científicos en los chimpancés, por lo que puede generar expresiones regulares para encontrar todas las apariciones de la palabra `humor` en los documentos que ha recopilado. Para su consternación, su expresión regular pierde las observaciones de diversión escritas por científicos procedentes de países de habla inglesa británica, donde la ortografía de la palabra es `humour`. Cuantificadores opcionales al rescate!

Los __cuantificadores opcionales__, indicados por el signo de interrogación `?`, Nos permiten indicar que un carácter en una expresión regular es opcional, o puede aparecer `0` veces o `1` vez. Por ejemplo, la expresión regular `humou?r` coincide con los caracteres `humo`, luego `0` ocurrencias o `1` aparición de la letra `u`, y finalmente la letra `r`. Nota que la `?` _solo_ se aplica al caracter directamente anterior.

Con todos los cuantificadores, podemos aprovechar la agrupación para crear expresiones regulares aún más avanzadas. La expresión regular `El mono comió un plátano (podrido)?` coincidirá completamente con ambos `El mono comió un plátano podrido` y `El mono comió un plátano`.

Desde el `?` es un metacarácter, debe usar el carácter de escape en su expresión regular para que coincida con un signo de interrogación `?` en un pedazo de texto. La expresión regular `¿No son hermosos los monos búho\?` coincidirá así completamente con el texto `¿No son hermosos los monos búho?`

----

# Cuantificadores: 0 o más, 1 o más

En 1951, el matemático Stephen Cole Kleene desarrolló un sistema para unir patrones en lenguaje escrito con notación matemática. ¡Esta notación ahora se conoce como expresiones regulares!

En su honor, la próxima sintaxis de expresiones regulares que aprenderemos se conoce como la estrella de Kleene. La __*estrella de Kleene*__, indicada con el asterisco `*`, también es un cuantificador y coincide con el carácter anterior `0` o más veces. Esto significa que el caracter no necesita aparecer, puede aparecer una vez o puede aparecer muchas veces.

La expresión regular `meo*w` coincidirá con los caracteres `me`, seguidos de `0` o más `o`s, seguidos de una `w`. Por lo tanto, la expresión regular coincidirá con `mew`, `meow`, `meooow` y `meoooooooooooow`.

Otro cuantificador útil es el __*Kleene plus*__, denotado por el signo más `+`, que coincide con el carácter anterior `1` o más veces.

El regex `meo+w` coincidirá con los caracteres `me`, seguido de `1` o más `o`s, seguido de una `w`. Por lo tanto, la expresión regular coincidirá con `meow`, `meooow` y `meoooooooooooow`, pero no con `mew`.

Al igual que todos los demás metacaracteres, para que coincida con los símbolos `*` y `+`, debe usar el carácter de escape en su expresión regular. La expresión regular `Mi gato es una \*` coincidirá completamente con el texto `Mi gato es una *`.

----

# Anclas

Al escribir expresiones regulares, es útil hacer que la expresión sea lo más específica posible para garantizar que no coincidamos con el texto no deseado. Para ayudar en esta misión de especificidad, podemos usar los metacaracteres de anclaje. Los __anclajes__ sombrero `^` y el signo de dólar `$` se usan para hacer coincidir el texto al principio y al final de una cadena, respectivamente.

La expresión regular `^Monos: mi enemigo mortal$` coincidirá completamente con el texto `Monos: mi enemigo mortal` pero no coincidirá con ` Los Monos Araña: mi enemigo mortal en la naturaleza` o `Los Monos ardilla: mi enemigo mortal en la naturaleza`. El `^` asegura que el texto coincidente comience con `Monos`, y el `$` asegura que el texto coincidente termine con `mortal`.

Sin las etiquetas de anclaje, los regex `Monos: mi enemigo mortal` coincidirá con el texto `Monos: mi enemigo mortal` en ambos `Los Monos araña: mi enemigo mortal en la naturaleza` y `Los Monos ardilla: mi enemigo mortal en la naturaleza`.

Una vez más, como con todos los demás metacaracteres, para que coincidan los símbolos `^` y `$`, debe usar el carácter de escape en su expresión regular. La expresión regular `Mi mono araña tiene \$10\^6 en el banco` coincidirá completamente con el texto `Mi mono araña tiene $10^6 en el banco`.

----

# Repaso

¿Sientes esos superpoderes de expresión regular recorriendo tu cuerpo? ¿Solo quieres gritar `ah+` realmente fuerte? ¡Increíble! Ahora estás listo para tomar estas habilidades y usarlas en la naturaleza. Antes de comenzar sus aventuras, repasemos lo que hemos aprendido.

+ Las _expresiones regulares_ son secuencias especiales de caracteres que describen un patrón de texto que debe coincidir
+ Podemos usar _literales_ para unir los caracteres exactos que deseamos
+ La _alternancia_, usando el símbolo de tubería `|`, nos permite hacer coincidir el texto que precede o sigue a `|`
+ _Conjuntos de caracteres_, denotados por un par de corchetes `[]`, hagamos coincidir un carácter de una serie de caracteres
+ Los _comodines_, representados por el punto `.`, coincidirán con cualquier carácter individual (letra, número, símbolo o espacio en blanco)
+ Los _rangos_ nos permiten especificar un rango de caracteres en el que podemos hacer una coincidencia
+ Las _clases de caracteres abreviados_ como `\w`, `\d` y `\s` representan los rangos que representan caracteres de palabras, caracteres de dígitos y caracteres de espacios en blanco, respectivamente
+ Las _agrupaciones_, denotadas entre paréntesis `()`, agrupan partes de una expresión regular y nos permiten limitar la alternancia a parte de una expresión regular.
+ Los _cuantificadores fijos_, representados con llaves `{}`, nos permiten indicar la cantidad exacta o un rango de cantidad de un carácter que deseamos igualar
+ Los _cuantificadores opcionales_, indicados por el signo de interrogación `?`, nos permiten indicar que un carácter en una expresión regular es opcional, o puede aparecer `0` veces o `1` vez
+ La _estrella de Kleene_, denotada con el asterisco `*`, es un cuantificador que coincide con el carácter anterior `0` o más veces
+ El _Kleene plus_, denotado por el sigon más `+`, coincide con el carácter anterior `1` o más veces
+ Los símbolos de _anclaje_ sombrero `^` y el signo de dólar `$` se usan para hacer coincidir el texto al principio y al final de una cadena, respectivamente

----
[Próxima lección](https://github.com/sebastiantorres86/curso-php/blob/master/introducci%C3%B3n-a-validacion-de-formularios-php.md)