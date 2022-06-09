<?php
session_start();

include_once ("../gestionBD.php");
include_once ("gestionarProfesores.php");

if (isset($_POST['inicioP'])) {
	$DNI_P = $_POST['DNI_P'];
	$CONTRASEÑAB = $_POST['CONTRASEÑAB'];

	$conexion = crearConexionBD();
	$num_usuarios = consultarProfesor($conexion, $DNI_P, $CONTRASEÑAB);
	cerrarConexionBD($conexion);

	if ($num_usuarios == 0)
		$login = "error";
	else {
		$_SESSION['inicioP'] = $DNI_P;
		Header("Location: pagina_principal_profesor.php");
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="../css/login.css">
		<link rel="stylesheet" type="text/css"  href="../css/estilos.css" />
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Montez|Pathway+Gothic+One" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body class="body_profesor">
		
		<?php if (isset($login)) {
		echo "<div class= 'error_login' >";
		echo "Error en la contraseña o no existe el profesor.";
		echo "</div>";
	}	
		
	?>
		<div class="contenedor">
			<div class="login">
				<article class="fondo">
					<img src="../images/Logo_completo.png" alt="Purri SL">
					<h3>Inicio de Sesión Profesor</h3>
					<form class="" method="post">
						<input class="inp" type="text" name="DNI_P" placeholder="Inserte su DNI o NIF" id= "DNI_P">
						<br>
						<input class="inp" type="password" name="CONTRASEÑAB" id="CONTRASEÑAB"  placeholder="Inserte su Contraseña"<br>
						<div><a href="../ALUMNOS/login_alumno.php" class="he">¿Eres Alumno?</a></div>
						<br>
						<a href="../recuperar_pass.php" class="he">¿Olvidaste tu contraseña?</a>
						<input class="boton" type="submit" name="inicioP" value="Iniciar">
					</form>
				</article>
			</div>

		</div>
		<?php include_once("../pie.php");	?>
	</body>
</html>
