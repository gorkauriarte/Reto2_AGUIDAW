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


    function buscarRespuestaDeUnaPregunta($dbc, $idPregunta) {
        $sql = "select * from respuestas where id_pregunta=:idPregunta";
        $statement = $dbc->prepare($sql);

        $statement->bindParam(':idPregunta',$idPregunta);

        $statement->execute();

        return $statement->fetchAll();
    }

    function crearRespuesta($dbc, $datos) {
        $sql = "insert into respuesta(id_pregunta,id_usuario,descripcion,imagen) values(:idPregunta,:usuario,:descripcion,:imagen)";
        $statement = $dbc->prepare($sql);

        $subirImg = subirFoto($_FILES['imagen_respuesta'],"../../imagenes/");
        if($subirImg['estado'] == 1){
            $imgPath = $subirImg['ruta'];
        }
        $usuario = $_SESSION['id_usuario'] ?? 1;


        $statement->bindParam(':idPregunta',$datos['idPregunta']);
        $statement->bindParam(':usuario',$usuario);
        $statement->bindParam(':descripcion',$datos['descripcion']);
        $statement->bindParam(':imagen',$imgPath);

        return $statement->execute(); // devuelve true o false
    }

 
    function actualizarRespuesta($dbc,$idRespuesta,$descripcion)
    {
        $sql = "update respuestas set descripcion=:descripcion,imagen=:imagen where id=:idRespuesta";
        $statement = $dbc->prepare($sql);

        $subirImg = subirFoto($_FILES['imagen_respuesta'],"../../imagenes/");
        if($subirImg['estado'] == 1){
            $imgPath = $subirImg['ruta'];
        }

        $statement->bindParam(":imagen",$imgPath);
        $statement->bindParam(":descripcion",$descripcion);
        $statement->bindParam(":idRespuesta",$idRespuesta);

        return $statement->execute();
    }

?>

