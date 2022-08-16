"uses strict"

document.addEventListener("DOMContentLoaded", function(event) {

    let checks = document.querySelectorAll(".filtroNombre");

    checks.forEach((k) => {
       k.onchange = function () {habilitar(k.value)};
    })

   
});

function habilitar(nombre){
    let string = 'incluye' + nombre; 
    let selected =  document.querySelector(`#${string}`);
    selected.toggleAttribute("disabled");
    selected.checked = ((selected.checked) ? false : false);
    let label = document.querySelector(`#label${string}`);
    label.innerHTML = "No contiene palabra";

    selected.onchange = function () { 
        (selected.checked) ? 
              label.innerHTML = "Contiene palabra" :
              label.innerHTML = "No contiene palabra";
    }

}
