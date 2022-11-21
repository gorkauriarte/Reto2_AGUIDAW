document.getElementById("btCambiarDatos").addEventListener("click", habilitar);
document.getElementById("btConfirmarCambiarDatos").addEventListener("click", deshabilitar);
document.getElementById("mostrar_contrasena").addEventListener("click", mostrarContrasena);


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
    boton.style.display = "none";
    var botonConfirmar = document.getElementById("btConfirmarCambiarDatos");
    botonConfirmar.style.display = "block";



    var archivo = document.getElementById("archivo_imagen");
    archivo.style.display = "block";

    var password = document.getElementById("password");
    password.style.width = "calc(30vw - 50px)";

    var boton_contrasena = document.getElementById("mostrar_contrasena");
    boton_contrasena.style.display = "block";

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

    
    var boton = document.getElementById("btCambiarDatos");
    boton.style.display = "block";
    var botonConfirmar = document.getElementById("btConfirmarCambiarDatos");
    botonConfirmar.style.display = "none";


    var archivo = document.getElementById("archivo_imagen");
    archivo.style.display = "none";

    var password = document.getElementById("password");
    password.style.width = "30vw";

    var boton_contrasena = document.getElementById("mostrar_contrasena");
    boton_contrasena.style.display = "none";
}

function mostrarContrasena() {
    var password = document.getElementById("password");
    password.type = "text";
    password.readOnly = false;

    span = document.getElementById("span-ojo");
    span.setAttribute("class", "fa fa-eye");
    
    botonMostrarContrasena = document.getElementById("mostrar_contrasena");
    botonMostrarContrasena.removeEventListener("click", mostrarContrasena);
    botonMostrarContrasena.addEventListener("click", ocultarConrasena);
}

function ocultarConrasena() {
    var password = document.getElementById("password");
    password.type = "password";
    password.readOnly = true;

    span = document.getElementById("span-ojo");
    span.setAttribute("class", "fa fa-eye-slash icon");

    boton = document.getElementById("mostrar_contrasena");
    boton.removeEventListener("click", ocultarConrasena);
    boton.addEventListener("click", mostrarContrasena);
}
