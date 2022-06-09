<?php
session_start();
if(isset($_SESSION['inicioA'])){
	$dniA = $_SESSION['inicioA'];
}
else header("Location: login_alumno.php");
	
	
	
	$variable="SELECT DNI_P,NOMBRE_COMPLETO,DIRECCION,AÑOS_CARNE,EMAILP,PUESTO,CONTRASEÑAB,OID_SE FROM PROFESOR";
	require_once( '../gestionBD.php');
	require_once( '../ConsultasPaginadas.php');
	
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Profesores</title>
	<link rel="stylesheet" type="text/css"  href="../css/estilos.css" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>
	<?php
		include_once("../cabecera.php");
	?>
	<header>
		<h1>Tabla con los profesores:</h1>
	</header>
	<hr>
	<main>
		<center>
			<div style="overflow-x:auto">
		<table width="80%" class="tabla">
			<tr >
				<th>DNI</th>
				<th>Nombre y apellidos</th>
				<th>Dirección</th>
				<th>Años de carnet</th>
				<th>Puesto</th>
				<th>Email</th>
			</tr>
			<?php
				$filas = consultaBD();
				foreach ($filas as $fila) { ?>
					<tr>
							<td><?php echo $fila["DNI_P"] ?></td>
							<td><?php echo $fila["NOMBRE_COMPLETO"] ?></td>
							<td><?php echo $fila["DIRECCION"] ?> </td>
							<td><?php echo $fila["AÑOS_CARNE"] ?> </td>
							<td><?php echo $fila["PUESTO"] ?> </td>
							<td><?php echo $fila["EMAILP"] ?> </td>
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
		</div>
	</center>
	<form>
		<input formaction="pagina_principal_alumno.php" type="submit" name="volver" value="Volver a Inicio">
	</form>
</body>
</html>
<?php
	cerrarConexionBD($conn);
?>		