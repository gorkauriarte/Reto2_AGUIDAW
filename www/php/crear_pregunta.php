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
        <form>
            <div class="formulario">
                <input type="text" id="titulo" class="titulo" placeholder="Escribe el titulo" class="titulo">
                <textarea id="descripcion" class="descripcion" placeholder="Escribe la descripcion" class="descripcion"></textarea>
                <input type="file" id="archivo_pregunta" class="archivo_pregunta">
                <select name="etiqueta" id="etiqueta" class="etiqueta" multiple>
                    <?php 
                        require 'basedatos.php';
                        require 'models/etiqueta.php';
                        $dbc = connect();
                        $statement = etiquetas($dbc);
                        foreach($statement as $row) { 
                    ?>
                        <option> <?= $row["name"] ?> </option>
                    <?php 
                        } 
                        close($dbc);
                    ?>
                </select>

                <div class="boton">
                    <button id="crear_pregunta" > Crear pregunta </button>
                </div>
            </div>
        </form>
    </main>

    <?php
        require "../componentes/footer.php";
    ?>
</body>
</html>