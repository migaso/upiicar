<?php 
	require('conexion.php');

	function kill(){
	unset($_COOKIE["user"]);
	unset($_COOKIE["2"]);
	unset($_COOKIE["perfil"]);
	setcookie("user", null, -1, "/");
	setcookie("2", null, -1, "/");
	setcookie("perfil", null, -1, "/");
	 if(isset($_POST['recuerda'])){
	 unset($_COOKIE["1"]);
	 setcookie("1", null, -1, "/");
	 }
	}

	kill();

	$email = $_POST['correo'];
	$psw = $_POST['pass'];
	$perfil = $_POST['selector'];

	if($perfil == 1){
		$perfil = 'conductor';
	}
	
	if($perfil == 2){
		$perfil = 'usuario';
	}


	if(isset($_POST['recuerda'])){
		$recuerdame = $_POST['recuerda'];
	}

	$query = "SELECT * FROM usuario WHERE usuario.CorrInstitu_Usuario ='$email' AND usuario.Password = md5('$psw')";

	$query2 = "SELECT * FROM conductor WHERE conductor.CorrInstitu_Conductor ='$email' AND conductor.Password = md5('$psw')";

	$resultado=$conexion->query($query); //usuario
	$resultado2=$conexion->query($query2); //conductor

	// echo $psw;

	if(!isset($_COOKIE["user"])){
	$cookie_name = "user";
	$cookie_value = $_POST['correo'];
	$cookie_name3 = "2"; //pass
	$cookie_value3 = md5($_POST['pass']);
	$cookie_name4 = "perfil";
	$cookie_value4 = $perfil;

		if(isset($_POST['recuerda'])){
		$cookie_name2 = "1"; //recuerda
		$cookie_value2 = $recuerdame;
		setcookie($cookie_name, $cookie_value, time() + (31536000), "/");  // 86400 = 1 day
		setcookie($cookie_name3, $cookie_value3, time() + (31536000), "/");  // 86400 = 1 day
		setcookie($cookie_name2, $cookie_value2, time() + (31536000), "/");  // 86400s = 1 day
		setcookie($cookie_name4, $cookie_value4, time() + (31536000), "/");
		}
		else{
		setcookie($cookie_name, $cookie_value, time() + (1800), "/");  // 86400 = 1 day
		setcookie($cookie_name3, $cookie_value3, time() + (1800), "/");  // 86400 = 1 day
		setcookie($cookie_name4, $cookie_value4, time() + (1800), "/");
		}

	}
	

	if(mysqli_num_rows($resultado)>=1):?>

	<!DOCTYPE html>
	<html lang="es">
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title></title>
	</head>
	<body>

		<form style="display: hidden" name="form1" action="perfusu.php" method="post" id="form">
  		<input type="hidden" name="correo" value="<?php echo $email;?>">
  		<input type="hidden" name="pass" value="<?php echo md5($psw);?>">
  		<input type="hidden" name="recuerdame" value="<?php echo $recuerdame; ?>">
  		<input type="hidden" name="perfil" value="<?php echo $perfil; ?>">
		</form>
	
	</body>
	</html>

	<script>
		var perfil="<?php echo $perfil;?>";
		if (perfil == "usuario")
		document.form1.submit();
		else{
		alert("El perfil que elegiste es incorrecto");
		history.back(1);	
		}
	</script>
		
	<?php elseif(mysqli_num_rows($resultado2)>=1): ?>

	<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
	</head>
	<body>
		<form style="display: hidden" name="form2" action="perfcon.php" method="post" id="form">
  		<input type="hidden" name="correo" value="<?php echo $email;?>">
  		<input type="hidden" name="pass" value="<?php echo md5($psw);?>">
  		<input type="hidden" name="recuerdame" value="<?php echo $recuerdame; ?>">
  		<input type="hidden" name="perfil" value="<?php echo $perfil; ?>">
		</form>

		<script>
		var perfil= "<?php echo $perfil; ?>";
		if (perfil == "conductor")
		document.form2.submit();
		else{
		alert("El perfil que elegiste es incorrecto");
		history.back(1);	
		}
	</script>
	</body>
	</html>

	<?php else: ?>
	<script>
		alert("contraseña incorrecta, revise su informacion.");
		function init2(){
		history.back(1);	
		}

		init2();
	</script>

<?php endif?>