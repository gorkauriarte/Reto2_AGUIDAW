<?php

function esPreguntaMarcada($dbc,$idPregunta,$idUsuario)
{
    $sql = "select * from preguntas_guardadas where id_pregunta=:id_pregunta and id_usuario=:id_usuario";
    $statement = $dbc->prepare($sql);

    $statement->bindParam('id_usuario',$idUsuario);
    $statement->bindParam('id_pregunta',$idPregunta);

    $statement->execute();

    return $statement;

}

function bookmarkPregunta($dbc,$pregunta,$usuario)
{
    $sql = "insert into preguntas_guardadas(id_pregunta,id_usuario) values(:id_pregunta,:id_usuario)";

    $statement = $dbc->prepare($sql);

    $statement->bindParam('id_usuario',$usuario);
    $statement->bindParam('id_pregunta',$pregunta);

    $statement->execute();
    return $statement;
}

function unbookmarkPregunta($dbc,$pregunta,$usuario)
{
    $sql = "delete from preguntas_guardadas where id_pregunta=:id_pregunta and id_usuario=:id_usuario";

    $statement = $dbc->prepare($sql);

    $statement->bindParam('id_usuario',$usuario);
    $statement->bindParam('id_pregunta',$pregunta);

    return $statement->execute();
}

function todasPreguntasGuardadas($dbc,$idUsuario){
    $sql = "select * from preguntas_guardadas where id_usuario=:id_usuario";
    $statement = $dbc->prepare($sql);

    $statement->bindParam(":id_usuario",$idUsuario);

    $statement->execute();
    return $statement;
}

function todasPreguntasGuardadasConNumroDeRespuestasYUsuario($dbc,$idUsuario,$desde,$hasta){
    $sql = "select p.id,p.titulo,p.descripcion,p.fecha_creacion,p.id_usuario,u.nombre as usuario from preguntas_guardadas pg join preguntas p on pg.id_pregunta = p.id join usuarios u on p.id_usuario = u.id where pg.id_usuario=$idUsuario  limit $desde,$hasta";
    $statement = $dbc->prepare($sql);

    $statement->execute();
    return $statement; // devuelve una coleccion

}