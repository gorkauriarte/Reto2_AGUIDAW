document.getElementById("btCambiarDatos").addEventListener("click", habilitar);

function habilitar() {
    var nombre = document.getElementById("nombre");
    var apellido = document.getElementById("apellido");
    var email = document.getElementById("email");
    var username = document.getElementById("username");
    nombre.removeAttribute('readonly');
    apellido.removeAttribute('readonly');
    email.removeAttribute('readonly');
    username.removeAttribute('readonly');

    var boton = document.getElementById("btCambiarDatos");
    boton.innerHTML = "Confirmar cambio de datos";
    boton.removeEventListener("click", habilitar);
    boton.addEventListener("click", deshabilitar);
    boton.setAttribute("id", "btConfirmarCambiarDatos");
}

function deshabilitar() {
    var nombre = document.getElementById("nombre");
    var apellido = document.getElementById("apellido");
    var email = document.getElementById("email");
    var username = document.getElementById("username");
    nombre.readOnly = true;
    apellido.readOnly = true;
    email.readOnly = true;
    username.readOnly = true;

    var boton = document.getElementById("btConfirmarCambiarDatos");
    
    boton.innerHTML = "Cambiar datos";
    boton.removeEventListener("click", deshabilitar);
    boton.addEventListener("click", habilitar);
    boton.setAttribute("id", "btCambiarDatos");
}