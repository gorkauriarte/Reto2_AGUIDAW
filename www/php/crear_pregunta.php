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
        <div class="formulario">
            <input type="text" id="titulo" class="titulo" placeholder="Escribe el titulo" class="titulo">
            <input type="text" id="descripcion" class="descripcion" placeholder="Escribe la descripcion" class="descripcion">
            <input type="file" id="archivo_pregunta" class="archivo_pregunta">
            <button id="crear_pregunta"> Crear pregunta </button>
        </div>
    </main>

    <?php
        require "../componentes/footer.php";
    ?>
</body>
</html>