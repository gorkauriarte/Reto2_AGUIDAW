<?php
    function buscarReaccionDeUnaRespuestaPositiva($dbc, $idRespuesta) {
        $sql = "select COUNT(*) as cantidad from megusta where id_respuesta=:idRespuesta";
        $statement = $dbc->prepare($sql);

        $statement->bindParam(':idRespuesta',$idRespuesta);

        $statement->execute();
        if($statement->rowCount()==0)
        return null;
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    function buscarReaccionDeUnaRespuestaNegativa($dbc, $idRespuesta) {
        $sql = "select COUNT(*) as cantidad from nomegusta where id_respuesta=:idRespuesta";
        $statement = $dbc->prepare($sql);

        $statement->bindParam(':idRespuesta',$idRespuesta);

        $statement->execute();
        if($statement->rowCount()==0)
        return null;
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    function buscarReaccionDeUnaRespuestaPositivaDeUnUsuario($dbc, $idRespuesta,$idUsuario) {
        $sql = "select megusta from megusta where id_usuario=:idUsuario and id_respuesta=:idRespuesta";
        $statement = $dbc->prepare($sql);

        $statement->bindParam(':idUsuario',$idUsuario);
        $statement->bindParam(':idRespuesta',$idRespuesta);
        $statement->execute();
        return  $statement->rowCount();
 
        
    }
    function buscarReaccionDeUnaRespuestaNegativaDeUnUsuario($dbc, $idRespuesta,$idUsuario) {
        $sql = "select nomegusta from nomegusta where id_usuario=:idUsuario and id_respuesta=:idRespuesta";
        $statement = $dbc->prepare($sql);

        $statement->bindParam(':idUsuario',$idUsuario);
        $statement->bindParam(':idRespuesta',$idRespuesta);
        $statement->execute();
        return  $statement->rowCount();
  
        
    }
    function insertarNuevaReaccionPositiva($dbc, array $datos) {
        //en proceso
        $sql = "insert into megusta(megusta,id_usuario,id_respuesta) values(0,:idUsuario,:idRespuesta)";
        
        $statement = $dbc->prepare($sql);

        $statement->bindParam(':idRespuesta',$datos['respuesta']);
        $statement->bindParam(":idUsuario", $datos['usuario']);    
        

        return $statement->execute();
    }
    function insertarNuevaReaccionNegativa($dbc, array $datos) {
        $sql = "insert into nomegusta(nomegusta,id_usuario,id_respuesta) values(0,:idUsuario,:idRespuesta)";
        
        $statement = $dbc->prepare($sql);

        $statement->bindParam(':idRespuesta',$datos['respuesta']);
        $statement->bindParam(":idUsuario", $datos['usuario']);    
        

        return $statement->execute();
    }
    function borrarReaccionPositiva($dbc, array $datos) {
        //en proceso
        $sql = "delete from megusta  where id_usuario=:idUsuario and id_respuesta=:idRespuesta ";
        $statement = $dbc->prepare($sql);

        $statement->bindParam(':idRespuesta',$datos['respuesta']);
        $statement->bindParam(":idUsuario", $datos['usuario']);    

        return  $statement->execute();
    }
    function borrarReaccionNegativa($dbc, array $datos) {
        //en proceso
        $sql = "delete from nomegusta  where id_usuario=:idUsuario and id_respuesta=:idRespuesta ";
        $statement = $dbc->prepare($sql);

        $statement->bindParam(':idRespuesta',$datos['respuesta']);
        $statement->bindParam(":idUsuario", $datos['usuario']);    

        return  $statement->execute();
    }

?>