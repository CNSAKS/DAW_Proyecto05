<?php
	require_once "elemento.php";
/**
    *Clase encargada de la construccion de la cabezera de la pagina
*/
class cabecera extends elemento{
	
	/**
		*array para crear el menu. Las lineas comentadas son de las URL en una de las VMs.
	*/
	private $menu=array(
			"Inicio"=>array(
					"txt"=>"Inicio",
					//"url"=>"http://169.254.154.238/Proyecto05/index.php"
					"url"=>"http://192.168.56.101/Proyecto05/index.php?id=1"
									
				),
			"Tabla Lugares"=>array(
					"txt"=>"Tabla Lugares",
					//"url"=>"http://169.254.154.238/Proyecto05/fotos.php"
					"url"=>"http://192.168.56.101/Proyecto05/index.php?id=2"					
				),
			"Lugares"=>array(
					"txt"=>"Lugares",
					//"url"=>"http://169.254.154.238/Proyecto05/lugares.php"
					"url"=>"http://192.168.56.101/Proyecto05/index.php?id=3"					
				),
			"Contacto"=>array(
					"txt"=>"Contacto",
					//"url"=>"http://169.254.154.238/Proyecto05/contacto.php"
					"url"=>"http://192.168.56.101/Proyecto05/index.php?id=4"				
				),
	);
	
	function __construct(){
		$this->setTitulo("");	
	}
	
	/**
		*Cambia la direccion url del elemento seleccionado
		*@var $txt string Elemento seleccionado
		*@var $url stirng Nueva url
	*/
	function setDireccion($txt,$url){
		$this->menu[$txt]["url"]=$url;
	}
	
	/**
		*Crea un menu apartir del array $menu
	*/
	function setMenu(){
		$str="";
		$str=$str."<div id='cssmenu' style='padding-top:5px;padding-bottom:5px;'><ul>";
		foreach ($this->menu as $Indice => $Index){			
			$str=$str."<li><a href='".$Index["url"]."'>".$Index["txt"]."</a></li>";
		}
		if(!isset($_SESSION)){session_start();}
		if(isset($_SESSION['autentificado']) && $_SESSION["autentificado"] == "SI"){
			$str=$str."<div id='identi' style='float:right;padding-top:5px;padding-right:10px;'><a href='exit.php' class='pure-button pure-button-primary'>Salir</a></div></ul></div>";
		}else{
			$str=$str."<div id='identi' style='float:right;padding-top:5px;padding-right:10px;'><form action='auth.php' method='POST' class='pure-form' ><input type='text' name='user' placeholder='Username'><input type='password' placeholder='Password' name='pass'><input type='Submit' class='pure-button pure-button-primary' value='Login'></form></div></ul></div>";
		}

		$this->setContenido($str);
	}
}
?>