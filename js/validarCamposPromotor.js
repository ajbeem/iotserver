/*Campos a validar: cmpNombrePromotor, cmpEmailPromotor, cmpIdPromotor, cmpUbicacionPt1_calleNumero, cmpUbicacionPt2_ciudad,
			cmpUbicacionPt3_estado, cmpEstadoPantalonAzulConTirantes, cmpEstadoDechalecoDeEspuma, cmpEstadoSudadera, cmpEstadoGuantesBlancos,
			cmpEstadoCubreZapatos, cmpEstadoCabezaDeOso, cmpEstadoDeLentesMetalicos, cmpArosDePlastico, cmpCuponeras, cmpEntregaVasos2oz,
            cmpGlobosIcee, cmpLitrosJarabeEntregados, cmpLitrosJarabeEntregadosAlCliente, cmpCantidadVasosEntregados, cmpComentariosBotarguero,*/

            function comprobarCamposPromotor(){
                let nombrePromotor = $('#cmpNombrePromotor').value, mailPromotor = $('#cmpEmailPromotor').value, idPromotor = $('#cmpIdPromotor').value, 
                    calleYnumero = $('#cmpUbicacionPt1_calleNumero').value, ciudad = $('#cmpUbicacionPt2_ciudad').value, 
                    estado = $('#cmpUbicacionPt3_estado').value, pantalonAzul = $('#cmpEstadoPantalonAzulConTirantes'), chalecoEspuma = $('#cmpEstadoDechalecoDeEspuma'), 
                    estadoSudadera = $('#cmpEstadoSudadera').value, guantesBlancos = $('#cmpEstadoGuantesBlancos').value, cubrezapatos = $('#cmpEstadoCubreZapatos').value, 
                    cabezaOso = $('#cmpEstadoCabezaDeOso').value, lentesMetalicos = $('#cmpEstadoDeLentesMetalicos'), arosPlastico = $('#cmpArosDePlastico').value, 
                    cuponeras = $('#cmpCuponeras').value, vasos2oz = $('#cmpEntregaVasos2oz').value, globosIcee = $('#cmpGlobosIcee').value, litrosJarabe = $('#cmpLitrosJarabeEntregados'), 
                    jarabeEntregado = $('#cmpLitrosJarabeEntregadosAlCliente').value, vasosEntregados = $('#cmpCantidadVasosEntregados').value, comentariosBotarguero = $('#cmpComentariosBotarguero').value
                  
                if (
                    nombrePromotor ==="" || mailPromotor ==="" || idPromotor === "" || calleYnumero ==="" || ciudad ==="" || estado ===""
                    || pantalonAzul ==="" || chalecoEspuma==="" || estadoSudadera ==="" || guantesBlancos ==="" || cubrezapatos ==="" 
                    || cabezaOso ==="" || lentesMetalicos ==="" || arosPlastico ==="" || cuponeras==="" || vasos2oz ==="" || globosIcee ===""
                    || litrosJarabe ==="" || jarabeEntregado ==="" || vasosEntregados ==="" || comentariosBotarguero ===""
                    ){
                        toastr.error("Por favor llena todos los campos"); 
                        return false;
                    }else{
                        toastr.success("Datos completos gracias");
                    }
            }
            
/**
 * Javascript para validacion de Datos antes de ser enviados a la BDD


function validarFormRegistro() {
	var idUser, pswd, edad, nombre, apPaterno, email, expresion;
	/*
	 * Recuperamos en variables locales los valores que serán enviados, este
	 * codigo está en intermedio entre el formulario y la aplicación en la base
	 * de datos

	idUser = document.getElementById("userID").value;
	pswd = document.getElementById("userPswd").value;
	edad = document.getElementById("userAge").value;
	nombre = document.getElementById("userName").value;
	apPaterno = document.getElementById("userapP").value;
	email = document.getElementById("userMail").value;
	/*
	 * para crear la expresion regular se va a evaluar que debe integrar
	 * texto(\w)+arroba(@)texto(\w)+punto(\.)+ texto([a-z])
	
	expresion = /\w+@\w+\.+[a-z]/;
	/*
	 * En el siguiente condicional se valida que todos los campos tengan valores
	 * a enviar en caso contrario no se permite el envío de ninguno, se retorna
	 * false.
	
	if (idUser === "" || pswd === "" || edad === "" || nombre === ""
			|| apPaterno == "" || email === "") {
		alert("TODOS los Campos son Obligatorios");
		return false;

		/*
		 * En los condicionales siguientes se establecen las reglas para cada
		 * campo en el caso de contraseña debe ser mayor a 6 caracteres,
		
	} else if (idUser.length < 4) {
		alert("Nombre de usuario demasiado corto!!");
		return false;
	} else if (idUser.length > 16) {
		alert("Nombre de Usuario demasiado Largo");
		return false;
	} else if (pswd.length < 6) {
		alert("Contraseña de usuario demasiada corta!!");
		return false;
	} else if (pswd.length > 16) {
		alert("Contraseña de usuario  demasiado Largo!!");
		return false;
	} else if (nombre.length > 50) {
		alert("Nombre del Usuario demasiado Largo");
		return false;
	} else if (apPaterno.length > 70) {
		alert("Apellido Paterno demasiado largo solo se admite hasta 70 caracteres");
		return false;
	}
	// En el caso de edad solo numeros.
	else if (isNaN(edad)) {
		alert("Edad debe ser numerico");
		return false;
	}
	/*
	 * para Email se usará Expresiones Regulares este campo debe integrar texto
	 * arroba texto punto texto
	
	else if (!expresion.test(email)) {
		alert("El correo no posee el formato correcto!!");
		return false;
	}

}

function validarFormPost() {
	var idUser, pswd, textoComentario;
	 
	idUser = document.getElementById("userID").value;
	pswd = document.getElementById("userPswd").value;
    textoComentario = document.getElementById("cuerpoComent").value;


	if (idUser === "" || pswd === "" || textoComentario==="") {
		alert("TODOS los Campos son Obligatorios");
		return false;

	} else {
        alert('Campos completos...Enviando!');
    				
    }

}*/