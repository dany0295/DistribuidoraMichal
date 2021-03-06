<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Atenas, S. A.</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
			<!-- vinculo a bootstrap -->
			<link rel="stylesheet" href="css/bootstrap.css">
			<!-- Temas-->
			<link rel="stylesheet" href="css/bootstrap.min.css">
			<!-- se vincula al hoja de estilo para definir el aspecto del formulario de login-->  
			<link rel="stylesheet" type="text/css" href="text/estilo.css">
		</head>
    </head>
    <body>
		<!-- Contenedor del ícono del Usuario -->
		<div id="Contenedor">
			<div class="Icon">
				<!-- Icono de usuario -->
				<span class="glyphicon glyphicon-user"></span>
			</div>
			
			<div class="ContentForm">
				<form name="FormEntrar" action="index.php" method="post">
					<div class="input-group input-group-lg">
						<span class="input-group-addon id="sizing-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
						<input type="email" class="form-control" name="usuario" placeholder="Correo" id="Correo" aria-describedby="sizing-addon1" required>
					</div>
					<br>
					<div class="input-group input-group-lg">
						<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" name="password" class="form-control" placeholder="******" aria-describedby="sizing-addon1" required>
					</div>
					<br>
					<button class="btn btn-lg btn-primary btn-block btn-signin" id="IngresoLog" name="enviar" type="submit">Entrar</button>
					<!--<div class="opcioncontra"><a href="">Olvidaste tu contraseña?</a></div>-->
				</form>
			</div>
		</div>
		
		<?php
			include_once "Seguridad/conexion.php";
			if (isset($_POST['enviar'])) {
			if ($_POST['usuario'] == '' or $_POST['password'] == '') {
				echo "<script languaje='javascript'>
						alert('Los campos no pueden ir vacios');
						</script>";
			}
			else {
				// Guardamos el nombre del usuario un una variable
				$Usuario= $_POST["usuario"];
				// Encriptamos la contraseña a MD5 para seguridad y lo guardamos en una variable
				$password = md5($_POST['password']);
				
				// Consulta SQL, seleccionamos todos los datos de la tabla y obtenemos solo
				// la fila que tiene el usario especificado
				$query = "SELECT * FROM usuario WHERE usuario='".$Usuario."'";
				if(!$resultado = $mysqli->query($query)){
					echo "Error: La ejecución de la consulta falló debido a: \n";
					echo "Query: " . $query . "\n";
					echo "Errno: " . $mysqli->errno . "\n";
					echo "Error: " . $mysqli->error . "\n";
					exit;
				}
				
				if ($resultado->num_rows == 0) {
					echo "Usuario no registrado";
					exit;
				}
				
				$ResultadoConsulta = $resultado->fetch_assoc();
				if($ResultadoConsulta['Usuario'] = $Usuario){
					if($ResultadoConsulta['PasswordUsuario'] == $password){
						session_start();
						$_SESSION['NombreUsuario'] = $Usuario;
						$_SESSION['ContrasenaUsuario'] = $password;
						$_SESSION['PrivilegioUsuario'] = $ResultadoConsulta['PrivilegioUsuario'];
						header("location:principal.php");
					}
					else{
						echo "Contraseña Erronea";
					}
				}
				else{
						echo "Usuario erroneo";
					}
			}
			}
		?> 
    </body>
</html>