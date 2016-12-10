<?php 
session_start ();

if ($_SESSION['US_NOMBRE'])
{
	session_destroy ();
	echo '<script language = javascript>
	alert ("Su sesion ha terminado correctamente")
	self.location = "login.php"
	</script>';}
	
	else {
		echo '<script language = javascript>
	alert ("No ha iniciado ninguna sesion, por favor registrese")
	self.location = "login.php"
	</script>';
	}
	
?>