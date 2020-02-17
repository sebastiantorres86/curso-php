<?php
class StringUtils
{
    public static function secondCase($string) {
        $string = strtolower($string);
        if (strlen($string) >= 2) {
            $string[1] = strtoupper($string[1]);
          }
        return $string;
      }
}

echo StringUtils::secondCase("MCDONALD") . "\n"; 
echo StringUtils::secondCase("baldwin") . "\n"; 
echo StringUtils::secondCase("Q") . "\n";

class Pijamas
{
  private $propietario, $ajuste, $color;
  function __construct(
    $propietario = "no reclamado",
    $ajuste = "bueno",
    $color = "blanco"
  ) {
    $this->propietario = StringUtils::secondCase($propietario);
    $this->ajuste = $ajuste;
    $this->color = $color;
  }
  public function describe() {
    return "El pijama $this->color de $this->propietario se ajusta $this->ajuste.";
  }
  public function setFit($new_fit) {
    $this->ajuste = $new_fit;
  }
}

$chicken_PJs = new Pijamas("POLLO", "perfectamente", "morado");
echo $chicken_PJs->describe();

echo "\n... lavan sus pijamas muchas veces...";
$chicken_PJs->setFit("un poco ajustado");
echo "\n";
echo $chicken_PJs->describe();

class ButtonablePijamas extends Pijamas
{
    private $button_state = "desabotonados";
    public function describe() {
        return parent::describe() . " También tienen botones que están actualmente $this->button_state.";
      }
    public function toggleButtons() {
        if ($this->button_state === "desabotonados") {
          $this->button_state = "abotonados";
        } else {
          $this->button_state = "desabotonados";
        }
      }
}

$moose_PJs = new ButtonablePijamas("alce", "un poco flojo", "rojo");
echo "\n";
echo $moose_PJs->describe();

$moose_PJs->toggleButtons();
echo "\n";
echo $moose_PJs->describe();

