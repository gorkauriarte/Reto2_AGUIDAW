<?php
session_start();
require 'basedatos.php';
require 'models/usuario.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css" class="css">
    <link rel="stylesheet" href="../css/footer.css" class="css">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <title>Nosotros</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>


    <?php
        require('../componentes/header.php');
    ?>
   
    <main>
        <?php
        require('../componentes/main.php');
        ?>
    </main>

    <?php
        require('../componentes/footer.php');
    ?>
    
</body>