<?php
	require "pagina.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
<link rel="stylesheet" href="style.css">
<script src="script.js"></script>
</head>
<?php

	function getURL(){
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		return $url;
	}

	$url = getURL();
	$selPag = strstr($url, "?id=");

	switch ($selPag) {
		case '?id=1':
		case '':
			$text = "Esta es la pagina de inicio. Para acceder totalmente a la pagina inicie sesion.";
			$pagina = new pagina(NULL,NULL,"Inicio",$text);
			$pagina->getPagina();
			break;
		case '?id=2':
			require "seguridad.php";
			$pagina = new pagina(1,4,NULL,NULL);
			$pagina->getPagina();
		break;

		case '?id=3':
			require "seguridad.php";
			$pagina = new pagina(NULL,NULL,NULL,NULL);
			$pagina->getPagina();
		break;

		case '?id=4':
			$text = "Pagina de contacto con el autor. <a href='mailto:cnsaks@gmail.com?Subject=>PaginaWeb'>Click aqui</a> para enviar un correo.";
			$pagina = new pagina(NULL,NULL,"Contacto",$text);
			$pagina->getPagina();
		break;
		
		case '?id=errorperm':
			$text = "<h3 style='color:red;''>No tiene permisos para acceder a esta seccion. Por favor acreditese iniciando sesion.<h2>";
			$pagina = new pagina(NULL,NULL,"Inicio",$text);
			$pagina->getPagina();
		break;

		case '?id=erroruser':
			$text = "<h3 style='color:red;'>El nombre de usuario o la contraseña son incorrectos. Por favor vuelva a intentarlo.<h2>";
			$pagina = new pagina(NULL,NULL,"Inicio",$text);
			$pagina->getPagina();
		break;

		default:
			$text = "Esta es la pagina de inicio.";
			$pagina = new pagina(NULL,NULL,"Inicio",$text);
			$pagina->getPagina();
			break;
	}
	
		
?>
<body>
</body>
</html>