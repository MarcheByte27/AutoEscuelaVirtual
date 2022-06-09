<?php
session_start();

include_once ("../gestionBD.php");
include_once ("gestionarAlumnos.php");

if (isset($_POST['inicioA'])) {
	$DNI_A = $_POST['DNI_A'];
	$CONTRASEÑAA = $_POST['CONTRASEÑAA'];

	$conexion = crearConexionBD();
	$num_usuarios = consultarAlumno($conexion, $DNI_A, $CONTRASEÑAA);
	cerrarConexionBD($conexion);

	if ($num_usuarios == 0)
		$login = "error";
	else {
		$_SESSION['inicioA'] = $DNI_A;
		Header("Location: pagina_principal_alumno.php");
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
	<body class="body_alumno">
		
		<?php if (isset($login)) {
		echo "<div class=\"error_login\">";
		echo "Error en la contraseña o no existe el alumno.";
		echo "</div>";
	}
	?>
		<div class="contenedor">
			<div class="login">
				<article class="fondo">
					<img src="../images/Logo_completo.png" alt="Purri SL">
					<h3>Inicio de Sesión Alumno</h3>
					<form class=""  method="post">
						<input class="inp" type="text" name="DNI_A" placeholder="Inserte su DNI o NIF" id="DNI_A">
						<br>
						<input class="inp" type="password" name="CONTRASEÑAA" placeholder="Inserte su Contraseña" id="CONTRASEÑAA"<br>
						<div><a href="../PROFESORES/login_profesor.php" class="he">¿Eres Profesor?</a></div>
						<br>
						<a href="../recuperar_pass.php" class="he">¿Olvidaste tu contraseña?</a>
						<input class="boton" type="submit" name="inicioA" value="Iniciar" >
					</form>
				</article>
			</div>

		</div>
	</body>
</html>
