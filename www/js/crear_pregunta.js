function mostrarEtiquetasSeleccionadas() {
    var el = document.getElementsByTagName('select')[0];
    var etiquetas_seleccionadas = getSelectValues(el);   
    var etiquetas = '';
    etiquetas_seleccionadas.forEach(item => {
        etiquetas += `<li class="item-etqueta">${item}</li>`;
    });
 
    document.getElementById("etiquetas_elegidas").innerHTML = `<ul class="lista-etiquetas">${etiquetas} </ul>`;
   
    
}
function getSelectValues(select) {
    var seleccionados = [];
    var seleccionadosId = [];
    var options = select && select.options;
    var opt;
  
    for (var i=0, iLen=options.length; i<iLen; i++) {
      opt = options[i];
      if (opt.selected) {
        seleccionados.push(opt.text);
        seleccionadosId.push(opt.value);
      }

    }

    document.getElementById("lista_etiqueta").value = seleccionadosId;
    return seleccionados;
  }