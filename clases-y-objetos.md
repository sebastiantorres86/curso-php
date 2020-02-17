## CLASES Y OBJETOS
# Introducción

Hasta ahora, en nuestros programas PHP, hemos confiado en los tipos de datos integrados en el lenguaje: hemos utilizado los tipos de datos de cadena, número y booleanos directamente y hemos guardado datos en variables. También hemos utilizado matrices para organizar múltiples datos dentro de una sola estructura.

¡Pero a veces los tipos de datos integrados en el idioma no son suficientes! Así como podemos escribir funciones personalizadas y no depender exclusivamente de las funciones integradas de PHP, también podemos escribir tipos de datos personalizados.

Para definir nuestros propios tipos de datos, pensaremos en las cualidades generales que deberían tener nuestros tipos definidos por el usuario. Crearemos una clase, un plano que defina los datos y funciones relacionados que deben agruparse dentro de cada instancia de este nuevo tipo. Una vez que se define la clase, podemos crear instancias específicas de ella, ¡tantas como queramos! Estas instancias de la clase se denominan objetos.

![](https://codecademy-content.s3.amazonaws.com/courses/php-classes/blueprint.png)

----

# ¿Qué son las clases?

Para definir una clase de `mascota`, utilizamos la palabra clave `class` seguida del nombre de la clase (típicamente título en mayúsculas en PHP) y llaves:

````
class mascota {

}
````

Dentro de las llaves, podemos agregar _propiedades_, que definen los datos que contendrá cada objeto de la clase. La sintaxis es similar a cómo definimos las variables:

````
class mascota {
   public $name, $color;
}
````

Nota: La palabra clave `public` tiene que ver con algo llamado visibilidad. Discutiremos esto en profundidad más adelante en la lección.

----

# Instanciando

En el ejercicio anterior, creamos una clase (un plano) para cualquier mascota que queramos hacer. Pero no hicimos ningún objeto mascota real e individual. Como los objetos son instancias específicas de una clase, el proceso de crearlos se llama _instanciación_.

En PHP, los objetos se instancian usando la palabra clave `new` seguida del nombre de la clase y paréntesis.

````
$very_good_dog = new mascota();
````

Ahora tenemos nuestro primer objeto, `$very_good_dog`. Interactuamos con las propiedades de un objeto utilizando el operador de objeto (`->`) seguido del nombre de la propiedad (sin el signo de dólar, `$`).

Podemos usar esta sintaxis para asignar valores a las propiedades del objeto:

````
$very_good_dog-> name = "Lassie";
````

También podemos usarlo para acceder al valor existente de las propiedades del objeto:

````
echo $very_good_dog-> name; # Imprime "Lassie"
````
----

# Métodos

Además de las propiedades, podemos definir métodos de clase, esencialmente funciones que contendrá cada objeto. Los métodos se utilizan con frecuencia para interactuar con las propiedades de un objeto de una manera definida.

Los métodos se definen con la misma sintaxis que usamos al declarar funciones (excepto que se definen dentro de los corchetes de una clase).

Dada una clase `mascota` con propiedades de `nombre` y `apellido`, podríamos proporcionar un método que devuelva las dos propiedades combinadas en un nombre completo:

````
class mascota {
  public $nombre, $apellido;
  función getFullName() {
    return $this-> nombre . "" . $this-> apellido;
  }
}
````

La variable `$this` se refiere al objeto actual; cuando invocamos este método, `$this` se refiere al objeto específico que llamó al método.

Se accede a los métodos de manera similar a las propiedades, usando el operador de objeto (`->`), pero para invocarlos, use paréntesis al final:

````
$my_object-> classMethod();
````

Entonces, para acceder al nombre completo de nuestra mascota, podemos usar lo siguiente:

````
$very_good_groundhog = new mascota();
$very_good_groundhog-> nombre = "Punxsutawney";
$very_good_groundhog-> apellido = "Phil";
echo $very_good_groundhog-> getFullName(); # Imprime "Punxsutawney Phil"`
````
----

# Método constructor

Un método constructor es uno de varios [métodos mágicos](https://www.php.net/manual/en/language.oop5.magic.php) proporcionados por PHP. Este método se llama automáticamente cuando se instancia un objeto. Un método de constructor se define con el nombre de método especial `__construct`.

Como ejemplo, si quisiéramos inicializar la propiedad `deserves_love` asignada a `TRUE` para cada instancia de la clase Pet, podríamos usar el siguiente constructor:

````
class mascota {
  public $deserves_love;
  function __construct() {
    $this-> deserves_love = TRUE;
  }
}
$my_dog = new mascota();
if ($my_dog-> deserves_love) {
  echo "te amo!";
}
// Imprime: ¡Te amo!
````

Los constructores también pueden tener parámetros. Estos corresponden a argumentos pasados ​​al usar la palabra clave `new`. Por ejemplo, tal vez queremos permitir establecer el `name` de la `mascota` en la instanciación:

````
class mascota {
  public $name;
  function __construct ($name) {
    $this-> name = $name;
  }
}
$perro = new mascota("Lassie");
echo $perro-> name; // Imprime: Lassie
````

En el código anterior, instanciamos un nuevo objeto mascota, `$perro` con una propiedad de `name` asignada al valor "Lassie". Luego accedemos a la propiedad e imprimimos.

Tenga en cuenta que el número de argumentos utilizados al crear instancias del objeto debe coincidir con el número de parámetros en la definición del constructor; de lo contrario, PHP arrojará un error.

----

# Herencia

Imagina que queremos una clase `Perro` en nuestro programa. Esta clase tendría todas las propiedades de la clase `Mascota` más general, pero tendría algunas propiedades y métodos más específicos solo para perros. En lugar de tener que duplicar manualmente las cosas que las dos clases tienen en común, podemos crear una nueva clase que __extienda__ la otra. La clase original se puede considerar como la _principal_ y la nueva clase se puede considerar como la clase _secundaria_. En la programación orientada a objetos, llamamos a este proceso _herencia_ ya que la clase secundaria _hereda_ propiedades y métodos de su clase primaria. Una clase secundaria también se conoce como una _subclase_ en PHP.

Para definir una clase que hereda de otra, usamos la palabra clave `extend`:

````
class ChildClass extends ParentClass {

}
````

Definamos una clase de `Perro` que amplíe nuestra clase `mascota`. Cada instancia de Perro tendrá un método adicional llamado `ladrar()`:

````
class Perro extends Mascota {
  function ladrar() {
    return "guau";
  }
}
````

Ahora, los objetos de la clase `Perro` pueden `ladrar`, pero los objetos de `Mascota` no. Esto tiene sentido aquí, porque la mayoría de los perros pueden ladrar, pero no todas las mascotas pueden hacerlo.

----

# Métodos de sobrecarga

A veces, queremos cambiar cómo se comportan los métodos para las subclases de la definición original del padre. Esto se llama _sobrecargar_ un método. Para hacer esto, defina un nuevo método dentro de la subclase con el mismo nombre que el método padre.

Por ejemplo, nuestra clase `mascota` podría tener un método `type`:
````
class mascota {
   function type() {
     return "mascota";
   }
}
````

Pero en nuestra clase `Perro`, queremos actualizar este mensaje:
````
class Perro extends Mascota {
   function whatIsThis() {
     return "perro";
   }
}
````

Podemos llamar a la definición del método del padre dentro de la subclase usando `parent::` seguido del nombre del método:
````
class Perro extends Mascota {
   function type() {
     return "perro";
   }
   function classify() {
     echo "Esta" . parent::type(). "es de tipo" . $this->type();
     // Imprime: Esta mascota es de tipo perro
   }
}
````

----

# Visibilidad - Miembros privados

Para comprender la visibilidad, debemos pensar cómo se usarán las clases en programas complejos: en aplicaciones grandes, una clase se puede usar en diversas situaciones (se transmiten dentro de las funciones y se usan en código escrito por numerosos desarrolladores). Cuando pensamos en el uso de nuestras clases en muchas situaciones, debemos considerar restringir el acceso a ciertos datos de miembros.

Hasta este momento, hemos estado utilizando la visibilidad pública (`public`) para las propiedades. Esta también es la visibilidad predeterminada para los métodos. Una visibilidad pública (`public`) significa que se puede acceder a los miembros desde dentro del objeto o desde afuera. Pero a veces queremos que solo se pueda acceder a un miembro desde el objeto. Para hacer esto, podemos declarar privado (`private`) a este miembro.

Veamos un ejemplo:

````
class mascota {
  private $healthScore = 0;
  function exercise() {
    $this->healthScore++;
  }
  function feed() {
    $this->healthScore++;
  }
  function healthCheck() {
    if ($this->healthScore> = 2) {
      echo "¡Esta es una mascota sana!";
    } else {
      echo "Esta es una mascota no saludable";
    }
  }
}
````

En el código anterior, tenemos la propiedad `healthScore`. Este es un número que usamos para calcular la salud de una mascota. La propiedad `healthScore` se puede manipular y acceder mediante métodos de miembros, pero dado que nunca queremos que se acceda a la propiedad directamente fuera de la clase, establecemos la propiedad como `private`. Si se intenta acceder a la propiedad directamente, nuestro código generará `Fatal Error`.

----

# Visibilidad - Miembros protegidos

__Solo__ se puede acceder a los miembros privados (`private`) de una clase utilizando métodos dentro de esa clase. Este no suele ser el efecto deseado cuando tenemos subclases. Por ejemplo, el siguiente código arrojará un `Fatal Error`, ya que `healthScore` es privado para la clase `Mascota` y no se puede acceder desde la clase `Caballo`:

````
class Mascota {
  private $healthScore = 0;
}

class Caballo extends Mascota {
  función brushTeeth() {
    this->heathScore++;
  }
}

$my_pet = new Caballo();
$my_pet-> brushTeeth(); // Error
````

Para permitir el acceso a los miembros desde las clases secundarias, podemos establecer la visibilidad dentro de la clase principal como protegida (`protected`) en lugar de `private`. Esto permite que las clases secundarias accedan a estas propiedades y métodos internamente, al tiempo que evita que se acceda a ellas externamente:

````
class mascota {
  protected $heathScore = 0;
}

class Caballo extends Mascota {
  function brushTeeth() {
    this-> heathScore++;
  }
}

$my_pet = nuevo caballo();
$my_pet-> brushTeeth(); // Incrementa con éxito healthScore
$my_pet-> healthScore; // Error
````

----

# Getters y Setters

El concepto de solo acceder a propiedades a través de métodos se conoce comúnmente como usar _getters_ y _setters_.

Por ejemplo:

````
class Mascota {
  private $name;
  function setName($name) {
    $this->name = $name;
  }
  function getName() {
    return $this->name;
  }
}
````

Esta es la forma más básica de usar getters y setters en PHP. Inicialmente, puede parecer que agrega poco valor sobre hacer `public` las propiedades y acceder a ellas directamente. Pero, ¿qué sucede si solo queremos aceptar una cadena al configurar el nombre de una `Mascota`?

Podemos agregar lógica al configurador para asegurarnos de que el valor que se pasa se formatea correctamente:

````
function setName($name) {
  if (gettype($name) === "string") {
    $this->name = $name;
    return true;
  } else {
    return false;
  }
}
````

Agregamos valores de retorno al configurador para proporcionar algunos comentarios sobre si la llamada a `setName` fue exitosa.

También podemos usar el captador para formatear valores a medida que se pasan del objeto. En este ejemplo, estamos capitalizando la primera letra del nombre de la mascota:

````
function getName() {
  return ucfirst($this->name);
}
````

----

# Miembros estáticos

La creación de instancias de objetos es la forma más común de usar clases y también está más en línea con los principios de OOP. Sin embargo, a veces puede ser útil agrupar un conjunto de funciones y variables de utilidad en una sola clase. Dado que estos no cambian para cada instancia, no necesitamos instanciarlos. Podemos usarlos _estáticamente_.

Cuando se pretende que un miembro se use de forma estática, agregamos la palabra clave `static` a su definición.

Considere esta clase con una propiedad `static` y un método `static`:
}
````
class StringUtils{
  public static $max_number_of_characters = 80;
  function static public uclast($string) {
    $string[strlen($string)-1] = strtoupper($string[strlen($string)-1]);
    return $string;
  }
}
````

El acceso a estos miembros `static` se realiza de manera un poco diferente que con los objetos. Necesitamos usar el [Operador de resolución de alcance (`::`)](https://www.php.net/manual/en/language.oop5.paamayim-nekudotayim.php). Esto puede considerarse como un cambio breve en el alcance de la clase misma. Como estamos dentro del alcance, accedemos a las propiedades con el signo de dólar. Por ejemplo:

````
echo StringUtils::$max_number_of_characters; # Imprime "80"
````

Se accede a los métodos utilizando el nombre del método:
````
echo StringUtils::uclast("hola mundo"); # Imprime "hola mundo"
````

----

# Repaso

¡Ahora tiene el conocimiento para crear sus propias clases y objetos en PHP usando OOP! Tómese un tiempo para revisar los conceptos antes de continuar:

+ Las clases se definen usando la palabra clave `class`.
+ Las funciones definidas dentro de una clase se convierten en métodos y las variables dentro de la clase se consideran propiedades.
+ Hay tres niveles de visibilidad para los miembros de la clase:
    + `public` (predeterminado): accesible desde fuera de la clase
    + `protected` - solo accesible dentro de la clase o sus descendientes
    + `private`: solo accesible dentro de la clase definitoria
+ Los miembros pueden definirse como `static`.
    + Se accede a los miembros estáticos utilizando el Operador de resolución de alcance (`::`).
+ Las clases se instancian en objetos usando la palabra clave `new`.
    + Se accede a los miembros de un objeto utilizando el Operador de objetos (`->`).

----
[Próxima lección](https://github.com/sebastiantorres86/curso-php/blob/master/yendo-a-dormir/yendo-a-dormir.md)