<?php 

session_start();

if(!isset($_SESSION['id_usuario']) || (!isset($_SESSION['loggedin'])) && $_SESSION['loggedin'] == false)
{
    $_SESSION['error-accesso'] = "Tienes que iniciar sesion para crear una pregunta";
    header("location: iniciosesion.php");
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="../css/crear_pregunta.css">
    <link rel="stylesheet"  href="../css/header.css">
    <link rel="stylesheet"  href="../css/footer.css">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <title>Crear pregunta</title>
</head>
<body>
    <?php
        require "../componentes/header.php";
    ?>

    <main class="todo">
        <div class="titulo-h2">
            <h2> Crea tu propia pregunta </h2>
        </div>
        <form action="auth/crear_pregunta.php" method="POST" enctype="multipart/form-data">
            <div class="formulario">
                <input name="titulo" type="text" id="titulo" class="titulo" placeholder="Escribe el titulo" class="titulo">
                <?php if(isset($_SESSION['errors']['titulo'])): ?>
                    <small class="mensaje-error"><?= $_SESSION['errors']['titulo'] ?></small>
                <?php endif; ?>
                <textarea name="descripcion" id="descripcion" class="descripcion" placeholder="Escribe la descripcion" class="descripcion"></textarea>
                <?php if(isset($_SESSION['errors']['descripcion'])): ?>
                    <small class="mensaje-error"><?= $_SESSION['errors']['descripcion'] ?></small>
                <?php endif; ?>
                <input name="archivo" type="file" id="archivo" class="archivo">
                <input type="hidden" id="lista_etiqueta" value="" name="lista_etiqueta">
                <div id="etiquetas_elegidas"></div>
                <select id="etiqueta" class="etiqueta" multiple onchange="mostrarEtiquetasSeleccionadas()">
                    <?php 
                        require 'basedatos.php';
                        require 'models/etiqueta.php';
                        $dbc = connect();
                        $etiquetas = etiquetas($dbc);
                        foreach($etiquetas as $etiqueta) { 
                    ?>
                        <option value="<?= $etiqueta['id'] ?>"> <?= $etiqueta["name"] ?> </option>
                    <?php 
                        } 
                        close($dbc);
                    ?>
                </select>

                <div class="boton">
                    <input type="submit" id="crear_pregunta" value="Crear Pregunta"/>
                </div>
            </div>
        </form>
    </main>

    <?php
        require "../componentes/footer.php";
    ?>
    <script src="../js/crear_pregunta.js"></script>
</body>
</html>
<?php 
unset($_SESSION['errors']);
?>