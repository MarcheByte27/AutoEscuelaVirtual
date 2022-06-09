<?php
	if(isset($_POST["submit"])) {
		if(!empty($_POST["mail"])){
			$mail = $_POST["mail"];
			if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
				echo "<div class='error'>";
				echo "<p>El email <strong>" . $mail . "</strong> es incorrecto o no esta registrado. </p>";
				echo "</div>";
			} 
			if(filter_var($mail, FILTER_VALIDATE_EMAIL)){ 
				echo "<div class='exito'>";
				echo "<p> Se ha enviado un correo de recuperacion correctamente a <strong> $mail</strong>, por favor revise su bandeja de entrada.</p>";	
    			echo "</div>";
				}
		} else{
			echo "<div class='error_login'>";
			echo "<p> El email no puede estar vacio </p>";
			echo "</div>";
			}
	} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title> Recuperar Contraseña</title>
  <link rel="stylesheet" type="text/css"  href="css/estilos.css" />
  <link rel="stylesheet" type="text/css"  href="css/login.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
	<body class="body_recuperar_pass">
		 <div class="contenedor">

		      <div class="login">
		        <article class="fondo">
		          <img src="images/Logo_completo.png" alt="Purri SL"> 
		          <h3>Recuperar Contraseña</h3>
		          <form class=""  method="post">
		             <input class="inp" type="text" name="mail" placeholder="Inserte su correo electrónico"><br>
		             	<a href="ALUMNOS/login_alumno.php" class="he">Volver a Inicio alumno</a>
		             	<br><hr><br>
						<a href="PROFESORES/login_profesor.php" class="he">Volver a Inicio profesor</a><hr>
		             <input class="boton" type="submit" name="submit" value="Enviar">
		          </form>
		        </article>
		      </div>
	
	    </div>
	</body>
</html>