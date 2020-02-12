<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>division.php</title>
</head>
<body>

<? "${_GET['div_num']} dividido por ${_GET['div_den']} es:"?>
<h4><?=$_GET['div_num']/$_GET['div_den']?> </h4>

<a href="index.php">Reset</a>
</body>
</html>