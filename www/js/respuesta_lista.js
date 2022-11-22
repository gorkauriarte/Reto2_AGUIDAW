document.getElementById("nuevarespuesta") .addEventListener("click", meterdatofech);

//funcion de meter neva respuesta a traves de un fetch
function meterdatofech() {
 let descripcion= document.getElementById('descripcion').value;  
 if (descripcion.value=="") {
  descripcion="no he escrito nada";
 }
 let imagen=document.getElementById('descripcion').value; 
 let imagensubido =document.getElementById("file-2");
 let listaArchivo=imagensubido.files;
 let archivo = listaArchivo[0];
 let subirimagen = URL.createObjectURL(archivo);
 
  
  let formData = new FormData();
  formData.append('action', '');
  formData.append('cosa', 'si');
  formData.append('id_pregunta', '1');
  formData.append('descripcion',descripcion );
  formData.append('imagen',subirimagen );
  fetch('../unaitestbd.php', { 
    method: 'POST',
    credentials: "same-origin",

    body: formData })
  .then(function (response) {
    return response.text();
  })
  .then(function (data) {
    console.log(data);
  })
  .catch(function(error) {
      console.error(err);
  });
}

 //contenido de insercion de votos

 var respuestas = document.getElementsByClassName('respuesta');

 Array.from(respuestas).forEach(pregunta => 
 {
  let identidad= pregunta.getAttribute('value')
  let reaccion=pregunta.querySelector(".reaccion");
  let positivo = reaccion.querySelector('.like').textContent;
  let botonPositivo = reaccion.getElementsByClassName('blike');
  //funcion de insertar o borrar un voto positivo a traves a taves de un fetch
  Array.from(botonPositivo).forEach(unpositivo => 
    {
      console.log(unpositivo);
      unpositivo.addEventListener("click", function () {
        let formData = new FormData();
        formData.append('action', '');
        formData.append('cosa', 'sintomaplus');  
        formData.append('id', identidad);
        for (var pair of formData.entries()) {
          console.log(pair[0]+ ', ' + pair[1]); 
        }
        console.log('-------------');
        fetch('../unaitestbd.php', { 
          method: 'POST',
          credentials: "same-origin",
          body: formData })
        .then(function (response) {
          return response.text();
        })
        .then(function (data) {
          console.log(data);
        })
        .catch(function(error) {
            console.error(err);
        });
        console.log('-------------');
        
      });
    });
  let negativo = reaccion.querySelector('.dislike');
  let botonNegativo = reaccion.getElementsByClassName('bdislike');
  //funcion de insertar o borrar un voto negativo a taves de un fetch
  Array.from(botonNegativo).forEach(unnegativo => 
    {
      console.log(unnegativo);
      unnegativo.addEventListener("click", function () {
        //creacion de un formulario
        let formData = new FormData();
        formData.append('action', '');
        formData.append('cosa', 'sintomaminus');  
        formData.append('id', identidad);
        for (var pair of formData.entries()) {
          console.log(pair[0]+ ', ' + pair[1]); 
        }
        console.log('-------------');
        //insercion del fetch
        fetch('../unaitestbd.php', { 
          method: 'POST',
          credentials: "same-origin",
          body: formData })
        .then(function (response) {
          return response.text();
        })
        .then(function (data) {
          console.log(data);
        })
        .catch(function(error) {
            console.error(err);
        });
      });


    });

  
  });



 //contenido para ver la previsualizacion de una imagen
const seleccionArchivos = document.getElementById("file-2"),
imagenPrevisualizacion = document.getElementById("imagenPrevisualizacion");
seleccionArchivos.addEventListener("change", () => 
{
    const archivos = seleccionArchivos.files;
    if (!archivos || !archivos.length) 
        {
        imagenPrevisualizacion.src = "";
        return;
        }
    const primerArchivo = archivos[0];
    const objectURL = URL.createObjectURL(primerArchivo);
    imagenPrevisualizacion.src = objectURL;
    console.log(seleccionArchivos)
});
