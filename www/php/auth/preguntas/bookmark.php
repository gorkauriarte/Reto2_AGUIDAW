<?php

require '../../models/pregunta_guardada.php';
require '../../basedatos.php';



$idPregunta = (int) $_POST['id_pregunta'];
$idUsuario = (int) $_POST['id_usuario'];


$todoBien = true;

try {
    $añadirABookmark = bookmarkPregunta(connect(),$idPregunta,$idUsuario);
} catch (\Exception $e) {
    $todoBien = false;
}

if($todoBien)
{
    echo json_encode(['mensaje' => 'Pregunta bookmarked','estado' => 'ok']);
}
else{
    echo json_encode(['mensaje' => 'Error marcando pregunta','estado' => 'ko' ]);
}

?>