<?php
session_start();
if (isset($_SESSION["registro"])) {

	$profesor["nombre"] = $_REQUEST["nombre"];
	$profesor["apellidos"] = $_REQUEST["apellidos"];
	$profesor["dni"] = $_REQUEST["dni"];
	$profesor["email"] = $_REQUEST["email"];
	$profesor["direccion"] = $_REQUEST["direccion"];
	$profesor["años_carne"] = $_REQUEST["años_carne"];
	$profesor["puesto"] = $_REQUEST["puesto"];
	$profesor["sede"] = $_REQUEST["sede"];
	$profesor["pass"] = $_REQUEST["pass"];
	$profesor["confirmpass"] = $_REQUEST["confirmpass"];
		
	$_SESSION["registro"] = $profesor;
	
	$errores = validarDatosUsuario($profesor);

	if(count($errores) > 0) {
		$_SESSION["errores"] = $errores;
		Header("Location: registro_prof.php");
	}
	else header("Location: accion_reg_prof.php");
	
} 
else{
	
	Header("Location: registro_prof.php");
}	


function validarDatosUsuario($profesor){
		
	if($profesor["nombre"] == "") $errores[] = "<p> El nombre no puede estar vacío </p>";
	
	if($profesor["apellidos"] == "") $errores[] = "<p> El apellido no puede estar vacío </p>";
	
	if($profesor["dni"]=="") 
		$errores[] = "<p>El NIF no puede estar vacío</p>";
	else if(!preg_match("/^[0-9]{8}[A-Z]$/", $profesor["dni"])){
		$errores[] = "<p>El DNI debe contener 8 números y una letra mayúscula: " . $profesor["dni"]. "</p>";
	}
	

	if($profesor["email"]=="")$errores[] = "<p>El email no puede estar vacío</p>";
	else if(!filter_var($profesor["email"], FILTER_VALIDATE_EMAIL))$errores[] = "<p>El email es incorrecto: " . $profesor["email"]. "</p>";
	
	
	if($profesor["direccion"] == "") $errores[] = "<p> La dirección no puede estar vacío </p>";
	
	if($profesor["años_carne"] == "") $errores[] = "<p> La antigüedad de carnet no puede estar vacía </p>";
	else if(!preg_match("/[0-9]/", $profesor["años_carne"])) $errores[] = "<p>La edad es incorrecta: " . $profesor["años_carne"]. "</p>";
	else if( $profesor["años_carne"] < 3) $errores[] = "<p> El profesor debe tener una antigüedad de carnet de 3 años o más </p>";
	
	
	if($profesor["puesto"] != "teórico" && 
	$profesor["puesto"] != "práctico" && 
	$profesor["puesto"] != "teorico-practico" ) {
	$errores[] = "<p> El puesto es obligatorio </p>";
	}
	
	
	if(!isset($profesor["pass"]) || strlen($profesor["pass"])<8){
			$errores [] .= "<p>Contraseña no válida: debe tener al menos 8 caracteres</p>";
		}
	if(!preg_match("/[a-z]+/", $profesor["pass"]) || 
			!preg_match("/[A-Z]+/", $profesor["pass"]) || !preg_match("/[0-9]+/", $profesor["pass"])){
			$errores[] .= "<p>Contraseña no válida: debe contener letras mayúsculas y minúsculas y dígitos</p>";
		}
	if($profesor["pass"] != $profesor["confirmpass"]){
			$errores[] .= "<p>La confirmación de contraseña no coincide</p>";
		}
	
			
	return $errores;
}


?>
