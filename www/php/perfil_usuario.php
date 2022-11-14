<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de usuario</title>
    <link rel="stylesheet" href="../css/perfil_usuario.css">
</head>
<body>
    <header></header>


    <main>
        
        <div class="todo">
            <div class="titulo">
                <h1> Datos del usuario </h1>
            </div>
            <div class="datos">
                <div class="img">
                    <img src="../img/bg2.jpg" alt="La imagen no se ha encontrado"/>
                    <button> Cambiar imagen de perfil </button>
                </div>
                <div class="texto">
                    <div class="texto_individual">
                        <label for="nombre">Nombre: </label>
                        <input type="text" id="nombre" name="nombre" value="ameer" readonly>
                    </div>
                    <div class="texto_individual">
                        <label for="apellido"p>Apellido: </label>
                        <input type="text" id="apellido" name="apellido" value="hamza" readonly>
                    </div>
                    <div class="texto_individual">         
                        <label for="email">Email: </label>
                        <input type="text" id="email" name="email" value="ameer@gmail.com" readonly>
                    </div>
                    <div class="texto_individual">           
                        <label for="username">Username: </label>
                        <input type="text" id="username" name="username" value="ameerhamza" readonly>
                    </div>
                </div>
            </div>
            <div class="boton">
                <button id="btCambiarDatos">Cambiar datos</button>
            </div>
        </div>
    </main>


    <footer></footer>
    <script src="../js/perfil_usuario.js"></script>
</body>
</html>