<?php
session_start();
if(isset($_SESSION['inicioA'])){
	$dniA = $_SESSION['inicioA'];
	$variable = "SELECT OID_EX, TIPO, FECHA, FALLOS, APTO, DNI_A FROM ALUMNO NATURAL JOIN (SELECT * FROM HACEREX NATURAL JOIN EXAMEN) WHERE '$dniA' = DNI_A";
	require_once ('../ConsultasPaginadas.php');
	require_once ('../gestionBD.php');
} else header("Location: login_alumno.php");
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Notas</title>
	<link rel="stylesheet" type="text/css"  href="../css/estilos.css" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>
	<?php
	include_once ("../cabecera.php");
	?>
	<header>
		<h1>Tabla con las notas de todos los exámenes:</h1>
	</header>
	<hr>
	<main>
		<center>
			<div style="overflow-x:auto">
		<table width="50%" class="tabla">
			<tr >
				<th>ID_EX</th>
				<th>Tipo</th>
				<th>Fecha</th>
				<th>Fallos</th>
				<th>Apto</th>
			
			</tr>
			 <?php
			 if ($num_rows == 0){ ?>
			 <tr>
				 <td colspan="5">No hay datos de exámenes de <strong><?php echo $dniA ?></strong></td>
			 </tr>
			 <?php
				 }else{
				 
				$filas = consultaBD();
				foreach ($filas as $fila) { ?>
					<tr>
							<td><?php echo $fila["OID_EX"] ?></td>
							<td><?php echo $fila["TIPO"] ?></td>
							<td><?php echo $fila["FECHA"] ?> </td>
							<td><?php echo $fila["FALLOS"] ?> </td>
							<td><?php echo $fila["APTO"] ?></td>
					</tr>
					
			<?php } } 
				 ?>
		</table>
		</div>
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
		include_once("../pie.php");
	?>
</body>
</html>
<?php
cerrarConexionBD($conn);
?>