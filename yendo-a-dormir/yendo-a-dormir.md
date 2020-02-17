# Ir a la cama
##  PROYECTO

Use su conocimiento de programación orientada a objetos y PHP para ayudar a acostar a un grupo de animales.

Este proyecto proporciona práctica para:

+ Crear objetos a partir de clases
+ Escribir y usar métodos
+ Usar métodos estáticos

----
### Tareas
# Hacer una clase auxiliar

1. En este proyecto crearemos algunos pijamas para animales de corral. El agricultor tiene una forma especial en que le gustan los nombres formateados. Para garantizar esto, vamos a construir nuestra propia función de cadena similar a `strtolower` o `strtoupper` de PHP.

    Vamos a poner esta función dentro de una clase auxiliar `StringUtilities` (convirtiéndola en un método). Luego podemos agregar otras utilidades de cadena o reutilizar esta clase en otro proyecto para el mismo agricultor.

    Comience creando una clase `StringUtilities`.

#### Pista
````
class StringUtils
{

}
````
----

2. Al agricultor le gusta que los nombres estén en minúsculas, a excepción de la segunda letra, que siempre debe estar en mayúscula.

    Defina un método llamado `secondCase` dentro de `StringUtilities` que logre esto. Este método debe ser estático, ya que no crearemos instancias de `StringUtilities`. Solo lo estamos usando como una clase auxiliar.

#### Pista
Definimos un método público que realiza la tarea prevista:
````
public static function secondCase($string) {
  $string = strtolower($string);
  $string[1] = strtoupper($string[1]);
  return $string;
}
````

----

3. Pruebe este método invocando estáticamente con algunas cadenas e imprimiendo los resultados en la pantalla. Hay un caso que causa un error, ¿puedes encontrarlo?


#### Pista
Prueba: `echo StringUtils::secondCase("MCDONALD");` 
`echo StringUtils::secondCase("baldwin");` `echo StringUtils::secondCase("Q");`

----

4. Si bien "Q" podría no ser un nombre popular, podríamos usar `StringUtils` en una aplicación diferente en el futuro y nuestro método debería manejar caracteres individuales con gracia.

Modifique `secondCase` para que no genere un error para:
````
echo StringUtils::secondCase("Q"); # debe imprimir "q"
echo StringUtils::secondCase(""); # debe imprimir una cadena vacía
````

#### Pista
Hay un par de formas de lograr esto. Envolvimos el `upper casing` en un condicional:
````
if (strlen($string) >= 2) {
  $string[1] = strtoupper($string[1]);
}
````
----

# Pijamas Ya

5. Ahora que tenemos nuestra clase de ayuda, estamos listos para comenzar a hacer pijamas.

Crea una clase de `Pijamas`. Debe tener 3 propiedades privadas:

+ propietario
+ ajuste
+ color

#### Pista
Puede declarar las propiedades en 3 líneas separadas o combinarlas en una declaración como esta:
````
class Pijamas
{
  private $propietario, $ajuste, $color;
}
````
----

6. Agregue una clase de constructor para `Pijamas`. Debería permitir que se pasen 3 argumentos correspondientes a las 3 propiedades que acabamos de definir.

Proporcione valores predeterminados para cada argumento (de su elección).

Asegúrese de asignar los valores pasados ​​a sus propiedades correspondientes. Use `secondCase` en la clase auxiliar `StringUtilities` para asegurarse de que la propiedad `propietario` esté formateada correctamente.

#### Pista
Los nombres de los argumentos no tienen que coincidir con los nombres de las propiedades, pero puede ser un poco más sencillo:
````
function __construct(
  $propietario = "no reclamado",
  $ajuste = "bueno",
  $color = "blanco"
) {
  $this->propietario = StringUtils::secondCase($propietario);
  $this->ajuste = $ajuste;
  $this->color = $color;
}
````

----

7. Queremos poder describir cada objeto de `Pijamas`.

    Agregue un método de descripción (`describe`) público que devuelva una cadena utilizando las 3 propiedades para informarnos sobre el objeto.

#### Pista
Nosotros fuimos con:
````
public function describe() {
  return "El pijama $this->color de $this->propietario se ajusta $this->ajuste.";
}
````
----

8. Ahora tenemos suficiente para comenzar a probar nuestra clase. Cree una instancia de la clase `Pijamas` para "POLLO". Asignarlo a la variable `chicken_PJs`. Usa tu color y forma favoritos.

    Imprima el resultado del uso del método describe en `chicken_PJs`.

#### Pista
Dependiendo de su implementación de describe, este código:
````
$chicken_PJs = new Pijamas("POLLO", "perfectamente", "morado");
echo $chicken_PJs->describe();
```` 
Debería imprimir algo como:
````
El pijama morado de pOllo se ajusta perfectamente.
````
----

9. Digamos que algo le sucedió al pijama de pollo para cambiar el ajuste. Como si tal vez fueron lavados muchas veces y encogidos. Como `ajuste` es una propiedad privada, necesitamos hacer un setter.

Cree un método público `setFit` que pueda usarse para modificar el ajuste del pijama.

#### Pista
Podemos asignar el valor pasado a la propiedad fit:
````
public function setFit($new_fit) {
  $this->fit = $new_fit;
}
````
----

10. Ahora pruebe el método `setFit` apretando los Pijamas de pollo. Asegúrese de imprimir el resultado.

#### Pista
Lo probamos con:
````
echo "\n... lavan sus pijamas muchas veces...";
$chicken_PJs->setFit("un poco ajustado");
echo "\n";
echo $chicken_PJs->describe();
````
----

# Un tipo especializado de pijamas

11. Algunos animales necesitan que sus pijamas tengan botones para poder ponérselos.

    Cree una nueva clase `ButtonablePijamas` que herede de `Pijamas`.

#### Pista
````
class ButtonablePijamas extends Pijamas
{

}
````
----

12. Necesitaremos una nueva propiedad privada, `button_state`, para mantener el estado de los botones ("abotonados" o "desabotonados").

Agregue esta propiedad a `ButtonablePijamas` y configúrela como `"desabotonados"`.

#### Pista
````
private $button_state = "desabotonados";
````
----

13. El método de descripción no menciona los botones, pero parece el lugar correcto para un mensaje sobre los botones.

    Dentro de `ButtonablePajamas`, anule el método `describe`. La versión para esta clase debe incluir una declaración sobre si el pijama está abotonado o no.

    Recuerde que puede reutilizar el método padre con `parent::describe()` y concatenar la declaración sobre los botones.

#### Pista`
````
public function describe() {
  return parent::describe() . " También tienen botones que están actualmente $this->button_state.";
}
````
----

14. Probemos esta clase en un animal que definitivamente necesita botones. Cree una instancia de `ButtonablePijamas` con el propietario `"alce"` y guárdelo en la variable `$alce_PJs`.

Utilice el método de descripción para asegurarse de que nos permita saber que el pijama está desabrochado.

#### Pista
Elegimos "tipo de flojo" como el ajuste y "rojo" como el color.
````
$moose_PJs = new ButtonablePijamas("alce", "un poco flojo", "rojo");
echo "\n";
echo $moose_PJs->describe();
````

----

15. A Moose le gustaría cerrar su pijama, pero `button_state` es privado. Cree un método `toggleButtons` que invierta el estado de los botones. No debería tomar argumentos.

#### Pista
Hay algunas formas de abordar esto. Aquí estamos comprobando el `button_state` y cambiándolo al estado opuesto:
````
public function toggleButtons() {
  if ($this->button_state === "desabotonados") {
    $this->button_state = "abotonados";
  } else {
    $this->button_state = "desabotonados";
  }
}
````
----

16 Asegúrese de verificar que este método funcione como se esperaba. Imprime el resultado.

#### Pista
Como el pijama comienza a desabotonarse, el siguiente código debe abotonar el pijama y hacernos saber:
````
$moose_PJs->toggleButtons();
echo "\n";
echo $moose_PJs->describe();
````
----

# Más allá

17. ¡Felicitaciones por crear algunos pijamas orientados a objetos!

Si desea práctica adicional, puede seguir ampliando el proyecto. Aquí hay algunas ideas:

+ Una clase de pijamas con sombrero.
+ Realizar la validación en `setFit` para permitir solo "apretado", "fino" y "suelto"
+ Setter y métodos getter para `propietario` y las propiedades de `color`.