<?php
session_start();
if ($_SESSION['inicioP'] == '65789578T') {
	$dniP = $_SESSION['inicioP'];
} else
	header("Location: login_profesor.php");
if (!isset($_SESSION["registro"])) {
	$registro["nombre"] = "";
	$registro["apellidos"] = "";
	$registro["dni"] = "";
	$registro["email"] = "";
	$registro["direccion"] = "";
	$registro["años_carne"] = "";
	$registro["puesto"] = "";
	$registro["sede"] = "";
	$registro["pass"] = "";
	$registro["confirmpass"] = "";
	$_SESSION['registro'] = $registro;
} else {
	$registro = $_SESSION['registro'];
}
if (isset($_SESSION["errores"]))
	$errores = $_SESSION["errores"];
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title> Registro de profesores</title>
		<link rel="stylesheet" type="text/css"  href="../css/estilos.css" />
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
		<script src="../JS/jquery-3.1.1.min.js" type="text/javascript"></script>
		<script src="../JS/validacion_cliente.js" type="text/javascript"></script>
	</head>

	<body>

		<script>
			$(document).ready(function() {
				$("#alta").on("submit", function() {
					return validateForm();
				});

				$("#pass").on("keyup", function() {
					passwordColor();
				});

			});
		</script>

		<?php
		include_once ("../cabecera.php");
		?>
		<?php
		if (isset($errores) && count($errores) > 0) {
			echo "<div id='error' class= 'error' >";
			echo "<h4> Errores en el formulario:</h4>";
			foreach ($errores as $error) {
				echo $error;
			}
			echo "</div>";
		}
		?>
		<header>
			<h2>REGISTRO DE NUEVOS PROFESORES</h2> </legend>
		</header>

		<?php
		if (isset($errores) && count($errores) > 0) {
			echo "<fieldset style='width:50%'>";
		} else {
			echo "<fieldset>";
		}
		?>

		<div style="overflow-x:auto;">
		<legend align="center">
		AUTOESCUELA PURRI S.L
		</legend>
		<form id="altaUsuario" method="post" action="val_reg_prof.php">
		<fieldset>
		<legend align="left">
		<em>Datos personales</em>
		</legend>

		<div><label for="nombre">Nombre:</label>
		<input id="nombre" name="nombre" type="text" size="40" placeholder="Tu Nombre" value="<?php echo $registro['nombre']; ?>" required/>
		</div>

		<div><label for="apellidos">Apellidos:</label>
		<input id="apellidos" name="apellidos" type="text" size="59" placeholder="Tus Apellidos" value="<?php echo $registro['apellidos']; ?>" required/>
		</div>

		<div><label for="dni">DNI:</label>
		<input id="dni" name="dni" type ="text" size="40" placeholder="12345678A" pattern= "^[0-9]{8}[A-Z]" title="8 digitos seguidos de letra mayúscula" value="<?php echo $registro['dni']; ?>" required/>
		</div>

		<div>
		<label for="email">Email:</label>
		<input id="email" name="email" type="email" placeholder="usuario@gmail.com" size="61"value="<?php echo $registro['email']; ?>" pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required/>
		</div>

		<div>
		<label for="direccion">Dirección:</label>
		<input id="direccion" name="direccion" type="text" placeholder="Tu Direccion completa" maxlength="100" size="58" value="<?php echo $registro['direccion']; ?>" required/>
		</div>

		<div>
		<label for="años_carne">Años de Carné:</label>
		<input name="años_carne" type="text" placeholder="XX" pattern"[0-9]{2}" maxlength="3" size="5"value="<?php //echo $registro['años_carne']; ?>" required/>
		</div>

		<div><label for="puesto"> Puesto:</label>
		<select  name="puesto" >
		<option value="teórico" <?php
		if ($registro['puesto'] == "teórico") {
			echo "selected";
		}
		?> >teórico</option>
		<option value="práctico" <?php
		if ($registro['puesto'] == "práctico") {
			echo "selected";
		}
		?> >práctico</option>
		<option value="teorico-practico" <?php
		if ($registro['puesto'] == "teorico-practico") {
			echo "selected";
		}
		?> >teorico-practico</option>
		</select>
		</div>

		<div><label for="sede"> Sede en la que va a cursar:</label>
		<select  name="sede" id="sede">
		<option value="1" <?php
		if ($registro['sede'] == "1") {
			echo "selected";
		}
		?> >1</option>
		<option value="2" <?php
		if ($registro['sede'] == "2") {
			echo "selected";
		}
		?> >2</option>
		<option value="3" <?php
		if ($registro['sede'] == "3") {
			echo "selected";
		}
		?> >3</option>
		</select>
		</div>
		</fieldset>

		<fieldset>
		<div>
		<label for="pass">Contraseña</label>
		<input id="pass" name="pass" type="password" size="40" maxlength="20" value="<?php echo $registro['pass']; ?>"pattern=".{8,}" oninput="passwordValidation();" required/>
		</div>
		<div>
		<label for="confirmpass">Confirmar contraseña</label>
		<input id="confirmpass" name="confirmpass" type="password" size="40" maxlength="40" value="<?php echo $registro['confirmpass']; ?>" oninput="passwordConfirmation();" pattern=".{8,}" required/>
		<div/>

		</fieldset>

		</fieldset>
		</div>
		<div>
		<input type="submit" value="Enviar" />

		</div>
		</form>

		<form>
		<input type="submit" name="volver" value="Volver a la tabla" formaction="tabla_profesores_profesor.php">
		</form>

		<?php
		include_once ("../pie.php");
		?>
	</body>
</html>