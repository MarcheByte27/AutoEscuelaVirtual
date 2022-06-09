<?php
session_start();
if (isset($_SESSION["registro"])) {

	$examen["FECHA"] = $_REQUEST["FECHA"];
	$examen["TIPO"] = $_REQUEST["TIPO"];
	
	$_SESSION["registro"] = $profesor;
	
	$errores = validarDatosUsuario($examen);

	if(count($errores) > 0) {
		$_SESSION["errores"] = $errores;
		Header("Location: registro_ex.php");
	}
	else header("Location: accion_reg_ex.php");
	
} 
else{
	
	Header("Location: registro_prof.php");
}	


function validarDatosUsuario($examen){
		
	if($profesor["FECHA"] == "") $errores[] = "<p> El apellido no puede estar vacío </p>";

	if($profesor["TIPO"] != "teórico" && 
	$profesor["TIPO"] != "práctico") {
	$errores[] = "<p> El tipo es obligatorio </p>";
	}
		
	return $errores;
}


?>
