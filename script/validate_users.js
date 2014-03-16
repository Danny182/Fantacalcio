$(document).ready(function() {
	$("#invita").validate({
	});
	$('input[name^="utente"]').each(function() {  // target all fields starting with "utente"
        $(this).rules('add', {  // declare the rules on each targeted field
            required: true,
            remote : 'check_inviti.php',
            messages : {
                required:  "inserire email o nome utente",
                remote: "inserire un username esistente o la sua email"
            }
        });
    });

});

