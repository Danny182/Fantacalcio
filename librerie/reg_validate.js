$(document).ready(function() {
	// validate signup form on keyup and submit
	$("#form").validate({
		rules: {
			nome: "required",
			cognome: "required",
			user: {
				required: true,
				minlength: 2
			},
			password: {
				required: true,
				minlength: 5
			},
			password2: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
			email: {
				required: true,
				email: true
			},
			citta: "required",			
			risposta: "required"			
			
		},
		messages: {
			nome: "Inserire il nome",
			cognome: "Inserire il cognome",
			user: {
				required: "Inserire un User Name",
				minlength: "Il tuo User Name deve essere di almeno 2 caratteri"
			},
			password: {
				required: "Inserire una password",
				minlength: "La tua password deve essere di almeno 5 caratteri"
			},
			password2: {
				required: "Inserire una password",
				minlength: "La tua password deve essere di almeno 5 caratteri",
				equalTo: "La tua password deve essere uguale a quella inserita precedentemente"
			},
			email: "Inserire un indirizzo email",
			citta: "Inserire una citta'",
			risposta: "inserire una risposta"
		
		}
	});


	});/*
$(document).ready(function()
{
	// my method for validate username
	$.validator.addMethod("username_regex", function(value, element) { 
		return this.optional(element) || /^[a-z0-9\.\-_]{3,30}$/i.test(value); 
		}, "Please choise a username with only a-z 0-9.");
		
	$("#form").validate(
	{
        rules:{
		'username':{
			required: true,
			minlength: 3,
			username_regex: true,
			remote:{
				url: "validatorAJAX.php",
				type: "post"
				}
			},
		'email':{
			required: true,
			email: true,
			remote:{
				url: "validatorAJAX.php",
				type: "post"
				}
			},
		'pass1':{
			required: true,
			minlength: 8
			},
		'pass2':{
			equalTo: '#reg_pass1'
			}
		},
        messages:{
		'username':{
			required: "Il campo username è obbligatorio!",
			minlength: "Scegli un username di almeno 4 lettere!",
			username_regex: "Hai utilizzato caratteri non validi. Sono consentiti solo lettere numeri!",
			remote: "L'username è già utilizzato da un altro utente!"
			},
		'email':{
			required: "Il campo email è obbligatorio!",
			email: "Inserisci un valido indirizzo email!",
			remote: "Esiste già una registrazione per questo indirizo email! Esegui la procedura di smarrimento password!"
			},
		'pass1':{
			required: "Il campo password è obbligatorio!",
			minlength: "Inserisci una password di almeno 8 caratteri!"
			},
		'pass2':{
			equalTo: "Le due password non coincidono!"
			}
		}
	});
});	*/