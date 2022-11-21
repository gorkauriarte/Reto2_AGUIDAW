<?php
session_start();
require "basedatos.php";
require "models/usuario.php";


var_dump($_POST);

function vuelveAtras(){
    header("location: /php/crear_perfil.php");
    
}

if(!isset($_POST['nombre']) || $_POST['nombre'] == "")
{
    $_SESSION['errors']['nombre'] = "El campo Nombre es obligatorio";
    vuelveAtras();
}

if(!isset($_POST['apellido']) || $_POST['apellido'] == "")
{
    $_SESSION['errors']['apellido'] = "El campo Apellido es obligatorio";
    vuelveAtras();
}

if(!isset($_POST['email']) || $_POST['email'] == "")
{
    $_SESSION['errors']['email'] = "El campo Email es obligatorio";
    vuelveAtras();
}




$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$alias = $_POST['alias'];

// borrar imagen en caso de que el usuario tenga una imagen ya.
if(isset($_POST['imagen']))
{
    $result = borrarFoto($_POST['perfil'],"../../imagenes/");

    if ($result) {

        $subir = subirFoto($_POST['perfil'],"../../imagenes/");
        if($subir['estado'] == 1)
        {
            $_POST['imagen'] = $subir['ruta'];
        }
    }

}else{

}



$usuarioActulizado =  actualizarUsuario(connect(), 1, $_POST);

if($usuarioActulizado){
    $_SESSION['Correcto'] = "Los datos se han cambiado correctamente";
}

exit;

?>