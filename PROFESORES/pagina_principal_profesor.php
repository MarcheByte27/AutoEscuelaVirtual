<?php
session_start();
if(isset($_SESSION['inicioP'])){
	$dniP = $_SESSION['inicioP'];
}
else header("Location: login_profesor.php");

if (isset($_SESSION["registro"])) {
		$_SESSION["registro"] = null;
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title> Inicio</title>
		<link rel="stylesheet" type="text/css"  href="../css/estilos.css" />
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
		<style>
			@media screen and (max-width:680px){
				ul.ppl li.iframe img.img_ppl1{width:70%;left:15%}
						
			}
		</style>
	</head>
	<?php
include_once("../cabecera.php")
	?>
	<ul style="list-style-type: none">
	<li class="user"> <strong><?php echo $dniP ?></strong></li>
	<li><form action="../logout.php">
		<input class="log_out" type="submit" name="cerrar_sesion" value="CERRAR SESIÓN">
	</form></li>
	</ul>
		<form>
		<div class="ppl_up">
			<center>
				<input class="profesores" type="submit" name="profP" value="Profesores" formaction="tabla_profesores_profesor.php">
				<input class="horarios" type="submit" name="horariosP" value="Horarios" formaction="horarios_profesor.php">
				<input class="nosotros" type="submit" name="nosotrosP" value="Nosotros" formaction="nosotros_profesor.php">
			</center>
		</div>
		<div>
			<ul class="ppl" style="list-style-type: none;">
				<li><iframe class="gmap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d243.46100925354338!2d-5.923992407577412!3d37.15799593019346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd1277dc6915f507%3A0x9f38559e04c8c11c!2sCentro%20Formacion%20Conductores%20Purri!5e1!3m2!1ses!2ses!4v1588700383309!5m2!1ses!2ses" width="32%" height="38%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</li>
				<li class="iframe"><img class="img_ppl1" src="../images/Logo_completo.png" alt="AutoEscuela Purri SL"></li>
				<li><img class="img_ppl2" src="../images/ordenadores.png" alt="Ordenadores Purri SL"></li>
			</ul>
		</div>
		<div class="ppl_down">
			<input class="alumnos" type="submit" name="alumP" value="Alumnos" formaction="tabla_alumnos_profesor.php">
			<input class="materialEx" type="submit" name="mExP" value="Material Extra" formaction="material_extra_profesor.php">
			<input class="examenes" type="submit" name="exP" value="Exámenes" formaction="tabla_examenes_profesor.php">
		</div>
	</form>
	
	<?php
	include_once ("../pie.php");
	?>
	</body>
