  <?php
    	include("../session.php");
    	include("../connect_db.php");
        include("../funzioni/home_function.php");
        include("../funzioni/admin_area_function.php");
    ?>

   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    	<head>
    		<link rel="shortcut icon" href="../favicon.ico" />
    		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<link rel="stylesheet" href="../stili/crea_camp.css" type="text/css" media="screen" />
			<link rel="stylesheet" href="../stili/style-leggir.css" type="text/css" media="screen" />    			
				<title>FaYnt | New Admin</title>
    	</head>
    

   <?php
   $id_oldAdmin = $_GET['oldAd'];
   $id_newAdmin = $_GET['newAd'];
   $camp = $_GET['camp'];
   ?>
   <body>
   		<div id = "cont">
   			<div id = "window1"> 
   				ACCETTI DI DIVENTARE ADMIN DEL CAMPIONATO <i><?php echo $camp; ?></i> ? <br><br>
   				<form action = "ctrl_questadmin.php" method = "POST">
						<input type = "submit" name = "accetta" value = "Accetta" class = "reg quest_admin" />
            <input type = "submit" name = "rifiuta" value = "Rifiuta" class = "reg quest_admin acc" />
            <input type = "hidden" name = "oldAd" value = "<?php echo $id_oldAdmin; ?>" />
            <input type = "hidden" name = "newAd" value = "<?php echo $id_newAdmin; ?>" />
          </form>
			</div>
		</div>			
	
	</body>		
	
	</html>




















   ?>