window.addEventListener("load", contarVecesVisitadas);

function contarVecesVisitadas() {
    misCookies = document.cookie;
    listaCookies = misCookies.split(";")

    alert(listaCookies);

    var existe = false;

    for (i in listaCookies) {
        busca = listaCookies[i].search("vecesVisitado");
        if (busca > -1) {
            existe = true;
            break;
        }
    }
  
    alert(existe);
    
    if (existe = false) 
    {
        document.cookie = "vecesVisitado=1";
       
    }
    else
    {
        document.cookie = "vecesVisitado";
        
        alert(numero);
    }


    var visits = GetCookie("vecesVisitado");
    /*

    if (!visits) { visits = 1;

    document.write("By the way, this is your first time here.");

    }

    else {

    visits = parseInt(visits) + 1;

    document.write("I note, you have been here " + visits + " times.");}

    setCookie("counter", visits,expdate);
    */
}
