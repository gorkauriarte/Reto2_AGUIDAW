document.getElementById("btCambiarDatos").addEventListener("click", habilitar);
document.getElementById("btConfirmarCambiarDatos").addEventListener("click", deshabilitar);
document.getElementById("mostrar_contrasena_actual").addEventListener("click", mostrarContrasenaActual);
document.getElementById("mostrar_contrasena_nueva").addEventListener("click", mostrarContrasenaNueva);
document.getElementById("mostrar_contrasena_confirmar").addEventListener("click", mostrarContrasenaConfirmar);


function habilitar(event) {

    event.preventDefault();

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

function mostrarContrasenaActual(event) {

    event.preventDefault();

    var password = document.getElementById("contrasena_actual");
    password.type = "text";

    span = document.getElementById("span-ojo-actual");
    span.setAttribute("class", "fa fa-eye");
    
    boton = document.getElementById("mostrar_contrasena_actual");
    boton.removeEventListener("click", mostrarContrasenaActual);
    boton.addEventListener("click", ocultarConrasenaActual);
}
function ocultarConrasenaActual(event) {

    event.preventDefault();

    var password = document.getElementById("contrasena_actual");
    password.type = "password";

    span = document.getElementById("span-ojo-actual");
    span.setAttribute("class", "fa fa-eye-slash icon");

    boton = document.getElementById("mostrar_contrasena_actual");
    boton.removeEventListener("click", ocultarConrasenaActual);
    boton.addEventListener("click", mostrarContrasenaActual);
}


function mostrarContrasenaNueva(event) {

    event.preventDefault();

    var password = document.getElementById("contrasena_nueva");
    password.type = "text";

    span = document.getElementById("span-ojo-nueva");
    span.setAttribute("class", "fa fa-eye");
    
    boton = document.getElementById("mostrar_contrasena_nueva");
    boton.removeEventListener("click", mostrarContrasenaNueva);
    boton.addEventListener("click", ocultarConrasenaNueva);
}
function ocultarConrasenaNueva(event) {

    event.preventDefault();

    var password = document.getElementById("contrasena_nueva");
    password.type = "password";

    span = document.getElementById("span-ojo-nueva");
    span.setAttribute("class", "fa fa-eye-slash icon");

    boton = document.getElementById("mostrar_contrasena_nueva");
    boton.removeEventListener("click", ocultarConrasenaNueva);
    boton.addEventListener("click", mostrarContrasenaNueva);
}


function mostrarContrasenaConfirmar(event) {

    event.preventDefault();

    var password = document.getElementById("contrasena_confirmar");
    password.type = "text";

    span = document.getElementById("span-ojo-confirmar");
    span.setAttribute("class", "fa fa-eye");
    
    boton = document.getElementById("mostrar_contrasena_confirmar");
    boton.removeEventListener("click", mostrarContrasenaConfirmar);
    boton.addEventListener("click", ocultarConrasenaConfirmar);
}
function ocultarConrasenaConfirmar(event) {

    event.preventDefault();

    var password = document.getElementById("contrasena_confirmar");
    password.type = "password";

    span = document.getElementById("span-ojo-confirmar");
    span.setAttribute("class", "fa fa-eye-slash icon");

    boton = document.getElementById("mostrar_contrasena_confirmar");
    boton.removeEventListener("click", ocultarConrasenaConfirmar);
    boton.addEventListener("click", mostrarContrasenaConfirmar);
}

