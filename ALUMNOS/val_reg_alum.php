<?php
session_start();

if (isset($_SESSION["registro"])) {

	$alumno["nombre"] = $_REQUEST["nombre"];
	$alumno["apellidos"] = $_REQUEST["apellidos"];
	$alumno["dni"] = $_REQUEST["dni"];
	$alumno["email"] = $_REQUEST["email"];
	$alumno["direccion"] = $_REQUEST["direccion"];
	$alumno["telefono"] = $_REQUEST["telefono"];
	$alumno["certificado"] = $_REQUEST["certificado"];
	$alumno["edad"] = $_REQUEST["edad"];
	$alumno["intensivo"] = $_REQUEST["intensivo"];
	$alumno["tipocarnet"] = $_REQUEST["tipocarnet"];
	$alumno["sede"] = $_REQUEST["sede"];
	$alumno["horario"] = $_REQUEST["horario"];
	$alumno["pass"] = $_REQUEST["pass"];
	$alumno["confirmpass"] = $_REQUEST["confirmpass"];
		
	$_SESSION["registro"] = $alumno;
	
	$errores = validarDatosUsuario($alumno);

	if(count($errores) > 0) {
		$_SESSION["errores"] = $errores;
		Header("Location: registro_alum.php");
	}
	else header("Location: accion_reg_alum.php");
	
} 
else{
	
	Header("Location: registro_alum.php");
}	


function validarDatosUsuario($alumno){
		
	if($alumno["nombre"] == "") $errores[] = "<p> El nombre no puede estar vacío </p>";
	
	if($alumno["apellidos"] == "") $errores[] = "<p> El apellido no puede estar vacío </p>";
	
	if($alumno["dni"]=="") 
		$errores[] = "<p>El NIF no puede estar vacío</p>";
	else if(!preg_match("/^[0-9]{8}[A-Z]$/", $alumno["dni"])){
		$errores[] = "<p>El DNI debe contener 8 números y una letra mayúscula: " . $alumno["dni"]. "</p>";
	}
	
	if($alumno["telefono"]=="") 
		$errores[] = "<p>El Teléfono no puede estar vacío</p>";
	else if(!preg_match("/^[0-9]{9}$/", $alumno["telefono"])){
		$errores[] = "<p>El telefono debe contener 9 números: " . $alumno["telefono"]. "</p>";
	}
	

	if($alumno["email"]=="")$errores[] = "<p>El email no puede estar vacío</p>";
	else if(!filter_var($alumno["email"], FILTER_VALIDATE_EMAIL))$errores[] = "<p>El email es incorrecto: " . $alumno["email"]. "</p>";
	
	
	if($alumno["direccion"] == "") $errores[] = "<p> La dirección no puede estar vacío </p>";
	
	if($alumno["edad"] == "") $errores[] = "<p> La edad no puede estar vacío </p>";
	else if(!preg_match("/[0-9]/", $alumno["edad"])) $errores[] = "<p>La edad es incorrecta: " . $alumno["edad"]. "</p>";
	else if( $alumno["edad"] < 17) $errores[] = "<p> El alumno debe ser mayor de 17 años </p>";
	
	
	
	if($alumno["intensivo"] != "1" && $alumno["intensivo"] != "0") {
	$errores[] = "<p>La opción intensivo debe ser SI o NO</p>";
	}
	
	if($alumno["tipocarnet"] != "AM" && 
	$alumno["tipocarnet"] != "A1" && 
	$alumno["tipocarnet"] != "A2" && 
	$alumno["tipocarnet"] != "A"  && 
	$alumno["tipocarnet"] != "B" &&
	$alumno["tipocarnet"] != "B+E" &&
	$alumno["tipocarnet"] != "C1" &&
	$alumno["tipocarnet"] != "C1+E" &&
	$alumno["tipocarnet"] != "D1" &&
	$alumno["tipocarnet"] != "D1+E" &&
	$alumno["tipocarnet"] != "D" ) {
	$errores[] = "<p> El tipo de carnet es obligatorio </p>";
	}
	
	
	if(!isset($alumno["pass"]) || strlen($alumno["pass"])<8){
			$errores [] .= "<p>Contraseña no válida: debe tener al menos 8 caracteres</p>";
		}
	if(!preg_match("/[a-z]+/", $alumno["pass"]) || 
			!preg_match("/[A-Z]+/", $alumno["pass"]) || !preg_match("/[0-9]+/", $alumno["pass"])){
			$errores[] .= "<p>Contraseña no válida: debe contener letras mayúsculas y minúsculas y dígitos</p>";
		}
	if($alumno["pass"] != $alumno["confirmpass"]){
			$errores[] .= "<p>La confirmación de contraseña no coincide</p>";
		}
	
			
	return $errores;
}


?>
