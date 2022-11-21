<?php
    function buscarReaccionDeUnaRespuesta($dbc) {
        $sql = "select SUM(megusta), SUM(nomegusta) from reacciones";
        $statement = $dbc->prepare($sql);

        $statement->execute();

        return $statement->fetchAll();
    }
?>