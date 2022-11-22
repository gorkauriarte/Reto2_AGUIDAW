<?php

function insertarRespuesta($dbc,array $datos){
    $sql = "insert into respuestas(id_pregunta,id_usuario,descripcion,imagen) values(:id_pregunta,'0',:descripcion,:imagen)";
    $statement = $dbc->prepare($sql);

    $statement->bindParam(":id_pregunta", $datos['id_pregunta']);    
    $statement->bindParam(":descripcion", $datos['descripcion']);     
    $statement->bindParam(":imagen", $datos['imagen']);
    
    return $statement->execute();

}
function cambiarRespuesta($dbc,array $datos){
    $sql = "update respuestas set descripcion=:descripcion, imagen=:imagen where id=:id ";
    $statement = $dbc->prepare($sql);

    $statement->bindParam(":id", $datos['id']);    
    $statement->bindParam(":descripcion", $datos['descripcion']);     
    $statement->bindParam(":imagen", $datos['imagen']);
    
    return $statement->execute();
}
function borrarRespuesta($dbc,$id){
    $sql = "delete from respuestas  where id=:id ";
    $statement = $dbc->prepare($sql);
    return  $statement->execute(['id' => $id]);
}

function buscarrespuestasporfecha($dbc,$pregunta,$fecha){
    $sql = "select * from respuestas where id_pregunta = :pregunta ORDER BY fecha_creacion asc";
    $statement = $dbc->prepare($sql);

    $statement->execute(['id_pregunta' => $pregunta],['fecha' => $fecha]);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
    
}
function buscarRespuestasPorVotos($dbc,$pregunta){
    $sql = "select respuestas.* ,
    (select count(*) from megusta where id_respuesta=respuestas.id) as megusta,  
    (select count(*) from nomegusta where id_respuesta=respuestas.id) as nomegusta
    from respuestas
    where  respuestas.id_pregunta =1
    group by respuestas.id order by megusta DESC, nomegusta ASC";
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


