<?php

session_start();

require "../models/usuario.php";
require "../helpers/file_manager.php";
require "../basedatos.php";

function vuelveAtras(){
    header("location: /php/crear_cuenta.php");
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

// registrando los errores en una sesion

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

if(isset($_POST['email']) && !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
{
    $_SESSION['errors']['email'] = "El formato del campo Email es incorrecto";
    vuelveAtras();
}

if(buscarUsuarioPorEmail(connect(),$_POST['email'])){
    $_SESSION['errors']['email'] = "Ya existe una cuenta con este correo";
    vuelveAtras();
}

if(!isset($_POST['password']) || $_POST['password'] == "")
{
    $_SESSION['errors']['password'] = "El campo Password es obligatorio";
    vuelveAtras();
}

if(!isset($_POST['confirm_password']) || $_POST['confirm_password'] == "")
{
    $_SESSION['errors']['password'] = "El campo Password es obligatorio";
    vuelveAtras();
}

if( $_POST['confirm_password'] != $_POST['password'])
{
    $_SESSION['errors']['cpassword'] = "El campo Confirmar Contraseña no coincide con el campo Contraseña";
    vuelveAtras();
}


$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$alias = $_POST['alias'];
$_POST['password'] = password_hash($_POST['password'],PASSWORD_BCRYPT);

$imagen = "imagenes/profile.png"; // una imagen por defecto en caso de que el usuario no suba la foto
if(isset($_FILES['perfil']) && $_FILES['perfil']['name'] != '')
{
    $result = subirFoto($_FILES['perfil'],"../../imagenes/");
    if($result['estado'] == 1)
    {
        $_POST['imagen'] = $result['ruta'];
    }
}
else{
    $_POST['imagen'] = "imagenes/profile.png";
}


$dbc = connect();

$usuarioInsertado =  insertarUsuario($dbc,$_POST);

// TODO : comprobar si se ha creado el usuario y mandar a la pagina inicial o a la anterior con algun mensaje
if($usuarioInsertado){
    $_SESSION['exito'] = "Usuario se ha creado con exito";
    header("location: ../iniciosesion.php");
}
exit;

