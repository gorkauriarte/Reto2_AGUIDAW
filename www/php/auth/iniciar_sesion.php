<?php

session_start();
require "../basedatos.php";
require "../models/usuario.php";


if(isset($_POST['email']) && isset($_POST['password'])){

$email = $_POST['email'];
$password = $_POST['password'];

$dbc = connect();
$usuario = buscarUsuarioPorEmail($dbc,$email);
if($usuario){

       
    if(password_verify($password,$usuario->password))
    {
        $_SESSION['id_usuario'] = $usuario->id;
        $_SESSION['nombre'] = $usuario->nombre;

        close($dbc);

        header("location: ../vistas/home.php");
    }
    else{
        echo "la contraseña esta mal";
    }

}else
{
    echo "no existe ningun usuario con este email";
}
}
