<?php 
	require('conexion.php');
	
	$email = $_POST['correo'];
	$psw = $_POST['pass'];
	$AP = $_POST['ApellidoP'];
	$AM = $_POST['ApellidoM'];
	$nombre = $_POST['Nombre'];
	$tel = $_POST['Telefono'];
	$perfil = $_POST['perfil'];
	// se agregaron las anteriores variables
	$cp = $_POST['codigoP'];
	$delegacion = $_POST['delegacion'];
	$ruta=$_POST['Ruta'];

	$marca = $_POST['Marca'];
	$modelo = $_POST['Modelo'];
	$placa = $_POST['Placas'];
	$numDP = $_POST['numeroDP'];
	$color = $_POST['Color'];

	$query = "INSERT INTO auto VALUES (NULL, '$numDP', '$placa','$marca','$modelo','$color')";
	$query2 = "SELECT last_insert_id();";

	$dia1 = $_POST['dia1']; $hora1 = $_POST['hora1'];
	$query3 = "INSERT INTO conductor VALUES (NULL, '$email', MD5('$psw'), '$AP', '$AM', '$nombre' , NULL, '$tel', '$ruta', '$delegacion', '$cp', '$hora1', '', '', '', '', NULL, NULL, last_insert_id(), '', '', '')";
	if($_POST['dia2']!=0){
	$dia2 = $_POST['dia2']; $hora2 = $_POST['hora2'];
	$query3 = "INSERT INTO conductor VALUES (NULL, '$email', MD5('$psw'), '$AP', '$AM', '$nombre' , NULL, '$tel', '$ruta', '$delegacion', '$cp', '$hora1', '$hora2', '', '', '', NULL, NULL, last_insert_id() , '', '', '')";
	}
	if($_POST['dia3']!=0){
	$dia3 = $_POST['dia3']; $hora3 = $_POST['hora3'];
	$query3 = "INSERT INTO conductor VALUES (NULL, '$email', MD5('$psw'), '$AP', '$AM', '$nombre' , NULL, '$tel', '$ruta', '$delegacion', '$cp', '$hora1', '$hora2', '$hora3', '', '', NULL, NULL, last_insert_id() , '', '', '')";
	}
	if($_POST['dia4']!=0){
	$dia4 = $_POST['dia4']; $hora4 = $_POST['hora4'];
	$query3 = "INSERT INTO conductor VALUES (NULL, '$email', MD5('$psw'), '$AP', '$AM', '$nombre' , NULL, '$tel', '$ruta', '$delegacion', '$cp', '$hora1', '$hora2', '$hora3', '$hora4', '', NULL, NULL, last_insert_id() , '', '', '')";
	}
	if($_POST['dia5']!=0){
	$dia5 = $_POST['dia5']; $hora5 = $_POST['hora5'];
	$query3 = "INSERT INTO conductor VALUES (NULL, '$email', MD5('$psw'), '$AP', '$AM', '$nombre' , NULL, '$tel', '$ruta', '$delegacion', '$cp', '$hora1', '$hora2', '$hora3', '$hora4', '$hora5', NULL, NULL, last_insert_id(), '', '', '')";
	}
	// se agregan las siguientes variables
	
	// echo $email.' '.$cp.' '.$delegacion.' '.$dia1.' '.$hora1.' '.$perfil.' '.$tel.' '.$ruta;
	
	$resultado = $conexion -> query($query);
	$resultado2 = $conexion -> query($query2);
	$resultado3 = $conexion -> query($query3);
	if($resultado>0 and mysqli_num_rows($resultado2)>=1 and $resultado3>0):?>

 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">
    <meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Gracias</title>
 	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext'>
    <link rel="stylesheet" href="css/style2.css">
 </head>
 <body>
 	<nav class="navbar navbar-default navbar-inverse navbar-static-top example-8 navbar-fixed-top" >
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar8">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand text-hide" href="/UPIICAR">Brand Text
        </a>
      </div>

      <div id="navbar8" class="navbar-collapse collapse">
       <ul class="nav navbar-nav navbar-left">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" ><p id=x class="tamano-menu"><span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> 
 		</p> </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="quienes-somos.html">Quienes somos</a></li>
              <li><a href="mision.html">Misión</a></li>
              <li><a href="vision.html.">Visión</a></li>
              <!-- <li class="divider"></li>
              <li class="dropdown-header">UPIICAR</li>
              <li><a href="#">Iniciar Sesión</a></li>
              <li><a href="#">Registrarte</a></li> -->
            </ul>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="ayuda.html">Ayuda</a></li>
          <li class="color-fondo"><a href="registro.html" id="color-letra"><span class="glyphicon glyphicon-user"></span> Registrate</a></li>
          <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Inicia Sesión</a></li>
          
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>
  
  <div class="contenedor">
  <h1>GRACIAS POR TU PACIENCIA</h1>
  <p>Ahora formas parte de UPIICAR :D. <br> ¡Esperamos sea de tu agrado y compartas una experiencia excelente en cada viaje!</p>
  </div>

  <script type="text/javascript">
  		function init2(){
		window.location="login.html";	
		}
		setTimeout ("init2()",3600); 
  </script>

 <?php else:?>
	<script>
		alert('Problema 222 con el registro, revise su información.');
		window.location="registro.html";
	</script>
 </body>
 </html>
  <?php endif ?>