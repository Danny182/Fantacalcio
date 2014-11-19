
$(document).ready(function(){
	var sortClass=0;
	var nameStatus=0;
	var ruoloStatus=0;
	var teamStatus=0;
	var valueStatus=0;

	$('label#ruolo.all').click(function(){
		
	   	$('label#ruolo.portiere').removeClass('active');
	   	$('label#ruolo.difesa').removeClass('active');
	   	$('label#ruolo.centrocampo').removeClass('active');
	   	$('label#ruolo.attacco').removeClass('active');
	   	$(this).addClass('active');
	});

	$('label#ruolo.portiere').click(function(){
		
	   	$('label#ruolo.all').removeClass('active');
	   	$('label#ruolo.difesa').removeClass('active');
	   	$('label#ruolo.centrocampo').removeClass('active');
	   	$('label#ruolo.attacco').removeClass('active');
	   	$(this).addClass('active');
	});

	$('label#ruolo.difesa').click(function(){
		
	   	$('label#ruolo.portiere').removeClass('active');
	   	$('label#ruolo.all').removeClass('active');
	   	$('label#ruolo.centrocampo').removeClass('active');
	   	$('label#ruolo.attacco').removeClass('active');
	   	$(this).addClass('active');
	});

	$('label#ruolo.centrocampo').click(function(){
		
	   	$('label#ruolo.portiere').removeClass('active');
	   	$('label#ruolo.difesa').removeClass('active');
	   	$('label#ruolo.all').removeClass('active');
	   	$('label#ruolo.attacco').removeClass('active');
	   	$(this).addClass('active');
	});

	$('label#ruolo.attacco').click(function(){
		
	   	$('label#ruolo.portiere').removeClass('active');
	   	$('label#ruolo.difesa').removeClass('active');
	   	$('label#ruolo.centrocampo').removeClass('active');
	   	$('label#ruolo.all').removeClass('active');
	   	$(this).addClass('active');
	});

	var v= [];
	v[1] = 5;
	v[2] = 4;
	v[3] = 4;

	
	sortRuoloDesc();
	sortTeamAsc();

	$(".playerDiv").addClass('ListA');
	//funzione per spostare elementi tra una lista e l'altra
	$(document).on("click", '.add', function () {
		var id = this.id;
		if($("div#p-"+ id + "").hasClass('ListA'))
		{	
			$("div#p-"+ id + "").fadeOut(300 ,function () {
				$("div#p-"+ id + "").removeClass('ListA').addClass('ListB').find('button').html('').html('-');
				
                $(this).clone().appendTo('ul#lista.your').fadeIn(1000);
                
                var $deletes = $('#players')
      				,html
      				,$el;
  
			    var item= (this);			    
			   	html = item;			   
			    $el = $(html);

			    $deletes.jplist({
		     		command: 'del'
		      		,commandData: {
		        	 	$item: $el
		      		}
				});			
            });
            			
		}
		else
		{
			$("div#p-"+ id + "").show(0, function() {
				$(this).detach().appendTo('ul#lista.players').show(0 , function () {
	            	/*var $addl = $('#your-team')      				
		  				,html
		  				,$el;
	      				
	  				var item = (this);
				   	html = item;			   
				    $el = $(html);
				    $addl.jplist({
			     		command: 'add'
			      		,commandData: {
			        		 $item: $el
			      		}
	  				});*/

            	});

			}); 
		    

			$("div#p-"+ id + "").removeClass('ListB').addClass('ListA').find('button').html('').html('+');

			checkStatus();

			/*jplistf();		
			if (sortClass==1) {
				sortNameAsc();
			}
			if (sortClass==2) {
				sortNameDesc();
			}
			if (sortClass==3)
				sortRuoloAsc();
			if (sortClass==4)
				sortRuoloDesc();
			if (sortClass==5) {
				sortTeamAsc();
			}
			if (sortClass==6)
				sortTeamDesc();
			if (sortClass==7)
				sortValueAsc();
			if (sortClass==8)
				sortValueDesc();*/
		}
		
		
			
	});
	
	//salva gli id dei giocatori aggiunti alla lista
	$('button#saveTeam').click( function () {
		var players = $(".playerDiv.ListB").map(function() {
        	return $(this).attr('value');
    	}).get().join(",");
    	document.cookie="players=" + players;
	})


	function jplistf () {
		$('#players').jplist({
	    	
	    	itemsBox: '.list'
		    , itemPath: '.list-item'
		    , panelPath: '.jplist-panel'

  		});
	};

	function updateStatus (lastState) {
		console.log("updateStatus");
		console.log(v[3], v[2], v[1]);
		v[3]=v[2];
		v[2]=v[1];
		v[1]=lastState;

	}

	function checkStatus () {
		console.log("checkStatus");
		console.log(v[3], v[2], v[1]);
		switch(v[3]) {
			case 1:
				sortNameAsc();
				break;
			case 2:
				sortNameDesc();
				break;
			case 3:
				sortRuoloAsc();
				break;
			case 4:
				sortRuoloDesc();
				break;
			case 5:
				sortTeamAsc();
				break;
			case 6:
				sortTeamDesc();
				break;
			case 7:
				sortValueAsc();
				break;
			case 8:
				sortValueDesc();
				break;

		}

		switch(v[2]) {
			case 1:
				sortNameAsc();
				break;
			case 2:
				sortNameDesc();
				break;
			case 3:
				sortRuoloAsc();
				break;
			case 4:
				sortRuoloDesc();
				break;
			case 5:
				sortTeamAsc();
				break;
			case 6:
				sortTeamDesc();
				break;
			case 7:
				sortValueAsc();
				break;
			case 8:
				sortValueDesc();
				break;

		}

		switch(v[1]) {
			case 1:
				sortNameAsc();
				break;
			case 2:
				sortNameDesc();
				break;
			case 3:
				sortRuoloAsc();
				break;
			case 4:
				sortRuoloDesc();
				break;
			case 5:
				sortTeamAsc();
				break;
			case 6:
				sortTeamDesc();
				break;
			case 7:
				sortValueAsc();
				break;
			case 8:
				sortValueDesc();
				break;

		}
	}

	function sortNameAsc () {
		
    	$('#sortingOptions').html('<div class="hidden" data-control-type="default-sort" data-control-name="sort" data-control-action="sort" data-path=".nome" data-order="asc" data-type="text"></div>');
		jplistf();
		console.log('nameAsc');
	};

	function sortNameDesc () {
	    $('#sortingOptions').html('<div class="hidden" data-control-type="default-sort" data-control-name="sort" data-control-action="sort" data-path=".nome" data-order="desc" data-type="text"></div>');
	    jplistf();
	};

	function sortRuoloAsc () {
		$('#sortingOptions').html('<div class="hidden" data-control-type="default-sort" data-control-name="sort" data-control-action="sort" data-path=".ruolo" data-order="asc" data-type="text"></div>');
		jplistf();
		console.log('ruoloAsc');
	};

	function sortRuoloDesc () {
		
		$('#sortingOptions').html('<div class="hidden" data-control-type="default-sort" data-control-name="sort" data-control-action="sort" data-path=".ruolo" data-order="desc" data-type="text"></div>');
	    jplistf();	
	};

	function sortTeamAsc () {
		
		$('#sortingOptions').html('<div class="hidden" data-control-type="default-sort" data-control-name="sort" data-control-action="sort" data-path="#team" data-order="asc" data-type="text"></div>');
		jplistf();

	};
	function sortTeamDesc () {
		
		$('#sortingOptions').html('<div class="hidden" data-control-type="default-sort" data-control-name="sort" data-control-action="sort" data-path="#team" data-order="desc" data-type="text"></div>');
	    jplistf();
	    console.log('teamDesc');
	};
	function sortValueAsc () {
		
		$('#sortingOptions').html('<div class="hidden" data-control-type="default-sort" data-control-name="sort" data-control-action="sort" data-path=".valore" data-order="asc" data-type="text"></div>');
		jplistf();

	};
	function sortValueDesc () {
		
		$('#sortingOptions').html('<div class="hidden" data-control-type="default-sort" data-control-name="sort" data-control-action="sort" data-path=".valore" data-order="desc" data-type="text"></div>');
	    jplistf();

	}
	$('.sortName').click(function  () {
    	if (nameStatus==0) {
    		sortNameAsc();
    		updateStatus(1);
    		nameStatus=1;
    	}
    	else {
    		sortNameDesc();    		
			updateStatus(2);
    		nameStatus=0;
    	}
  	});

  	$('.sortTeam').click(function () {
    	if (teamStatus==0) {
  			sortTeamDesc();
  			updateStatus(6);
  			teamStatus=1;
  		}
    		
	    else {
	    	sortTeamAsc();
	    	updateStatus(5);
	    	teamStatus=0;
	    }
  	});
  	$('.sortRuolo').click(function () {
    	if (ruoloStatus==0) {
  			sortRuoloDesc();
  			updateStatus(4);
  			ruoloStatus=1;
  		}
    		
	    else {
	    	sortRuoloAsc();	    	
			updateStatus(3);
	    	ruoloStatus=0;
	    }
	    jplistf();
  	});
  	$('.sortValue').click(function  () {
  		if (valueStatus==0) {
  			sortValueDesc();
  			updateStatus(8);
  			valueStatus=1;
  		}
    		
	    else {
	    	sortValueAsc();
	    	updateStatus(7);
	    	valueStatus=0;
	    }
  	});
});