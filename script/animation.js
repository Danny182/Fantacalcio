$(document).ready(function(){
            $("button[id^='add-'").click(function(){
				// Animate one element to another – bare bones version:
					var id = this.id;
					console.log(id);
				$("li[id='p-"+ id + "'").animate_from_to("#your-team");

            })
            
            $("button[id^='add-'").click(function () {
				var id = this.id;
				$("li[id='p-"+ id + "'").detach().appendTo('#your-team')
				/*$("li#p-add-6.player").detach().appendTo('#your-team')
				$("<div class='newbox'>I'm new box by appendTo</div>").appendTo("#your-team");*/
			})
 });
