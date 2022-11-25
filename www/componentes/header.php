<?php

if(isset($_SESSION['id_usuario'])) {
   $usuario = buscarUsuarioPorId(connect() ,(int) $_SESSION['id_usuario']);
}
?>
    <nav>
         <div class="logo">
           <a href="../index.php"><img src="../img/Stack_Overflow_icon.svg.png" alt="Error en la imagen"></a>
         </div>
         <input type="checkbox" id="click">
         <label for="click" class="menu-btn">
         <i class="fas fa-bars"></i>
         </label>
         <ul>
            <li><a class="color" href="../index.php">Home</a></li>
            <li><a class="color" href="../php/nosotros.php">Nosotros</a></li>
            <li><a class="color" href="../php/help.php">Help</a></li>
            <?php if(isset($_SESSION['loggedin']) || isset($_SESSION['id_usuario'])): ?>
               <li><a class="color" href="../php/preguntas_guardadas.php">Favoritos</a></li>
               <li><a class="color" href="../php/auth/logout.php">Logout</a></li>
               <li class="perfil">
           <a href="../php/perfil_usuario.php"><img src="../<?= $usuario->imagen ?>" alt="Error_imagen"></a></li>
           

            <?php else: ?>

            <li><a class="color" href="../php/iniciosesion.php">Sign In</a></li>
            <li><a class="color" href="../php/crear_cuenta.php">Sign Up</a></li>

            <?php endif; ?>
         </ul>
      </nav>
