<?php 
	require('conexion.php');

		$correo = $_POST['correo'];
		$name = $_POST['nombre'];
		$cel = $_POST['cel'];
		$perfil = $_POST['selector'];
		$pass = $_POST['psw'];

		
		if($perfil == 'usuario'){
		$query = "SELECT * FROM usuario WHERE (usuario.CorrInstitu_Usuario = '$correo')";

		$resultado = $conexion -> query($query);

		$row=$resultado->fetch_assoc();

		$cel_usu= $row['Tel_Usuario'];

			if($cel_usu == $cel){
			$query2 = "UPDATE usuario SET usuario.Password = md5('$pass') WHERE (usuario.CorrInstitu_Usuario = '$correo')";
			$resultado2 = $conexion -> query($query2);
			echo "<script>alert('tu clave es ha sido guardada exitosamente');</script>";
			}
		}

		if($perfil == 'conductor'){
		$query = "SELECT * FROM conductor WHERE (conductor.CorrInstitu_Conductor = '$correo')";

		$resultado = $conexion -> query($query);

		$row=$resultado->fetch_assoc();

		$cel_usu= $row['Tel_Conductor'];

			if($cel_usu == $cel){
			$query2 = "UPDATE conductor SET conductor.Password = md5('$pass') WHERE (conductor.CorrInstitu_Conductor = '$correo')";
			$resultado2 = $conexion -> query($query2);
			echo "<script>alert('tu clave es ha sido guardada exitosamente');</script>";
			}

		}
?>

		<script>
			window.location="login.html";
		</script>