<?php	
	session_start();
	
	 if (isset($_REQUEST["DNI_P"])){
	 	
		$prof["DNI_P"] = $_REQUEST["DNI_P"];
		$prof["NOMBRE_COMPLETO"] = $_REQUEST["NOMBRE_COMPLETO"];
		$prof["DIRECCION"] = $_REQUEST["DIRECCION"];
		$prof["AÑOS_CARNE"] = $_REQUEST["AÑOS_CARNE"];
		$prof["EMAILP"] = $_REQUEST["EMAILP"];
		$prof["PUESTO"] = $_REQUEST["PUESTO"];
		$prof["OID_SE"] = $_REQUEST["OID_SE"];
		
		$_SESSION["prof"] = $prof;
			
		if (isset($_REQUEST["editar"]))  Header("Location: tabla_profesores_profesor.php"); 
		else if (isset($_REQUEST["grabar"])) Header("Location: accion_modificar_profesor.php");
		else Header("Location: accion_borrar_profesor.php");
	
	 }else 
		 Header("Location: tabla_profesor_profesor.php");

?>
>