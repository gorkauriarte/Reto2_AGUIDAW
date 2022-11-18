<?php 

require "php/models/pregunta.php";
require "php/models/usuario.php";
//require "php/models/etiquetas.php";
require "php/basedatos.php";

$preguntas = todasPreguntasConNumroDeRespuestasYUsuario(connect())->fetchAll();
$cantidadPregntas = count($preguntas);

function cogerPerfil($id_usuario)
{
    $usuario = buscarUsuarioPorId(connect(),$id_usuario);
    return $usuario;
}



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css" class="css">
    <link rel="stylesheet" href="css/footer.css" class="css">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <title>Principal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


    <?php
        require('componentes/header.php');
    ?>

    <main class="contenido">
        <aside class="menu-izq"></aside>
        <div class="preguntas">

            <section class="cabeza">
                <h2>Todas Preguntas</h2>
                <a href="#"><button class="preguntar">Preguntar</button></a>
            </section>
            <section class="seccion-filtros">
                <h4><?= $cantidadPregntas ?> preguntas</h4>
                <div class="filtros-pregunta">
                    <ul class="filtros">
                        <li><a href="#">Por fecha</a></li>
                        <li><a href="#">Por titulo</a></li>
                        <li><a href="#">mas respuestas</a></li>
                        <li><a href="#">menor respuestas</a></li>
                    </ul>
                </div>
            </section> 
            <div class="contenido-preguntas">
                <?php foreach($preguntas as $pregunta): ?>
                    <section class="todas-preguntas">
                        <div class="detalle-pregunta">  
                            <div class="cantidad-respuesta">
                                <h5><?= $pregunta['answers'] ?> respuestas</h5>
                            </div>
                            <div class="pregunta">
                                <h4><a href=""><?= $pregunta['titulo'] ?></a></h4>
                                <p><?= substr_replace($pregunta['descripcion'],"...",300) ?></p>
                            </div>
                        </div>
                        <div class="info-pregunta">
                            <div class="etiquetas-pregunta">
                                <ul class="etiquetas">
                                    <li class="etiqueta-item">php</li>
                                    <li class="etiqueta-item">css</li>
                                    <li class="etiqueta-item">html</li>
                                </ul>
                            </div>
                            <div class="info-usuario">
                                <div class="perfil-img-usuario">
                                    <?php 
                                    
                                        $perfilUsuario = cogerPerfil($pregunta['id_usuario']);
                                    
                                    ?>
                                    <img src="<?= $perfilUsuario->imagen ?? "imagenes/profile.png" ?>" alt="" height="50" width="50">
                                </div>
                                <div class="nombre-usuario-fecha">
                                    <h5><?= $perfilUsuario->nombre ?></h5>
                                    <p><?= $pregunta['fecha_creacion'] ?></p>
                                </div>
                            </div>
                        </div>
                    
                    </section> 
                <?php endforeach; ?>  
            </div>
        </div>
        <div class="menu-der"></div>
    </main>

    <?php
        require('componentes/footer.php');
    ?>

</body>
</html>