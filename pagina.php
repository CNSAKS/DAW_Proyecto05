<?php
require_once "cabecera.php";
require_once "cuerpo.php";
require_once "pie.php";
require_once "db.php";

/**
    *Clase encargada de organizar la estructura de la pagina
*/
class pagina{
	/**
		*@var $titulo string titulo de la pagina
		*@var $cabecera class clase cabecera
		*@var $cuerpo class clase cuerpo
		*@var $pie class clase pie
	*/
	public $titulo="Titulo de la pagina";
	private $cabecera,$cuerpo,$pie;
	
	function __construct($numFil,$numCol,$tit,$text){
		$this->cabecera = new cabecera();
		//$this->cabecera->setDireccion("Contacto","http://169.254.154.238/Proyecto03/contacto.php");
		$this->cabecera->setMenu();		
		$this->cuerpo = new cuerpo();
		if(!is_null($numFil) && !is_null($numCol)){
		$db=new db("UserViajes","verify");
		$db->conectar_base_datos();
		$this->cuerpo->setTexto("Tabla", $db->getLugares());
		}else if(!is_null($tit) && !is_null($text)){
		$this->cuerpo->setTexto($tit,$text);
		}else{
		$this->cuerpo->setForm();
		}
		$this->pie = new pie();
		$this->pie->setPie();	
	}
	
	/**
    	*Recupera la pagina mediante las clases creadas anteriormente en el constructor
	*/
	function getPagina(){
		echo $this->cabecera.$this->cuerpo.$this->pie;
	}

}
?>