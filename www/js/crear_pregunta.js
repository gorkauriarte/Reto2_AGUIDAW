
function mostrarEscogidoDelSelect() {
    var combo = document.getElementById("producto");
    var selected = combo.options[combo.selectedIndex].text;
    alert(selected);
}
