<?php

session_start();
//var_dump($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/detalle_pregunta.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/pruebacssimagen.css">
    <title>Detalle de la pregunta</title>
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>

</head>
<body>

    <?php
        require "../componentes/header.php";
    ?>
    <main>
        <div class="pregunta">
            <h4>¿the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized?</h4>
            <div class="pregunta_explicacion">
                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis 
                    praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias 
                    excepturi sint occaecati cupiditate non provident, similique sunt in culpa 
                    qui officia deserunt mollitia animi, id est laborum et dolorum fuga. </p>
                <img src="../img/bg2.jpg">
            </div>
            <div class="etiquetas">
            <?php
                include_once "unaitestbd.php";
                veretiquetas($dbc,1);
        ?>  
            </div>
            <div class="pregunta_usuario_fecha">
                <div class="usuario_pregunta">
                    <img src="../img/aeropspace_shutterstock_1048379746.jpg">
                    <p>ameerhamza</p>
                </div>
                <div class="fecha_pregunta">
                    <p>22/06/2025</p>
                </div>
            </div>
        </div>
        <div class="titulo_respuesta">
            <h2> Respuestas </h2>
        </div>
        <div id="respuestas">
        <?php
                include_once "unaitestbd.php";
                preguntar($dbc);
        ?>  
        </div>
        <div class="crear_respuesta">
            <p> ¿Sabes la respuesta? </p>
            <form>
                <textarea class="descripcion" id="descripcion" placeholder="Escribe tu respuesta"></textarea>
                <div class="imagenprev">
                    <input type="file" name="file-2" id="file-2" class="inputfile" data-multiple-caption="{count} archivos seleccionados" multiple />
                    <label for="file-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
                    <span class="iborrainputfile">Seleccionar archivo</span>
                    </label>
                </div>
                <div class="img">
                    <img class="img" id="imagenPrevisualizacion">
                </div>
                <button id="nuevarespuesta">Enviar respuesta</button>
            </form>
        </div>
    </main>  
    <?php
        require "../componentes/footer.php";
    ?>
    <script src="../js/respuesta_lista.js"></script>
</body>
</html>