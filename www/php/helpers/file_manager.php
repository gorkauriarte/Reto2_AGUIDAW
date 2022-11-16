<?php


function subirFoto($foto,$ruta) // hay pasar este parametro como $_FILES['nombre_del_campo_de_imagen]
{
    $mensaje = "";
    $directorio = $ruta;
    $archivo = $directorio . basename($foto['name']);
    $estadoSubir = 0;
    $tipoImage = strtolower(pathinfo($archivo,PATHINFO_EXTENSION));

    $check = getimagesize($foto['tmp_name']);

    if($check !== false)
    {
        $estadoSubir = 1;
    }
    else{
        $estadoSubir = 0;
    }

    // comprobar si ya existe un fichero con mismo nombre
    if(file_exists($archivo)){
        $mensaje = "El archivo ya existe en el directorio.";
        $estadoSubir = 0;
    }

    // comprobar si archivo es mayor que 5MB
    if($foto['size'] > 500000){
        $mensaje = "El tamaño del archivo es demasiado largo.";
        $estadoSubir = 0;
    }

    // comprobar las extensiones de la imagen
    if($tipoImage != "jpg" && $tipoImage != "png" && $tipoImage != "jpeg")
    {
        $mensaje = "Solo se puede subir los archivos con extension jpg, png, jpeg.";
        $estadoSubir = 0;
    }


    if($estadoSubir !== 0)
    {
        if(move_uploaded_file($foto['tmp_name'],$archivo))
        {
            $mensaje = "imagen subido con exito.";
        }
        else{
            $mensaje = "Error, subiendo la imagen.";
        }
    }

    return ["estado" => $estadoSubir,"mensaje" => $mensaje,"ruta" => "imagenes/" . basename($foto['name'])];

}

function borrarFoto($rutaFichero){
    $estado = false;
    if(file_exists($rutaFichero)){
        unlink($rutaFichero);
        return true;
    }
    return false;
}