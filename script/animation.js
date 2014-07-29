$(document).ready(function(){
            $("button[id^='add-'").click(function(){
				// Animate one element to another – bare bones version:
					var id = this.id;
					console.log(id);
				$("li[id='p-"+ id + "'").animate_from_to("#your-team");

            })
            
            $("button[id^='add-'").click(function () {
 
				$("<div class='newbox'>I'm new box by appendTo</div>").appendTo("#your-team");
			})
 });
