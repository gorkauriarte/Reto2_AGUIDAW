<?php
session_start();
require "../basedatos.php";
require "../models/usuario.php";
require "../helpers/file_manager.php";


function vuelveAtras(){
    header("location:../perfil_usuario.php");
    exit;
    
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


//NO ESTA TERMINADO
// borrar imagen en caso de que el usuario tenga una imagen ya.

$dbc = connect();

if(isset($_FILES['archivo_imagen']) && $_FILES['archivo_imagen']['name'] != "")
{
   
    $usuarioActual = buscarUsuarioPorId($dbc, $_SESSION["id_usuario"]);

    $imagenActual = $usuarioActual->imagen;
   
       /* $result = borrarFoto("../../$imagenActual");
    if ($result) {*/

        $subir = subirFoto($_FILES['archivo_imagen'],"../../imagenes/");

        if($subir['estado'] == 1)
        {
            $_POST['imagen'] = $subir['ruta'];
        }
    //}

}else{
    $_POST['imagen'] = "imagenes/profile.png";
}

$usuarioActulizado =  actualizarUsuario($dbc, $_SESSION["id_usuario"], $_POST);

if($usuarioActulizado){
    $_SESSION['Correcto'] = "Los datos se han cambiado correctamente";
    header("location:../perfil_usuario.php");
}

exit;

?>