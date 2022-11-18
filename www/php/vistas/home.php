<?php session_start(); 

if(!isset($_SESSION['id_usuario']) || !isset($_SESSION['nombre']))
{
    header("location: /index.php ");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | Home</title>
</head>
<body>
    <h2>hello</h2>
    <p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
        Earum consectetur explicabo atque reprehenderit omnis fuga nulla aliquam quo tempore quae nam neque, expedita, 
        exercitationem, magnam recusandae doloribus ducimus cumque provident?
    </p>
</body>
</html>

<?php
unset($_SESSION['error-accesso']);
?>