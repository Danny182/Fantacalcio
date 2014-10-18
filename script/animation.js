//THIS FUNCTION DETACHES THE ELEMENTS FROM LIST A AND IT APPENDS IT TO THE LIST B
$(document).ready(function(){


	$(".player").addClass('ListA');

	$('.add').click(function () {
		var id = this.id;
		console.log("entrato");
		if($("li#p-"+ id + "").hasClass('ListA'))
		{
			$("li#p-"+ id + "").removeClass('ListA').addClass('ListB').find('button').html('').html('-');
			$("li#p-"+ id + "").detach().appendTo('#your-team');
		}
		else
		{
			console.log("else");
			$("li#p-"+ id + "").removeClass('ListB').addClass('ListA').find('button').html('').html('+');
			$("li#p-"+ id + "").detach().appendTo('ul.list');
		}
			
		$('#teams').change();
		
			
	});
});