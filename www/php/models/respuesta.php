<?php

    function buscarRespuestaDeUnaPregunta($dbc, $idPregunta) {
        $sql = "select * from respuestas where id_pregunta=:idPregunta";
        $statement = $dbc->prepare($sql);

        $statement->bindParam(':idPregunta',$idPregunta);

        $statement->execute();

        return $statement->fetchAll();
    }

    function crearRespuesta($dbc, $datos) {
        $sql = "insert into respuesta(id_pregunta,descripcion,imagen) values(:idPregunta,:descripcion,:imagen)";
        $statement = $dbc->prepare($sql);

        $imgPath = "/images";

        $statement->bindParam(':usuario',$usuario);
        $statement->bindParam(':titulo',$datos['titulo']);
        $statement->bindParam(':descripcion',$datos['descripcion']);
        $statement->bindParam(':imagen',$imgPath);

    return $statement->execute(); // devuelve true o false
    }
?>