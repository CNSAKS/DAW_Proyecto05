<?php
	//iniciamos sesion
	session_start();
	//liberamos las variables de sesion
	session_unset();
	//destruimos toda la información asociada con la sesión actual
	session_destroy();
	//regresamos a index.php
	header ("Location:index.php");
?>
