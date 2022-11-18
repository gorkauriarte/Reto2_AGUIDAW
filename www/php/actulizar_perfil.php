<?php
session_start();
require "../basedatos.php";
require "../models/usuario.php";

function vuelveAtras(){
    
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




?>