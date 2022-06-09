<?php

function alta_profesor($conexion, $usuario) {
	$nombre_completo = $usuario["nombre"]." ".$usuario["apellidos"];
	try {
		$consulta = "CALL insertarProfesor(:dni, :nombre, :dir, :años_carne, :email, :puesto, :contraseña, :sede)";
		$stmt = $conexion -> prepare($consulta);
		$stmt -> bindParam(':dni', $usuario["dni"]);
		$stmt -> bindParam(':nombre', $nombre_completo);
		$stmt -> bindParam(':dir', $usuario["direccion"]);
		$stmt -> bindParam(':años_carne', $usuario["años_carne"]);
		$stmt -> bindParam(':email', $usuario["email"]);
		$stmt -> bindParam(':puesto', $usuario["puesto"]);
		$stmt -> bindParam(':contraseña', $usuario["pass"]);
		$stmt -> bindParam(':sede', $usuario["sede"]);
		$stmt -> execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
	}
}

 function quitar_profesor($conexion,$profesor) {
 	
	try {
		$consulta = 'DELETE FROM PROFESOR WHERE DNI_P= :dniP';
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam( ':dniP',$profesor);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}




  function modificar_profesor($conexion,$profesor) {
	try {
		$consulta = 'CALL MODIFICARPROFESOR( :dniP, :direccion, :años, :puesto)';
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam( ':dniP',$profesor["DNI_P"]);
		$stmt->bindParam( ':direccion',$profesor["DIRECCION"]);
		$stmt->bindParam( ':años',$profesor["AÑOS_CARNE"]);
		$stmt->bindParam( ':puesto',$profesor["PUESTO"]);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

function consultarProfesor($conexion,$DNI_P,$CONTRASEÑAB) {
	$consulta = 'SELECT COUNT(*) AS TOTAL FROM PROFESOR WHERE DNI_P=:DNI_P AND CONTRASEÑAB=:CONTRASEÑAB';
	$stmt = $conexion -> prepare($consulta);
	$stmt -> bindParam('DNI_P',$DNI_P);
	$stmt -> bindParam(':CONTRASEÑAB',$CONTRASEÑAB);
	$stmt -> execute();
	return $stmt -> fetchColumn();
}
