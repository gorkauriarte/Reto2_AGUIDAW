<?php

function etiquetas($dbc){
    $sql = "select * from etiquetas";
    $statement = $dbc->prepare($sql);

    $statement->execute();

    return $statement; // devuelve una coleccion
}

function buscarEtiquetasDeUnaPregunta($dbc,$id){
    $sql = "select etiquetas.name from etiquetas, preguntas_etiquetas where etiquetas.id=preguntas_etiquetas.id_etiqueta and preguntas_etiquetas.id_pregunta=:id_pregunta";
    $statement = $dbc->prepare($sql);

    $statement->bindParam(":id_pregunta", $id);   

    $statement->execute();

    return $statement; // devuelve una coleccion
}

function buscarPreguntasPorEtiqueta($dbc,$id_etiqueta){
    $sql = "select id_pregunta from preguntas_etiquetas where id_etiqueta=:id_etiqueta";
    $statement = $dbc->prepare($sql);

    $statement->bindParam(":id_etiqueta", $id_etiqueta);   

    $statement->execute();

    return $statement; // devuelve una coleccion
}


?>