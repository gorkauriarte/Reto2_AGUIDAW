<?php

function preguntas($dbc){
    $sql = "select * from preguntas";
    $statement = $dbc->prepare($sql);
    $statement->execute();

    return $statement; // devuelve una coleccion
}

function preguntasOrdenadoPor($dbc,$column,$order='asc',$limit=15)
{
    $sql = "select * from preguntas order by $column $order limit $limit";
   
    $statement = $dbc->prepare($sql);
    $statement->execute();

    return $statement; // devuelve una coleccion
}

function borrarPregunta($dbc,$id)
{
    $sql = "delete from preguntas where id=:id";
    $statement = $dbc->prepare($sql);
    $statement->bindParam(':id', $id);
    return $statement->execute(); // devuelve true o false
}

function crearPregunta($dbc,$datos)
{
    $sql = "insert into preguntas(id_usuario,titulo,descripcion,imagen) values(:usuario,:titulo,:descripcion,:imagen)";
    $statement = $dbc->prepare($sql);
    $usuario = 2;
    $imgPath = "/images";
   
    //$statement->bindParam(':usuario',$_SESSION['id_usuario']);
    $statement->bindParam(':usuario',$usuario);
    $statement->bindParam(':titulo',$datos['titulo']);
    $statement->bindParam(':descripcion',$datos['descripcion']);
    $statement->bindParam(':imagen',$imgPath);

    return $statement->execute(); // devuelve true o false
}


function actualizarPregunta($dbc,$idPregunta,$datos)
{
    $sql = "update preguntas set id_usuario=:idUsuario,titulo=:titulo,descripcion=:descripcion where id=:idPregunta";
    $statement = $dbc->prepare($sql);

    $statement->bindParam(":idUsuario",$_SESSION['id_usuario']);
    $statement->bindParam(":titulo",$datos['titulo']);
    $statement->bindParam(":descripcion",$datos['descripcion']);
    $statement->bindParam(":idPregunta",$idPregunta);

    return $statement->execute();
}

function buscarPreguntasPorTitulo($dbc,$texto)
{
    $sql = "select * from preguntas where titulo like '%$texto%'";
    $statement = $dbc->prepare($sql);

    $statement->execute();

    return $statement->fetchAll();

}
function buscarPreguntaPorId($dbc,$idPregunta)
{
    $sql = "select * from preguntas where id=:idPregunta";
    $statement = $dbc->prepare($sql);

    $statement->bindParam(":idPregunta",$idPregunta);

    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);

}