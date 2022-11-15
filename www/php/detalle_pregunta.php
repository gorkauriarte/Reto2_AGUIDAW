<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"  href="../css/detalle_pregunta.css">
    <link rel="stylesheet"  href="../css/header.css">
    <link rel="stylesheet"  href="../css/footer.css">
    <title>Detalle de la pregunta</title>
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
                <div class="etiqueta"><p>Etiqueta</p></div>
                <div class="etiqueta"><p>Etiqueta2</p></div>
            </div>
            <div class="usuario_pregunta">
                <img src="../img/aeropspace_shutterstock_1048379746.jpg">
                <p>ameerhamza</p>
            </div>
            <div class="fecha_pregunta">
                <p>22/06/2025</p>
            </div>
        </div>

        <h2> Respuestas </h2>

        <div class="respuesta">
            <div class="respuesta_explicacion">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non odio porttitor, 
                    finibus ante bibendum, dictum sapien. Maecenas commodo mauris ut mauris condimentum, 
                    at tempor tortor gravida. Fusce a nunc quis erat sagittis convallis ac quis sem. Nam 
                    quis volutpat nibh. Aliquam posuere nisl ac metus venenatis, in ornare nisl fringilla. 
                    Phasellus gravida fermentum posuere. Sed laoreet nisl id lacinia laoreet. Nam pellentesque, 
                    neque ac accumsan ultricies, tortor metus varius diam, et sodales neque nulla a ex. Nunc eget 
                    magna a quam efficitur gravida sed at elit.</p>
                <img src="../img/bg2.jpg">
            </div>
            <div class="reaccion">
                <button id="like"><i class="fa fa-thumbs-up"></i></button>
                <p>5</p>
                <button id="dislike"><i class="fa fa-thumbs-down"></i></button>
                <p>2</p>
            </div>
            <div class="usuario_respuesta">
                <img src="../img/aeropspace_shutterstock_1048379746.jpg">
                <p>brukiñigo</p>
            </div>
            
        </div>
        
        <div class="crear_respuesta">
            <p> ¿Sabes la respuesta? </p>
            <form>
                <textarea class="descripcion" id="descripcion" placeholder="Escribe tu respuesta"></textarea>
                <input type="file" name="imagen_respuesta" id="imagen_respuesta">
            </form>
            <button>Enviar respuesta</button>
        </div>
        
    </main>

    <?php
        require "../componentes/footer.php";
    ?>
</body>
</html>