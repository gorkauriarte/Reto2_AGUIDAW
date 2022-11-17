<?php

session_start();
require "../basedatos.php";
require "../models/usuario.php";


function vuelveAtras(){
    header("location: /php/iniciosesion.php");
}

// rellanar los datos en una sesion si por algun error tenemos que ir atras podemos rellanar el formulario
function rellenarOldInputs(){
    foreach($_POST as $key => $value)
    {
        $_SESSION['old'][$key] = $value;
    }
}

rellenarOldInputs();

if(!isset($_POST['email']) || $_POST['email'] == "")
{
    $_SESSION['errors']['email'] = "El campo Email es obligatorio";
    vuelveAtras();
    exit;
}

if(!isset($_POST['password']) || $_POST['password'] == "")
{
    $_SESSION['errors']['password'] = "El campo Password es obligatorio";
    vuelveAtras();
    exit;
}



$email = $_POST['email'];
$password = $_POST['password'];

$dbc = connect();
$usuario = buscarUsuarioPorEmail($dbc,$email);
if($usuario){

       
    if(password_verify($password,$usuario->password))
    {
        $_SESSION['id_usuario'] = $usuario->id;
        $_SESSION['nombre'] = $usuario->nombre;
        $_SESSION['email'] = $usuario->email;
        $_SESSION['loggedin'] = true;

        close($dbc);

        header("location: ../vistas/home.php");
    }
    else{
        $_SESSION['login-error'] = "Lo sentimos, la contraseña o el correo esta mal";
        vuelveAtras();
    }

}else
{
    $_SESSION['login-error'] = "No existe ningun usuario con este correo";
    vuelveAtras();
}

