<?php

require 'basedatos.php';
require 'models/pregunta.php';

$datos = ["titulo" => "creando una pregunta","descripcion" => "intentando resolver la pregunta"];

//var_dump(preguntaConRespuestas(connect(),6)->fetchAll());
foreach(buscarPreguntasPorTitulo(connect(),"pregunta") as $row)
{
    echo "Titulo: " . $row['titulo'];
    echo "<br>";
    echo "Descripcion: " . $row['descripcion'];

}