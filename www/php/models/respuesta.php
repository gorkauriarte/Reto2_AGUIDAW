<?php

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

    function borrarRespuesta($dbc,$id)
    {
        $sql = "delete from respuestas where id=:id";
        $statement = $dbc->prepare($sql);
        $statement->bindParam(':id', $id);
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