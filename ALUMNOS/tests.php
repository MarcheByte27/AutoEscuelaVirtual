<?php
session_start();
if(isset($_SESSION['inicioA'])){
	$dniA = $_SESSION['inicioA'];
}
else header("Location: login_alumno.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title> TESTS</title>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Montez|Pathway+Gothic+One" rel="stylesheet">
    <link rel="stylesheet" type="text/css"  href="../css/estilos.css" />
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
	<style>
		@media screen and (max-width:680px){
			img.foto_bus{display:none;}
			img.foto_trailer{display:none;}
			img.foto_tractor{display:none;}
			img.foto_tesla{width:45%;position:absolute;left:5%;}
			img.foto_moto{position:absolute;left:50%;}
			form input.realizar_test{position:absolute;left:15%;margin-top:20%;}
			form input.boton_test{margin-top:20%;}
			}
	</style>
</head>
	<?php
	include_once("../cabecera.php")
	?>


<article class="texto_test">
	<p>A continuación os dejamos un enlace que os 
		llevará a una web en la que encontrareis numerosos tets para todo los tipos de carnet para poder ver vuestro nivel con respecto
		a los temas tratados y esperemos que os ayuden a vuestra progresión.</p>
</article>

<img class="foto_tesla" src="../images/tesla.jpg" alt="Vehículo Tesla">
<img class="foto_bus" src="../images/bus.jpg" alt="Autobus">
<img class="foto_trailer" src="../images/trailer.jpg" alt="Trailer">
<img class="foto_tractor" src="../images/tractor.jpg" alt="Tractor">
<img class="foto_moto" src="../images/moto.jpg" alt="Motocicleta">

<form >
<input class="realizar_test" type="submit" name="realizar_test" value="Acceso a Realizar Test" formaction="https://practicatest.com/tests">

<input class="boton_test" type="submit" name="volver" value="Volver a Inicio" formaction="pagina_principal_alumno.php">
</form>
<?php
	include_once("../pie.php")
	?>
</body>
</html>
