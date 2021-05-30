<?php 
	require('conexion.php');
	
	$email = $_POST['correo'];
	$psw = $_POST['pass'];
	$AP = $_POST['ApellidoP'];
	$AM = $_POST['ApellidoM'];
	$nombre = $_POST['Nombre'];
	$tel = $_POST['Telefono'];
	$perfil = $_POST['selector'];

	if($perfil == 1){
		$perfil = 'conductor';
		// $query = "INSERT INTO conductor VALUES (NULL, '$email', MD5('$psw'), '$AP', '$AM', '$nombre' , NULL, '$tel', NULL, NULL, ' ', NULL,NULL,NULL,NULL)";
	}

	if($perfil == 2){
		$perfil = 'usuario';
		$query = "INSERT INTO usuario VALUES (NULL, '$email', MD5('$psw'), '$AP', '$AM', '$nombre' , NULL, '$tel', NULL, NULL)";
		$resultado = $conexion -> query($query);
	}

	
	// $time1 = $_GET["hora1"];

	// echo $time1;
 ?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>confirmado</title>
</head>
<body>
	<form style="display: hidden" name="form2" action="mapa.php" method="post" id="form">
  		<input type="hidden" name="correo" value="<?php echo $email;?>">
  		<input type="hidden" name="pass" value="<?php echo $psw;?>">
  		<input type="hidden" name="ApellidoP" value="<?php echo $AP; ?>">
  		<input type="hidden" name="ApellidoM" value="<?php echo $AM; ?>">
  		<input type="hidden" name="Nombre" value="<?php echo $nombre; ?>">
  		<input type="hidden" name="Telefono" value="<?php echo $tel; ?>">
  		<input type="hidden" name="perfil" value="<?php echo $perfil; ?>">
	</form>

	<?php
	if($resultado>0){    ?>
	<script>
	alert("Felicidades ahora es parte de nuestro servicio especial, por favor presiona aceptar e ingresa.")
	function redireccionar(){
	   	window.location="login.html"
	} 
		setTimeout ("redireccionar()",0); 
	</script>

	<?php } else{ ?>

	<script>
		document.form2.submit();
	</script>

<?php } ?>


</body>
</html>
