<?php 
session_start();

if(isset($_SESSION['id_usuario']) || (isset($_SESSION['loggedin'])) && $_SESSION['loggedin'] == true)
{
    $_SESSION['error-accesso'] = "La sesion ya esta iniciada";
    header("location: vistas/home.php");
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <link rel="stylesheet" href="../css/inicio.css">
</head>

<body>
    <div class="contenedor-form">


         <!--INICIO DE SESISON-->
        <div class="formulario">
            <h2>Iniciar Sesión</h2>
            <?php if(isset($_SESSION['login-error'])): ?>
            <ul>
                <li class="mensaje-error"> <?= $_SESSION['login-error'] ?> </li>
            </ul>
            <?php endif; ?>
            <form action="auth/iniciar_sesion.php" method="post">
                <div class="fieldset">
                    <input type="email" name="email" placeholder="Correo Electronico" <?php if(isset($_SESSION['old']['email'])): ?> value="<?= $_SESSION['old']['email'] ?>" <?php endif; ?> required>
                    <?php if(isset($_SESSION['errors']['email'])): ?>
                        <small class="mensaje-error"><?= $_SESSION['errors']['email'] ?></small>
                    <?php endif; ?>
                </div>
                <div class="fieldset">
                    <input type="password" name="password" placeholder="Contraseña" >
                    <?php if(isset($_SESSION['errors']['password'])): ?>
                        <small class="mensaje-error"><?= $_SESSION['errors']['password'] ?></small>
                    <?php endif; ?>
                </div>
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
<?php 
unset($_SESSION['errors']);
unset($_SESSION['old']);
unset($_SESSION['login-error']);
?>