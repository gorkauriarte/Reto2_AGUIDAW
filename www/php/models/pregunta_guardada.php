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