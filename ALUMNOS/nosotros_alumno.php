<?php
session_start();
if(isset($_SESSION['inicioA'])){
	$dniA = $_SESSION['inicioA'];
}
else header("Location: login_alumno.php");
?>

<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Todo sobre Nosotros</title>
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Montez|Pathway+Gothic+One" rel="stylesheet">
		<link rel="stylesheet" type="text/css"  href="../css/estilos.css" />
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
		<style>
			@media screen and (max-width:680px){
				img.foto_nosotros{display:none;}
				div.pie_nos{display:none;}
				div.texto_nosotros{margin-left:3%;width: 50%;}
				form input.boton_nosotros{margin-top:105%;margin-bottom:5%;}
						
			}
		</style>
	</head>
		<?php include_once ("../cabecera.php"); ?>
	<div style="width:100%">
				
		<div style="width:100%;" class="titulo_nos">
			<center><h1>Todo sobre nuestro establecimiento</h1></center>
		</div>	
		
		
		<div class="texto_nosotros">
				<fieldset >
	
				<p>
					Nosotros,<strong>Autoescuela Purri</strong>,tenemos establecimiento en los siguientes lugares donde nos podeis localizar:
				</p>
	
				<blockquote>
					Los Palacios y Villafranca, Avenida de Cádiz Nº 43 y  Calle Martínez Montañés Nº 2.
	
				</blockquote>
				<blockquote>
					Dos Hermanas en la calle Anuel Calvo Leal 8.
				</blockquote>
	
				<p>
					Ofrecemos a nuestros clientes la mejor calidad y el mejor servicio, siempre a la vanguardia de los medios técnicos y educativos.
					Amplios horarios de teórica con explicación de profesores expertos.
					Y por supuesto, disponemos de profesores de práctica altamente cualificados y experimentados.
					Centro homologado por la Junta de Andalucia y el Fondo social Europeo. Nuestros alumnos son nuestro mejor aval.
				</p>
				<p>
					En nuestras instalaciones podrás encontrar toda la ayuda de nuestros expertos para la optención desde carnet básicos como Ciclomotores(A2) y Turismos(B), hasta otros más especializados
					como carnet de autobus,camión con remolque,carnet de mercancias peligrosas. 
					Incluso contamos con servicios para la recuperación de puntos del carnet.
				<p>
				<p>Por favor, no dude en contactar con nosotros para la resolución de cualquier duda o pregunta que tenga. Podrá hacerlo de cualquiera de los siguientes métodos:</p>
				<blockquote>- Acudiendo a algunas de nuestras sedes citadas anteriormente.</blockquote>
				<blockquote>- Llamandonos al <em>955816345</em> </blockquote>
				<blockquote> - Envianos un correo a Autoescuelapurri@hotmail.com </blockquote>
				<p>Esperamos que su progreso con nosotros sea exitoso.</p>
	
			</fieldset>
		</div>
		
		<img src="../images/ordenadores.png" alt="Sala de PC" class="foto_nosotros">	
		
		
		
		
	    <form action="pagina_principal_alumno.php">
			<input type="submit" name="volver" value="Volver a Inicio"  class="boton_nosotros">
		</form>
		
		<div class="pie_nos">
			<?php
				include_once("../pie.php");
			?>
		</div>
		
	</div>
	</body>
</html>