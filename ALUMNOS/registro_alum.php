<?php
session_start();

if (isset($_SESSION['inicioP'])) {
	$dniP = $_SESSION['inicioP'];
} else
	header("Location: ../PROFESORES/login_profesor.php");

if (!isset($_SESSION["registro"])) {
	$registro["nombre"] = "";
	$registro["apellidos"] = "";
	$registro["dni"] = "";
	$registro["email"] = "";
	$registro["direccion"] = "";
	$registro["edad"] = "";
	$registro["intensivo"] = "";
	$registro["tipocarnet"] = "";
	$registro["sede"] = "";
	$registro["horario"] = "";
	$registro["certificado"] = "0";
	$registro["pass"] = "";
	$registro["confirmpass"] = "";
	$registro['telefono'] = "";
	$_SESSION['registro'] = $registro;
} else {
	$registro = $_SESSION['registro'];
}
if (isset($_SESSION["errores"]))
	$errores = $_SESSION["errores"];
	unset($_SESSION["errores"]);
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title> Registro de alumnos</title>
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
			<h2>REGISTRO DE NUEVOS ALUMNOS</h2> </legend>
		</header>
		<?php
		if (isset($errores) && count($errores) > 0) {
			echo "<fieldset style='width:50%'>";
		} else {
			echo "<fieldset>";
		}
		?>

		<legend align="center">
		AUTOESCUELA PURRI S.L
		</legend>
		<form id="altaAlumno" method="post" action="val_reg_alum.php" onsubmit="return validateForm()">
		<fieldset>
		<legend align="left">
		<em>Datos personales</em>
		</legend>

		<div><label for="nombre">Nombre:</label>
		<input id="nombre" name="nombre" type="text" size="40" value="<?php echo $registro['nombre']; ?>"  required/>
		</div>

		<div><label for="apellidos">Apellidos:</label>
		<input id="apellidos" name="apellidos" type="text" size="59" value="<?php echo $registro['apellidos']; ?>" required/>
		</div>

		<div><label for="dni">DNI:</label>
		<input id="dni" name="dni" type ="text" size="40" placeholder="12345678A" pattern= "^[0-9]{8}[A-Z]" title="8 digitos seguidos de letra mayúscula" value="<?php echo $registro['dni']; ?>" required/>
		</div>

		<div>
		<label for="email">Email:</label>
		<input id="email" name="email" type="email" placeholder="usuario@gmail.com"size="61" value="<?php echo $registro['email']; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required/>
		</div>

		<div>
		<label for="direccion">Direccion:</label>
		<input id="direccion" name="direccion" type="text" maxlength="100" size="58"value="<?php echo $registro['direccion']; ?>" required/>
		</div>

		<div>
		<label for="edad">Edad:</label>
		<input id="edad" name="edad" type="text"  maxlength="3" size="5"value="<?php echo $registro['edad'];?>" pattern="[0-9]{2}" required/>
		</div>

		<div>
		<label for="telefono">Teléfono:</label>
		<input id="telefono" name="telefono" type="text" pattern="[0-9]{9}" maxlength="9" size="10" value="<?php echo $registro['telefono']; ?>" required/>
		</div>

		<div><label> Curso Intensivo: </label>
		<label>
		<input name="intensivo" type="radio" value="1"<?php
			if ($registro['intensivo'] == '1')
				echo ' checked ';
		?>/>
		SI</label>
		<label>
		<input name="intensivo" type="radio" value="0" <?php
			if ($registro['intensivo'] == '0')
				echo ' checked ';
		?> />
		NO</label>
		</div>

		<div><label> Certificado: </label>
		<label>
		<input name="certificado" type="radio" value="1"<?php if($registro['certificado']=='1') ?>/>
		SI</label>
		<label>
		<input name="certificado" type="radio" value="0"<?php if($registro['certificado']=='0') ?>/>
		NO</label>
		</div>

		<div><label for="tipocarnet"> Carnet a cursar:</label>
		<select  name="tipocarnet" id="tipocarnet">
		<option value="AM" <?php
		if ($registro['tipocarnet'] == "AM") {
			echo "selected";
		}
	?> >AM</option>
		<option value="A1" <?php
		if ($registro['tipocarnet'] == "A1") {
			echo "selected";
		}
	?> >A1</option>
		<option value="A2" <?php
		if ($registro['tipocarnet'] == "A2") {
			echo "selected";
		}
	?> >A2</option>
		<option value="A" <?php
		if ($registro['tipocarnet'] == "A") {
			echo "selected";
		}
	?> >A</option>
		<option value="B" <?php
		if ($registro['tipocarnet'] == "B") {
			echo "selected";
		}
	?> >B</option>
		<option value="B+E" <?php
		if ($registro['tipocarnet'] == "B+E") {
			echo "selected";
		}
	?> >B+E</option>
		<option value="C1" <?php
		if ($registro['tipocarnet'] == "C1") {
			echo "selected";
		}
	?> >C1</option>
		<option value="C1+E" <?php
		if ($registro['tipocarnet'] == "C1+E") {
			echo "selected";
		}
	?> >C1+E</option>
		<option value=" D1" <?php
		if ($registro['tipocarnet'] == "D1") {
			echo "selected";
		}
	?> >D1</option>
		<option value="D1+E" <?php
		if ($registro['tipocarnet'] == "D1+E") {
			echo "selected";
		}
	?> >D1+E</option>
		<option value="D" <?php
		if ($registro['tipocarnet'] == "D") {
			echo "selected";
		}
	?> >D</option>
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

		<div><label> Horario: </label>
		<label>
		<input name="horario" type="radio" value="mañana"<?php
			if ($registro['horario'] == 'mañana')
				echo ' checked ';
		?>/>
		Mañana</label>
		<label>
		<input name="horario" type="radio" value="tarde" <?php
			if ($registro['horario'] == 'tarde')
				echo ' checked ';
		?> />
		Tarde</label>
		</div>

		</fieldset>

		<fieldset>
		<div class="registro_alumno">
		<label for="pass">Contraseña</label>
		<input id="pass" name="pass" type="password" size="40" maxlength="20" pattern=".{8,}" oninput="passwordValidation();" value= "<?php echo $registro['pass']; ?>" required/>
		</div>
		<div>
		<label for="confirmpass">Confirmar contraseña</label>
		<input id="confirmpass" name="confirmpass" type="password" size="40" maxlength="40"  pattern=".{8,}" oninput="passwordConfirmation();" value= "<?php echo $registro['confirmpass'];?>" required/>
		<div/>

		</fieldset>

		</fieldset>
		
		<input type="submit" value="Enviar" />
		
		
		</form>
		<form>
		<input type="submit" name="volver" value="Volver a la tabla" formaction="../PROFESORES/tabla_alumnos_profesor.php">
		</form>
		<?php
		include_once ("../pie.php");
	?>
	</body>
</html>
