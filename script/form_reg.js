// JavaScript Document

$(document).ready(function(){
  $("#f-reg").validate({
	  
	  rules: {
		  nome: {
			required: true
		  },
		  
		  cognome: {
			required: true
		  },
		  
		  
		 nascita_giorno: {
			required: true
		  },
		 ascita_mese: {
			required: true
		  },
		 ascita_anno: {
			required: true
		  },
		  
		   citta: {
			required: true
		  },
		  
		  email: {
			required: true,
			email: true
		  },
		  
		  password: {
		 
			required: true
		  },
		  password2:
            {
                required: true,
                equalTo: "#password"
            },
		  user: {
		 
			required: true
		  },
		  
		  risposta: {
		 
			required: true
		  }
	  },
	  messages:{
		  	nome:"inserisci il tuo nome",
			cognome:"inserisci il tuo cognome",
			nascita_giorno:"inserisci il tuo giorno di nascita",
			nascita_mese:"inserisci il tuo mese di nascita",
			nascita_anno:"inserisci il tuo anno di nascita",
			citta:"inserisci la tua città",
			email:"inserisci la tua email",
			password:"inserisci la tua password",
			password2:"le password non coincidono",
			user:"inserisci un username",
			risposta:"inserisci una risposta"
	  },
			
	   success: function(label) {
      label.text('OK!').addClass('valid');
    }
  });
  
  });


	  
	  
	  