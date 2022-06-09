<?php
	session_start();
	
	require_once("../gestionBD.php");
	require_once("gestionarAlumnos.php");
	
	if (isset($_SESSION["registro"])) {
		$nuevoUsuario = $_SESSION["registro"];
		$_SESSION["registro"] = null;
		$_SESSION["errores"] = null;
	}
	else 
		Header("Location: registro_alum.php");
	
	$conexion = crearConexionBD();

?>

  <!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>REGISTRO DE ALUMNO</title>
  <link rel="stylesheet" type="text/css"  href="../css/estilos.css" />
</head>
	<?php
		include_once("../cabecera.php");
	?>

	<main>
		<?php $excepcion = alta_alumno($conexion, $nuevoUsuario);
				
		
		if ($excepcion == "") {
				
		?>
			<div >
			   Pulsa <a href="registro_alum.php">aquí</a> para volver al resgistro.
			</div>
			
		<h2>El alumno ha sido registrado satisfactoriamente con los siguientes datos:</h2>
		<ul>
			<li><?php echo "Nombre: " . $nuevoUsuario["nombre"]; ?></li>
			<li><?php echo "Apellidos: " . $nuevoUsuario["apellidos"]; ?></li>
			<li><?php echo "DNI: " . $nuevoUsuario["dni"]; ?></li>
			<li><?php echo "Teléfono: " . $nuevoUsuario["telefono"]; ?></li>
			<li><?php echo "Email: " . $nuevoUsuario["email"]; ?></li>
			<li><?php echo "Direccion: " . $nuevoUsuario["direccion"]; ?></li>
			<li><?php echo "Edad: " . $nuevoUsuario["edad"]; ?></li>
			<li><?php echo "Curso Intensivo: " . $nuevoUsuario["intensivo"]; ?></li>
			<li><?php echo "Certificado: " . $nuevoUsuario["certificado"]; ?></li>
			<li><?php echo "Carnet a cursar: " . $nuevoUsuario["tipocarnet"]; ?></li>
			<li><?php echo "Sede: " . $nuevoUsuario["sede"]; ?></li>
			<li><?php echo "Horario: " . $nuevoUsuario["horario"]; ?></li>
			<li><?php echo "Contraseña: " . $nuevoUsuario["pass"]; ?></li>
				</ul>
			</li>
			<?php echo "Información relativa al problema: $excepcion;" ?>
		</ul>
		<?php } else {?> <h1>El alumno ya existe en la base de datos o ha ocurrido un error.</h1>
				<div >	
					Pulsa <a href="registro_alum.php">aquí</a> para volver al resgistro.
				</div>
	<?php } ?>
		
				
	</main>
	<?php
		include_once("../pie.php");
	?>
</body>
</html>
<?php
	cerrarConexionBD($conexion);
?>