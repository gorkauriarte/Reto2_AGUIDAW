<?php 

include "php/models/pregunta.php";
include "php/models/usuario.php";
include "php/models/etiqueta.php";
include "php/basedatos.php";

session_start();


$preguntas = [];
$cantidadPreguntas = 0;

$resultadosCadaPagina = 10;

if(isset($_GET['buscar']))
{
    
    $titulo = $_GET['buscar_titulo'];
    $preguntas = pregutasBuscadoPorTitulo(connect(),$titulo)->fetchAll();

    $cantidadPreguntas = count($preguntas);
}

else if(isset($_GET['por_fecha']))
{
    $preguntas = pregutasFilteradoPorFecha(connect())->fetchAll();
    $cantidadPreguntas = count($preguntas);
}
else if(isset($_GET['por_titulo']))
{
    $preguntas = pregutasFilteradoPorTitulo(connect())->fetchAll();
    $cantidadPreguntas = count($preguntas);
}
else if(isset($_GET['mas_respuestas']))
{
    $preguntas = pregutasFilteradoMasRespuestas(connect())->fetchAll();
    $cantidadPreguntas = count($preguntas);
}
else if(isset($_GET['menor_respuestas']))
{
    $preguntas = pregutasFilteradoMenosRespuestas(connect())->fetchAll();
    $cantidadPreguntas = count($preguntas);
}
else{

    if(!isset($_GET['page']))
    {
        $page = 1;
    }
    else{
        $page = $_GET['page'];

    }

    $desde = ($page - 1) * 10;
    $hasta = 10;

    $todasPreguntas = preguntas(connect())->fetchAll();

    $preguntas = todasPreguntasConNumroDeRespuestasYUsuario(connect(),$desde,$hasta)->fetchAll();
    $cantidadPreguntas = count($todasPreguntas);
}


function cogerPerfil($id_usuario)
{
    $usuario = buscarUsuarioPorId(connect(),$id_usuario);
    return $usuario;
}

function paginatePreguntas(){

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
   
    <main>


    <main class="contenido">
        <aside class="menu-izq"></aside>
        <div class="preguntas">

            <section class="cabeza">
                <h2>Todas Preguntas</h2>
                <div class="buscador">
                    <form action="index.php" method="get">
                        <input type="text" name="buscar_titulo" placeholder="buscar por titulo" id="campo-buscador" value="<?= isset($_GET['buscar_titulo']) ? $_GET['buscar_titulo'] : '' ?>">
                        <input type="submit" name="buscar" value="🔍" id="btn-buscar">
                    </form>
                    <a href="php/crear_pregunta.php"><button class="preguntar">Preguntar</button></a>
                </div>
            </section>
            <section class="seccion-filtros">
                <h4><?= $cantidadPreguntas ?> preguntas</h4>
                <div class="filtros-pregunta">
                    <ul class="filtros">
                        <li><a href="index.php?por_fecha=true">Por fecha</a></li>
                        <li><a href="index.php?por_titulo=true">Por titulo</a></li>
                        <li><a href="index.php?mas_respuestas=true">mas respuestas</a></li>
                        <li><a href="index.php?menor_respuestas=true">menor respuestas</a></li>
                    </ul>
                </div>
            </section> 
            <div class="contenido-preguntas">
                <?php if($cantidadPreguntas > 0): ?>
                <?php foreach($preguntas as $pregunta): ?>
                    <section class="todas-preguntas">
                        <div class="detalle-pregunta">  
                            <div class="cantidad-respuesta">
                                <h5><?= $pregunta['answers'] ?> respuestas</h5>
                            </div>
                            <div class="section-pregunta">
                                <div class="pregunta">

                                    <h4><a href="php/detalle_pregunta.php?pregunta=<?= $pregunta['id'] ?>" class="titulo-pregunta"><?= $pregunta['titulo'] ?></a></h4>
                                    <p><?= substr_replace($pregunta['descripcion'],"...",80) ?></p>


                                    <div class="info-pregunta">
                                        <div class="etiquetas-pregunta">
                                            <ul class="etiquetas">
                                                <?php foreach( buscarEtiquetasDeUnaPregunta(connect(),$pregunta['id'])->fetchAll() as $etiqueta): ?>
                                                    <li class="etiqueta-item">
                                                        <?= $etiqueta['name'] ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <div class="info-usuario">
                                            <div class="perfil-img-usuario">
                                                <?php                                                
                                                    $perfilUsuario = cogerPerfil($pregunta['id_usuario']);                                               
                                                ?>
                                                <img src="<?= $perfilUsuario->imagen ?? "imagenes/profile.png" ?>" alt="perfil usuario">
                                            </div>
                                            <div class="nombre-usuario-fecha">
                                                <h5><?= $perfilUsuario->nombre ?></h5>
                                                <p><?= $pregunta['fecha_creacion'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>          
                    </section> 
                <?php endforeach; ?>
                <?php else: ?>
                    <h4>No hay preguntas</h4>
                <?php endif; ?> 
            </div>
            <div class="paginas">
                <ul class="enlace-paginas">
                    <?php for($i=1;$i <= ceil($cantidadPreguntas / $resultadosCadaPagina); $i++): ?>
                        <a class="enlace-pagina" href="index.php?page=<?= $i ?>"><li class="pagina"><?= $i ?></li></a>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
        <div class="menu-der"></div>

    </main>

    <?php
        require('componentes/footer.php');
    ?>
</body>
</html>