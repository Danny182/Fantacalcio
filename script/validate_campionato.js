$(document).ready(function() {
	// validate signup form on keyup and submit
	$("#form").validate({
		rules: {
			nome: {
				required: true,
				minlength: 3,
				remote : 'check_campionato.php'
			},
			password: {
				required: true,
				minlength: 3
			},
			n_part: {
				required: true,
				number: true
				}
		},
		messages: {
			nome: {
				required: "Inserire un nome del campionato",
				minlength: "Inserire almeno 3 caratteri",
				remote: "Nome del campionato gi&agrave utilizzato"
				},
			password: {
				required: "Inserire una password",
				minlength: "Inserire almeno 3 caratteri"
			},
			n_part: {
				required: "Inserire numero dei partecipanti",
				number: "Inserire solo valori numerici"
			}
		}
	});
});