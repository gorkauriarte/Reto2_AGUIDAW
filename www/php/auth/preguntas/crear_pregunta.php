<?php

require "../models/pregunta.php";
require "../models/etiqueta.php";
require "../helpers/file_manager.php";
require "../basedatos.php";

session_start();
function vuelveAtras(){
    header("location: /php/crear_pregunta.php");
    exit;
}
// rellanar los datos en una sesion si por algun error tenemos que ir atras podemos rellanar el formulario
function rellenarOldInputs(){
    foreach($_POST as $key => $value)
    {
        $_SESSION['old'][$key] = $value;
    }
}
rellenarOldInputs();


    if(!isset($_POST['titulo']) || $_POST['titulo'] == "")
    {
        $_SESSION['errors']['titulo'] = "El campo titulo es obligatorio";
        vuelveAtras();
    }
    if(!isset($_POST['descripcion']) || $_POST['descripcion'] == "")
    {
        $_SESSION['errors']['descripcion'] = "El campo descripcion es obligatorio";
        vuelveAtras();
    }



    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    

    //ARCHIVO
    if(isset($_FILES['archivo']) && $_FILES['archivo']["name"] != "")
    {
        $result = subirFoto($_FILES['archivo'],"../../imagenes/");
        if($result['estado'] == 1)
        {
            $_POST['archivo'] = $result['ruta'];
        }
    }
    else 
    {
        $_POST['archivo'] = "imagenes/profile.png";
    }



    
    $dbc = connect();

    //Crear usuario
    $usuario = (int) $_SESSION["id_usuario"];

    $preguntadInsertada =  crearPregunta($dbc,$usuario,$_POST);

    
    //Crear Etiqueta
    if(isset($_POST["lista_etiqueta"]))
    {
        $lista_etiqueta = $_POST["lista_etiqueta"];
        $etiquetas = explode(",", $lista_etiqueta);
    }
    foreach($etiquetas as $item) {
        $datosEtiqueta = ["id_pregunta"=>$preguntadInsertada,"id_etiqueta"=>$item];
        $etiquetaInsertadaPregunta = crearPreguntaEtiqueta($dbc, $datosEtiqueta);
    }

    close($dbc);
    if($preguntadInsertada){
        $_SESSION['exito'] = "La pregunta se ha creado con exito";
        header("location: /../index.php");
    }
    
?>

