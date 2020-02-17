<?php
$bebidas = [
   "Latte" => 3.99,
   "Café" => 2.00,
   "Té" => 2.50,
   "Mocha" => 4.50
];

$pasteles = [
   "Croissant",
   "Muffin",
   "Rebanada de tarta",
   "Rebanada de pastel",
   "Cupcake",
   "Brownie"
];
?>

<h1>Bienvenido al Café Repetitivo</h1>

<h3>¡Bebidas!</h3>
<ul>
<?php foreach($bebidas as $bebida=>$precio):?>
<li><?="$bebida: $$precio"?></li>
<?php endforeach;?>
</ul>
<h3>¡Pasteles! ($2 cada uno)</h3>
<ul>
<?php for ($i = 0; $i<count($pasteles); $i++):?>
<li><?=$pasteles[$i]?> </li>
<?php endfor;?>
</ul>





