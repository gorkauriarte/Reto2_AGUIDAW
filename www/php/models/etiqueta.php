<?php

    function etiquetas($dbc) {
        $sql = "select * from etiquetas";
        $statement = $dbc->prepare($sql);
        $statement->execute();

        return $statement; // devuelve una coleccion
    }

?>