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
  <title> Material Extra</title>
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Montez|Pathway+Gothic+One" rel="stylesheet">
  <link rel="stylesheet" type="text/css"  href="../css/estilos.css" />
  <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
  <style> 	
  	@media screen and (max-width:680px){
				article.texto_material_extra{margin:5% 5% 5% 5%;position:absolute;left:0%;width:90%;height:50%;}
				div.foto_material_extra{display:none;}	
				div div.texto_enlace_youtube{display:none;}
				div div.texto_enlace_blog{display:none;}
				div div.texto_enlace_blog2{display:none;}
				div div.texto_enlace_documento1{display:none;}
				div h5.enlaces{margin:12% 5% 5% 5%; width:90%; position:absolute;left:2%;}
				div a img.logo_youtube{margin:10% 2% 0% 2%; width:20%;position:absolute;left:2%;}
				div a img.logo_doc{margin:10% 2% 0% 2%; width:20%;position:absolute;left:25%;}
				div a img.logo_doc2{margin:10% 2% 0% 2%; width:20%;position:absolute;left:50%;}
				div a img.logo_doc3{margin:10% 2% 0% 2%; width:20%;position:absolute;left:75%;}
				div.pie{width:100%;}	
  </style>
</head>
	<?php
	include_once("../cabecera.php")
	?>	
<article class="texto_material_extra">
	<h1>PREGUNTAS MÁS FRECUENTES</h1>
	<p><strong>-¿Qué vehículos puedo conducir con mi permiso B?</strong></p>
	<p><em>Una vez superados todos los requisitos y maniobras 
	para la obtención del permiso de conducción B, dispondrás
	 de autorización para conducir los siguientes vehículos:
	 <blockquote><em>• Automóviles cuya masa máxima autorizada no exceda de 3.500 kg
	 que estén diseñados y construidos para el transporte de no más 
	 de ocho pasajeros además del conductor. Dichos automóviles podrán 
	 llevar enganchado un remolque cuya masa máxima autorizada no exceda de 750kg.</em></blockquote>
	<blockquote><em>• Conjuntos de vehículos acoplados compuestos por un vehículo tractor 
	de los que autoriza a conducir el permiso de la clase B y un remolque 
	cuya masa máxima autorizada exceda de 750 kg, siempre que la masa máxima 
	autorizada del conjunto no exceda de 4.250 kg, sin perjuicio de las disposiciones 
	que las normas de aprobación de tipo establezcan para estos vehículos.</em></blockquote>
	<blockquote><em>• Triciclos y cuatriciclos de motor.
	La edad mínima para obtenerlo será de dieciocho años cumplidos. 
	No obstante, hasta los veintiún años cumplidos no autorizará a conducir 
	triciclos de motor cuya potencia máxima exceda de 15 kW.</em></blockquote>
	
	<p><strong>-¿Cuándo me puedo examinar?</strong></p>
	<p><em>Los principales requisitos que debes cumplir para poderte 
	presentarte a examen son:</em></p>
	<blockquote><em>1. Tener preparado el examen.</em></blockquote>
	<blockquote><em>2. DNI/NIE en vigor y ser residente español (en caso de extranjeros demostrar
	 6 meses de residencia en España).</em></blockquote>
	<blockquote><em>3. Tener 18 años cumplidos.</em></blockquote>
	
	<p><strong>-¿Es necesario conocer las zonas por las que se desarrolla el examen práctico?</strong></p>
	
	<p><em>La primera parte del examen práctico consiste en conducción autónoma, por lo que es imprescindible conocer bien el recorrido habitual de examen. Los alumnos de Autoescuela GO!!! empiezan y terminan sus clases en zona de examen, por lo que no pierden tiempo de sus clases en desplazamientos.</em></p> 
	
	<p><strong>-¿Qué documentos necesito presentar para los examenes?</strong></p>
	<p><em>2 fotos de carnet,
	1 fotocopia del DNI,
	Certificado médico y
	Firmar la solicitud de examen (la proporcionamos en la autoescuela)</em></p>
	
	<p><strong>-¿Cómo es el examen teórico?</strong></p>
	<p><em>Es un examen tipo test que se realiza por ordenador.
	Dispones de 30 minutos para responder a las 30 preguntas.
	Está permitido un máximo de 3 fallos para aprobar el examen (10 % de errores).
	En la teórica específica (autobús, camión, moto, ciclomotor, etc.) serán 20 preguntas y 2 fallos.
	El resultado se comunica a la autoescuela al día siguiente laboral, 
	pudiendo ser consultado también a través de la página de la DGT, 
	cuyo enlace está disponible en esta misma web.</em></p>
	
	<p><strong>-¿Cómo es el examen práctico?</strong></p>
	<p><em>El examen práctico de conducir dura unos 25 minutos. Al inicio de la prueba,
	 el examinador puede pedir al alumno que verifique los frenos, el aceite, 
	 los faros, etc., para comprobar si conoce el vehículo. Después, le indicará un destino 
	 y deberá llegar a él sin recibir más instrucciones; es lo que se conoce como conducción autónoma.
	  Durante el tiempo restante de la prueba, el alumno será guiado por el examinador.</em></p>
</article>
	
<div>

	<h5 class="enlaces">ENLACES DE AYUDA PARA LA FORMACIÓN DEL ALUMNADO</h5>
	
	<div class="foto_material_extra">
		<img class="foto_material_extra" src="../images/ordenadores.png" alt="Pregúntanos">
	</div>
	
	<a title="Youtube" href="https://www.youtube.com/user/AutoescuelaGala"><img class="logo_youtube" src="../images/logo_youtube.png" alt="Logo Youtube" ></a>
	
	<a title="Documento" href="https://practicatest.com/temario"><img class="logo_doc" src="../images/Documento.png" alt="documento" ></a>
	
	<a title="Blog" href="https://blog.directseguros.es/que_se_entienda/examen-teorico-de-conducir-test-autoescuela/"><img class="logo_doc2" src="../images/blog.png" alt="Blog" ></a>
	
	<a title="Blog" href="https://blog.reale.es/carnet-conducir/"><img class="logo_doc3" src="../images/blog.png" alt="Blog" ></a>
	
	<div class="texto_enlace_youtube"><p>Enlace a canal de Youtube donde se muestran videos explicativos de diversos temas a tratar</p></div>
	<div class="texto_enlace_documento1"><p>Temario sobre los contenidos de los carnets</p></div>
	<div class="texto_enlace_blog"><p>Acceso a <strong>Blog</strong> con pautas para una mejor realización del examen teórico</p></div>
	<div class="texto_enlace_blog2"><p>Acceso a <strong>Blog</strong> donde se explica todo lo relacionado con la conducción</p></div>
</div>	



<form >
<input class="boton_material" type="submit" name="volver" value="Volver a Inicio" formaction="pagina_principal_profesor.php">
</form>

</body>
<div class="pie">
<?php
		include_once("../pie.php");
	?>
</div>
</html>