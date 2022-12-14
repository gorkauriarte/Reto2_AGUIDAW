<?php

session_start();

require 'basedatos.php';
require 'models/usuario.php';
require 'helpers/file_manager.php';

$usuario = buscarUsuarioPorId(connect(),(int) $_SESSION['id_usuario']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de usuario</title>
    <link rel="stylesheet" href="../css/perfil_usuario.css">
    <link rel="stylesheet" href="../css/header.css" class="css">
    <link rel="stylesheet" href="../css/footer.css" class="css">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <?php
        require('../componentes/header.php');
    ?>

    <main>
        <div class="todo arriba">
            <div class="titulo">
                <h1> Datos del usuario </h1>
            </div>
            <form action="auth/actualizar_perfil.php" method="post" enctype="multipart/form-data">
                <div class="datos">
                    <div class="img">
                        <img src="../<?= $usuario->imagen ?? "imagenes/hila.png" ?>" alt="La imagen no se ha encontrado"/>
                        <input type="file" id="archivo_imagen" name="archivo_imagen" class="img-file">                
                    </div>
                    <div class="texto">
                        <div class="texto_individual">
                            <label for="nombre">Nombre: </label>
                            <input type="text" id="nombre" name="nombre" value="<?= $usuario->nombre ?>" readonly>
                            <?php if(isset($_SESSION['errors']['nombre'])): ?>
                                <small class="mensaje-error"><?= $_SESSION['errors']['nombre'] ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="texto_individual">
                            <label for="apellido"p>Apellido: </label>
                            <input type="text" id="apellido" name="apellido" value="<?= $usuario->apellido ?>" readonly>
                            <?php if(isset($_SESSION['errors']['apellido'])): ?>
                                <small class="mensaje-error"><?= $_SESSION['errors']['apellido'] ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="texto_individual">         
                            <label for="email">Email: </label>
                            <input type="text" id="email" name="email" value="<?= $usuario->email ?>" readonly>
                            <?php if(isset($_SESSION['errors']['email'])): ?>
                                <small class="mensaje-error"><?= $_SESSION['errors']['email'] ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="texto_individual">           
                            <label for="username">Username: </label>
                            <input type="text" id="username" name="alias" value="<?= $usuario->alias ?>" readonly>
                            <?php if(isset($_SESSION['errors']['alias'])): ?>
                                <small class="mensaje-error"><?= $_SESSION['errors']['alias'] ?></small>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="boton">
                    <button id="btCambiarDatos">Cambiar datos</button>
                    <button type="submit" name="act_usuario" id="btConfirmarCambiarDatos" class="confirmarCambios">Guardar datos</button>
                
                </div> 
            </form>
        </div>


        <div class="todo">
            <div class="titulo">
                <h1> Cambiar contrase??a </h1>
            </div>
            <form action="auth/actualizar_password.php" method="post" enctype="multipart/form-data">
                <div class="datos">
                    
                    <div class="texto">
                        <div class="texto_individual">           
                                <label for="contrasena_actual" readonly>Contrase??a actual: </label>
                                <div class="contrase??a">
                                    <input type="password" id="contrasena_actual" name="contrasena_actual" value="">
                                    <button id="mostrar_contrasena_actual"> <span id="span-ojo-actual" class="fa fa-eye-slash icon"></span> </button>
                                    <?php if(isset($_SESSION['errors']['contrasena_actual'])): ?>
                                        <small class="mensaje-error"><?= $_SESSION['errors']['contrasena_actual'] ?></small>
                                    <?php endif; ?>
                                    <?php if(isset($_SESSION['errors']['contrase??a_actual_error'])): ?>
                                        <small class="mensaje-error"><?= $_SESSION['errors']['contrase??a_actual_error'] ?></small>
                                    <?php endif; ?>
                                </div>
                        </div>
                        <div class="texto_individual">           
                                <label for="contrasena_nueva" readonly>Nueva contrase??a: </label>
                                <div class="contrase??a">
                                    <input type="password" id="contrasena_nueva" name="contrasena_nueva" value="">
                                    <button id="mostrar_contrasena_nueva"> <span id="span-ojo-nueva" class="fa fa-eye-slash icon"></span> </button>
                                    <?php if(isset($_SESSION['errors']['password'])): ?>
                                        <small class="mensaje-error"><?= $_SESSION['errors']['password'] ?></small>
                                    <?php endif; ?>
                                </div>
                        </div>
                        <div class="texto_individual">           
                                <label for="contrasena_confirmar" readonly>Confirmar contrase??a: </label>
                                <div class="contrase??a">
                                    <input type="password" id="contrasena_confirmar" name="contrasena_confirmar" value="">
                                    <button id="mostrar_contrasena_confirmar"> <span id="span-ojo-confirmar" class="fa fa-eye-slash icon"></span> </button>
                                    <?php if(isset($_SESSION['errors']['cpassword'])): ?>
                                        <small class="mensaje-error"><?= $_SESSION['errors']['cpassword'] ?></small>
                                    <?php endif; ?>
                                    
                                </div>
                        </div>
                    </div>
                </div>
                <div class="boton">
                    <input type="submit" value="Cambiar contrase??a">
                </div>
                
            </form>
        </div>
    </main>
    
    <?php
        require('../componentes/footer.php');
    ?>


    <script src="../js/perfil_usuario.js"></script>
</body>
</html>

<?php 

unset($_SESSION['errors']); 

?>