<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <!--Your code goes here-->
<h3> Adición </h3>
<form action="adicion.php" method="get">
Primer número: <input type="number" name="add_first"> <br>
Segundo número: <input type="number" name="add_second"> <br>
<button type="submit"> Sumar </button> <br>
</form>
<h3> División </h3>
<form action="division.php">
Numerador: <input type="number" name="div_num"> <br>
Denominador: <input type="number" name="div_den"> <br>
<button type="submit"> Dividir </button> <br>
</form>
<a href="index.php">Reset</a>
  
</body>
</html>
