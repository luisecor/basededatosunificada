"uses strict"

document.addEventListener("DOMContentLoaded", function(event) {
   
    document.querySelector("#formLogin").addEventListener('submit', verificarDatos); 
    let user_name = document.querySelector('#cuit_username');
    user_name.onchange = function () { cambiar(user_name)}
});




function cambiar (user_name){
    user_name.value = user_name.value.replaceAll('-','');
    
}

async function verificarDatos(e){
    e.preventDefault();
    let form = document.querySelector("#formLogin");
    let formData = new FormData(form);

    let user_name = formData.get('user_name').replaceAll('-','');
    let password = formData.get('password');
    let chkbox = formData.get('sesion_abierta');

    if (verifyCuit(user_name.replaceAll('-',''))){
        console.log("ES CUIT");
        
    } else
        console.log("ES USER");
    form.submit(user_name,password,chkbox? true : false);

    console.log(user_name.replaceAll('-',''));
    console.log(password);
    console.log(chkbox? true : false);
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

