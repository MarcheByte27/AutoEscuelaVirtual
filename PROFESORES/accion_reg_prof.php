<?php
	session_start();
	
	require_once("../gestionBD.php");
	require_once("gestionarProfesores.php");
	
	if (isset($_SESSION["registro"])) {
		$nuevoUsuario = $_SESSION["registro"];
		$_SESSION["registro"] = null;
		$_SESSION["errores"] = null;
	}
	else 
		Header("Location: registro_prof.php");
	
	$conexion = crearConexionBD();
?>

  <!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>REGISTRO DE PROFESOR</title>
  <link rel="stylesheet" type="text/css"  href="../css/estilos.css" />
</head>
	<?php
		include_once("../cabecera.php");
	?>

	<main>
		<?php $excepcion = alta_profesor($conexion, $nuevoUsuario);
		if ($excepcion == "") { 
				
		?>
			<div >
			   Pulsa <a href="registro_prof.php">aquí</a> para volver al resgistro.
			</div>
			
		<h2>El profesor ha sido registrado satisfactoriamente con los siguientes datos:</h2>
		<ul>
			<li><?php echo "Nombre: " . $nuevoUsuario["nombre"]; ?></li>
			<li><?php echo "Apellidos: " . $nuevoUsuario["apellidos"]; ?></li>
			<li><?php echo "DNI: " . $nuevoUsuario["dni"]; ?></li>
			<li><?php echo "Email: " . $nuevoUsuario["email"]; ?></li>
			<li><?php echo "Direccion: " . $nuevoUsuario["direccion"]; ?></li>
			<li><?php echo "Años de Carnet: " . $nuevoUsuario["años_carne"]; ?></li>
			<li><?php echo "Puesto: " . $nuevoUsuario["puesto"]; ?></li>
			<li><?php echo "Sede: " . $nuevoUsuario["sede"]; ?></li>
			<li><?php echo "Contraseña: " . $nuevoUsuario["pass"]; ?></li>
				</ul>
			</li>
			
		</ul>
		<?php } else {?> <h1>El profesor ya existe en la base de datos o ha ocurrido un error.</h1>
				<?php echo "Información relativa al problema: $excepcion;" ?>
				<div >	
					Pulsa <a href="registro_prof.php">aquí</a> para volver al resgistro.
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