<?php

require "../models/pregunta.php";
require "../models/etiqueta.php";
require "../helpers/file_manager.php";
require "../basedatos.php";


    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    //Imagen
    $imagen = "imagenes/profile.png";
    if(isset($_POST['imagen']))
    {
        $result = subirFoto($_POST['perfil'],"../../imagenes/");
        if($result['estado'] == 1)
        {
            $_POST['imagen'] = $result['ruta'];
        }
    }
    else{
        $_POST['imagen'] = "imagenes/profile.png";
    }


    
    $dbc = connect();

    //Crear usuario
    $datosPregunta=["titulo"=>$titulo,"descripcion"=>$descripcion,"imagen"=>$_POST['imagen']];
    $usuario = $_SESSION["id_usuario"];
    $usuarioInsertado =  crearPregunta($dbc,$usuario,$datosPregunta);


    
    //Etiqueta
    $pregunta = buscarPreguntasPorTitulo($dbc, $datosPregunta["titulo"]);
    $id_pregunta = $pregunta["id_pregunta"];
    $etiquetas = $_POST['lista_etiqueta'];
    foreach($etiquetas as $item) {
        $id_etiqueta = buscarEtiquetaPorNombre($dbc, $item);

        $datosEtiqueta = ["id_pregunta"=>$id_pregunta,"id_etiqueta"=>$id_etiqueta];
        $etiquetaInsertadaPregunta = crearPreguntaEtiqueta($dbc, $datosEtiqueta);
    }



    close($dbc);
    
?>

