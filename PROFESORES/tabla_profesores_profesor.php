<?php
session_start();
if(isset($_SESSION['inicioP'])){
	$dniP = $_SESSION['inicioP'];
}
else header("Location: login_profesor.php");
	
	
	
	$variable="SELECT DNI_P,NOMBRE_COMPLETO,DIRECCION,AÑOS_CARNE,EMAILP,PUESTO,CONTRASEÑAB,OID_SE FROM PROFESOR";
	require_once( '../gestionBD.php');
	require_once( '../ConsultasPaginadas.php');
	//echo "SESSION...";print_r($_SESSION);
	//echo "<hr> REQUEST...";print_r($_REQUEST);
	
	
	if (isset($_SESSION["prof"])) {
	$prof = $_SESSION["prof"];
	unset($_SESSION["prof"]);
}
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Profesores</title>
	<link rel="stylesheet" type="text/css"  href="../css/estilos.css" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
	<style>
		@media screen and (max-width:680px){
			form input.añadir{display:none;}
		}
	</style>
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
			<div style="overflow-x:auto;">
		<table width="80%" class="tabla">
			<tr >
				<th>DNI</th>
				<th>Nombre y apellidos</th>
				<th>Dirección</th>
				<th>Años de carnet</th>
				<th>Email</th>
				<th>Puesto</th>
				<th>Sede</th>
				<?php if($_SESSION['inicioP'] == '65789578T' ){ ?> <th>Modificaciones</th> <?php } ?>
			</tr>
			<?php
				$filas = consultaBD();
				foreach ($filas as $fila) { ?>
					<form method="POST" action="controlador_profesor.php"> 
						<input name="DNI_P" type="hidden" value="<?php echo $fila["DNI_P"] ?>"/>
						<input name="NOMBRE_COMPLETO" type="hidden" value="<?php echo $fila["NOMBRE_COMPLETO"] ?>"/>
						<input name="DIRECCION" type="hidden" value="<?php echo $fila["DIRECCION"] ?>"/>
						<input name="AÑOS_CARNE" type="hidden" value="<?php echo $fila["AÑOS_CARNE"] ?>"/>
						<input name="EMAILP" type="hidden" value="<?php echo $fila["EMAILP"] ?>"/>
						<input name="PUESTO" type="hidden" value="<?php echo $fila["PUESTO"] ?>"/>
						<input name="OID_SE" type="hidden" value="<?php echo $fila["OID_SE"] ?>"/>
						
							<?php if(isset($prof) and ($prof["DNI_P"]==$fila["DNI_P"])){
									?>					
							<tr>	
									<td><?php echo $fila["DNI_P"] ?></td>
									<td><?php echo $fila["NOMBRE_COMPLETO"] ?></td>
									<td><input name="DIRECCION" type= "text" value = "<?php echo $fila["DIRECCION"] ?>"/> </td>
									<td><input size="4" name="AÑOS_CARNE" type="text" value ="<?php echo $fila["AÑOS_CARNE"] ?>"/> </td>
									<td><?php echo $fila["EMAILP"] ?> </td>
									<td><label for="puesto"> Puesto:</label>
										
																	<select  name="PUESTO" >
																		<option value="teórico" <?php      
																			if ($fila["PUESTO"] == "teórico"){
																				echo "selected";}
																			?> >teórico</option>
																		<option value="práctico" <?php
																			if ($fila["PUESTO"] =="práctico"){
																				echo "selected";}
																			?> >práctico</option>
																		<option value="teórico-práctico" <?php
																			if ($fila["PUESTO"] =="teórico-práctico"){
																				echo "selected";}
																				?> >teórico-práctico</option>
																	</select>
									</td>
									<td><?php echo $fila["OID_SE"] ?> </td>
									
						<?php if($_SESSION['inicioP'] == '65789578T'){ ?>			<td>
										<?php
                    if(isset($prof) and ($prof["DNI_P"]==$fila["DNI_P"]) ) { ?>
                        <!-- Botón de grabar -->
                        <button id="modify" name="grabar" type="submit">
                            grabar
                        </button>
                        <?php } else if($fila["DNI_P"] != '65789578T') { ?>
                        	
                        <!-- Botón de editar -->
                        <button id="modify" name="editar" type="submit">
                            editar
                        </button>
                        
                        <button id="delete" name="borrar" type="submit" >
                            borrar
                        </button>
                    <?php } } ?>
										
									</td>
							</tr>
							
					<?php } else{ ?>
					<tr>
							<td><?php echo $fila["DNI_P"] ?></td>
							<td><?php echo $fila["NOMBRE_COMPLETO"] ?></td>
							<td><?php echo $fila["DIRECCION"] ?> </td>
							<td><?php echo $fila["AÑOS_CARNE"] ?> </td>
							<td><?php echo $fila["EMAILP"] ?> </td>
							<td><?php echo $fila["PUESTO"] ?> </td>
							<td><?php echo $fila["OID_SE"] ?> </td>
						
					<?php if($_SESSION['inicioP'] == '65789578T'){ ?>	<td> <?php
                    if(isset($prof) and ($prof["DNI_P"]==$fila["DNI_P"])) { ?>
                        <!-- Botón de grabar -->
                        <button autofocus id="modify" name="grabar" type="submit">
                            grabar
                        </button>
                        <?php } else if($fila["DNI_P"] != '65789578T') { ?>
                        <!-- Botón de editar -->
                        <button id="modify" name="editar" type="submit">
                            editar
                        </button>
                        
                        <button id="delete" name="borrar" type="submit" >
                            borrar
                        </button
                        <?php } ?>
                    	</td>
									
					</tr>
					<?php } ?>
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
		<input formaction="pagina_principal_profesor.php" type="submit" name="volver" value="Volver a Inicio">
		<?php if($_SESSION['inicioP'] == '65789578T'){ ?> <input class="añadir" id="add" formaction="registro_prof.php" type="submit" name="add" value="Añadir Profesor"> <?php }?>
	</form>
	<?php
		include_once("../pie.php");
	?>
</body>
</html>
<?php
	cerrarConexionBD($conn);
?>		