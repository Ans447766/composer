function toggleNav(){
    var togglestatus = document.getElementById("Rnav").getAttribute("data-toggle");
    if(togglestatus == "1"){
        document.getElementById("Rnav").style.width=40+'px';
        document.getElementById("Rnav").setAttribute("data-toggle", "0");
    }else if(togglestatus == "0"){
        document.getElementById("Rnav").style.width=255+'px';
        document.getElementById("Rnav").setAttribute("data-toggle", "1");

    }
}
function myFunction(x) {
    x.classList.toggle("change");
}
