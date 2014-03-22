<?php
	include("../session.php");
	include("../connect_db.php");
    include("../funzioni/home_function.php");
    $id = $_SESSION['id_utente'];
    $num_notifiche = $_SESSION['notifiche'];
    
    //prendo i dati dell'username
    $query = "SELECT * FROM utente WHERE id_utente = '$id'";
    $ris = mysql_query($query);
    $vet = mysql_fetch_array($ris);
    foreach($vet as $key => $value)
		$$key=$value;
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../img/favicon.ico" />
<link rel="stylesheet" href="../stili/style-reg.css" type="text/css" media="screen" />
	<!-- jquery validazioni //--> 
<script type="text/javascript" src="../librerie/jquery.validate.js"></script> 
<script type="text/javascript" src="../librerie/reg_validate.js"></script>
<link rel="stylesheet" href="../stili/form.css" type="text/css" media="screen" />


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modifica i tuoi dati</title>

</head>

<body>
<div id = "cont">
	<div id="top">
    	
        <div id="top-insize">
        	<div id="top-logo">
				<a href="..\index.php"><img src="..\img/4.png" width="100px" height="75px" /></a>
			</div>
        	
        </div>
    </div>
		
	<div id="top-border"></div>
    
  <div id = "windows"><!--fine news-->
        <div id="wind1">
     	<font size="+1.5">Modifica i tuoi dati</font><br />
    	 
   		 </div>

        <div id = "sotto-wind">
        <form action = "leggir.php" method = "post" id = "form">
		
        <div id = "cont-label" class = "nome">
        <label for="nome">Nome:</label>
		<?php
		echo '<input type = "text" name = "nome" id = "nome" size = "14" value="'.$nome.'" />';
		?>
          
        </div><!--fine cont-label -->
        
        <div id = "cont-label" class = "cognome">
        <label for="cognome">Cognome:</label>
        <?php
		echo '<input type = "text" name = "cognome" id = "cognome" size = "14" value="'.$cognome.'" />';
		?>
          
        </div><!--fine cont-label -->
        <?php
			$nascita = explode ("-", $data_nascita);
        ?>
        <div id = "cont-label" class = "data">
          Data Di Nascita:<br />
  <select name="nascita_giorno">
        <option value="1" <?php if ($nascita[2]=='1') echo 'selected="selected"'; ?>>1</option>
        <option value="2" <?php if ($nascita[2]=="2") echo 'selected="selected"'; ?> >2</option>
        <option value="3" <?php if ($nascita[2]=='3') echo 'selected="selected"'; ?> >3 </option>
        <option value="4" <?php if ($nascita[2]=="4") echo 'selected="selected"'; ?>>4</option>
        <option value="5" <?php if ($nascita[2]=="5") echo 'selected="selected"'; ?>>5</option>
        <option value="6" <?php if ($nascita[2]=="6") echo 'selected="selected"'; ?>>6</option>
        <option value="7" <?php if ($nascita[2]=="7") echo 'selected="selected"'; ?>>7</option>
        <option value="8" <?php if ($nascita[2]=="8") echo 'selected="selected"'; ?>>8</option>
        <option value="9" <?php if ($nascita[2]=="9") echo 'selected="selected"'; ?>>9</option>
        <option value="10" <?php if ($nascita[2]=="10") echo 'selected="selected"'; ?>>10</option>
        <option value="11" <?php if ($nascita[2]=="11") echo 'selected="selected"'; ?>>11</option>
        <option value="12" <?php if ($nascita[2]=="12") echo 'selected="selected"'; ?>>12</option>
        <option value="13" <?php if ($nascita[2]=="13") echo 'selected="selected"'; ?>>13</option>
        <option value="14" <?php if ($nascita[2]=="14") echo 'selected="selected"'; ?>>14</option>
        <option value="15" <?php if ($nascita[2]=="15") echo 'selected="selected"'; ?>>15</option>
        <option value="16" <?php if ($nascita[2]=="16") echo 'selected="selected"'; ?>>16</option>
        <option value="17" <?php if ($nascita[2]=="17") echo 'selected="selected"'; ?>>17</option>
        <option value="18" <?php if ($nascita[2]=="18") echo 'selected="selected"'; ?>>18</option>
        <option value="19" <?php if ($nascita[2]=="19") echo 'selected="selected"'; ?>>19</option>
        <option value="20" <?php if ($nascita[2]=="20") echo 'selected="selected"'; ?>>20</option>
        <option value="21" <?php if ($nascita[2]=="21") echo 'selected="selected"'; ?>>21</option>
        <option value="22" <?php if ($nascita[2]=="22") echo 'selected="selected"'; ?>>22</option>
        <option value="23" <?php if ($nascita[2]=="23") echo 'selected="selected"'; ?>>23</option>
        <option value="24" <?php if ($nascita[2]=="24") echo 'selected="selected"'; ?>>24</option>
        <option value="25" <?php if ($nascita[2]=="25") echo 'selected="selected"'; ?>>25</option>
        <option value="26" <?php if ($nascita[2]=="26") echo 'selected="selected"'; ?>>26</option>
        <option value="27" <?php if ($nascita[2]=="27") echo 'selected="selected"'; ?>>27</option>
        <option value="28" <?php if ($nascita[2]=="28") echo 'selected="selected"'; ?>>28</option>
        <option value="29" <?php if ($nascita[2]=="29") echo 'selected="selected"'; ?>>29</option>
        <option value="30" <?php if ($nascita[2]=="30") echo 'selected="selected"'; ?>>30</option>
        <option value="31" <?php if ($nascita[2]=="31") echo 'selected="selected"'; ?>>31</option>
    </select> 
	    <select name="nascita_mese">
        <option value="1" <?php if ($nascita[1]=="1") echo 'selected="selected"'; ?>>1</option>
        <option value="2" <?php if ($nascita[1]=="2") echo 'selected="selected"'; ?>>2</option>
        <option value="3" <?php if ($nascita[1]=="3") echo 'selected="selected"'; ?>>3</option>
        <option value="4" <?php if ($nascita[1]=="4") echo 'selected="selected"'; ?>>4</option>
        <option value="5" <?php if ($nascita[1]=="5") echo 'selected="selected"'; ?>>5</option>
        <option value="6" <?php if ($nascita[1]=="6") echo 'selected="selected"'; ?>>6</option>
        <option value="7" <?php if ($nascita[1]=="7") echo 'selected="selected"'; ?>>7</option>
        <option value="8" <?php if ($nascita[1]=="8") echo 'selected="selected"'; ?>>8</option>
        <option value="9" <?php if ($nascita[1]=="9") echo 'selected="selected"'; ?>>9</option>
        <option value="10" <?php if ($nascita[1]=="10") echo 'selected="selected"'; ?>>10</option>
        <option value="11" <?php if ($nascita[1]=="11") echo 'selected="selected"'; ?>>11</option>
        <option value="12" <?php if ($nascita[1]=="12") echo 'selected="selected"'; ?>>12</option>
    </select> 
<select name="nascita_anno">
    <option value="2013" <?php if ($nascita[0]=="2014") echo 'selected="selected"'; ?>>2014</option>
    <option value="2013" <?php if ($nascita[0]=="2013") echo 'selected="selected"'; ?>>2013</option>
	<option value="2012" <?php if ($nascita[0]=="2012") echo 'selected="selected"'; ?>>2012</option>
    <option value="2011"<?php if ($nascita[0]=="2011") echo 'selected=	selected"'; ?>>2011</option>			
    <option value="2010"<?php if ($nascita[0]=="2010") echo 'selected="selected	"'; ?>>2010</option>			
    <option value="2009"<?php if ($nascita[0]=="2009") echo 'selected="selected	"'; ?>>2009</option>			
    <option value="2008"<?php if ($nascita[0]=="2008") echo 'selected="selected	"'; ?>>2008</option>			
    <option value="2007"<?php if ($nascita[0]=="2007") echo 'selected="selected	"'; ?>>2007</option>			
    <option value="2006"<?php if ($nascita[0]=="2006") echo 'selected="selected	"'; ?>>2006</option>			
    <option value="2005"<?php if ($nascita[0]=="2005") echo 'selected="selected	"'; ?>>2005</option>			
    <option value="2004"<?php if ($nascita[0]=="2004") echo 'selected="selected	"'; ?>>2004</option>			
    <option value="2003"<?php if ($nascita[0]=="2003") echo 'selected="selected	"'; ?>>2003</option>			
    <option value="2002"<?php if ($nascita[0]=="2002") echo 'selected="selected	"'; ?>>2002</option>			
    <option value="2001"<?php if ($nascita[0]=="2001") echo 'selected="selected	"'; ?>>2001</option>			
    <option value="2000"<?php if ($nascita[0]=="2000") echo 'selected="selected	"'; ?>>2000</option>			
    <option value="1999"<?php if ($nascita[0]=="1999") echo 'selected="selected	"'; ?>>1999</option>			
    <option value="1998"<?php if ($nascita[0]=="1998") echo 'selected="selected	"'; ?>>1998</option>			
    <option value="1997"<?php if ($nascita[0]=="1997") echo 'selected="selected	"'; ?>>1997</option>			
    <option value="1996"<?php if ($nascita[0]=="1996") echo 'selected="selected	"'; ?>>1996</option>			
    <option value="1995"<?php if ($nascita[0]=="1995") echo 'selected="selected	"'; ?>>1995</option>			
    <option value="1994"<?php if ($nascita[0]=="1994") echo 'selected="selected	"'; ?>>1994</option>			
    <option value="1993"<?php if ($nascita[0]=="1993") echo 'selected="selected	"'; ?>>1993</option>			
    <option value="1992"<?php if ($nascita[0]=="1992") echo 'selected="selected	"'; ?>>1992</option>			
    <option value="1991"<?php if ($nascita[0]=="1991") echo 'selected="selected	"'; ?>>1991</option>			
    <option value="1990"<?php if ($nascita[0]=="1990") echo 'selected="selected	"'; ?>>1990</option>			
    <option value="1989"<?php if ($nascita[0]=="1989") echo 'selected="selected	"'; ?>>1989</option>			
    <option value="1988"<?php if ($nascita[0]=="1988") echo 'selected="selected	"'; ?>>1988</option>			
    <option value="1987"<?php if ($nascita[0]=="1987") echo 'selected="selected	"'; ?>>1987</option>			
    <option value="1986"<?php if ($nascita[0]=="1986") echo 'selected="selected	"'; ?>>1986</option>			
    <option value="1985"<?php if ($nascita[0]=="1985") echo 'selected="selected	"'; ?>>1985</option>			
    <option value="1984"<?php if ($nascita[0]=="1984") echo 'selected="selected	"'; ?>>1984</option>			
    <option value="1983"<?php if ($nascita[0]=="1983") echo 'selected="selected	"'; ?>>1983</option>			
    <option value="1982"<?php if ($nascita[0]=="1982") echo 'selected="selected	"'; ?>>1982</option>			
    <option value="1981"<?php if ($nascita[0]=="1981") echo 'selected="selected	"'; ?>>1981</option>			
    <option value="1980"<?php if ($nascita[0]=="1980") echo 'selected="selected	"'; ?>>1980</option>			
    <option value="1979"<?php if ($nascita[0]=="1979") echo 'selected="selected	"'; ?>>1979</option>			
    <option value="1978"<?php if ($nascita[0]=="1978") echo 'selected="selected	"'; ?>>1978</option>			
    <option value="1977"<?php if ($nascita[0]=="1977") echo 'selected="selected	"'; ?>>1977</option>			
    <option value="1976"<?php if ($nascita[0]=="1976") echo 'selected="selected	"'; ?>>1976</option>			
    <option value="1975"<?php if ($nascita[0]=="1975") echo 'selected="selected	"'; ?>>1975</option>			
    <option value="1974"<?php if ($nascita[0]=="1974") echo 'selected="selected	"'; ?>>1974</option>			
    <option value="1973"<?php if ($nascita[0]=="1973") echo 'selected="selected	"'; ?>>1973</option>			
    <option value="1972"<?php if ($nascita[0]=="1972") echo 'selected="selected	"'; ?>>1972</option>			
    <option value="1971"<?php if ($nascita[0]=="1971") echo 'selected="selected	"'; ?>>1971</option>			
    <option value="1970"<?php if ($nascita[0]=="1970") echo 'selected="selected	"'; ?>>1970</option>			
    <option value="1969"<?php if ($nascita[0]=="1969") echo 'selected="selected	"'; ?>>1969</option>			
    <option value="1968"<?php if ($nascita[0]=="1968") echo 'selected="selected	"'; ?>>1968</option>			
    <option value="1967"<?php if ($nascita[0]=="1967") echo 'selected="selected	"'; ?>>1967</option>			
    <option value="1966"<?php if ($nascita[0]=="1966") echo 'selected="selected	"'; ?>>1966</option>			
    <option value="1965"<?php if ($nascita[0]=="1965") echo 'selected="selected	"'; ?>>1965</option>			
    <option value="1964"<?php if ($nascita[0]=="1964") echo 'selected="selected	"'; ?>>1964</option>			
    <option value="1963"<?php if ($nascita[0]=="1963") echo 'selected="selected	"'; ?>>1963</option>			
    <option value="1962"<?php if ($nascita[0]=="1962") echo 'selected="selected	"'; ?>>1962</option>			
    <option value="1961"<?php if ($nascita[0]=="1961") echo 'selected="selected	"'; ?>>1961</option>			
    <option value="1960"<?php if ($nascita[0]=="1960") echo 'selected="selected	"'; ?>>1960</option>			
    <option value="1959"<?php if ($nascita[0]=="1959") echo 'selected="selected	"'; ?>>1959</option>			
    <option value="1958"<?php if ($nascita[0]=="1958") echo 'selected="selected	"'; ?>>1958</option>			
    <option value="1957"<?php if ($nascita[0]=="1957") echo 'selected="selected	"'; ?>>1957</option>			
    <option value="1956"<?php if ($nascita[0]=="1956") echo 'selected="selected	"'; ?>>1956</option>			
    <option value="1955"<?php if ($nascita[0]=="1955") echo 'selected="selected	"'; ?>>1955</option>			
    <option value="1954"<?php if ($nascita[0]=="1954") echo 'selected="selected	"'; ?>>1954</option>			
    <option value="1953"<?php if ($nascita[0]=="1953") echo 'selected="selected	"'; ?>>1953</option>			
    <option value="1952"<?php if ($nascita[0]=="1952") echo 'selected="selected	"'; ?>>1952</option>			
    <option value="1951"<?php if ($nascita[0]=="1951") echo 'selected="selected	"'; ?>>1951</option>			
    <option value="1950"<?php if ($nascita[0]=="1950") echo 'selected="selected	"'; ?>>1950</option>			
    <option value="1949"<?php if ($nascita[0]=="1949") echo 'selected="selected	"'; ?>>1949</option>			
    <option value="1948"<?php if ($nascita[0]=="1948") echo 'selected="selected	"'; ?>>1948</option>			
    <option value="1947"<?php if ($nascita[0]=="1947") echo 'selected="selected	"'; ?>>1947</option>			
    <option value="1946"<?php if ($nascita[0]=="1946") echo 'selected="selected	"'; ?>>1946</option>			
    <option value="1945"<?php if ($nascita[0]=="1945") echo 'selected="selected	"'; ?>>1945</option>			
    <option value="1944"<?php if ($nascita[0]=="1944") echo 'selected="selected	"'; ?>>1944</option>			
    <option value="1943"<?php if ($nascita[0]=="1943") echo 'selected="selected	"'; ?>>1943</option>			
    <option value="1942"<?php if ($nascita[0]=="1942") echo 'selected="selected	"'; ?>>1942</option>			
    <option value="1941"<?php if ($nascita[0]=="1941") echo 'selected="selected	"'; ?>>1941</option>			
    <option value="1940"<?php if ($nascita[0]=="1940") echo 'selected="selected	"'; ?>>1940</option>			
    <option value="1939"<?php if ($nascita[0]=="1939") echo 'selected="selected	"'; ?>>1939</option>			
    <option value="1938"<?php if ($nascita[0]=="1938") echo 'selected="selected	"'; ?>>1938</option>			
    <option value="1937"<?php if ($nascita[0]=="1937") echo 'selected="selected	"'; ?>>1937</option>			
    <option value="1936"<?php if ($nascita[0]=="1936") echo 'selected="selected	"'; ?>>1936</option>			
    <option value="1935"<?php if ($nascita[0]=="1935") echo 'selected="selected	"'; ?>>1935</option>			
    <option value="1934"<?php if ($nascita[0]=="1934") echo 'selected="selected	"'; ?>>1934</option>			
    <option value="1933"<?php if ($nascita[0]=="1933") echo 'selected="selected	"'; ?>>1933</option>			
    <option value="1932"<?php if ($nascita[0]=="1932") echo 'selected="selected	"'; ?>>1932</option>			
    <option value="1931"<?php if ($nascita[0]=="1931") echo 'selected="selected	"'; ?>>1931</option>			
    <option value="1930"<?php if ($nascita[0]=="1930") echo 'selected="selected	"'; ?>>1930</option>			
    <option value="1929"<?php if ($nascita[0]=="1929") echo 'selected="selected	"'; ?>>1929</option>			
    <option value="1928"<?php if ($nascita[0]=="1928") echo 'selected="selected	"'; ?>>1928</option>			
    <option value="1927"<?php if ($nascita[0]=="1927") echo 'selected="selected	"'; ?>>1927</option>			
    <option value="1926"<?php if ($nascita[0]=="1926") echo 'selected="selected	"'; ?>>1926</option>			
    <option value="1925"<?php if ($nascita[0]=="1925") echo 'selected="selected	"'; ?>>1925</option>			
    <option value="1924"<?php if ($nascita[0]=="1924") echo 'selected="selected	"'; ?>>1924</option>			
    <option value="1923"<?php if ($nascita[0]=="1923") echo 'selected="selected	"'; ?>>1923</option>			
    <option value="1922"<?php if ($nascita[0]=="1922") echo 'selected="selected	"'; ?>>1922</option>			
    <option value="1921"<?php if ($nascita[0]=="1921") echo 'selected="selected	"'; ?>>1921</option>			
    <option value="1920"<?php if ($nascita[0]=="1920") echo 'selected="selected	"'; ?>>1920</option>			
    <option value="1919"<?php if ($nascita[0]=="1919") echo 'selected="selected	"'; ?>>1919</option>			
    <option value="1918"<?php if ($nascita[0]=="1918") echo 'selected="selected	"'; ?>>1918</option>			
    <option value="1917"<?php if ($nascita[0]=="1917") echo 'selected="selected	"'; ?>>1917</option>			
    <option value="1916"<?php if ($nascita[0]=="1916") echo 'selected="selected	"'; ?>>1916</option>			
    <option value="1915"<?php if ($nascita[0]=="1915") echo 'selected="selected	"'; ?>>1915</option>			
    <option value="1914"<?php if ($nascita[0]=="1914") echo 'selected="selected	"'; ?>>1914</option>			
    <option value="1913"<?php if ($nascita[0]=="1913") echo 'selected="selected	"'; ?>>1913</option>			
    <option value="1912"<?php if ($nascita[0]=="1912") echo 'selected="selected	"'; ?>>1912</option>			
    <option value="1911"<?php if ($nascita[0]=="1911") echo 'selected="selected	"'; ?>>1911</option>			
    <option value="1910"<?php if ($nascita[0]=="1910") echo 'selected="selected	"'; ?>>1910</option>			
    <option value="1909"<?php if ($nascita[0]=="1909") echo 'selected="selected	"'; ?>>1909</option>			
    <option value="1908"<?php if ($nascita[0]=="1908") echo 'selected="selected	"'; ?>>1908</option>			
    <option value="1907"<?php if ($nascita[0]=="1907") echo 'selected="selected	"'; ?>>1907</option>			
    <option value="1906"<?php if ($nascita[0]=="1906") echo 'selected="selected	"'; ?>>1906</option>			
    <option value="1905"<?php if ($nascita[0]=="1905") echo 'selected="selected	"'; ?>>1905</option>			
    <option value="1904"<?php if ($nascita[0]=="1904") echo 'selected="selected	"'; ?>>1904</option>			
    <option value="1903"<?php if ($nascita[0]=="1903") echo 'selected="selected	"'; ?>>1903</option>			
    <option value="1902"<?php if ($nascita[0]=="1902") echo 'selected="selected	"'; ?>>1902</option>			
    <option value="1901"<?php if ($nascita[0]=="1901") echo 'selected="selected	"'; ?>>1901</option>			
    <option value="1900"<?php if ($nascita[0]=="1900") echo 'selected="selected	"'; ?>>1900</option>
</select> 
           
       
        </div><!--fine cont-label -->
        
        <div id = "cont-label" class = "citta">
        <label for="citta">Città:</label>
		<input type = "text" name = "citta" id = "citta" size = "16" />
          
        </div><!--fine cont-label -->
        
        <div id = "cont-label" class = "email">
        <label for="email"> E-Mail:</label>
		<input type = "text" name = "email" id = "email" size = "18" />
          
        </div><!--fine cont-label -->
        
        <div id = "cont-label" class = "user">
        <label for="user">User Name:</label>
		<input type = "text" name = "user" id = "user" size = "14" />
          
        </div><!--fine cont-label -->
        
        <div id = "cont-label" class = "password">
        <label for="password">Password:</label>
		<input type = "password" name = "password" id = "password" size = "16" />
		</div><!--fine cont-label -->
		<div id = "cont-label" class = "password2">
        <label for="password2">Reinserisci password:</label>
		<input type = "password" name = "password2" id = "password2" size = "16" />
          
        </div><!--fine cont-label -->
        <div id = "cont-label" class = "domanda">
          Domanda Segreta:<br />
            <select align="center" name="domanda" style="width:75%">
              <option value="Il tuo colore preferito">Il tuo colore preferito</option>
              <option value="Il tuo piatto preferito">Il tuo piatto preferito</option>
              <option value="Il nome del tuo milgiore amico">Il nome del tuo milgiore amico</option>
              <option value="La tua squadra di calcio peferita">La tua squadra di calcio peferita</option>
            </select>
          
        </div><!--fine cont-label -->

        
        <div id = "cont-label" class = "risposta">
        <label for="risposta">Risposta:</label>
		<input type = "text" name = "risposta" id = "risposta" size = "20" />
          
        </div><!--fine cont-label -->
        
        
        <input type = "submit" value = "Modifica!" class = "reg" />

    </form>
        
       
  </div>
  </div>
        
</div><!--fine windows-->
</div><!-- fine con-->

</body>
</html>

