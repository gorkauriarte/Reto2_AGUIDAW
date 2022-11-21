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
            <form>
                <div class="datos">
                    <div class="img">
                        <img src="../img/bg2.jpg" alt="La imagen no se ha encontrado"/>
                        <input type="file" id="archivo_imagen" name="archivo_imagen" class="img-file">                
                    </div>
<<<<<<< HEAD
                    <div class="texto_individual">         
                        <label for="email">Email: </label>
                        <input type="text" id="email" name="email" value="ameer@gmail.com" readonly>
                    </div>
                    <div class="texto_individual">           
                        <label for="username">Alias: </label>
                        <input type="text" id="username" name="username" value="ameerhamza" readonly>
                    </div>
                    <div class="texto_individual">           
                        <label for="password" readonly>Contraseña: </label>
                        <div class="contraseña">
                            <input type="password" id="password" name="password" value="hola" readonly>
                            <button id="mostrar_contrasena"> <span id="span-ojo" class="fa fa-eye-slash icon"></span> </button>
=======
                    <div class="texto">
                        <div class="texto_individual">
                            <label for="nombre">Nombre: </label>
                            <input type="text" id="nombre" name="nombre" value="ameer" readonly>
                        </div>
                        <div class="texto_individual">
                            <label for="apellido"p>Apellido: </label>
                            <input type="text" id="apellido" name="apellido" value="hamza" readonly>
                        </div>
                        <div class="texto_individual">         
                            <label for="email">Email: </label>
                            <input type="text" id="email" name="email" value="ameer@gmail.com" readonly>
                        </div>
                        <div class="texto_individual">           
                            <label for="username">Username: </label>
                            <input type="text" id="username" name="username" value="ameerhamza" readonly>
>>>>>>> develop
                        </div>
                    </div>
                </div>
                <div class="boton">
                    <button id="btCambiarDatos">Cambiar datos</button>
                    <button type="submit" id="btConfirmarCambiarDatos" class="confirmarCambios">Guardar datos</button>
                </div> 
            </form>
<<<<<<< HEAD
            <div class="boton">
                <button id="btCambiarDatos">Cambiar datos</button>
                <button type="submit" id="btConfirmarCambiarDatos" class="confirmarCambios" >Confirmar cambio de datos</button>
=======
        </div>


        <div class="todo">
            <div class="titulo">
                <h1> Cambiar contraseña </h1>
>>>>>>> develop
            </div>
            <form>
                <div class="datos">
                    
                    <div class="texto">
                        <div class="texto_individual">           
                                <label for="contrasena_actual" readonly>Contraseña actual: </label>
                                <div class="contraseña">
                                    <input type="password" id="contrasena_actual" name="contrasena_actual" value="">
                                    <button id="mostrar_contrasena_actual"> <span id="span-ojo-actual" class="fa fa-eye-slash icon"></span> </button>
                                </div>
                        </div>
                        <div class="texto_individual">           
                                <label for="contrasena_nueva" readonly>Nueva contraseña: </label>
                                <div class="contraseña">
                                    <input type="password" id="contrasena_nueva" name="contrasena_nueva" value="">
                                    <button id="mostrar_contrasena_nueva"> <span id="span-ojo-nueva" class="fa fa-eye-slash icon"></span> </button>
                                </div>
                        </div>
                        <div class="texto_individual">           
                                <label for="contrasena_confirmar" readonly>Confirmar contraseña: </label>
                                <div class="contraseña">
                                    <input type="password" id="contrasena_confirmar" name="contrasena_confirmar" value="">
                                    <button id="mostrar_contrasena_confirmar"> <span id="span-ojo-confirmar" class="fa fa-eye-slash icon"></span> </button>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="boton">
                    <button type="submit" id="btCambiarContraseña">Cambiar contraseña</button>
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