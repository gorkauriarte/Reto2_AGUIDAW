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
    $prueba4= buscarrespuestasporid($dbc,$pregunta4);
    if (!$prueba4) {
    print "No existen respuestas a esa pregunta.";
    }
    else {
    foreach ($prueba4 as $prueba) {
        $unarespuesta=buscarReaccionDeUnaRespuesta($dbc,$prueba["id"]);
        if (!isset($unarespuesta[0]["SUM(megusta)"])) {
            $unarespuesta[0]["SUM(megusta)"]=0;
        }
        if (!isset($unarespuesta["SUM(nomegusta)"])) {
            $unarespuesta[0]["SUM(nomegusta)"]=0;
        }
        echo '<div class="respuesta">';
        echo '<div class="respuesta_explicacion">';
        echo '<p>' . $prueba["descripcion"] . '</p>';
        echo '<img src="../img/bg2.jpg">'; // !!! poner '. $prueba["imagen"] .'cuando haya imagenes en src
        echo '</div>';
        echo '<div class="reaccion">';
        echo '<button id="like"><i class="fa fa-thumbs-up"></i></button> ';
        echo '<p class="like">'. $unarespuesta[0]["SUM(megusta)"] .'</p> ';
        echo '<button id="dislike"><i class="fa fa-thumbs-down"></i></button> ';
        echo '<p class="dislike">'.$unarespuesta[0]["SUM(nomegusta)"].'</p>';
        echo '</div>';
        echo '<div class="usuario_respuesta">';
        echo '<img src="../img/aeropspace_shutterstock_1048379746.jpg">'; // !!! poner '. $prueba["imagen"] .'cuando haya imagenes  en src  
        echo '<p>brukiñigo</p>';
        echo '</div>';
        echo '</div>';
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

            
               
            
            















//  prueba de buscar respuesta por votos
function vervotos($dbc){
$pregunta5=2;
$prueba5= buscarrespuestasporvotos($dbc,$pregunta5);

echo "<table>";
echo "<tr>";
echo "<th>votos</th>";
echo "<th>id</th>";
echo "<th>respuesta</th>";
echo "</tr>";
foreach ($prueba5 as $prueba) {
    echo "<tr>";
    echo "<td>" . $prueba["votos"] . "</td>";
    echo "<td>" . $prueba["lares"] . "</td>";
    echo "<td>" . $prueba["texto"] . "</td>";
    echo "</tr>";
}
echo "</table>";
}
if (isset($_POST['cosa'])) {
    pruebafetch($dbc);
    print_r($_POST);
}
function pruebafetch($dbc){
    return insertarrespuesta($dbc,$_POST);
}
?>