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

function crearPregunta($dbc,$usuario,$datos)
{
    $sql = "insert into preguntas(id_usuario,titulo,descripcion,imagen) values(:usuario,:titulo,:descripcion,:imagen)";
    $statement = $dbc->prepare($sql);

   
    //$statement->bindParam(':usuario',$_SESSION['id_usuario']);
    $statement->bindParam(':usuario',$usuario);
    $statement->bindParam(':titulo',$datos['titulo']);
    $statement->bindParam(':descripcion',$datos['descripcion']);
    $statement->bindParam(':imagen',$$datos["imagen"]);

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

    return $statement;

}



function todasPreguntasConNumroDeRespuestasYUsuario($dbc,$desde,$hasta){
    $sql = "select p.id,p.titulo,p.descripcion,p.fecha_creacion,p.id_usuario,count(r.id) as answers,u.nombre as usuario from preguntas p left join respuestas r on p.id = r.id_pregunta join usuarios u on p.id_usuario = u.id group by(p.id) limit $desde,$hasta";
    $statement = $dbc->prepare($sql);

    $statement->execute();
    return $statement; // devuelve una coleccion

}


function pregutasFilteradoPorFecha($dbc){
    $sql = "select p.id,p.titulo,p.descripcion,p.fecha_creacion,p.id_usuario,count(r.id) as answers,u.nombre as usuario from preguntas p left join respuestas r on p.id = r.id_pregunta join usuarios u on p.id_usuario = u.id group by(p.id) order by p.fecha_creacion desc";
    $statement = $dbc->prepare($sql);

    $statement->execute();
    return $statement; // devuelve una coleccion

}
function pregutasFilteradoPorTitulo($dbc){
    $sql = "select p.id,p.titulo,p.descripcion,p.fecha_creacion,p.id_usuario,count(r.id) as answers,u.nombre as usuario from preguntas p left join respuestas r on p.id = r.id_pregunta join usuarios u on p.id_usuario = u.id group by(p.id) order by p.titulo asc";
    $statement = $dbc->prepare($sql);

    $statement->execute();
    return $statement; // devuelve una coleccion

}

function pregutasFilteradoMasRespuestas($dbc){
    $sql = "select p.id,p.titulo,p.descripcion,p.fecha_creacion,p.id_usuario,count(r.id) as answers,u.nombre as usuario from preguntas p left join respuestas r on p.id = r.id_pregunta join usuarios u on p.id_usuario = u.id group by(p.id) order by answers desc";
    $statement = $dbc->prepare($sql);

    $statement->execute();
    return $statement; // devuelve una coleccion

}

function pregutasFilteradoMenosRespuestas($dbc){
    $sql = "select p.id,p.titulo,p.descripcion,p.fecha_creacion,p.id_usuario,count(r.id) as answers,u.nombre as usuario from preguntas p left join respuestas r on p.id = r.id_pregunta join usuarios u on p.id_usuario = u.id group by(p.id) order by answers asc";
    $statement = $dbc->prepare($sql);

    $statement->execute();
    return $statement; // devuelve una coleccion

}

function pregutasBuscadoPorTitulo($dbc,$texto){
    $sql = "select p.id,p.titulo,p.descripcion,p.fecha_creacion,p.id_usuario,count(r.id) as answers,u.nombre as usuario from preguntas p left join respuestas r on p.id = r.id_pregunta join usuarios u on p.id_usuario = u.id  where p.titulo like '%$texto%' group by(p.id) ";
    $statement = $dbc->prepare($sql);

    $statement->execute();
    return $statement; // devuelve una coleccion

}