<!--
	Página principal del proyecto, en esta sección encontraremos el menú del administrador
	27 de marzo del 2018 10:33 AM
-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Atenas, S. A.</title>
		<!-- CSS -->
		<!--<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="fonts/stylesheet.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
	</head>
	<?php
		//include_once 'Seguridad/conexion.php';
		// Incluimos el archivo que valida si hay una sesión activa
		include_once "Seguridad/seguro.php";
		// Si en la sesión activa tiene privilegios de administrador puede ver el formulario
		if($_SESSION["PrivilegioUsuario"] == 'administrador'){
		?>
			<body>
				<header>
					<h1>Estamos trabajando para tener listo el sitio web pronto.</h1>
					<p>El equipo de desarrolladores del Grupo No. 2 del Curso de Base de Datos II, está haciendo su mayor esfuerzo para finalizar el sitio web cuanto antes.</p>
				</header>

				<div id="main">
					<div id="links">
						<div class="home"><a href="../index.php">Inicio</a></div>
					</div>
					<div id="links">
						<div class="CerrarSesion"><a href="Seguridad/logout.php">Cerrar Sesión</a></div>
					</div>
					</form>
				</div>
			</body>
	<?php
	// De lo contrario lo redirigimos al inicio de sesión
		} 
		else{
			echo "usuario no valido";
			header("location:index.php");
        }
    ?>
</html>