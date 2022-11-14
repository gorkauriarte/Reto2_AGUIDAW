<?php

session_start();

require "../models/usuario.php";

if(!isset($_POST['nombre']) || !isset($_POST['apellido']) || !isset($_POST['alias']) || !isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['confirm_password']))
{
    header("location: /php/iniciosesion.php");
}


$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$alias = $_POST['alias'];
$password = $_POST['password'];
$imagen = $_POST['imagen'];

$dbc = connect();

$usuarioInsertado =  insertarUsuario($dbc,$_POST);

var_dump($usuarioInsertado);
exit;

