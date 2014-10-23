//THIS FUNCTION DETACHES THE ELEMENTS FROM LIST A AND IT APPENDS IT TO THE LIST B
$(document).ready(function(){


	$(".player").addClass('ListA');
	//funzione per spostare elementi tra una lista e l'altra
	$('.add').click(function () {
		var id = this.id;
		if($("li#p-"+ id + "").hasClass('ListA'))
		{
			$("li#p-"+ id + "").removeClass('ListA').addClass('ListB').find('button').html('').html('-');
			$("li#p-"+ id + "").detach().appendTo('#your-team');
		}
		else
		{
			$("li#p-"+ id + "").removeClass('ListB').addClass('ListA').find('button').html('').html('+');
			$("li#p-"+ id + "").detach().appendTo('ul.list');
			$('#sos').html('<div class="hidden" data-control-type="default-sort" data-control-name="sort" data-control-action="sort" data-path=".nome" data-order="asc" data-type="text"></div>');
		}
			
		$('#teams').change();
		
			
	});



});