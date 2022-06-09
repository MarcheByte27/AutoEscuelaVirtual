<?php
    session_start();
    
    if (isset($_SESSION['inicioP'])){
        unset($_SESSION['inicioP']);
		header("Location: PROFESORES/login_profesor.php");
    }
	else if(isset($_SESSION['inicioA'])){
		unset($_SESSION['inicioA']);
		header("Location: ALUMNOS/login_alumno.php");
	}
?>
