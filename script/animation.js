$(document).ready(function(){
            $("button[id^='add-'").click(function(){
				// Animate one element to another – bare bones version:
					var id = this.id;
					console.log(id);
				$("li[id='p-"+ id + "'").animate_from_to("#your-team");

				// May also be constructed as:

				// $.animate_from_to("#prod_123", "#cart");
            })
 });
