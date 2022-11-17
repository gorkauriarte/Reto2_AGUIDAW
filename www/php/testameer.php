<?php

require 'basedatos.php';
require 'models/pregunta.php';
require 'helpers/file_manager.php';

$datos = ["titulo" => "creando una pregunta","descripcion" => "intentando resolver la pregunta"];

//var_dump(preguntaConRespuestas(connect(),6)->fetchAll());

 if(isset($_POST['submit']))
 {
    $result = subirFoto($_FILES['perfil'],'../imagenes/');

    var_dump($result);
 }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File upload</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="perfil">
        <input type="submit" name="submit" value="Subir Foto">
    </form>
</body>
</html>