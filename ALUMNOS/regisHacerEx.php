<?php

session_start();

if (isset($_SESSION['inicioP'])) {
	$dniP = $_SESSION['inicioP'];
} else
	header("Location: ../PROFESORES/login_profesor.php");

if (isset($_SESSION["errores"]))
	$errores = $_SESSION["errores"];

if (isset($_SESSION["alum"])) {
	$_SESSION["dnih"] = $_SESSION["alum"]["DNI_A"];
	unset($_SESSION["alum"]);
}

$variable = "SELECT OID_EX,FECHA,TIPO FROM EXAMEN";
require_once ('../gestionBD.php');
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title> Añadir Exámen</title>
		<link rel="stylesheet" type="text/css"  href="../css/estilos.css" />
	</head>

	<body>
		<?php
		include_once ("../cabecera.php");
		?>
		
		<header>
			<h2>Añadir nuevos Exámenes</h2> </legend>
		</header>

		<fieldset>
			<legend align="center">
				AUTOESCUELA PURRI S.L
			</legend>
			<form id="registroHacerEx" method="post" action="accion_anadir_hacerexamen.php" novalidate>

				<div>
					<label for="fallos"> Fallos cometidos por el alumno:</label>
					<select  name="fallos" id="fallosHacer">
						<?php 
						for ($i = 0; $i <= 30; $i++) 
							echo "<option value='$i'>$i</option>"
							?>

					</select>
				</div>

				<div>
					<label for="oid_ex"> ID Examen:</label>
					<select  name="oid_ex" >
						<?php
				$filas = consultaTabla();
				foreach ($filas as $fila) { ?> 
					<option value="<?php echo $fila["OID_EX"] ?>"><?php echo $fila["OID_EX"].', '.$fila["FECHA"].', '.$fila["TIPO"] ?></option>
			<?php } ?>
					</select>
				</div>
				<div>
					<input type="submit" value="Enviar" />
					
				</div>
			</form>
			
			<form>
				<input type="submit" name="volver" value="Volver a la tabla" formaction="../PROFESORES/tabla_alumnos_profesor.php">
			</form>
			
			
			<?php
			include_once ("../pie.php");
			?>
	</body>
</html>