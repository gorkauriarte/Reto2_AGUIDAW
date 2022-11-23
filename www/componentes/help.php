<?php

session_start();
//var_dump($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Help</title>
  <link rel="stylesheet" href="../css/help.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/footer.css">
</head>
<body>
  <?php
  require ('header.php');
  ?>
  <main>
  <div class="formulario">
    <h2>Mandanos un Mensaje de Ayuda</h2>

    <!--FORM ACTION-->
    <form action="#">

    <!--Nombre-->
      <div class="campo_dbl">
        <div class="campo">
          <input type="text" name="nombre" placeholder="Pon tu nombre">
          <i class='fas fa-user'></i>
        </div>

        <!--E-MAIL-->
        <div class="campo">
          <input type="text" name="email" placeholder="Pon tu e-mail">
          <i class='fas fa-envelope'></i>
        </div>
      </div>

      <!--TELEFONO-->
      <div class="campo_dbl">
        <div class="campo">
          <input type="text" name="movil" placeholder="Pon tu numero de telefono">
          <i class='fas fa-phone-alt'></i>
        </div>

        <!--Asunto-->
        <div class="campo">
          <input type="text" name="asunto" placeholder="Asunto">
          <i class='fas fa-globe'></i>
        </div>
      </div>

      <!--MENSAJE-->
      <div class="mensaje">
        <textarea placeholder="Escribe tu mensaje" name="mensaje"></textarea>
        <i class="material-icons">message</i>
      </div>

      <!--BOTON ENVIAR-->
      <div class="boton-mensaje">
        <button type="submit">Enviar Mensaje</button>
        <span></span>
      </div>
    </form>
  </div>
  </main>
  <?php
  require ('footer.php');
  ?>

  <script src="../js/help.js"></script>
</body>
</html>