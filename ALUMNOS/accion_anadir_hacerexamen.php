<?php
session_start();
require_once("../gestionBD.php");
require_once("gestionarAlumnos.php");

if (isset($_SESSION['inicioP'])) {
	$dniP = $_SESSION['inicioP'];
} else
	header("Location: ../PROFESORES/login_profesor.php");

if(isset($_REQUEST["fallos"])){
	$examen["fallos"] = $_REQUEST["fallos"];
	$examen["oid_ex"] = $_REQUEST["oid_ex"];
}else header("Location: ../PROFESORES/tabla_alumnos_profesor.php");

if(isset($_SESSION["dnih"])){
	$alumno = $_SESSION["dnih"];
	unset($_SESSION["dnih"]);
}

$conexion = crearConexionBD();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>REGISTRO HACEREX</title>
  <link rel="stylesheet" type="text/css"  href="../css/estilos.css" />
</head>
	<?php
	include_once ("../cabecera.php");
	?>
		
		<?php $excepcion= añadir_hacerExamen($conexion, $alumno, $examen["fallos"], $examen["oid_ex"]);
		if ($excepcion == "") {
				
		?>
			<div >
			   Pulsa <a href="../PROFESORES/tabla_alumnos_profesor.php">aquí</a> para volver al resgistro.
			</div>
			
			<?php
			header('refresh: 10; url=../PROFESORES/tabla_alumnos_profesor.php');
		?>
			
			
			
		<h2>El examen lo ha hecho:</h2>
		<ul>
			<li><?php echo "DNI: " . $alumno; ?></li>
			<li><?php echo "Fallos: " . $examen["fallos"]; ?></li>
			<li><?php echo "ID examen: " . $examen["oid_ex"]; ?></li>
				</ul>
			</li>
			
		<?php } else { ?> <h1>El examen no ha podido añadirse con éxito.</h1>
			
			<?php echo "Información relativa al problema: $excepcion;" ?>
			
				<div >	
					Pulsa <a href="../PROFESORES/tabla_alumnos_profesor.php">aquí</a> para volver al resgistro.
				</div>

	<?php } ?>
		<p>Serás redirigido en <span id="counter">10</span> segundo(s).</p>
			<script type="text/javascript">
				function countdown() {
					var i = document.getElementById('counter');
					if (parseInt(i.innerHTML) <= 0) {
						location.href = '../PROFESORES/tabla_alumnos_profesor.php';
					}
					i.innerHTML = parseInt(i.innerHTML) - 1;
				}
				setInterval(function() {
					countdown();
				}, 1000); 
</script>
		<?php
	include_once ("../pie.php");
	?>
</body>
</html>
<?php
cerrarConexionBD($conexion);
?>