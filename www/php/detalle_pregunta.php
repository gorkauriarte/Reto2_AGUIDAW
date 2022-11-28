<?php

session_start();
require 'basedatos.php';
require 'models/pregunta.php';
require 'models/usuario.php';
require "models/etiqueta.php";
require 'models/respuesta.php';
require 'models/pregunta_guardada.php';
require 'models/reaccion.php';

$dbc = null;
if(isset($_GET['pregunta']))
{
    $dbc = connect();
    $idPregunta = $_GET['pregunta'];

    $pregunta = buscarPreguntaPorId($dbc,$idPregunta)->fetch();
    if(!$pregunta)
    {
        
    }

    $preguntaMarcada = false;

    if(isset($_SESSION['loggedin'])){
        if(esPreguntaMarcada($dbc,$pregunta['id'],$_SESSION['id_usuario'])->fetch())
        {
            $preguntaMarcada = true;
        }
    }

    $respuestas = buscarRespuestaDeUnaPregunta($dbc,$pregunta['id']);

    //close($dbc);
    function cogerPerfil($dbc,$id_usuario)
    {
        $usuario = buscarUsuarioPorId($dbc,$id_usuario);
        return $usuario;
    }
}


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
    <link rel="stylesheet" href="../css/style.css">
    <title>Detalle de la pregunta</title>
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>

</head>
<body>

    <?php
        require "../componentes/header.php";
    ?>
    <main>
    <div class="contenido-preguntas">
                        <section class="pregunta-pagina">
                            <?php if(isset($_SESSION['loggedin'])): ?>
                            <div class="bookmark-section">
                                <?php if($preguntaMarcada): ?>
                                <img src="../img/bookmarked.png" alt="bookmarked" id="marcado" class="icono-save" onclick="unbookmarkPregunta('<?php echo $pregunta['id'] ?>','<?php echo $_SESSION['id_usuario'] ?>')" >
                                <img src="../img/unbookmark.png" alt="bookmarked" id="nomarcado"  class="icono-save" onclick="bookmarkPregunta('<?php echo $pregunta['id'] ?>','<?php echo $_SESSION['id_usuario'] ?>')" style="display:none">
                                <?php else: ?>
                                <img src="../img/unbookmark.png" alt="bookmarked" id="nomarcado"  class="icono-save" onclick="bookmarkPregunta('<?php echo $pregunta['id'] ?>','<?php echo $_SESSION['id_usuario'] ?>')" >
                                <img src="../img/bookmarked.png" alt="bookmarked" id="marcado"  class="icono-save" onclick="unbookmarkPregunta('<?php echo $pregunta['id'] ?>','<?php echo $_SESSION['id_usuario'] ?>')" style="display:none">
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                            <section class="pregunta-pagina-detalle">
                                        <div>
                                            <h4 class="titulo-p"><?= $pregunta['titulo'] ?></h4>
                                            <p  class="descripcion-pregunta"><?= $pregunta['descripcion'] ?></p>
                                            <?php if(isset($pregunta['imagen'])): ?>
                                                <img src="../<?= $pregunta['imagen'] ?>" alt="imagen pregunta" class="img-pregunta" height="45%" width="45%">
                                            <?php endif; ?>
                                        </div>
                                        <div class="info-pregunta">
                                            <div class="etiquetas-pregunta">
                                                <ul class="etiquetas">
                                                    <?php foreach( buscarEtiquetasDeUnaPregunta($dbc,$pregunta['id'])->fetchAll() as $etiqueta): ?>
                                                        <li class="etiqueta-item">
                                                            <?= $etiqueta['name'] ?>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                            <div class="info-usuario">
                                                <div class="perfil-img-usuario">
                                                    <?php                                                
                                                        $perfilUsuario = cogerPerfil($dbc,$pregunta['id_usuario']);                                               
                                                    ?>
                                                    <img src="../../<?= $perfilUsuario->imagen ?? "imagenes/profile.png" ?>" alt="perfil usuario">
                                                </div>
                                                <div class="nombre-usuario-fecha">
                                                    <h5><?= $perfilUsuario->nombre ?></h5>
                                                    <p><?= $pregunta['fecha_creacion'] ?></p>
                                                </div>
                                            </div>
                                        </div>  
                            </section>      
                        </section> 
    </div>
        <div class="titulo_respuesta">
            <h2><?= count($respuestas) ?> Respuestas </h2>
        </div>
        <div id="respuestas">
            <?php if(count($respuestas) > 0):  ?>
                <?php foreach($respuestas as $respuesta): ?>
                        <div class="respuesta">
                            <p><?= $respuesta['descripcion'] ?></p>
                            <?php if(isset($respuesta['imagen'])): ?>
                                <img src="../<?= $respuesta['imagen'] ?>" class="img-respuesta" alt="imagen respuesta">
                            <?php endif; ?>
                            <div id="votos-respuesta">
                            <?php $upvotes = buscarUpvotesDeUnaRespuesta($dbc,$respuesta['id']); ?>
                                <?php $downvotes = buscarDownvotesDeUnaRespuesta($dbc,$respuesta['id']); ?>
                                <?php if(isset($_SESSION['loggedin'])): ?>      
                                <h4 onclick="upvote('<?= $respuesta['id'] ?>','<?= $_SESSION['id_usuario'] ?>')" class="upvote">👍 <span id="<?= $respuesta['id'] . '-' . $_SESSION['id_usuario'] ?>-upvote"><?= $upvotes['upvotes'] ?></span></h4>
                                <h4 onclick="downvote('<?= $respuesta['id'] ?>','<?= $_SESSION['id_usuario'] ?>')" class="downvote">👎 <span id="<?= $respuesta['id'] . '-' . $_SESSION['id_usuario'] ?>-downvote"><?= $downvotes['downvotes'] ?></span></h4>
                                <?php else: ?>
                                    <h4>👍 <span><?= $upvotes['upvotes'] ?></span></h4>
                                    <h4>👎 <span><?= $downvotes['downvotes'] ?></span></h4>
                                <?php endif; ?>
                            </div>
                        </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="crear_respuesta">
            <p> ¿Sabes la respuesta? </p>

            <?php if(isset($_SESSION['loggedin']) && isset($_SESSION['id_usuario'])): ?>

            <form action="auth/respuestas/crear_respuesta.php" method="post" enctype="multipart/form-data">
                <textarea class="descripcion" id="descripcion" name="descripcion" placeholder="Escribe tu respuesta"></textarea>
                <?php if(isset($_SESSION['errors']['descripcion'])): ?>
                    <small class="mensaje-error"><?= $_SESSION['errors']['descripcion'] ?></small>
                <?php endif; ?>
                <input type="hidden" name="id_pregunta" value="<?= $pregunta['id'] ?>">
                <div class="imagenprev">
                    <input type="file" name="file-2" id="file-2" class="inputfile" data-multiple-caption="{count} archivos seleccionados"  />
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
            <?php else: ?>
                <a href="iniciosesion.php">iniciar sesion para responder</a>
            <?php endif; ?>
        </div>
    </main>  
    <?php
        require "../componentes/footer.php";
    ?>
    <script src="../js/respuesta_lista.js"></script>
    <script src="../js/bookmark.js"></script>
    <script>
        window.addEventListener("load", contarVecesVisitadas);

        function contarVecesVisitadas() {
            
            var existe = getCookie("vecesVisitado");

            if (typeof existe === 'undefined') 
            {
                document.cookie = "vecesVisitado=1";
              
            }
            else
            {
                var numero = parseInt(existe) + 1;
                document.cookie = "vecesVisitado="+numero;
                
            }

        }



        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
        }
        


        function upvote(respuesta,usuario){
            let id = `${respuesta}-${usuario}-upvote`;
          

            let formData = new FormData();
            formData.append('id_respuesta',respuesta);
            formData.append('id_usuario',usuario);

            console.log("upvoting");
             fetch("http://localhost/php/auth/votos/votar.php",{
                method: 'POST',
                credentials: "same-origin",
                body: formData
            }).then(res => {
                return res.json();
            })
            .then(data => {
                if(data.estado == 'ok')
                {
                    console.log(data.upvotes.upvotes);
                    document.getElementById(id).innerHTML  = data.upvotes.upvotes;
                    // up
                }
            })
            console.log(document.getElementById(id).innerHTML);
        }
        function downvote(respuesta,usuario){
            let id = respuesta +"-"+usuario + "-downvote";
            console.log("downvoting");

            let formData = new FormData();
            formData.append('id_respuesta',respuesta);
            formData.append('id_usuario',usuario);

            console.log("upvoting");
             fetch("http://localhost/php/auth/votos/down_votar.php",{
                method: 'POST',
                credentials: "same-origin",
                body: formData
            }).then(res => {
                return res.json();
            })
            .then(data => {
                if(data.estado == 'ok')
                {
                    console.log(data);
                    document.getElementById(id).innerHTML  = data.downvotes.downvotes;

                }
            })

        }


    </script>
</body>
</html>
<?php 
unset($_SESSION['errors']);
?>