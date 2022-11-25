<?php 

session_start();

if(isset($_SESSION['id_usuario']) || (isset($_SESSION['loggedin'])) && $_SESSION['loggedin'] == true)
{
    $_SESSION['error-accesso'] = "La sesion ya esta iniciada";
    header("location: vistas/home.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro</title>
    <link rel="stylesheet" href="../css/inicio.css">
</head>
<body>
<div class="contenedor-form">
    
    <!--CREAR USUARIO-->
    <div class="formulario">
            <h2>Crea tu Cuenta</h2>
            <form action="auth/registrar.php" method="post" enctype="multipart/form-data">

                <div class="fieldset">
                    <input type="text" id="campo-nombre" name ="nombre" placeholder="Nombre" <?php if(isset($_SESSION['old']['nombre'])): ?> value="<?= $_SESSION['old']['nombre'] ?>" <?php endif; ?> >
                    <?php if(isset($_SESSION['errors']['nombre'])): ?>
                        <small class="mensaje-error"><?= $_SESSION['errors']['nombre'] ?></small>
                    <?php endif; ?>
                </div>
                
                <div class="fieldset">
                <input type="text" id="campo-apellido" name ="apellido" placeholder="Apellido" <?php if(isset($_SESSION['old']['nombre'])): ?> value="<?= $_SESSION['old']['apellido'] ?>" <?php endif; ?>  required>
                    <?php if(isset($_SESSION['errors']['apellido'])): ?>
                        <small class="mensaje-error"><?= $_SESSION['errors']['apellido'] ?></small>
                    <?php endif; ?>
                </div>

                <div class="fieldset">
                <input type="email" id="campo-email" name ="email" placeholder="Correo Electronico" <?php if(isset($_SESSION['old']['apellido'])): ?> value="<?= $_SESSION['old']['email'] ?>" <?php endif; ?> required>
                    <?php if(isset($_SESSION['errors']['email'])): ?>
                        <small class="mensaje-error"><?= $_SESSION['errors']['email'] ?></small>
                    <?php endif; ?>
                </div>

                <div class="fieldset">
                <input type="password" id="campo-password" name ="password" placeholder="Contraseña" required>
                    <?php if(isset($_SESSION['errors']['password'])): ?>
                        <small class="mensaje-error"><?= $_SESSION['errors']['password'] ?></small>
                    <?php endif; ?>
                </div>

                <div class="fieldset">
                <input type="password" id="campo-cpassword" name ="confirm_password" placeholder="Confirmar Contraseña" required>
                    <?php if(isset($_SESSION['errors']['cpassword'])): ?>
                        <small class="mensaje-error"><?= $_SESSION['errors']['cpassword'] ?></small>
                    <?php endif; ?>
                </div>
                
                <div class="fieldset">
                    <input type="text" id="campo-alias" name ="alias" placeholder="Alias" <?php if(isset($_SESSION['old']['alias'])): ?> value="<?= $_SESSION['old']['alias'] ?>" <?php endif; ?> >
                </div>
                <div class="fieldset">
                    <input type="file" id="campo-perfil" name ="perfil" >
                </div>
                <input type="submit" value="Registrarse">
            </form>
    </div>
</div>



<script>
    console.log("working");
</script>
</body>
</html>

<?php 

    unset($_SESSION['errors']);
    unset($_SESSION['old']);

?>