<?php
session_start();

if (isset($_SESSION["prof"])) {
	$profesor = $_SESSION["prof"];
	unset($_SESSION["prof"]);

	require_once ("../gestionBD.php");
	require_once ("gestionarProfesores.php");

	$conexion = crearConexionBD();
	$excepcion = quitar_profesor($conexion, $profesor["DNI_P"]);
	cerrarConexionBD($conexion);

	if ($excepcion <> "") {
		$_SESSION["excepcion"] = $excepcion;
		$_SESSION["destino"] = "tabla_profesor_profesor.php";
		Header("Location: ../excepcion.php");
	} else
		Header("Location: tabla_profesores_profesor.php");
} else
	Header("Location: login_profesor.php");
?>
