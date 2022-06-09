<?php
	session_start();
	if(isset($_SESSION['inicioP'])){
		$dniP = $_SESSION['inicioP'];
	}
	else header("Location: ../PROFESORES/login_profesor.php");

	if (!isset($_SESSION["registro"])) {
		$registro["fecha"] = "";
		$registro["tipo"] = "";
		$_SESSION['registro'] = $registro;
	}
	else {
		 $registro = $_SESSION['registro'];
	}	
	if (isset($_SESSION["errores"]))
		$errores = $_SESSION["errores"];
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
		include_once("../cabecera.php");
	?>
	<?php 
		if (isset($errores) && count($errores)>0) { 
	    	echo "<div id='error' class= 'error' >";
			echo "<h4> Errores en el formulario:</h4>";
    		foreach($errores as $error){
    			echo $error;
			} 
    		echo "</div>";
  		}
	?>
	<header>
		<h2>Añadir nuevos Exámenes</h2> </legend>
	</header>
	
	<fieldset>
		<legend align="center">
			AUTOESCUELA PURRI S.L 
		</legend>
		<form id="altaUsuario" method="post" action="accion_reg_ex.php" novalidate>
			<fieldset>
				
				<div><label for="fecha">Fecha:</label>
				<input name="fecha" type="date" value="<?php echo $registro['fecha'];?>" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" required/>
				</div>
				
				<div><label for="tipo"> Tipo:</label>
				<select  name="tipo" >
					<option value="teórico">teórico</option>
					<option value="práctico">práctico</option>
				</select>
				</div>
			</fieldset>
			
	</fieldset>
	<div>
		<input type="submit" value="Enviar" />
		<input type="submit" name="volver" value="Volver a la tabla" formaction="../PROFESORES/tabla_examenes_profesor.php">
	</div>
	</form>
	<?php
		include_once("../pie.php");
	?>
</body>
</html>