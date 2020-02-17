## INTRODUCCIÓN A LA VALIDACIÓN DE FORMULARIOS

# Introducción

Los sitios web modernos requieren mucha información para funcionar según lo previsto. La información como nuestros nombres de usuario, contraseñas, "amigos", "me gusta", información de tarjetas de crédito y pedidos de compras deben ser proporcionados por los usuarios en el front-end y enviados a los servidores de las aplicaciones web para que puedan ser procesados. Esta información se utiliza para crear una experiencia personalizada para el usuario.

La información del usuario se recopila tradicionalmente mediante _formularios_ HTML. Si alguna vez ingresó texto en un sitio web, seleccionó entre las opciones de una lista o marcó casillas y luego presionó Intro o presionó un botón, ¡es probable que haya completado y enviado un formulario HTML!

Para que los datos enviados a través de los formularios sean útiles, es esencial que la información sea válida; si se le permitiera enviar accidentalmente su apellido donde se esperaba su dirección, ¡su paquete nunca aparecerá!

El proceso de verificar que la información presentada a través de un formulario se adhiere a las expectativas se denomina _validación del formulario_. En esta lección, exploraremos las diferentes técnicas para validar entradas de formulario.

----

# ¿Por qué validar formularios?

La mayoría de los datos, una vez enviados, son almacenados por un sitio web o aplicación web. Se almacena en una base de datos en el lado del servidor. Hay razones importantes para que nos aseguremos de que la información que se almacenará en la base de datos sea precisa.

Queremos que funcionen las operaciones que dependen de los datos: permitir que un usuario ingrese una dirección de correo electrónico con formato incorrecto, ya sea a propósito o por accidente, significa que no podremos contactar a ese usuario más tarde. Permitir que un usuario se registre para una cuenta con un nombre de usuario que ya está en uso podría causar numerosos errores en el futuro. Asegurarse de que recopilamos todos los datos que necesitamos y verificar que los datos estén formateados correctamente puede ahorrar muchos problemas a una aplicación web y a sus usuarios.

Queremos mantener nuestro sitio seguro: los datos desprotegidos dejan puntos de entrada para que los actores maliciosos dañen nuestra aplicación o nuestros usuarios. Permitir que un usuario envíe una contraseña no segura significa que su cuenta no estará protegida. Los formularios desprotegidos también pueden permitir que se inyecten bits de código en nuestros servidores. Potencialmente, esto puede dejar expuesta la información confidencial de nuestros usuarios. ¡El actor malicioso podría incluso obtener el control de nuestro sitio o corromper nuestros datos existentes!

----

# Expresiones regulares

Los datos enviados a través de formularios se almacenan como cadenas. Las cadenas son un tipo de datos fundamental en informática que representa una serie de caracteres "unidos". Como humanos, podemos reconocer intuitivamente los patrones dentro de las cadenas, y esto nos permite detectar errores. Intenta notar lo que está mal en los siguientes ejemplos:

+ ABCDEF2GHIJKLMNOPQR+STUVWXYZ
+ Mi código postal es 9021
+ El gto maulló
+ `<h1> Hello, World! </h2>`

En el primer ejemplo, teníamos las letras del alfabeto presentadas en orden pero interrumpidas por un 2 fuera de lugar. En el segundo, dejamos fuera el quinto dígito de un famoso código postal. En el tercero, omitimos la "a" de la palabra gato. En el ejemplo final, escribimos algo de HTML con una etiqueta de apertura `<h1>` pero una etiqueta de cierre incomparable `</h2>`. Si detectó estos errores, es porque su cerebro ha sido entrenado para esperar patrones en ciertos tipos de datos.

A diferencia de los humanos, que pueden recibir este entrenamiento pasivamente con el tiempo, las computadoras deben programarse con precisión para reconocer patrones. Para especificar patrones para que la computadora los reconozca, utilizamos un lenguaje especial llamado _expresiones regulares_, también conocido como regex o regexp. Una expresión regular es una secuencia de caracteres que representan un patrón. Podemos usar ese patrón para hacer coincidir una cadena, hacer coincidir partes de una cadena, confirmar que los datos tienen un formato aceptable o incluso reemplazar partes de cadenas con diferentes caracteres.

----

# Validación del lado del cliente: HTML

La primera técnica que podemos usar para validar los datos del formulario es evitar que se envíen entradas problemáticas en primer lugar. Esto se llama _validación del lado del cliente_. El cliente es el proceso que interactúa con el servidor en nombre de un usuario; en el caso de los sitios web, el navegador web es el cliente. La lógica para validar el formulario se incluye con el código que muestra el formulario en el dispositivo del usuario. No se requiere interacción con el back-end para realizar validaciones del lado del cliente.

Dado que la validación de formularios es tan común, el HTML moderno proporciona algunas de estas características de validación integradas. Por ejemplo, podemos usar HTML para hacer que partes de un formulario sean necesarias (`required`) y otras opcionales. También podemos usar HTML para establecer valores mínimos y máximos para una entrada o longitudes mínimas o máximas para una entrada de texto. Incluso podemos necesitar que la entrada coincida con un patrón particular, especificado por una expresión regular.

Si alguna de las reglas establecidas en la validación del formulario HTML no se sigue, el usuario no podrá enviar su formulario y recibirá un mensaje de error explicando por qué. Con estas comprobaciones en su lugar, es menos probable que el back-end reciba datos incorrectos. La validación de formularios HTML también beneficiará al usuario: el cliente le proporciona al usuario comentarios inmediatos, sin tener que esperar una comunicación con el back-end que requiere mucho tiempo.

----

# Validación del lado del cliente: JavaScript

La validación del lado del cliente tiene dos ventajas principales. Primero, es una mejor experiencia para el usuario recibir alertas de datos problemáticos de inmediato en lugar de tener que esperar a que esa información regrese del servidor y tener que completar el formulario nuevamente. En segundo lugar, detectar errores al principio del proceso también ahorra tiempo y recursos a la aplicación. Pero no todos los problemas pueden manejarse con las validaciones HTML incorporadas.

Para personalizar realmente la validación o realizar validaciones más complejas, podemos incorporar validaciones de formulario JavaScript. Podemos hacerlo escribiendo el JavaScript nosotros o incorporando una biblioteca de JavaScript. Si tenemos requisitos únicos para los nombres de usuario en nuestro sitio, por ejemplo, tendremos que proporcionar estos sistemas de validación nosotros mismos.

Si estamos creando un sitio web relativamente simple, tiene sentido codificar la validación del formulario nosotros mismos o usar una biblioteca simple de JavaScript vainilla, [just-validate, por ejemplo](https://www.npmjs.com/package/just-validate). Pero la mayoría de las bibliotecas de validación básicas implicarán acceder o manipular directamente el DOM. Esto puede ser complicado cuando se trabaja con un marco que se basa en un DOM virtual, como React o Vue. En esas situaciones, podría ser mejor incorporar una biblioteca que funcione bien con su marco específico. Por ejemplo, la [biblioteca formik](https://www.npmjs.com/package/formik) es una biblioteca liviana que simplifica la validación de formularios en una aplicación React.

----

# Validación de back-end

No importa cuán completa parezca la validación front-end de un sitio web o aplicación, las validaciones también deben completarse en el back-end o en el lado del servidor. Las validaciones de front-end son fáciles de eludir, por ejemplo, un usuario malintencionado puede simplemente desactivar JavaScript en su navegador. También existe la posibilidad de ataques de intermediarios en los que los datos se cambian después de que un usuario envíe la solicitud pero antes de que llegue al servidor. Como regla general, el back-end nunca debe confiar en los datos que recibe.

Como desarrollador, una vez que los datos están en el back-end, tenemos control total sobre ellos, por suerte. La validación de back-end tiene varias ventajas:

+ Nos permite usar el código de validación a menudo en máquinas con más potencia informática.
+ Nos permite escribir un código de validación que un usuario no puede ver; si los usuarios malintencionados no pueden ver exactamente cómo validamos los datos, es mucho más difícil para ellos encontrar formas de evitarlos.
+ Podemos validar la información contra otros datos a los que el front-end no tiene acceso; por ejemplo, podemos verificar nuestra base de datos para ver si un nombre de usuario dado ya está en uso.

Hay dos formas principales de validar las entradas en el lado del servidor. La primera se lleva a cabo mientras el usuario todavía está ingresando datos en el formulario en el front-end. Podemos realizar solicitudes asincrónicas al servidor con fragmentos de sus datos y enviar comentarios directamente al usuario antes de enviarlos. Esto es más lento que la validación frontal y puede ser un desafío de diseño desde la perspectiva de la experiencia del usuario.

El segundo es una vez que se ha enviado el formulario. La validación de formularios de back-end es la última defensa de nuestra aplicación contra datos problemáticos, y es esencial verificar la validez y seguridad de los datos antes de agregarlos a una base de datos. Esta también es una oportunidad para "desinfectar" los datos: para que nuestra base de datos sea útil, es importante que todos los datos que contengan estén formateados de manera consistente. Esto significa que si bien es posible que queramos ser flexibles con respecto al formato que requerimos de un usuario, es probable que queramos transformar las entradas en un formato estricto antes de ingresarlas en la base de datos.

----

# Repaso

En esta lección, hemos explorado la validación de formularios desde muchos ángulos. Revisemos lo que cubrimos:

+ Los sitios web modernos requieren mucha información de sus usuarios y recopilan mucha información a través de formularios HTML.
+ Es esencial validar los datos enviados a través de formularios para mantener seguros los sitios web y asegurarse de que funcionen correctamente.
+ Las expresiones regulares son secuencias de caracteres que definen patrones para buscar en el texto. Son una herramienta importante utilizada para validar la entrada.
+ HTML moderno viene con útiles métodos integrados para la validación de formularios.
+ La validación personalizada y complicada del lado del cliente se puede lograr con JavaScript.
+ Las solicitudes asincrónicas al servidor pueden realizar validaciones de fondo antes de que se envíe un formulario.
+ Se requiere una validación final de todos los datos para garantizar la seguridad de una aplicación y desinfectar todos los datos.

----
[Próxima lección](https://github.com/sebastiantorres86/curso-php/blob/master/introduccion-expresiones-regulares.md)