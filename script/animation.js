$(document).ready(function(){
			
			/*$('.add').click(function(){
					var id = this.id;
					console.log(id);
				$("li#p-"+ id + "").animate_from_to("#your-team"); //esegue l'animazione del trasferimento di lista

            })*/

            
            $('.add').click(function () {
				var id = this.id;
				$("li#p-"+ id + "").detach().appendTo('#your-team'); //stacca l'elemento dalla lista e lo appende all'altra lista (your-team)
				
			})
 });
