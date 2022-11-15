<?php

require 'basedatos.php';
require 'models/pregunta.php';

$datos = ["titulo" => "creando una pregunta","descripcion" => "intentando resolver la pregunta"];

//var_dump(preguntaConRespuestas(connect(),6)->fetchAll());

 if(isset($_POST['submit']))
 {
    $target_dir = "../imagenes/";
   
    $target_file = $target_dir . basename($_FILES['perfil']['name']);
    echo $target_file . "<br>";
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES['perfil']['tmp_name']);
    if($check !== false){
        echo "File is an valid image -" . $check['mime'] . ".";
        $uploadOk = 1;
    }
    else
    {
        echo "File is not a valid image";
        $uploadOk = 0;
    }

        if(file_exists($target_file)){
            echo "file already exists in the directory";
            $uploadOk = 0;
        }

        if($_FILES['perfil']['size'] > 5000000)
        {
            echo "your file is too large.";
            $uploadOk = 0;
        }

        if($imageFileType !== 'jpg' && $imageFileType != "png" && $imageFileType != "jpeg")
        {
            echo "Sorry, only JPG;PNG;JPEG extensions are allowed";
            $uploadOk = 0;
        }

        if($uploadOk == 0){
            echo "Sorry your image was not uploaded";
        }
        else
        {
            try{
                move_uploaded_file($_FILES['perfil']['tmp_name'],$target_file);
                echo "image uploaded";
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
            
        }

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