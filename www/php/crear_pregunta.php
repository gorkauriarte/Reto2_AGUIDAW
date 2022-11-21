<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Nueva pregunta</title>
    <link rel="stylesheet" href="../css/perfil_usuario.css">
</head>
<body>
    <header></header>


    <main>
        
        <div class="todo">
            <div class="titulo">
                <h1> Nueva pregunta </h1>
            </div>
            <div class="datos">
                <div class="texto">
                    <div class="texto_individual">
                        <label for="titulo">titulo: </label>
                        <input type="text" id="nombre" name="nombre" value="ameer">
                    </div>
                    <div class="texto_individual">
                        <label for="contenido"p>contenido: </label>
                        <textarea name="contenido" id="contenido" cols="30" rows="10"></textarea>
                    </div>
                    <div class="texto_individual">         
                        <label for="imagen">imagen: </label>
                        <input type="text" id="email" name="email" value="" >
                    </div>

                </div>
            </div>
            <div class="boton">
                <button id="btcrearpregunta">crear pregunta</button>
            </div>
        </div>

    </main>


    <footer></footer>
    <script src="../js/crear-pregunta.js"></script>
=======

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

>>>>>>> 5c0e981a417088f809157345a787c5b8094e4e2a
</body>
</html>