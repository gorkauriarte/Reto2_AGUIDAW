<?php

require "../basedatos.php";
require "../models/usuario.php";

session_start();

function vuelveAtras(){
    header("location: /php/perfil_usuario.php");
    exit;
    
}


//VALIDACIONES
if(!isset($_POST['contrasena_actual']) || $_POST['contrasena_actual'] == "")
{
    $_SESSION['errors']['contrasena_actual'] = "El campo Password es obligatorio";
    vuelveAtras();
}

if(!isset($_POST['contrasena_nueva']) || $_POST['contrasena_nueva'] == "")
{
    $_SESSION['errors']['password'] = "El campo Password es obligatorio";
    vuelveAtras();
}


if(!isset($_POST['contrasena_confirmar']) || $_POST['contrasena_confirmar'] == "")
{
    $_SESSION['errors']['password'] = "El campo Password es obligatorio";
    vuelveAtras();
}

if( $_POST['contrasena_nueva'] != $_POST['contrasena_confirmar'])
{
    $_SESSION['errors']['cpassword'] = "El campo Confirmar Contraseña no coincide con el campo Contraseña";
    vuelveAtras();
}

//COMPARAR CONTRASEÑA CON LA DEL USUARIO
$dbc = connect();

$usuario = buscarUsuarioPorId($dbc, $_SESSION['id_usuario']);

$pass = $_POST['contrasena_actual'];

$result = password_verify($pass, $usuario->password);

$_POST['contrasena_nueva'] = password_hash($_POST['contrasena_nueva'],PASSWORD_BCRYPT);

//CONEXION Y ACTUALIZAR


$usuarioContrasenaNueva = actualizarContrasena($dbc, $_SESSION['id_usuario'], $_POST['contrasena_nueva']);

close($dbc);

if($usuarioContrasenaNueva){
    $_SESSION['exito'] = "Contrasena modificada con exito con exito";
    header("location: /php/perfil_usuario.php");
}
exit;