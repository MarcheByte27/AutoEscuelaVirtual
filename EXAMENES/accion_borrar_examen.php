<?php
session_start();

if (isset($_SESSION["inicioP"])) {

	require_once ("../gestionBD.php");
	$examen = $_REQUEST["OID_EX"];
	$conexion = crearConexionBD();
	$excepcion = quitar_examen($conexion, $examen);
	cerrarConexionBD($conexion);

	if ($excepcion <> "") {
		$_SESSION["excepcion"] = $excepcion;
		$_SESSION["destino"] = "../PROFESORES/tabla_examenes_profesor.php";
		Header("Location: ../excepcion.php");
	} else
		Header("Location: ../PROFESORES/tabla_examenes_profesor.php");
} else
	Header("Location: ../PROFESORES/login_profesor.php");


 function quitar_examen($conexion,$examen) {
	try {
		$consulta = 'DELETE FROM EXAMEN WHERE OID_EX= :id';
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam(':id',$examen);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}


?>
