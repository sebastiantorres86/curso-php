<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>adision.php</title>
</head>
<body>

<? $_GET['add_first'] + $_GET['add_second']?>

<?= "La suma de ${_GET['add_first']} y ${_GET['add_second']} es:"?>
<h4><?=$_GET['add_first']+$_GET['add_second']?> </h4>

<a href="index.php">Reset</a>
</body>
</html>