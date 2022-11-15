<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO</title>
    <link rel="stylesheet" href="../css/inicio.css">
</head>

<body>
    <div class="contenedor-form">
         <!--INICIO DE SESISON-->
        <div class="formulario">
            <h2>Iniciar Sesión</h2>
            <form action="auth/iniciar_sesion.php" method="post">
                <input type="email" name="email" placeholder="Correo Electronico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <input type="submit" value="Iniciar Sesión">
            </form>
        </div>

        <!--Olvidar Contraseña-->
        <div class="borrar-password">
            <a href="borrar_password.php">¿Has olvidado la contraseña?</a>
        </div>
    </div>
</body>

</html>