window.addEventListener("load", contarVecesVisitadas);

function contarVecesVisitadas() {
    misCookies = document.cookie;
    listaCookies = misCookies.split(";")
    alert(listaCookies);
    var existe = "false";

    for (i in listaCookies) {
        busca = listaCookies[i].search("vecesVisitado");
        if (busca > -1) {
            existe = "true";
            break;
        }
        
    }
  
    alert(existe);
    
    if (existe = "false") 
    {
        document.cookie = "vecesVisitado=1";
        alert("no");
    }
    else
    {
        numero = listaCookies[i];
        alert("si");
        document.cookie = numero + 1;

    }

    
}
