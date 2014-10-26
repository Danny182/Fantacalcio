//THIS FUNCTION DETACHES THE ELEMENTS FROM LIST A AND IT APPENDS IT TO THE LIST B
$(document).ready(function(){
	var sortClass=0;
	var nameStatus=0;
	var ruoloStatus=0;
	var teamStatus=0;
	var valueStatus=0;

	$('label#ruolo.all').click(function(){
		console.log('entrato ruolo');
	   	$('label#ruolo.portiere').removeClass('active');
	   	$('label#ruolo.difesa').removeClass('active');
	   	$('label#ruolo.centrocampo').removeClass('active');
	   	$('label#ruolo.attacco').removeClass('active');
	   	$(this).addClass('active');
	});

	$('label#ruolo.portiere').click(function(){
		console.log('entrato ruolo');
	   	$('label#ruolo.all').removeClass('active');
	   	$('label#ruolo.difesa').removeClass('active');
	   	$('label#ruolo.centrocampo').removeClass('active');
	   	$('label#ruolo.attacco').removeClass('active');
	   	$(this).addClass('active');
	});

	$('label#ruolo.difesa').click(function(){
		console.log('entrato ruolo');
	   	$('label#ruolo.portiere').removeClass('active');
	   	$('label#ruolo.all').removeClass('active');
	   	$('label#ruolo.centrocampo').removeClass('active');
	   	$('label#ruolo.attacco').removeClass('active');
	   	$(this).addClass('active');
	});

	$('label#ruolo.centrocampo').click(function(){
		console.log('entrato ruolo');
	   	$('label#ruolo.portiere').removeClass('active');
	   	$('label#ruolo.difesa').removeClass('active');
	   	$('label#ruolo.all').removeClass('active');
	   	$('label#ruolo.attacco').removeClass('active');
	   	$(this).addClass('active');
	});

	$('label#ruolo.attacco').click(function(){
		console.log('entrato ruolo');
	   	$('label#ruolo.portiere').removeClass('active');
	   	$('label#ruolo.difesa').removeClass('active');
	   	$('label#ruolo.centrocampo').removeClass('active');
	   	$('label#ruolo.all').removeClass('active');
	   	$(this).addClass('active');
	});

	$(".player").addClass('ListA');
	//funzione per spostare elementi tra una lista e l'altra
	$('.add').click(function () {
		var id = this.id;
		if($("li#p-"+ id + "").hasClass('ListA'))
		{
			$("li#p-"+ id + "").removeClass('ListA').addClass('ListB').find('button').html('').html('-');
			$("li#p-"+ id + "").detach().appendTo('ul#lista.your');
		}
		else
		{
			$("li#p-"+ id + "").removeClass('ListB').addClass('ListA').find('button').html('').html('+');
			$("li#p-"+ id + "").detach().appendTo('ul#lista.players');
			jplistf();
			/*
			if (sortClass==1)
				sortNameAsc();
			if (sortClass==2)
				sortNameDesc();
			if (sortClass==3)
				sortRuoloAsc();
			if (sortClass==4)
				sortRuoloDesc();
			if (sortClass==5 || sortClass==0)
				sortTeamAsc();
			if (sortClass==6)
				sortTeamDesc();
			if (sortClass==7)
				sortValueAsc();
			if (sortClass==8)
				sortValueDesc();*/
		}
			
		$('ul#lista.players').change();
		
			
	});


	function jplistf () {
		$('#players').jplist({
	    	
	    	itemsBox: 'ul#lista.players'
		    , itemPath: '.list-item'
		    , panelPath: '.jplist-panel'

  		});
	};
		
	jplistf();

	function sortNameAsc () {
		sortClass=1;
    	$('#sortingOptions').html('<div class="hidden" data-control-type="default-sort" data-control-name="sort" data-control-action="sort" data-path=".nome" data-order="asc" data-type="text"></div>');
		jplistf();
	};

	function sortNameDesc () {
		sortClass=2;
	    $('#sortingOptions').html('<div class="hidden" data-control-type="default-sort" data-control-name="sort" data-control-action="sort" data-path=".nome" data-order="desc" data-type="text"></div>');
	    jplistf();
	};

	function sortRuoloAsc () {
		sortClass=3;
		$('#sortingOptions').html('<div class="hidden" data-control-type="default-sort" data-control-name="sort" data-control-action="sort" data-path=".ruolo" data-order="asc" data-type="text"></div>');
		jplistf();
	};

	function sortRuoloDesc () {
		sortClass=4;
		$('#sortingOptions').html('<div class="hidden" data-control-type="default-sort" data-control-name="sort" data-control-action="sort" data-path=".ruolo" data-order="desc" data-type="text"></div>');
	    jplistf();	
	};

	function sortTeamAsc () {
		sortClass=5;
		$('#sortingOptions').html('<div class="hidden" data-control-type="default-sort" data-control-name="sort" data-control-action="sort" data-path="#team" data-order="asc" data-type="text"></div>');
		jplistf();
	};
	function sortTeamDesc () {
		sortClass=6;
		$('#sortingOptions').html('<div class="hidden" data-control-type="default-sort" data-control-name="sort" data-control-action="sort" data-path="#team" data-order="desc" data-type="text"></div>');
	    jplistf();
	};
	function sortValueAsc () {
		sortClass=7;
		$('#sortingOptions').html('<div class="hidden" data-control-type="default-sort" data-control-name="sort" data-control-action="sort" data-path=".valore" data-order="asc" data-type="text"></div>');
		jplistf();

	};
	function sortValueDesc () {
		sortClass=8;
		$('#sortingOptions').html('<div class="hidden" data-control-type="default-sort" data-control-name="sort" data-control-action="sort" data-path=".valore" data-order="desc" data-type="text"></div>');
	    jplistf();

	}
	$('.sortName').click(function  () {
    	if (nameStatus==0) {
    		sortNameAsc();
    		nameStatus=1;
    	}
    	else {
    		sortNameDesc();
    		nameStatus=0;
    	}
  	});

  	$('.sortTeam').click(function () {
    	if (teamStatus==0) {
  			sortTeamDesc();
  			teamStatus=1;
  		}
    		
	    else {
	    	sortTeamAsc();
	    	teamStatus=0;
	    }
  	});
  	$('.sortRuolo').click(function () {
    	if (ruoloStatus==0) {
  			sortRuoloDesc();
  			ruoloStatus=1;
  		}
    		
	    else {
	    	sortRuoloAsc();
	    	ruoloStatus=0;
	    }
	    jplistf();
  	});
  	$('.sortValue').click(function  () {
  		if (valueStatus==0) {
  			sortValueDesc();
  			valueStatus=1;
  		}
    		
	    else {
	    	sortValueAsc();
	    	valueStatus=0;
	    }
  	});
});