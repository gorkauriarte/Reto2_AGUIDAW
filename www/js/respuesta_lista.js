var respuestas=document.getElementById('descripcion').value;
document.getElementById("nuevarespuesta") .addEventListener("click", meterdatofech);
const url='../unaitestbd.php';

//funcion de meter dato a traves de un fetch
function meterdatofech() {
 let descripcion= document.getElementById('descripcion').value;  
 if (descripcion) {
  descripcion.
 }
var formData = new FormData();
formData.append('action', '');
formData.append('cosa', 'si');
formData.append('id_pregunta', '1');
formData.append('descripcion',descripcion );
 fetch('../unaitestbd.php', { 
    method: 'POST',
    credentials: "same-origin",
    /*
    //por si se envia en formato JSON
    headers: {
    "Content-Type": "application/json"
  }, */
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
});
