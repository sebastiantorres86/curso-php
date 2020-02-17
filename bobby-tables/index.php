<?php
$name = "";
$character = "";
$email = "";
$birth_year = 1969;
$validation_error = "";
$existing_users = ["admin", "guest"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $raw_name = trim(htmlspecialchars($_POST["name"]));
  if (in_array($raw_name, $existing_users)) {
    $validation_error .= "Este nombre está en uso. <br>";
  } else {
    $name = $raw_name;
  }
  $raw_character = $_POST["character"];
  if (in_array($raw_character, ["hechicero", "mago", "orco"])) {
    $character = $raw_character;
  } else {
    $validation_error .= "Debe elegir un hechicero, un mago o un orco. <br>";
  }
  $raw_email = $_POST["email"];
  if (filter_var($raw_email, FILTER_VALIDATE_EMAIL)) {
    $email = $raw_email;
  } else {
    $validation_error .= "Correo electrónico no válido. <br>";
  }
  $raw_birth_year = $_POST["birth_year"];
  $options = ["options" => ["min_range" => 1900, "max_range" => date("Y")]];
  if (filter_var($raw_birth_year, FILTER_VALIDATE_INT, $options)) {
    $birth_year = $raw_birth_year;
  } else {
    $validation_error .= "Ese no puede ser su año de nacimiento. <br>";
  }

}
?>
<h1>Crea tu perfil</h1>
<form method="post" action="">
<p>
Elige un nombre: <input type="text" name="name" value="<?php echo $name;?>" >
</p>
<p>
Elige un personaje:
  <input type="radio" name="character" value="hechicero" <?php echo ($character=='hechicero')?'checked':'' ?>> Hechicero
  <input type="radio" name="character" value="mago" <?php echo ($character=='mago')?'checked':'' ?>> Mago
  <input type="radio" name="character" value="orco" <?php echo ($character=='orco')?'checked':'' ?>> Orco
</p>
<p>
Ingresa un email:
<input type="text" name="email" value="<?php echo $email;?>" >
</p>
<p>
Ingresa tu año de nacimiento:
<input type="text" name="birth_year" value="<?php echo $birth_year;?>">
</p>
<p>
  <span style="color:red;"><?= $validation_error;?></span>
</p>
<input type="submit" value="Submit">
</form>
  
<h2>Vista previa:</h2>
<p>
  Nombre: <?=$name;?>
</p>
<p>
  Tipo de Personaje: <?=$character;?>
</p>
<p>
  Email: <?=$email;?>
</p>
<p>
  Edad: <?=date("Y")-$birth_year;?>
</p>