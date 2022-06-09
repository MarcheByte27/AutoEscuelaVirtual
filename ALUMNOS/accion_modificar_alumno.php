<?php
session_start();

if (isset($_SESSION["alum"])) {
	$alumno = $_SESSION["alum"];
	unset($_SESSION["alum"]);

	require_once ("../gestionBD.php");
	require_once ("gestionarAlumnos.php");

	$conexion = crearConexionBD();
	$excepcion = modificar_alumno($conexion, $alumno);
	cerrarConexionBD($conexion);

	if ($excepcion <> "") {
		$_SESSION["excepcion"] = $excepcion;
		$_SESSION["destino"] = "../PROFESORES/tabla_alumnos_profesor.php";
		Header("Location: ../excepcion.php");
	} else
		Header("Location: ../PROFESORES/tabla_alumnos_profesor.php");
} else
	Header("Location: ../PROFESORES/login_profesor.php");
?>
