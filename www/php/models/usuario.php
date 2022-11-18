<?php

function buscarUsuarioPorEmail($dbc,$email){
    $sql = "select * from usuarios where email = :email LIMIT 1";
    $statement = $dbc->prepare($sql);

    $statement->execute(['email' => $email]);
    return $statement->fetch(PDO::FETCH_OBJ);
    
}

function buscarUsuarioPorId($dbc,$id){
    $sql = "select * from usuarios where id = :id LIMIT 1";
    $statement = $dbc->prepare($sql);

    $statement->execute(['id' => $id]);
    return $statement->fetch(PDO::FETCH_OBJ);
    
}

function insertarUsuario($dbc,array $datos){
    $sql = "insert into usuarios(nombre,apellido,email,alias,password,imagen) values(:nombre,:apellido,:email,:alias,:password,:imagen)";
    $statement = $dbc->prepare($sql);

    $statement->bindParam(":nombre", $datos['nombre']);    
    $statement->bindParam(":apellido", $datos['apellido']);    
    $statement->bindParam(":email", $datos['email']);    
    $statement->bindParam(":alias", $datos['alias']);    
    $statement->bindParam(":password", $datos['password']);    
    $statement->bindParam(":imagen", $datos['imagen']);
    
    return $statement->execute();

}

function actulizarUsuario($dbc, $id,array $datos){
    $sql = "update usuarios set nombre=:nombre,apellido=:apellido,alias=:alias,email=:email,password=:password where id=:id";
    $statement = $dbc->prepare($sql);

    $statement->bindParam(":nombre", $datos['nombre']);
    $statement->bindParam(":apellido", $datos['apellido']);
    $statement->bindParam(":alias", $datos['alias']);
    $statement->bindParam(":email", $datos['email']);
    $statement->bindParam(":password", $datos['password']);
    $statement->bindParam(":id", $id);

    return $statement->execute();

}