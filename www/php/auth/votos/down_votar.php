<?php

require '../../basedatos.php';
require '../../models/reaccion.php';



if(downvote(connect(),$_POST['id_respuesta'],$_POST['id_usuario']))
{
    $downvotes = buscarDownvotes(connect(),$_POST['id_respuesta'],$_POST['id_usuario']);
    echo json_encode(['downvotes' => $downvotes,'estado' => 'ok']);
}
else{
    $downvotes = buscarDownvotes(connect(),$_POST['id_respuesta'],$_POST['id_usuario']);
    echo json_encode(['downvotes' => $downvotes,'estado' => 'ko']);
}


?>