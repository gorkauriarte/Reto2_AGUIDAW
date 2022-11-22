<?php
session_start();
require "../basedatos.php";
require "../models/usuario.php";


var_dump($_POST);

function vuelveAtras(){
    header("location: ../perfil_usuario.php");
    
}

if(!isset($_POST['contrasena_actual']) || $_POST['contrasena_actual'] == "")
{
    $_SESSION['errors']['contrasena_actual'] = "El campo Password es obligatorio";
    vuelveAtras();
}

if(!isset($_POST['contrasena_nueva']) || $_POST['contrasena_nueva'] == "")
{
    $_SESSION['errors']['contrasena_nueva'] = "El campo Password es obligatorio";
    vuelveAtras();
}



if(!isset($_POST['contrasena_confirmar']) || $_POST['contrasena_confirmar'] == "")
{
    $_SESSION['errors']['contrasena_confirmar'] = "El campo Password es obligatorio";
    vuelveAtras();
}

if( $_POST['contrasena_nueva'] != $_POST['contrasena_actual'])
{
    $_SESSION['errors']['act_password'] = "El campo Confirmar Contraseña no coincide con el campo Contraseña";
    vuelveAtras();
}