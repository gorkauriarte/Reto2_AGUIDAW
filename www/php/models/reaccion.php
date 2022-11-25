<?php
    function buscarReaccionDeUnaRespuesta($dbc) {
        $sql = "select SUM(megusta), SUM(nomegusta) from reacciones";
        $statement = $dbc->prepare($sql);

        $statement->execute();

        return $statement->fetchAll();
    }

    function buscarUpvotesDeUnaRespuesta($dbc,$id_respuesta){
        $sql = "select count(*) upvotes from reacciones where id_respuesta=:id_respuesta and reaccion=1";
        $statement = $dbc->prepare($sql);
        $statement->bindParam('id_respuesta',$id_respuesta);
        $statement->execute();
        return $statement->fetch();
    }
    function buscarDownvotesDeUnaRespuesta($dbc,$id_respuesta){
        $sql = "select count(*) downvotes from reacciones where id_respuesta=:id_respuesta and reaccion=-1";
        $statement = $dbc->prepare($sql);
        $statement->bindParam('id_respuesta',$id_respuesta);
        $statement->execute();
        return $statement->fetch();
    }

    function buscarUpvotes($dbc,$id_respuesta,$id_usuario)
    {
        $sql = "select count(*) as upvotes from reacciones where (id_respuesta=:id_respuesta and id_usuario=:id_usuario) and reaccion=1";

        $statement = $dbc->prepare($sql);

        $statement->bindParam('id_respuesta',$id_respuesta);
        $statement->bindParam('id_usuario',$id_usuario);

        $statement->execute();
        return $statement->fetch();
    }

    function buscarDownvotes($dbc,$id_respuesta,$id_usuario)
    {
        $sql = "select count(*) as downvotes from reacciones where (id_respuesta=:id_respuesta and id_usuario=:id_usuario) and reaccion=-1";

        $statement = $dbc->prepare($sql);

        $statement->bindParam('id_respuesta',$id_respuesta);
        $statement->bindParam('id_usuario',$id_usuario);

        $statement->execute();
        return $statement->fetch();
    }

    function upvote($dbc,$id_respuesta,$id_usuario)
    {
        $sql = "insert into reacciones(reaccion,id_usuario,id_respuesta) values(1,:id_user,:id_res)";
        $statement = $dbc->prepare($sql);
        $statement->bindParam('id_user',$id_usuario);
        $statement->bindParam('id_res',$id_respuesta);
        return $statement->execute();
        
    }

    function downvote($dbc,$id_respuesta,$id_usuario)
    {
        $sql = "insert into reacciones(reaccion,id_usuario,id_respuesta) values(-1,:id_user,:id_res)";
        $statement = $dbc->prepare($sql);
        $statement->bindParam('id_user',$id_usuario);
        $statement->bindParam('id_res',$id_respuesta);
        return $statement->execute();
        
    }
?>

