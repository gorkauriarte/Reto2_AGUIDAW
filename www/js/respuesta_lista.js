var respuestas=document.getElementById("respuestas");
document.getElementById("btpruebafetch").addEventListener("click", meterdatofech);
const url='../unaitestbd.php ';

//funcion de meter dato a traves de un fetch
function meterdatofech() {
    
var formData = new FormData();
formData.append('action', '');
formData.append('cosa', 'si');
formData.append('id_pregunta', '3');
formData.append('descripcion', 'hola, prueba fetch');
 fetch(url, { 
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


