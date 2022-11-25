<?php

require '../../basedatos.php';
require '../../models/reaccion.php';



if(upvote(connect(),$_POST['id_respuesta'],$_POST['id_usuario']))
{
    $upvotes = buscarUpvotes(connect(),$_POST['id_respuesta'],$_POST['id_usuario']);
    echo json_encode(['upvotes' => $upvotes,'estado' => 'ok']);
}
else{
    $upvotes = buscarUpvotes(connect(),$_POST['id_respuesta'],$_POST['id_usuario']);
    echo json_encode(['upvotes' => $upvotes,'estado' => 'ko']);
}


?>