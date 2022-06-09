<?php
session_start();
if(isset($_SESSION['inicioP'])){
	$dniA = $_SESSION['inicioP'];
}
else header("Location: login_profesor.php");
?>




<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css"  href="../css/estilos.css" />
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
		<style>
			div.txt_hor{width:50%;position:relative;left:25%;}
			form.b_volver input{position:relative;left:25%;}
			@media screen and (max-width:680px){
				div.foto_hor img{display:none;}
				div.txt_hor{position:relative;left:0%;}
				form.b_volver input{position:relative;left:5%;}
			}
		</style>
		<title> Horario </title>
	</head>
	<?php
include_once("../cabecera.php")
	?>
	<body>
<hr>
	<div style="overflow-x:auto;">
		<table style="position:relative;bottom:80%;margin-left:auto;margin-right:auto;" width="70" id= "tabla" class="tabla">
			<tr>
				<th scope="row">HORAS</th>
				<th>LUNES</th>
				<th>MARTES</th>
				<th>MIÉRCOLES</th>
				<th>JUEVES</th>
				<th>VIERNES</th>
				<th>SÁBADO</th>
				<th>DOMINGO</th>
			</tr>
			<tr>
				<th>10:30-12:30</th>
				<td>ABIERTO</td>
				<td>ABIERTO</td>
				<td>ABIERTO</td>
				<td>ABIERTO</td>
				<td>ABIERTO</td>
				<td>ABIERTO</td>
				<td>CERRADO</td>
			</tr>
			<tr>
				<th>12:30-13:30</th>
				<td>TEORÍA</td>
				<td>ABIERTO</td>
				<td>TEORÍA</td>
				<td>ABIERTO</td>
				<td>TEORÍA</td>
				<td>ABIERTO</td>
				<td>CERRADO</td>
			</tr>
			<tr>
				<th>13:30-17:00</th>
				<td>CERRADO</td>
				<td>CERRADO</td>
				<td>CERRADO</td>
				<td>CERRADO</td>
				<td>CERRADO</td>
				<td>CERRADO</td>
				<td>CERRADO</td>
			</tr>
			<tr>
				<th>17:00-20:00</th>
				<td>ABIERTO</td>
				<td>ABIERTO</td>
				<td>ABIERTO</td>
				<td>ABIERTO</td>
				<td>ABIERTO</td>
				<td>CERRADO</td>
				<td>CERRADO</td>
			</tr>
			<tr>
				<th>20:00-21:00</th>
				<td>ABIERTO</td>
				<td>TEORÍA</td>
				<td>ABIERTO</td>
				<td>TEORÍA</td>
				<td>ABIERTO</td>
				<td>CERRADO</td>
				<td>CERRADO</td>
			</tr>
		</table>
	</div>
<hr>
		<div class="txt_hor">
			<h >
				* Excepto festivos y vísperas de festivos
			</h>
		</div>
		<form class="b_volver">
		<input type="submit" name="volver" value="Volver a Inicio" formaction="pagina_principal_profesor.php">
		</form>
		<div class="foto_hor">
		<img src="../images/Logo_completo.png" style="position:relative;left:40%;" width="220" >
		</div>
		<?php
		include_once("../pie.php");
	?>
		
	</body>
</html>
