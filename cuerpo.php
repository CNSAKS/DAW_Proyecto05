<?php
	require_once "elemento.php";

/**
    *Clase encargada de la construccion del cuerpo de la pagina
*/
class cuerpo extends elemento{
	function __construct(){
		
	}
	/**
		*Crea una tabla con fotos segun la especificacion de filas y columnas
		*@var $filas integer Numero de filas
		*@var $columnas integer Numero de columnas
	*/
	function setTabla($filas,$columnas){
		$this->setTitulo("Fotos");	
		$str="";
		$contador=1;
		$str="<table>";
		for($i=0;$i<$filas;$i++){
			$str=$str."<tr>";
			for($j=0;$j<$columnas;$j++){
				$photo="photo_".$contador++.".png";
				$str=$str."<td><img src='".$photo."' width='150' height='150'></td>";
			}
			$str=$str."</tr>";
		}
		$str=$str."</table>";
		$this->setContenido($str);
	}
	
	/**
		*Añade un titulo y un texto a la pagina
		*@var $tit string Titulo de la pagina
		*@var $str string Texto de la pagina
	*/
	function setTexto($tit,$str){
		$this->setTitulo("<h2>".$tit."</h2>");
		$this->setContenido($str);		
	}

	/**
		*Añade un formulario para insertar contenido en la base de datos
	*/

	function setForm(){
		$this->setTitulo("<h2>Formulario</h2>");	
		$str='<form method="post" action="formtobd.php" class="pure-form pure-form-aligned">
		<div class="pure-control-group">
		<label for="ID">ID</label>
        <input type="text" pattern="[1-9]{1}[0-9]{0,4}" name="ID" placeholder="ID"/>
		</div>
		<div class="pure-control-group">
		<label for="pais">Pais</label>
        <input type="text" pattern="[A-Za-zñÑ]{4,20}" name="pais" placeholder="pais" required />
		</div>
		<div class="pure-control-group">
		<label for="ciudad">Ciudad</label>
        <input type="text" pattern="[A-Za-zñÑ]{4,20}" name="ciudad" placeholder="ciudad" required />
		</div>
		<div class="pure-control-group">
		<label for="lugar">Lugar</label>
        <input type="text" pattern="[A-Za-zñÑ]{4,20}" name="lugar" placeholder="lugar" required />
		</div>
		<div class="pure-control-group">
		<label for="descripcion">Descripcion</label>
        <textarea class="form-control" rows="3" pattern="[A-Za-zñÑ]{4,255}" name="descripcion" placeholder="descripcion"></textarea>
		</div>
		<div class="pure-control-group">
		<label for="fecha">Fecha</label>
        <input name="fecha" min="1994-01-01" max="2015-01-01" type="date">
		</div>
		<div class="pure-controls">
        <input type="submit" value="Enviar" class="pure-button pure-button-primary">
		</div>
   		</form>';
		$this->setContenido($str);
	}
}
?>