<?php
session_start();
if (isset($_SESSION['inicioP'])) {
	$dniA = $_SESSION['inicioP'];
} else
	header("Location: login_profesor.php");

$variable = "SELECT DNI_A,NOMBRE_COMPLETO,DIRECCION,TELEFONO, EDAD, CURSOINT,TIPOC,TIPOH,CERTIFICADO,OID_SE,EMAILA FROM ALUMNO";
require_once ('../gestionBD.php');
require_once ('../ConsultasPaginadas.php');

if (isset($_SESSION["alum"])) {
	$alum = $_SESSION["alum"];
	unset($_SESSION["alum"]);
}
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Alumno</title>
	<link rel="stylesheet" type="text/css"  href="../css/estilos.css" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
		<style>
			@media screen and (max-width:680px){
				div.pie{display:none;}
				form input.añadir{display:none;}
				button.añadir{display:none}
			}
		</style>
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
		<div style="overflow-x:auto;">
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
				<th>Modificaciones</th>
			</tr>
			<?php
				$filas = consultaBD();
				foreach ($filas as $fila) { ?>
					<form method="POST" action="../ALUMNOS/controlador_alumnos.php"> 
						<input name="DNI_A" type="hidden" value="<?php echo $fila["DNI_A"] ?>"/>
						<input name="NOMBRE_COMPLETO" type="hidden" value="<?php echo $fila["NOMBRE_COMPLETO"] ?>"/>
						<input name="DIRECCION" type="hidden" value="<?php echo $fila["DIRECCION"] ?>"/>
						<input name="TELEFONO" type="hidden" value="<?php echo $fila["TELEFONO"] ?>"/>
						<input name="EDAD" type="hidden" value="<?php echo $fila["EDAD"] ?>"/>
						<input name="CURSOINT" type="hidden" value="<?php echo $fila["CURSOINT"] ?>"/>
						<input name="TIPOC" type="hidden" value="<?php echo $fila["TIPOC"] ?>"/>
						<input name="TIPOH" type="hidden" value="<?php echo $fila["TIPOH"] ?>"/>
						<input name="CERTIFICADO" type="hidden" value="<?php echo $fila["CERTIFICADO"] ?>"/>
						<input name="OID_SE" type="hidden" value="<?php echo $fila["OID_SE"] ?>"/>
						<input name="EMAILA" type="hidden" value="<?php echo $fila["EMAILA"] ?>"/>
						
							<?php if(isset($alum) and ($alum["DNI_A"]==$fila["DNI_A"])){
									?>					
							<tr>	
									<td><?php echo $fila["DNI_A"] ?></td>
									<td><?php echo $fila["NOMBRE_COMPLETO"] ?></td>
									<td><input name="DIRECCION" type= "text" value = "<?php echo $fila["DIRECCION"] ?>"/> </td>
									<td><input size="10" name="TELEFONO" type="text" value ="<?php echo $fila["TELEFONO"] ?>"/> </td>
									<td><input size="4" name="EDAD" type="text" value ="<?php echo $fila["EDAD"] ?>"/></td>
									<td><?php echo $fila["CURSOINT"] ?> </td>
									<td><?php echo $fila["TIPOC"] ?> </td>
									<td><?php echo $fila["TIPOH"] ?> </td>
									<td><input size="4" name="CERTIFICADO" type="text" value ="<?php echo $fila["CERTIFICADO"] ?>"/></td>
									<td><?php echo $fila["OID_SE"] ?> </td>
									<td><?php echo $fila["EMAILA"] ?> </td>
									<td>
										<?php
                    if(isset($alum) and ($alum["DNI_A"]==$fila["DNI_A"])) { ?>
                        <button id="modify" name="grabar" type="submit">
                            grabar
                        </button>
                        <?php } else { ?>
                        	
                        <button id="modify" name="editar" type="submit">
                            editar
                        </button>
                        
                        <button id="delete" name="borrar" type="submit" >
                            borrar
                        </button>
                        <button id="addEx" name="addEx" type="submit" >
                            Añadir examen
                        </button>
                    <?php } ?>
										
									</td>
							</tr>
							
							<?php } else { ?>	
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
									
									<td> <?php
                    if(isset($alum) and ($alum["DNI_A"]==$fila["DNI_A"])) { ?>
                        <button autofocus id="modify" name="grabar" type="submit">
                            grabar
                        </button>
                        <?php } else { ?>
                        <button id="modify" name="editar" type="submit">
                            editar
                        </button>
                        <?php } ?>
                        <button id="delete" name="borrar" type="submit" >
                            borrar
                        </button>
                        
                        <button class="añadir" id="addEx" name="addEx" type="submit" >
                            Añadir examen
                        </button>
                        
                    	</td>
									
							</tr>
							
							<?php } ?>
							
                        
							
					</form>
			<?php } ?>
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
		<input formaction="pagina_principal_profesor.php" type="submit" name="volver" value="Volver a Inicio">
		<input class="añadir" id="add" formaction="../ALUMNOS/registro_alum.php" type="submit" name="add" value="Añadir Alumno">
	</form>
	<div class="pie">
	<?php
	include_once ("../pie.php");
	?></div>
</body>
</html>
<?php
cerrarConexionBD($conn);
?>		