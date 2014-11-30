<?php
  	require_once "db.php";
?>
<?php
	//creamos un objeto de la clase db	
	$db=new db("UserViajes","verify");
	//conectamos con la base de datos
	$db->conectar_base_datos();
	
	if(isset($_POST["ID"])){
		//si ID a sido insertado se hara un update 
		if($db->updLugar($_POST["ID"],$_POST["pais"],$_POST["ciudad"],$_POST["lugar"],$_POST["descripcion"],$_POST["fecha"])){
			//si no hay error volvemos a el formulario
			header ("Location:index.php?id=3");
		}else{
			//si hay error volvemos vamos a una pagina de error
			header ("Location:index.php?id=$result");
		}
	}else{
		//intentamos insertar los datos a en la base de datos 
		if($db->setLugar($_POST["pais"],$_POST["ciudad"],$_POST["lugar"],$_POST["descripcion"],$_POST["fecha"])){
			//si no hay error volvemos a el formulario
			header ("Location:index.php?id=3");
		}else{
			//si hay error volvemos vamos a una pagina de error
			header ("Location:index.php?id=$result");
		}
	}
	
   
?> 