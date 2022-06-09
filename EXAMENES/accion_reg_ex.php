<?php
session_start();

require_once ("../gestionBD.php");

if (isset($_SESSION["inicioP"])) {
	$nuevoExamen = $_REQUEST;
	$_SESSION["registro"] = null;
	$_SESSION["errores"] = null;
} else
	Header("Location: registro_ex.php");

$conexion = crearConexionBD();
?>

  <!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Añadir nuevos Exámenes</title>
  <link rel="stylesheet" type="text/css"  href="../css/estilos.css" />
</head>
	<?php
	include_once ("../cabecera.php");
	?>

	<main>
		<?php $excepcion = alta_examen($conexion, $nuevoExamen);
		if ($excepcion == "") {
		?>
			<div >
			   Pulsa <a href="registro_ex.php">aquí</a> para volver al resgistro.
			</div>
			
		<h2>El examen ha sido registrado satisfactoriamente con los siguientes datos:</h2>
		<ul>
			<li><?php echo "Fecha: " . $nuevoExamen["fecha"]; ?></li>
			<li><?php echo "Apellidos: " . $nuevoExamen["tipo"]; ?></li>
				</ul>
			</li>
		</ul>
		<?php } else { ?> <h1>El examen no pudo crearse.</h1>
			
				<?php echo "Información relativa al problema: $excepcion;" ?>
				<div>	
					Pulsa <a href="registro_ex.php">aquí</a> para volver al registro.
				</div>
	<?php } ?>
		
				
	</main>
	<?php
	include_once ("../pie.php");

	function contar_examenes($conexion) {
		$consulta = 'SELECT COUNT(*) AS TOTAL FROM EXAMEN';
		$stmt = $conexion -> prepare($consulta);
		$stmt -> execute();
		return $stmt -> fetchColumn();
	}

	function alta_examen($conexion, $usuario) {
		$fecha = date('d/m/Y', strtotime($usuario["fecha"]));
		try {
			$consulta = "CALL insertarExamenPagina(:fecha, :tipo)";
			$stmt = $conexion -> prepare($consulta);
			$stmt -> bindParam(':fecha', $fecha);
			$stmt -> bindParam(':tipo', $usuario["tipo"]);
			$stmt -> execute();
			return "";
		} catch(PDOException $e) {
			return $e->getMessage();
			}
	}
	?>
</body>
</html>
<?php
cerrarConexionBD($conexion);
?>