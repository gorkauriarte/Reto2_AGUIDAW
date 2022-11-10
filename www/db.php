<?php


function connect(){

    try {

        $host = "db";
        $db = "dbname";
        $user = "root";
        $password = "test";

        //code...
        $dbc = new PDO("mysql:host=$host;dbname=$db",$user,$password);
        echo "connectado";
        //echo "conexion establecido";
        return $dbc;
    } catch (\PDOException $e) { 
        echo $e->getMessage();
        return null;
    }

}

function close($conn){
    $conn = null;
}


connect();