<?php
    function buscarReaccionDeUnaRespuesta($dbc, $idRespuesta) {
        $sql = "select SUM(megusta), SUM(nomegusta) from reacciones where id_respuesta=:idRespuesta";
        $statement = $dbc->prepare($sql);

        $statement->bindParam(':idRespuesta',$idRespuesta);

        $statement->execute();

        return $statement->fetchAll();
    }
?>