<?php
//comprobamos que el nombre de usuario y la contraseña sean correctos
if ($_POST["user"]=="asd" && $_POST["pass"]=="asd"){
    //en caso afirmativo iniciamos sesion y volvemos a index.php
    session_start();
    $_SESSION["autentificado"]= "SI";
    header ("Location:index.php");
}else {
    //en caso negativo nos devuelve a index.php con id=erroruser , indicando que el usuario ha cometido un error al indicar la contraseña y el nombre de usuario
    header("Location:index.php?id=erroruser");
}
?> 