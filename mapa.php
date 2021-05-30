<?php	
	require('conexion.php');
	
	$email = $_POST['correo'];
	$psw = $_POST['pass'];
	$AP = $_POST['ApellidoP'];
	$AM = $_POST['ApellidoM'];
	$nombre = $_POST['Nombre'];
	$tel = $_POST['Telefono'];
	$perfil = $_POST['perfil'];
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
    <span>UN PASO MAS</span>
    </p>
    <form role="form1" action="register2.php" method="post">
    <h1>Cuenta</h1>  
      <div class="form-group">
      <br>
      <label for="nombre">Datos Públicos</label>
      <br>
      <div class="row">
        <div class="col-xs-4"><input required="true" name="codigoP" type="text" class="form-control" id="ejemplo_3"
                 placeholder="Codigo Postal"></div>
      </div>
      <br>
        <label for="delegacion">Delegación</label>
        <select class="form-control" name="selector">
          <option value="Álvaro Obregón">Álvaro Obregón</option>
          <option value="Azcapotzalco">Azcapotzalco</option>
          <option value="Benito Juárez">Benito Juárez</option>
          <option value="Coyoacán">Coyoacán</option>
          <option value="Cuajimalpa de Morelos">Cuajimalpa de Morelos</option>
          <option value="Cuauhtémoc">Cuauhtémoc</option>
          <option value="Gustavo A. Madero">Gustavo A. Madero</option>
          <option value="Iztacalco">Iztacalco</option>
          <option value="Iztapalapa">Iztapalapa</option>
          <option value="La Magdalena Contreras">La Magdalena Contreras</option>
          <option value="Miguel Hidalgo">Miguel Hidalgo</option>
          <option value="Milpa Alta">Milpa Alta</option>
          <option value="Tláhuac">Tláhuac</option>
          <option value="Tlalpan">Tlalpan</option>
          <option value="Venustiano Carranza">Venustiano Carranza</option>
          <option value="Xochimilco">Xochimilco</option>
        </select>
      <h1>Horario</h1>
      <p>(Formato: Lunes 12:00)</p> 
      <div id="diainput1" class="row clonedInput col-xs-6">
        <input required="true" name="dia1" type="text" class="form-control" id="dia1" placeholder="Dia">
      </div>
      <div id="horainput1" class="row clonedInput2 col-xs-6"><select required="true" name="hora1" type="text" class="form-control" id="hora1">
	      <option value="7:00">7:00</option>
	      <option value="8:00">8:00</option>
          <option value="9:00">9:00</option>
          <option value="12:00">12:00</option>
          <option value="13:00">13:00</option>
          <option value="14:00">14:00</option>
          <option value="17:00">17:00</option>
          <option value="18:00">18:00</option>
          <option value="19:00">19:00</option>
      </select>
      </div>
      <div class="row col-xs-12">
      <br>
      <input type="button" id="btnAdd" value="+"/>
      <input type="button" id="btnDel" value="-"/>
      </div>
      
      <br>
      <br>
      <br>
      <br>
	  <h1>Selecciona tu ruta:</h1>
	  <p>(en vista de ordenador)</p>
	  <img src="images/compartirmapa1.png" alt="comparte1">
	  <br>
	  <br>
	  <img src="images/compartirmapa2.png" alt="comparte2">
	  <br>
	  <br>
	  <img src="images/compartirmapa3.png" width="100%" alt="comparte3">
	  <br>
	  <br>
	  <br>
	  <a href="#" class="btn btn-warning" onclick="abrirVentana('https://www.google.com/maps/dir//IPN+-+Unidad+Profesional+Interdisciplinaria+de+Ingenier%C3%ADa+y+Ciencias+Sociales+y+Administrativas,+Av.+T%C3%A9+950,+Iztacalco,+Granjas+M%C3%A9xico,+08400+Ciudad+de+M%C3%A9xico,+CDMX,+M%C3%A9xico/@19.4123457,-99.1298593,13z/data=!4m9!4m8!1m0!1m5!1m1!1s0x85d1fc2e3efc321b:0xabf8454acb3a3a99!2m2!1d-99.0927529!2d19.3963804!3e0?hl=es-MX');">Seleccionar Ruta</a>
	  <br><br>

      <div class="row">
        <div class="col-xs-12"><input required="true" name="Ruta" type="text" class="form-control" id="ejemplo_5"
                 placeholder='<iframe>Comparte tu ruta aquí</iframe>'></div>
      </div>
      <br>
      <input type="hidden" name="correo" value="<?php echo $email;?>">
  		<input type="hidden" name="pass" value="<?php echo $psw;?>">
  		<input type="hidden" name="ApellidoP" value="<?php echo $AP; ?>">
  		<input type="hidden" name="ApellidoM" value="<?php echo $AM; ?>">
  		<input type="hidden" name="Nombre" value="<?php echo $nombre; ?>">
  		<input type="hidden" name="Telefono" value="<?php echo $tel; ?>">
  		<input type="hidden" name="perfil" value="<?php echo $perfil; ?>">
      <button type="submit" class="btn btn-default" style="">Enviar</button>
    </form>
    
   </div> <!--fin del contenedor -->
 
	
	<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d60214.07809029133!2d-99.12636126464177!3d19.3959858083287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x85d1fc2e3e794b79%3A0x2904288d17009352!2sUpiicsa%2C+Canela%2C+Granjas+M%C3%A9xico%2C+Ciudad+de+M%C3%A9xico!3m2!1d19.395908199999997!2d-99.0913418!5e0!3m2!1ses-419!2smx!4v1480189086018" width="600" height="300" frameborder="0" style="border:0" allowfullscreen></iframe> -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 	<script src="js/bootstrap.min.js"></script> 
 	<script src="js/campo.js"></script>

	<script>
	function abrirVentana(url) {
    window.open(url, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=800, height=400");
	}
	</script>
	
</body>
</html>