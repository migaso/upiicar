<?php 

	require('conexion.php');
	
	$email = $_POST['correo'];
	$psw = $_POST['pass'];
	$AP = $_POST['ApellidoP'];
	$AM = $_POST['ApellidoM'];
	$nombre = $_POST['Nombre'];
	$tel = $_POST['Telefono'];
	$perfil = $_POST['perfil'];
	// se agregan las siguientes variables
	$cp = $_POST['codigoP'];
	$delegacion = $_POST['selector'];
	$dia1 = $_POST['dia1']; $hora1 = $_POST['hora1'];
	$hora2=0;$hora3=0;$hora4=0;$hora5=0;

	if(isset($_POST['dia2'])){
	$dia2 = $_POST['dia2']; $hora2 = $_POST['hora2'];
	}
	if(isset($_POST['dia3'])){
	$dia3 = $_POST['dia3']; $hora3 = $_POST['hora3'];
	}
	if(isset($_POST['dia4'])){
	$dia4 = $_POST['dia4']; $hora4 = $_POST['hora4'];
	}
	if(isset($_POST['dia5'])){
	$dia5 = $_POST['dia5']; $hora5 = $_POST['hora5'];
	}

	$ruta=(string) $_POST['Ruta'];

	// echo "<br>".$dia2." ".$dia5." ". $dia4." ".$dia2.$hora3;
  ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regitro</title>
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
    
    <p class="background-line" style="color:#5E99FF">
    <span>POR ULTIMO</span>
    </p>
    <form role="form1" action="guardarconductor.php" method="post">
    <h1>Cuenta</h1>  
      <div class="form-group">
      <br>
      <label for="nombre">Datos de Coche</label>
      <br>
      <div class="row">
        <div class="col-xs-4"><input required="true" name="Marca" type="text" class="form-control" id="ejemplo_3"
                 placeholder="Marca"></div>
        <div class="col-xs-4"><input required="true" name="Modelo" type="text" class="form-control" id="ejemplo_3"
                 placeholder="Modelo"></div>
        <div class="col-xs-4"><input required="true" name="Placas" type="text" class="form-control" id="ejemplo_3"
                 placeholder="Placas"></div>
      </div>
      <br>
      <label for="nombre">Pasajeros</label>
      <br>
      <div class="row">
        <div class="col-xs-6">
        <select required="true" name="numeroDP" type="text" class="form-control" id="ejemplo_3" placeholder="Numero de Pasajeros">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        </select>
        </div>
        <div class="col-xs-6"><input required="true" name="Color" type="text" class="form-control" id="ejemplo_3"
                 placeholder="Color"></div>
      </div>

      <br>
      <input type="hidden" name="correo" value="<?php echo $email;?>">
  		<input type="hidden" name="pass" value="<?php echo $psw;?>">
  		<input type="hidden" name="ApellidoP" value="<?php echo $AP; ?>">
  		<input type="hidden" name="ApellidoM" value="<?php echo $AM; ?>">
  		<input type="hidden" name="Nombre" value="<?php echo $nombre; ?>">
  		<input type="hidden" name="Telefono" value="<?php echo $tel; ?>">
  		<input type="hidden" name="perfil" value="<?php echo $perfil; ?>">
  		<input type="hidden" name="codigoP" value="<?php echo $cp;?>">
  		<input type="hidden" name="delegacion" value="<?php echo $delegacion;?>">
  		<input type="hidden" name="dia1" value="<?php echo $dia1; ?>">
  		<input type="hidden" name="dia2" value="<?php echo $dia2; ?>">
  		<input type="hidden" name="dia3" value="<?php echo $dia3; ?>">
  		<input type="hidden" name="dia4" value="<?php echo $dia4; ?>">
  		<input type="hidden" name="dia5" value="<?php echo $dia5; ?>">
  		<input type="hidden" name="hora1" value="<?php echo $hora1; ?>">
  		<input type="hidden" name="hora2" value="<?php echo $hora2; ?>">
  		<input type="hidden" name="hora3" value="<?php echo $hora3; ?>">
  		<input type="hidden" name="hora4" value="<?php echo $hora4; ?>">
  		<input type="hidden" name="hora5" value="<?php echo $hora5; ?>">
  		<input type="hidden" name="Ruta" value='<?php echo $ruta; ?>'>
      
      <button type="submit" class="btn btn-success" style="">Enviar</button>
    </form>
    
   </div> <!--fin del contenedor -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 	<script src="js/bootstrap.min.js"></script> 
 	<script src="js/campo.js"></script>
</body>
</html>
