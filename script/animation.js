$(document).ready(function(){
            $("#add").click(function(){
				// Animate one element to another – bare bones version:
					console.log("entrato");
				$("#a").animate_from_to("#your-team");

				// May also be constructed as:

				// $.animate_from_to("#prod_123", "#cart");
            })
 });
