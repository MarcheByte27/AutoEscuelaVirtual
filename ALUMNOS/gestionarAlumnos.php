<?php

 function alta_alumno($conexion,$usuario) {
 	$nombre_completo = $usuario["nombre"]." ".$usuario["apellidos"];
	try {
		$consulta = "CALL insertarAlumno(:dni, :nombre, :dir, :telefono, :edad, :email, :int, :carne, :horario, :certificado, :contraseña, :sede)";
		$stmt=$conexion->prepare($consulta);
		$stmt->bindParam(':dni',$usuario["dni"]);
		$stmt->bindParam(':nombre',$nombre_completo);
		$stmt->bindParam(':dir',$usuario["direccion"]);
		$stmt->bindParam(':telefono',$usuario["telefono"]);
		$stmt->bindParam(':edad',$usuario["edad"]);
		$stmt->bindParam(':email',$usuario["email"]);
		$stmt->bindParam(':int',$usuario["intensivo"]);
		$stmt->bindParam(':carne',$usuario["tipocarnet"]);
		$stmt->bindParam(':horario',$usuario["horario"]);
		$stmt->bindParam(':certificado',$usuario["certificado"]);
		$stmt->bindParam(':contraseña',$usuario["pass"]);
		$stmt->bindParam(':sede',$usuario["sede"]);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

 function añadir_hacerExamen($conexion, $alumno, $fallos, $examen) {
	try {
		$consulta = "CALL insertarHacerEx(:dni, :examen, :fallos)";
		$stmt=$conexion->prepare($consulta);
		$stmt->bindParam(':dni',$alumno);
		$stmt->bindParam(':fallos',$fallos);
		$stmt->bindParam(':examen',$examen);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}
 
 
 function quitar_alumno($conexion,$alumno) {
 	
	try {
		$consulta = 'CALL ELIMINARALUMNO(:dniA)';
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam( ':dniA',$alumno);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}
  function modificar_alumno($conexion,$alumno) {
	try {
		$consulta = 'CALL MODIFICARALUMNO( :dniA, :direccion, :telefono, :edad, :email, :certificado)';
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam( ':dniA',$alumno["DNI_A"]);
		$stmt->bindParam( ':certificado',$alumno["CERTIFICADO"]);
		$stmt->bindParam( ':edad',$alumno["EDAD"]);
		$stmt->bindParam( ':telefono',$alumno["TELEFONO"]);
		$stmt->bindParam( ':direccion',$alumno["DIRECCION"]);
		$stmt->bindParam( ':email',$alumno["EMAILA"]);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}


  
function consultarAlumno($conexion,$DNI_A,$CONTRASEÑAA) {
 	$consulta = 'SELECT COUNT(*) FROM ALUMNO WHERE DNI_A=:DNI_A AND CONTRASEÑAA=:CONTRASEÑAA';
	$stmt = $conexion->prepare($consulta);
	$stmt->bindParam(':DNI_A',$DNI_A);
	$stmt->bindParam(':CONTRASEÑAA',$CONTRASEÑAA);
	$stmt->execute();
	return $stmt->fetchColumn();
}

