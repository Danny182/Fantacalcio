<?php
	include("session.php");
	include("connect_db.php");
    include("funzioni/home_function.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>home</title>
<link rel="stylesheet" href="stili/style-home.css" type="text/css" media="screen" />
<link rel="stylesheet" href="stili/campo-calcio.css" type="text/css" media="screen" />
<script src="librerie/jquery-1.11.0.min.js"/></script> 
<!--
 <script src="librerie/jquery-1.9.1.min.js"/></script> 
<script src="librerie/jquery-ui-1.10.3.custom.min.js."></script>
<script type="text/javascript" src="librerie/jquery.easing.1.3.js"></script> 
<script type = "text/javascript" src = "librerie/jquery.innerfade.js"> </script>-->


<script type="text/javascript" src="script/menu.js"></script>-->
<link rel="stylesheet" type="text/css" href="stili/menu2.css" />
<script>
$(document).ready(function(){
	$("#button").click(function(event) {
			event.stopPropagation();
			
			$("#dropdown").toggle();
		});
	$(document).click( function() {
			$("#dropdown").hide();
		});

	});
</script>

<?php
    
    $var = $_GET['var']; //variabile per sapere se si viene dalla index o dalla ricerca
	//se var = 0 si viene dalla home se var = 1 si controlla il nome del campionato corrente, che è quello che ha cliccato l'utente
    $id = $_SESSION['id_utente'];
    
    if($var == 1){
    $nome_camp = $_GET['camp'];
        //nel vettore sono presenti i nome dei campionati a cui partecipa l'utente
        $leagues = get_leagues($id);
        
        //numero dei campionati
        $num_camp = count($leagues);
    }
    //altrimenti faccio la query e prendo il primo campionato dell'utente
    else{
        
        //nel vettore sono presenti i nome dei campionati a cui partecipa l'utente
        $leagues = get_leagues($id);
        
        //numero dei campionati
        $num_camp = count($leagues);
        $nome_camp = $leagues[0];
        
        
        
    }
	
    //prendo le notifiche dell'utente
    $num_notifiche = get_notify($id);
    $_SESSION['notifiche'] = $num_notifiche;//le metto in sessione
    
    if($num_camp != 0){//prendo l'id del campionato e creo la classifica corrispondente
       
        $query = "SELECT id_campionato FROM campionato WHERE campionato.nome = '$nome_camp'";
        $ris = mysql_query($query);
        $vet = mysql_fetch_array($ris);
        $id_camp = $vet['id_campionato'];
        
        $array_classifica = create_class($id_camp);
        
        
        
    }
    
    
   //prendo alcuni dati dell'utente(in questo caso nome e cognome)
    $utente = get_userdates($id);
    $user = array();
    $user = " ";
    foreach($utente as $chiave => $value ){
        $user .= ucfirst("$value")." ";
    }
    
?>
<body class="home-page">
<div id = "cont">
	<div id="top">
    	<div id="top-insize">
        	<div id="top-logo">
        		<a href="index.php"><img src="img/4.png" width="100px" height="75px" /></a>
        	</div>
			<?php
			echo'<div id = "nome"><div id="nome-inside">'.$user.'</div><img id="button" src="img/tool3.png" width="22px" height="22px">
			<br><div id="dropdown">
			<ul id="menu_utente">				
				<a class="user_color" href="user/modifica.php">
					<li id="menu_utente">
						modifica utente
					</li>
				</a>
				<a class="user_color" href="user/log-out.php">
					<li id="menu_utente">
						log out
					</li>
				</a>			
			</ul>
		</div>
			</div>';
			if($num_notifiche == 0) echo'<div id = "notifiche"><a href="notifiche.php"> Non hai Notifiche</a> </div>';
			
			else if($num_notifiche == 1) echo'<div id = "notifiche"><a href="notifiche.php"> Hai '.$num_notifiche.' nuova notifica</a> </div>';
			
			else echo'<div id = "notifiche"><a href="notifiche.php"> Hai '.$num_notifiche.' nuove notifiche</a> </div>';
			
			?>
			
        </div>
    </div>   


	<div id = "window"> 

		<div id="menu">
			<div class="menu-principale-container">
				<ul id="menu-principale" class="menu">
					<li id'"item-1" class="style-item-1" >
						<a href="home.php?var=0"><img src="img/site_logo/fantapv_white2.png" height="22px" width="22px" style="padding-right:2px;">Home</a>
					</li>
					<li id'"item-1" class="style-item-2">
						<a href="inserisci_formazione.php">Inserisci la formazione</a>
					</li>
					<li id'"item-1" class="style-item-3">
						<a href="crea_campionato/crea-campionato.php">Crea un Campionato</a>
					</li>
					<li id'"item-1" class="style-item-4">
						<a href="crea_squadra/crea-squadra.php">Crea una nuova Squadra</a>
					</li>

					<li id'"item-1" class="style-item-6">
						<a href="notifiche.php">Notifiche</a>
					</li>
					<li id'"item-1" class="style-item-7">
						<a href="documenti.php">Documenti di lega</a>
					</li>
                    <li id'"item-1" class="style-item-8">
                        <a href="squadre/squadre.php?var=0">Le tue squadre</a>
                    </li>
				</ul>
			</div>
		</div>
		<div id = "ul-notizie">
			<div id="campo">	<!--decorazioni -->
				<div id = "porta1">
				</div>
				<div id="traversa">
				</div>
				<div id="traversa2">
				</div>
				<div id="mezzos">
				</div>
				<div id="mezzod">
				</div>
				<div id="dischettos">
				</div>
				<div id="dischettod">
				</div>
				<div id="areas">
				</div>
				<div id="areas2">
				</div>
				<div id = "linea">
				</div>
				<div id="centroc">
				</div>
				<div id="centro">
				</div>
				<div id = "porta2">
				</div>
				<div id = "ca">
				</div>
				<div id = "ca" class = "right1">
				</div>
				<div id = "ca" class = "left">
				</div>
				<div id = "ca" class = "right2">
				</div>
			</div>
		</div><!-- ul-notizie -->
		<div id = "cont-dati">
        <?php
            
            if($num_camp == 0){
            echo'
            
			<div id = "classifica">
				<div id = "cla-title">
					<a href = "#">Classifica</a>
				</div>
					<div id="cla-left">
					<ul class="class">
                 
					<li class="classifica"> 1° <b style="color:0098BF;"><a class="no-color" href = "#">Real Capp..  </a></b>&nbsp<i style="color:black;">12 &nbspPt.</i></li>
					<li class="classifica"> 2° <b style="color:0098BF;">U.C Aperello  </b>&nbsp<i style="color:black;">10&nbspPt.</i></li>
					<li class="classifica"> 3° <b style="color:0098BF;">Ital Fiasco </b>&nbsp<i style="color:black;">7&nbspPt.</i> </li>
					<li class="classifica"> 5° <b style="color:0098BF;">La Chinaski </b>&nbsp<i style="color:black;">7&nbspPt.</i> </li>
					<li class="classifica"> 4° <b style="color:0098BF;">Il Grido </b>&nbsp<i style="color:black;">7&nbspPt.</i> </li>
					</ul>
				</div><!--cla left -->

				<div id="cla-center">
					<ul class="class">
					<li class="classifica"> 5° <b style="color:0098BF;">La Bambola  </b>&nbsp<i style="color:black;">12 &nbspPt.</i></li>
					<li class="classifica"> 6° <b style="color:0098BF;">U.C Aperello  </b>&nbsp<i style="color:black;">10&nbspPt.</i></li>
					<li class="classifica"> 7° <b style="color:0098BF;">Ital Fiasco </b>&nbsp<i style="color:black;">7&nbspPt.</i> </li>
					<li class="classifica"> 8° <b style="color:0098BF;">La Chinaski </b>&nbsp<i style="color:black;">7&nbspPt.</i> </li>
					<li class="classifica"> 9° <b style="color:0098BF;">Il Grido </b>&nbsp<i style="color:black;">7&nbspPt.</i> </li>
					</ul>
				</div><!--cla center -->

					<div id="cla-right">
					<ul class="class">
					<li class="classifica"> 10° <b style="color:0098BF;">La Bambola  </b>&nbsp<i style="color:black;">12 &nbspPt.</i></li>
					<li class="classifica"> 11° <b style="color:0098BF;">U.C Aperello  </b>&nbsp<i style="color:black;">10&nbspPt.</i></li>

					</ul>
				</div><!--cla right -->
			</div><!--classifica -->

			<div id ="cont-risultati">

				<div id = "cla-title" class="ris">
					<a href = "#">Ultima Giornata</a>
				</div>

				<div id="ris-left">
					<ul class = "class">
					<li class="classifica"><b style="color:0098BF;">La Bambola</b> <i style="color:black;">65.5</i> </i>- <b style="color:0098BF;">U.C Aperello</b> <i style="color:black;">72</i>  </li>
					<li class="classifica"><b style="color:0098BF;">La Chinaski </b><i style="color:black;">80</i>  - <b style="color:0098BF;">Ital Fiasco </b><i style="color:black;">80</i>  </li>
					<li class="classifica"><b style="color:0098BF;">Viking</b> <i style="color:black;">73</i> - <b style="color:0098BF;">Il Grido</b> <i style="color:black;">72</i> </li>
					<li class="classifica"><b style="color:0098BF;">La Bambola</b> <i style="color:black;">65.5</i> - <b style="color:0098BF;">U.C Aperello</b> <i style="color:black;">72</i> </li>
					</ul>
				</div>
				

				<div id="ris-right">
					<ul class = "class">
					<li class="classifica"><b style="color:0098BF;">La Bambola</b> <i style="color:black;">65.5</i> - <b style="color:0098BF;">U.C Aperello</b> <i style="color:black;">72</i> </li>
					<li class="classifica"><b style="color:0098BF;">La Chinaski</b> <i style="color:black;">70</i> - <b style="color:0098BF;">Ital Fiasco</b> <i style="color:black;">80</i>  </li>
					<li class="classifica"><b style="color:0098BF;">Viking</b> <i style="color:black;">73</i> - <b style="color:0098BF;">Il Grido</b> <i style="color:black;">72</i> </li>
					</ul>
				</div>
			
			</div><!--cont risultati -->

			<div id = "prox-gio">
				<div id = "cla-title" class="ris">
					<a href = "#">Prossima Giornata</a>
				</div>

				<div id="gio-left">
					<ul class = "class">
					<li class="classifica"><b style="color:0098BF;">La Bambola</b> - <b style="color:0098BF;">U.C Aperello</b>   </li>
					<li class="classifica"><b style="color:0098BF;">Viking</b> - <b style="color:0098BF;">Il Grido</b>   </li>
					<li class="classifica"><b style="color:0098BF;">Ital Fiasco</b> - <b style="color:0098BF;">Real cappuccini</b>   </li>
					<li class="classifica"><b style="color:0098BF;">La Bambola</b> - <b style="color:0098BF;">Bitonto</b>   </li>
					</ul>
				</div><!--gio left-->
				

				<div id="gio-right">
					<ul class = "class">
					<li class="classifica"><b style="color:0098BF;">La Bambola</b> - <b style="color:0098BF;">Bitonto</b>   </li>
					<li class="classifica"><b style="color:0098BF;">Ital Fiasco</b> - <b style="color:0098BF;">Real cappuccini</b>   </li>
					</ul>
				</div><!--gio right-->
			</div><!--prox gio -->
			';
			}//fine if
            else{
                echo'<div id = "classifica">
				<div id = "cla-title">
                <a href = "#">Classifica</a>
                </div>
                <div id="cla-left">
                <ul class="class">';
                                                   
                                    
                                    
                                    
                $i = 1;
                foreach($array_classifica as $value){
                echo' <li class="classifica"> '.$i.'° <b style="color:0098BF;"><a class="no-color" href = "#">'.$value['nome'].'  </a></b>&nbsp<i style="color:black;"><b>'.$value['punti'].'</b> &nbspPt.</i></li></li>';
                $i++;
                }
                
                echo'</ul></div></div>';
            }
            
            
			?>
		</div><!--cont dati -->
		

				
			<div id = "cont-campionati">
		
                <?php
                    if($num_camp == 0){
                         
                       echo'<div id = "cont-campionati" class = "no-camp">Non Partecipi a nessun Campionato</div>
                       <div id = "cont-campionati" class = "esempio">Ecco come apparirà la tua Home!</div>';
                    }
                    else{
                       
                        echo'<ul class = "camp">';
                        foreach($leagues as $nome){
                            echo '<a href = "home.php?var=1&&camp='.$nome.'"><li class = "camp">'.$nome.'</li></a>';
                        }
                       echo' </ul>';
                            echo'<div id="tool">
									<div id = "live">Live del campionato</div>
									
                                    <div id = "live" >Regole</div>
                                    <div id = "live" >Giocatori</div>
                                    
								</div>';
                           
                        
                        
                    }
               
            ?>
		</div>

	</div><!-- window -->

	


</div><!-- div cont -->



</body>
</html>
