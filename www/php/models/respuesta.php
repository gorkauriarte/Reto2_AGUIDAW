<?php
function insertarrespuesta($dbc,array $datos){
    $sql = "insert into respuestas(id_pregunta,descripcion,imagen) values(:id_pregunta,:descripcion,:imagen)";
    $statement = $dbc->prepare($sql);

    $statement->bindParam(":id_pregunta", $datos['id_pregunta']);    
    $statement->bindParam(":descripcion", $datos['descripcion']);     
    $statement->bindParam(":imagen", $datos['imagen']);
    
    return $statement->execute();

}
function cambiarrespuesta($dbc,array $datos){
    $sql = "update respuestas set descripcion=:descripcion, imagen=:imagen where id=:id ";
    $statement = $dbc->prepare($sql);

    $statement->bindParam(":id", $datos['id']);    
    $statement->bindParam(":descripcion", $datos['descripcion']);     
    $statement->bindParam(":imagen", $datos['imagen']);
    
    return $statement->execute();
}
function borrarrespuesta($dbc,$id){
    $sql = "delete from respuestas  where id=:id ";
    $statement = $dbc->prepare($sql);
    return  $statement->execute(['id' => $id]);
}
function buscarrespuestasporid($dbc,$pregunta){
    $sql = "select * from respuestas where id_pregunta=:id_pregunta";
    $statement = $dbc->prepare($sql);
    $statement->bindParam(":id_pregunta", $pregunta);    
    
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
    
}

function buscarrespuestasporfecha($dbc,$pregunta,$fecha){
    $sql = "select * from respuestas where id_pregunta = :pregunta ORDER BY fecha_creacion asc";
    $statement = $dbc->prepare($sql);

    $statement->execute(['id_pregunta' => $pregunta],['fecha' => $fecha]);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
    
}
function buscarrespuestasporvotos($dbc,$pregunta){
    $sql = "select sum(reacciones.positivos) as megusta, sum(reacciones.negativos) as nomegusta respuestas.id as lares, respuestas.descripcion as texto 
    from respuestas , reacciones  where reacciones.id_respuesta=respuestas.id and respuestas.id_pregunta =:id_pregunta 
    group by respuestas.id order by sum(reacciones.positivos) DESC";
    $statement = $dbc->prepare($sql);
    $statement->bindParam(":id_pregunta", $pregunta);  

    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
    
}
