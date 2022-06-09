<?php

$conn = crearConexionBD();

function crearConexionBD() {
	$host = "oci:dbname=localhost/XE;charset=UTF8";
	$usuario = "IISSI";
	$password = "IISSI";
	try {	$conexion = new PDO($host, $usuario, $password);
		$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) { echo "Error al conectar la base de datos: $e->getMessage()";
	}
	return $conexion;
}

function cerrarConexionBD($conexion) { $conexion = null;
}

function consultaBD() {
	global $conn;
	global $variable;
	global $pag_actual;
	global $tam_pag;
	$first = ($pag_actual - 1) * $tam_pag + 1;
	$last = $pag_actual * $tam_pag;
	$sql = " SELECT * FROM (SELECT ROWNUM RNUM,AUX.* FROM ( $variable) AUX WHERE ROWNUM <= $last) WHERE RNUM >= $first";
	try {
		return $conn -> query($sql);
	} catch ( PDOException $e ) { echo "Error at consultaBD(): $e->getMessage()";
	}
}

function consultaTabla() {
	global $conn;
	global $variable;
	$sql = " $variable ";
	try {
		return $conn -> query($sql);
	} catch ( PDOException $e ) { echo "Error at consultaBD(): $e->getMessage()";
	}
}
?>