<?php
  
$gastosAnuales = [
    "vacaciones" => 1000,
    "reparacionesAuto" => 1000,    
];

$gastosMensuales = [
    "alquiler" => 1500,
    "serviciosPublicos" => 200,
    "seguroMedico" => 200
];

$salarioBruto = 48150;
$seguridadSocial = $salarioBruto * .062;

$ingresosSegmentos = [[9700, .88], [29775, .78], [8675, .76]];

// Escriba su código debajo:

$ingresoNeto = ($ingresosSegmentos[0][0] * $ingresosSegmentos[0][1])
 + ($ingresosSegmentos[1][0] * $ingresosSegmentos[1][1]) + 
 ($ingresosSegmentos[2][0] * $ingresosSegmentos[2][1]);

$ingresoNeto -= $seguridadSocial;
$ingresoAnual = $ingresoNeto;
echo "Ingresos anuales antes de deducir gastos anuales: \n$ingresoAnual\n";

$ingresoAnual -= $gastosAnuales["vacaciones"];
$ingresoAnual -= $gastosAnuales["reparacionesAuto"];

echo "\nIngresos anuales después del cálculo:\n$ingresoAnual\n";

$ingresoMensual = $ingresoAnual / 12;

echo "\nIngresos mensuales antes de deducir gastos mensuales:\n$ingresoMensual\n";

$ingresoSemanal = $ingresoMensual / 4.33;

echo "\nIngresos semanales antes del cálculo:\n$ingresoSemanal\n";

$gastosSemanales = [
    "combustible" => 25,
    "comida" => 90,
    "entretenimiento" => 47
];

$ingresoSemanal -= $gastosSemanales["combustible"];
$ingresoSemanal -= $gastosSemanales["comida"];
$ingresoSemanal -= $gastosSemanales["entretenimiento"];

echo "\nIngresos semanales después del cálculo:\n$ingresoSemanal\n";

$dineroSobrante = $ingresoSemanal * 52;

echo "\nIngresos restantes: $dineroSobrante";