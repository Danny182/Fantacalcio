$(document).ready(function() {
	// validate signup form on keyup and submit
	$("#form").validate({
		rules: {
			nome: "required",
			cognome: "required",
			user: {
				required: true,
				minlength: 3,
				remote : 'check_mod_username.php'
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
				minlength: "Il tuo Username deve essere di almeno 2 caratteri",
				remote: "Username gi&agrave utilizzato"
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
});

		




