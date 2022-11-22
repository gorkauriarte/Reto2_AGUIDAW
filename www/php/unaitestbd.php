<?php
    include "basedatos.php";
    require "models/respuesta.php";
    require "models/reaccion.php";
    require "models/etiqueta.php";
    require "models/pregunta.php";
    $dbc = connect();

//  prueba de buscar respuesta por id y votos de cada uno
function preguntar($dbc){
    $pregunta4=1;
    $preguntas= buscarRespuestasPorVotos($dbc,$pregunta4);
    if (!$preguntas) {
    print "No existen respuestas a esa pregunta.";
    }
    else {
    foreach ($preguntas as $respuesta) {
        ?>
        <div class="respuesta" value='<?=$respuesta["id"]?>'>
            <div class="respuesta_explicacion">
                <p><?=$respuesta["descripcion"]?></p>
                <img src="<?=$respuesta["imagen"]?>">
            </div>
            <div class="reaccion">
                <button class="blike" value="<?=$respuesta["id"]?>"><i class="fa fa-thumbs-up"></i></button> 
                <p class="like"><?=$respuesta["megusta"]?> </p> 
                <button class="bdislike" value="<?=$respuesta["id"]?>"><i class="fa fa-thumbs-down"></i></button> 
                <p class="dislike"><?=$respuesta["nomegusta"]?> </p>
            </div>
            <div class="usuario_respuesta">
                <img src="../img/aeropspace_shutterstock_1048379746.jpg"> 
                <p>brukiñigo</p>
            </div>
        </div>
        <?php
        }
    }
}

function veretiquetas($dbc,$pregunta){

    $etiquetas=buscarEtiquetasDeUnaPregunta($dbc,$pregunta);
    if ($etiquetas) {
    foreach ($etiquetas as $etiqueta){
    echo '<div class="etiqueta">';
    echo '<p>'.$etiqueta['name'].'</p>';
    echo '</div>';
    }
     }
   
}
function listaetiquetas($dbc){

    $etiquetas=etiquetas($dbc);
    foreach ($etiquetas as $etiqueta){
    echo '<div class="etiqueta">';
    echo '<p>'.$etiqueta['name'].'</p>';
    echo '</div>';
    }
    
}

function listapreguntas($dbc,$id){

    $etiquetas=buscarPreguntasPorEtiqueta($dbc,$id);
    foreach ($etiquetas as $etiqueta){
        $pregunta=buscarPreguntaPorId($dbc,$etiqueta['id_pregunta']);
        //print_r($pregunta[0]);

        ?>  
        <h4><?= $pregunta[0]['titulo']?></h4>
        <div class="pregunta_explicacion">
            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis 
                praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias 
                excepturi sint occaecati cupiditate non provident, similique sunt in culpa 
                qui officia deserunt mollitia animi, id est laborum et dolorum fuga. </p>
        </div>
        <div class="etiquetas">
        <?php
            include_once "php/unaitestbd.php";
            veretiquetas($dbc,$pregunta[0]['id']);
    ?>  
        </div>
        <div class="pregunta_usuario_fecha">
            <div class="usuario_pregunta">
                <p>ameerhamza</p>
            </div>
            <div class="fecha_pregunta">
                <p>22/06/2025</p>
            </div>
        </div>
        <?php

    }
    
}




//  prueba de cambio de votos

if (isset($_POST['cosa']) ) {
    switch ($_POST['cosa']) {
     case 'si':
         insertar($dbc);
         break;
     case 'sintomaplus':
         subevoto($dbc);
     break;
     case 'sintomaminus':
         bajavoto($dbc);
     break;
    }
     
 }
 
 function subevoto ($dbc){
    
     $datos=['respuesta' => $_POST['id'],'usuario' => 1];
     $buscasubida=buscarReaccionDeUnaRespuestaPositivaDeUnUsuario($dbc,$datos['respuesta'],$datos['usuario']);
 
     $buscabajada=buscarReaccionDeUnaRespuestaNegativaDeUnUsuario($dbc,$datos['respuesta'],$datos['usuario']);
    if($buscasubida==0){
         if ($buscabajada!=0) 
             borrarReaccionNegativa($dbc,$datos);
         insertarNuevaReaccionPositiva($dbc,$datos);
     }
    else 
        borrarReaccionPositiva($dbc,$datos); 
 }
 function bajavoto ($dbc){
     $datos=['respuesta' => $_POST['id'],'usuario' => 1];
     $buscasubida=buscarReaccionDeUnaRespuestaPositivaDeUnUsuario($dbc,$datos['respuesta'],$datos['usuario']);
     $buscabajada=buscarReaccionDeUnaRespuestaNegativaDeUnUsuario($dbc,$datos['respuesta'],$datos['usuario']);
    if($buscabajada==0){
         if ($buscasubida!=0) 
             borrarReaccionPositiva($dbc,$datos);
         insertarNuevaReaccionNegativa($dbc,$datos);  
     }
    else 
        borrarReaccionNegativa($dbc,$datos);
 }
 ?>