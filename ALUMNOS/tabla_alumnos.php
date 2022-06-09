<?php
session_start();
if (isset($_SESSION['inicioA'])) {
	$dniA = $_SESSION['inicioA'];
} else
	header("Location: login_alumno.php");

	$variable="SELECT DNI_A,NOMBRE_COMPLETO,DIRECCION,TELEFONO, EDAD, CURSOINT,TIPOC,TIPOH,CERTIFICADO,OID_SE,EMAILA FROM ALUMNO";
	require_once( '../ConsultasPaginadas.php');
	require_once( '../gestionBD.php');
	
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Alumno</title>
	<link rel="stylesheet" type="text/css"  href="../css/estilos.css" />
</head>
	<?php
	include_once ("../cabecera.php");
	?>
	<header>
		<h1>Tabla con los alumnos:</h1>
	</header>
	<hr>
	<main>
		<center>
		<table width="80%" class="tabla">
			<tr >
				<th>DNI</th>
				<th>Nombre y apellidos</th>
				<th>Dirección</th>
				<th>Teléfono</th>
				<th>Edad</th>
				<th>Curso Intensivo</th>
				<th>Tipo Carnet</th>
				<th>Horario</th>
				<th>Certificado</th>
				<th>Sede</th>
				<th>Email</th>
			</tr>
			<?php
				$filas = consultaBD();
				foreach ($filas as $fila) { ?>
					<tr>
							<td><?php echo $fila["DNI_A"] ?></td>
							<td><?php echo $fila["NOMBRE_COMPLETO"] ?></td>
							<td><?php echo $fila["DIRECCION"] ?> </td>
							<td><?php echo $fila["TELEFONO"] ?> </td>
							<td><?php echo $fila["EDAD"] ?> </td>
							<td><?php echo $fila["CURSOINT"] ?> </td>
							<td><?php echo $fila["TIPOC"] ?> </td>
							<td><?php echo $fila["TIPOH"] ?> </td>
							<td><?php echo $fila["CERTIFICADO"] ?></td>
							<td><?php echo $fila["OID_SE"] ?> </td>
							<td><?php echo $fila["EMAILA"] ?> </td>
						
					
			<?php } ?>
		</table>
		</center>
	</main>
	<hr>
	<center>
	<form>
			
		<?php
		$left_offset = (($pag_actual - $offset) < 1) ? 1 : ($pag_actual - $offset);
		$right_offset = (($pag_actual + $offset) > $total_pages) ? $total_pages : ($pag_actual + $offset);
		if ($pag_actual < 1)
			$pag_actual = 1;
		if ($pag_actual > $total_pages)
			$pag_actual = $total_pages;

		echo "<div>";
		if ($pag_actual > 1) {
			echo "<input type='submit' name='avance' value='◀◀'>";
			echo "<input type='submit' name='avance' value='◀'>";
		}

		for ($p = $left_offset; $p <= $right_offset; $p++) {
			if ($p == $pag_actual)
				echo "<strong> $p </strong>";
			else
				echo "<input type='submit' name='pag_actual' value='$p'>";
		}
		if ($pag_actual < $total_pages) {
			echo "<input type='submit' name='avance' value='▶'>";
			echo "<input type='submit' name='avance' value='▶▶'>";

		}
		echo "</div>";
		//echo "<div ><input type='number' name='tam_pag' min='1' max='$num_rows' value='$tam_pag'>";
		echo "Total páginas ... $total_pages</div>";
		?>
		</form>
	</center>
	<form >
		<input formaction="pagina_principal_alumno.php" type="submit" name="volver" value="Volver a Inicio">
	</form>
	<?php
	include_once ("../pie.php");
	?>
</body>
</html>
<?php
cerrarConexionBD($conn);
?>		