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

        <div class="palanca">
            <button>Crear Cuenta</button>
        </div>
         <!--INICIO DE SESISON-->
        <div class="formulario">
            <h2>Iniciar Sesión</h2>
            <form action="auth/iniciar_sesion.php" method="post">
                <input type="email" name="email" placeholder="Correo Electronico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <input type="submit" value="Iniciar Sesión">
            </form>
        </div>

        <!--CREAR USUARIO-->
        <div class="formulario">
            <h2>Crea tu Cuenta</h2>
            <form action="auth/registrar.php" method="post">
                <input type="text" name="nombre" placeholder="Nombre" required>

                <input type="text" name="apellido" placeholder="Apellido" required>

                <input type="text" name="alias" placeholder="alias" required>

                <input type="email" name="email" placeholder="Correo Electronico" required>

                <input type="password" name="password" placeholder="Contraseña" required>

                <input type="password" name="password_confirm" placeholder="Confirmar Contraseña" required>

                <input type="submit" value="Registrarse">
            </form>
        </div>
        <div class="borrar-password">
            <a href="borrar_password.php">¿Has olvidado la contraseña?</a>
        </div>
    </div>
    
    <!--JAVASCRIPT-->
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/palanca.js"></script>
</body>

</html>