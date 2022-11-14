<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"  href="../css/detalle_pregunta.css">
    <title>Detalle de la pregunta</title>
</head>
<body>
    <head></head>
    <main>
        <div class="pregunta">
            <h4>¿the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized?</h4>
            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis 
                praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias 
                excepturi sint occaecati cupiditate non provident, similique sunt in culpa 
                qui officia deserunt mollitia animi, id est laborum et dolorum fuga. </p>
                <img src="" alt="">
            <div class="etiquetas">
                <div class="etiqueta"><p>Etiqueta</p></div>
                <div class="etiqueta"><p>Etiqueta2</p></div>
            </div>
            <div class="usuario_pregunta">
                <p>ameerhamza</p>
            </div>
            <div class="fecha_pregunta">
                <p>22/06/2025</p>
            </div>
        </div>

        <div class="respuesta">
            <p>Esta es la respuesta :)</p>
            <div class="usuario_respuesta">
                <p>brukiñigo</p>
            </div>
            <div class="fecha_respuesta">
                <p>24/12/2031</p>
            </div>
            <button id="like"><i class="fa fa-thumbs-up"></i></button>
            <p>5</p>
            <button id="dislike"><i class="fa fa-thumbs-down"></i></button>
            <p>2</p>
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
</body>
</html>