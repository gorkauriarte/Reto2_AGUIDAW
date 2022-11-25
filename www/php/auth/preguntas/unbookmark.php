<?php

require '../../models/pregunta_guardada.php';
require '../../basedatos.php';

$idPregunta = (int) $_POST['id_pregunta'];
$idUsuario = (int) $_POST['id_usuario'];


$todoBien = true;

try {
 unbookmarkPregunta(connect(),$idPregunta,$idUsuario);

} catch (\Exception $e) {
    $todoBien = false;
}

if($todoBien)
{
    echo json_encode(['mensaje' => 'Pregunta Desmarcada','estado' => 'ok']);
}
else{
    echo json_encode(['mensaje' => 'Error un marcando pregunta','estado' => 'ko' ]);
}

?>