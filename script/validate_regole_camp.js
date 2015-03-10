$(document).ready(function() {
		// validate signup form on keyup and submit
	/*prendo il valore choose da php per capire qualche form è attivo:
	  choose = 1 => general - choose = 2 => rose - choose = 3 => formazioni - choose = 4 => inviti
	*/
	choose = $.cookie("choose");
	if(choose == 3){
		$("#gest").validate({
			rules: {
				por_panc: {
					required: true,
					number:true,
					maxlength: 1
				},
				dif_panc: {
					required: true,
					number:true,
					maxlength: 1
				},
				cen_panc: {
					required: true,
					number:true,
					maxlength: 1
				},
				att_panc: {
					required: true,
					number:true,
					maxlength: 1
				},
				ins_form: {
					required: true,
					number:true
				},
				panchinari: {
					required: true,
					number:true,
					minlength: 0,

				}
			},

			messages: {
				por_panc: {
					required: "Specificare un valore",
					number: "Caraterri alfabetici non ammessi",
					maxlength: "Numero non ammesso"
					
					},
				dif_panc: {
					required: "Specificare un valore",
					number: "Caraterri alfabetici non ammessi",
					maxlength: "Numero non ammesso"
					},
				cen_panc: {
					required: "Specificare un valore",
					number: "Caraterri alfabetici non ammessi",
					maxlength: "Numero non ammesso"
					
					},
				att_panc: {
					required: "Specificare un valore",
					number: "Caraterri alfabetici non ammessi",
					maxlength: "Numero non ammesso"
					
					},
				ins_form: {
					required: "Specificare un valore",
					number: "Caraterri alfabetici non ammessi"
					
					}
			},
		}); //validate
	} //if
}); // document ready



















