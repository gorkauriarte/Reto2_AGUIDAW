<?php
session_start();
require '../../helpers/file_manager.php';
require '../../models/respuesta.php';
require '../../basedatos.php';


if(!isset($_SESSION['loggedin']) || !isset($_SESSION['id_usuario']))
{
    header("location: /php/iniciosesion.php");
    exit;
}

function vuelveAtras(){
    header("location: /php/detalle_pregunta.php?pregunta=" . $_POST['id_pregunta']);
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

if(!isset($_POST['descripcion']) || $_POST['descripcion'] == "")
    {
        $_SESSION['errors']['descripcion'] = "Este campo es obligatorio";
        vuelveAtras();
    }

    $_POST['imagen'] = null;

    if(isset($_FILES['file-2']) && $_FILES['file-2']["name"] != "")
    {
        $resultado = subirFoto($_FILES['file-2'],'../../../imagenes/');
        if($resultado['estado'] == 1)
        {
            $_POST['imagen'] = $resultado['ruta'];
        }
    }

    $crearRespuesta = crearRespuesta(connect(),$_POST);
    if($crearRespuesta)
    {
        header("location: /php/detalle_pregunta.php?pregunta=" . $_POST['id_pregunta']);
    }

?>