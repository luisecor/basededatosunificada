"uses strict"

document.addEventListener("DOMContentLoaded", function(event) {
   
    document.querySelector("#formRegistro").addEventListener('submit', verificarDatos); 
    let cuit = document.querySelector('#cuit');
    let user_name = document.querySelector('#username');
    if (cuit !== null ) cuit.onchange = function () { cambiar(cuit)};
    user_name.onchange = function () { cambiar(user_name)};
});

document.querySelector("#cancelar").addEventListener('click',volver);

function volver(){
    location.assign(window.location.href.replace('/registrarUsuario','/examples'));
}

function cambiar (cuit){
    cuit.value = cuit.value.replaceAll('-','').replaceAll('_','');
    
}

async function verificarDatos(e){
    e.preventDefault();
    let form = document.querySelector("#formRegistro");
    let formData = new FormData(form);
    let cuit;
    if (formData.get('cuit') !== null){
        cuit = formData.get('cuit').replaceAll('-','');
        if (verifyCuit(cuit.replaceAll('-',''))){
            console.log("ES CUIT");
            
        } else
           form.classList.add('was-validated') ;

    }  
    let user_name = formData.get('user_name').replaceAll('-','').replaceAll('_','');
    let password = formData.get('password');

   
    form.submit(cuit,user_name,password);

    console.log(user_name);
    console.log(cuit);
    console.log(password);

}

const verifyCuit = (cuit) => {
	let acumulado = 0;
	let digitos = cuit.split('');
	let digito = parseInt(digitos.pop());

	for (let i = 0; i < digitos.length; i++) {
		acumulado += digitos[9 - i] * (2 + (i % 6));
	}

	let verif = 11 - (acumulado % 11);
	if (verif === 11) {
		verif = 0;
	} else if (verif === 10) {
		verif = 9;
	}

	return digito === verif;
};



