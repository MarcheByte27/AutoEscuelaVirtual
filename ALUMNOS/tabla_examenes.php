<?php
session_start();
if(isset($_SESSION['inicioA'])){
	$dniA = $_SESSION['inicioA'];
}
else header("Location: login_alumno.php");

	
	$variable="SELECT OID_EX,FECHA,TIPO FROM EXAMEN";
	require_once( '../gestionBD.php');
	require_once( '../ConsultasPaginadas.php');
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Exámenes</title>
	<link rel="stylesheet" type="text/css"  href="../css/estilos.css" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>
	<?php
		include_once("../cabecera.php");
	?>
	<header>
		<h1 id="margen">Tabla con los exámenes:</h1>
	</header>
	<hr>
	<main>
		<center>
		<table width="60%" class="tabla">
			<tr >
				<th>ID Examen</th>
				<th>Fecha</th>
				<th>Tipo</th>
			</tr>
			<?php
				$filas = consultaBD();
				foreach ($filas as $fila) { ?>
					<tr>
							<td><?php echo $fila["OID_EX"] ?></td>
							<td><?php echo $fila["FECHA"] ?></td>
							<td><?php echo $fila["TIPO"] ?> </td>
					</tr>
					
			<?php } ?>
		</table>
		</center>
	</main>
	<hr>
	<center>
	<form>
			
		<?php
			 $left_offset =(($pag_actual - $offset)<1) ? 1 : ($pag_actual - $offset);
			 $right_offset =(($pag_actual + $offset)>$total_pages) ? $total_pages : ($pag_actual + $offset);
			 if($pag_actual < 1) $pag_actual = 1;
			 if($pag_actual > $total_pages) $pag_actual = $total_pages;
			 	
				echo "<div>";
			 if($pag_actual > 1){
			 	echo "<input type='submit' name='avance' value='◀◀'>";
			 echo "<input type='submit' name='avance' value='◀'>";
			 }
			
			 for ($p=$left_offset; $p<=$right_offset; $p++) {
			 	if ($p == $pag_actual)
					echo "<strong> $p </strong>";
				else echo "<input type='submit' name='pag_actual' value='$p'>";
			 }
			 if($pag_actual < $total_pages){
				echo "<input type='submit' name='avance' value='▶'>";
			 echo "<input type='submit' name='avance' value='▶▶'>";
				
			}
			 echo "</div>";
			 //echo "<div ><input type='number' name='tam_pag' min='1' max='$num_rows' value='$tam_pag'>";
			 echo "Total páginas ... $total_pages</div>";
		?>
		</form>
	</center>
	<form>
		<input id="margen" formaction="pagina_principal_alumno.php" type="submit" name="Volver a Inicio" value="Volver a Inicio">
	</form>
	<?php
		include_once("../pie.php");
	?>
</body>
</html>
<?php
	cerrarConexionBD($conn);
?>		