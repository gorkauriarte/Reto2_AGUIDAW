<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva pregunta</title>
    <link rel="stylesheet" href="../css/perfil_usuario.css">
</head>
<body>
    <header></header>


    <main>
        
        <div class="todo">
            <div class="titulo">
                <h1> Nueva pregunta </h1>
            </div>
            <div class="datos">
                <div class="texto">
                    <div class="texto_individual">
                        <label for="titulo">titulo: </label>
                        <input type="text" id="nombre" name="nombre" value="ameer">
                    </div>
                    <div class="texto_individual">
                        <label for="contenido"p>contenido: </label>
                        <textarea name="contenido" id="contenido" cols="30" rows="10"></textarea>
                    </div>
                    <div class="texto_individual">         
                        <label for="imagen">imagen: </label>
                        <input type="text" id="email" name="email" value="" >
                    </div>

                </div>
            </div>
            <div class="boton">
                <button id="btcrearpregunta">crear pregunta</button>
            </div>
        </div>

    </main>


    <footer></footer>
    <script src="../js/crear-pregunta.js"></script>
</body>
</html>