$(document).ready(function() {
	
	
					$('#cont-label-modifica.mod_formazione_automatica input[type=radio]').click(function(){
																   $('#cont-label-modifica.mod_formazione_automatica label').removeClass('active');
																   $(this).next('label').addClass('active');
																	});
					
					$('#cont-label.regole input[type=radio]').click(function(){
                                                                   $('#cont-label.regole label').removeClass('active');
                                                                   $(this).next('label').addClass('active');
                                                                   });

                    $('#cont-label.formazione input[type=radio]').click(function(){
                                                                   $('#cont-label.formazione label').removeClass('active');
                                                                   $(this).next('label').addClass('active');
                                                                   });
					$('#cont-label-modifica.mod_difesa_gazzetta input[type=radio]').click(function(){
                                                                   $('#cont-label-modifica.mod_difesa_gazzetta label').removeClass('active');
                                                                   $(this).next('label').addClass('active');
                                                                   });
					
                        											
                    $('#cont-label-modifica.mod_portiere input[type=radio]').click(function(){
                                                                   $('#cont-label-modifica.mod_portiere label').removeClass('active');
                                                                   $(this).next('label').addClass('active');
                                                                   });                                               
					$('#cont-label-modifica.mod_difesa input[type=radio]').click(function(){
                                                                   $('#cont-label-modifica.mod_difesa label').removeClass('active');
                                                                   $(this).next('label').addClass('active');
                                                                   }); 
					$('#cont-label-modifica.mod_centrocampo input[type=radio]').click(function(){
                                                                   $('#cont-label-modifica.mod_centrocampo label').removeClass('active');
                                                                   $(this).next('label').addClass('active');
                                                                   }); 										
					$('#cont-label-modifica.mod_attacco input[type=radio]').click(function(){
                                                                   $('#cont-label-modifica.mod_attacco label').removeClass('active');
                                                                   $(this).next('label').addClass('active');
                                                                   });
                    $('#cont-label-modifica.mod_modulo input[type=radio]').click(function(){
                                                                   $('#cont-label-modifica.mod_modulo label').removeClass('active');
                                                                   $(this).next('label').addClass('active');
                                                                   });
                                                            
                    $('#cont-label-modifica.mod_formazione_automatica input[type=radio]').click(function(){
                                                                   $('#cont-label-modifica.mod_formazione_automatica label').removeClass('active');
																	});
					$('#info_mod_n_part').click( function(){				
															$('#evento.mod_n_part').toggle();												
															});
					$('#info_mod_penalita').click( function(){				
															$('#evento.penalita').toggle();												
															});
					$('#info_mod_difesa_gazzetta').click( function(){				
															$('#evento.mod_difesa_gazzetta').toggle();												
															});
					$('#info_mod_portiere').click( function(){				
															$('#evento.mod_portiere').toggle();												
															});
					$('#info_mod_difesa').click( function(){				
															$('#evento.mod_difesa').toggle();												
															});
					$('#info_mod_centrocampo').click( function(){				
															$('#evento.mod_centrocampo').toggle();												
															});
					$('#info_mod_attacco').click( function(){				
															$('#evento.mod_attacco').toggle();												
															});
					$('#info_mod_modulo').click( function(){				
															$('#evento.mod_modulo').toggle();												
															});
					$('#info_bonus_portiere').click( function(){				
															$('#evento.bonus_portiere').toggle();												
															});
					$('#info_bonus_casa').click( function(){				
															$('#evento.bonus_casa').toggle();												
															});
					$('#info_bonus_gol_vittoria').click( function(){				
															$('#evento.bonus_gol_vittoria').toggle();												
															});
					$('#info_bonus_gol_pareggio').click( function(){				
															$('#evento.bonus_gol_pareggio').toggle();												
															});
					$('#info_bonus_capitano').click( function(){				
															$('#evento.bonus_capitano').toggle();												
															});
});
