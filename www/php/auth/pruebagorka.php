
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear pregunta</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="titulo">
        <input type="text" name="descripcion">
        <input type="submit" name="submit" value="Crear Pregunta">
    </form>
</body>
<?php
    require "crear_pregunta.php";
?>
</html>