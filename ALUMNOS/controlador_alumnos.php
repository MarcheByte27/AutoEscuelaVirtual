<?php	
	session_start();
	
	 if (isset($_REQUEST["DNI_A"])){
	 	
		$alum["DNI_A"] = $_REQUEST["DNI_A"];
		$alum["NOMBRE_COMPLETO"] = $_REQUEST["NOMBRE_COMPLETO"];
		$alum["DIRECCION"] = $_REQUEST["DIRECCION"];
		$alum["TELEFONO"] = $_REQUEST["TELEFONO"];
		$alum["EDAD"] = $_REQUEST["EDAD"];
		$alum["CURSOINT"] = $_REQUEST["CURSOINT"];
		$alum["TIPOC"] = $_REQUEST["TIPOC"];
		$alum["TIPOH"] = $_REQUEST["TIPOH"];
		$alum["CERTIFICADO"] = $_REQUEST["CERTIFICADO"];
		$alum["OID_SE"] = $_REQUEST["OID_SE"];
		$alum["EMAILA"] = $_REQUEST["EMAILA"];
		
		$_SESSION["alum"] = $alum;
			
		if (isset($_REQUEST["editar"]))  Header("Location: ../PROFESORES/tabla_alumnos_profesor.php"); 
		else if (isset($_REQUEST["grabar"])) Header("Location: accion_modificar_alumno.php");
		else if(isset($_REQUEST["addEx"])) Header("Location: regisHacerEx.php");
		else Header("Location: accion_borrar_alumno.php");
	
	 }else 
		 Header("Location: tabla_alumnos_profesor.php");

?>
