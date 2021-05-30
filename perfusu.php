<?php 
	require('conexion.php');

		if(!isset($_COOKIE['user'])){?>
		<script>
			window.location="login.html";
		</script>
<?php } if($_COOKIE['perfil']!='usuario'){?>  
		<script>
			window.location="perfcon.php";
		</script>
<?php  }
		$correo = $_COOKIE['user'];
		$query = "SELECT * FROM usuario WHERE (usuario.CorrInstitu_Usuario='$correo')";

		$resultado = $conexion -> query($query);
?>

 <!-- <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">
 	<title>Usuario</title>
 </head>
 <body>

 	<h1>HOLA <?php //echo $_COOKIE['user']; ?></h1>
 	<a href="close.php">cerrar sesión</a>
 	
 </body>
 </html> -->

 <!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  	<meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Perfil Acompanante</title>
		
	<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
	<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext'>
	<link rel="stylesheet" href="css/style.css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
	<link href="css/templatemo_style.css"  rel='stylesheet' type='text/css'>
	<link href="css/style3.css"  rel='stylesheet' type='text/css'>
	
</head>
<body>
	<header>
		<nav class="navbar navbar-default navbar-inverse navbar-static-top example-8 navbar-fixed-top" >
		    <div class="container">
		      	<div class="navbar-header">
			        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar8">
			           <span class="sr-only">Toggle navigation</span>
			           <span class="icon-bar"></span>
			           <span class="icon-bar"></span>
			           <span class="icon-bar"></span>
			        </button>
			        <a class="navbar-brand text-hide" href="index.html">Brand Text</a>
		      	</div>

		      	<div id="navbar8" class="navbar-collapse collapse">
			        <ul class="nav navbar-nav navbar-right">
			          	<li class="dropdown ">
				            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" >
					            <p id="user-logo-size" class="tamano-menu">
					            	<span class="glyphicon  glyphicon-user" aria-hidden="true"></span> 
					            	<strong><?php echo $_COOKIE['user'];?></strong>
                       				<span class="glyphicon glyphicon-chevron-down"></span>
					            </p> 
				            </a>
			            
				            <ul class="dropdown-menu" role="menu">
					            <li class="ilumina-blanco">
					            	<div class="navbar-login">
		                                <div class="row">
		                                    <div class="col-lg-4">
		                                        <p class="text-center">
		                                            <span class="glyphicon glyphicon-user icon-size"></span>
		                                        </p>
		                                    </div>
		                                    <div class="col-lg-8">
		                                    	<br>
		                                        <p class="text-left"><strong><?php 
		                                        $row=$resultado->fetch_assoc();
		                                        echo $row['ApPaterno_Usuario'].' '.$row['ApMaterno_Usuario'].' '.$row['Nombre_Usuario'];?></strong></p>
		                                        <p class="text-left small"><?php echo $_COOKIE['user'];?></p>
		     
		                                    </div>
		                                </div>
		                            </div>
					            </li>
					            <li class="divider"></li>
					            <li class="ddd " > <a class="text-color-logout text-center" href="close.php"><i class="glyphicon glyphicon-log-out"></i>  Cerrar sesión</a></li>
					                  <!-- <li class="divider"></li>
					                  <li class="dropdown-header">UPIICAR</li>
					                  <li><a href="#">Iniciar Sesión</a></li>
					                  <li><a href="#">Registrarte</a></li> -->
				            </ul>
				        </li>
		            </ul>
		           
		        </div><!--/.nav-collapse -->
		    </div><!--/.container-fluid -->
		</nav><!--===================================End navbar=====================================================-->
	</header>


	<aside>
		<div class="container">
		    <div class="row profile">
				<div class="col-md-3">
					<div class="profile-sidebar">
						<!-- SIDEBAR USERPIC -->
						<div class="profile-userpic">
							<img src="images/icono-usuario.jpg" class="img-responsive" alt="usuario">
						</div>
						<!-- END SIDEBAR USERPIC -->
						<!-- SIDEBAR USER TITLE -->
						<div class="profile-usertitle">
							<div class="profile-usertitle-name">
								<?php  echo $row['ApPaterno_Usuario'].' '.$row['ApMaterno_Usuario'].' '.$row['Nombre_Usuario']; ?>
							</div>
							<div class="profile-usertitle-job">
								Acompañante	
							</div>
				
						</div>
						<!-- END SIDEBAR USER TITLE -->
						<!-- SIDEBAR BUTTONS -->
						<!--<div class="profile-userbuttons">
							<button type="button" class="btn btn-success btn-sm">Follow</button>
							<button type="button" class="btn btn-danger btn-sm">Message</button>
						</div>-->
						<!-- END SIDEBAR BUTTONS -->
						<!-- SIDEBAR MENU -->
						<div class="profile-usermenu">
							<ul class="nav">
								<li id="prf" class="active">
									<a href="#" onclick="verperf(); ocultarbus(); ocultarcomp();" >
									<i class="glyphicon glyphicon-user"></i>
									Perfil </a>
								</li>
								<li id="prf2" class=" ">
									<a href="#" onclick="ocultarperf(); verbus(); ocultarcomp();">
									<i class="glyphicon glyphicon-search"></i>
									Busqueda de conductores </a>
								</li>
								<li id="prf3" class=" ">
									<a href="#" onclick="ocultarperf(); ocultarbus(); vercomp();" >
									<i class="glyphicon glyphicon-road"></i>
									Compañero conductor elegido </a>
								</li>
								<li>
									<a href="close.php" class="myButtonLink">
									<i class="glyphicon glyphicon-log-out"></i>
									Cerrar sesion </a>
								</li>
							</ul>
						</div>
						<!-- END MENU -->
					</div>
				</div>
				<div class="col-md-9">
		            <div id="info1" class="profile-content verperf">
					   <h1>NOMBRE COMPLETO:</h1>
					   <?php  echo $row['ApPaterno_Usuario'].' '.$row['ApMaterno_Usuario'].' '.$row['Nombre_Usuario']; ?>
					   <h3>TELEFONO:</h3>
					   <?php echo $row['Tel_Usuario']; ?>
		            </div>

		            <div id="info2" class="profile-content busocult">
					   Informacion2 
		            </div>

		            <div id="info3" class="profile-content compocult">
					   Informacion3 
		            </div>
				</div>
			</div>
		</div>

	</aside>

		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
	 <!--========================================Starts Footer===================================================P-->
    <footer class="footer">
        <div class="container footer-container">
    	    <div class="row  row-eq-height">
            	<div class="col-sm-2">
              		<img class="img-responsive " src="https://dl.dropboxusercontent.com/s/10fsel9h7ivy6ce/logo%20upiicar3.png?dl=0" alt="logo">
            	</div>
	            <div class="col-sm-4">
	              	<h4>Sobre nosotros</h4>
	              	<p>Somos un equipo de desarrolladores que quiere un mejor  medio de transporte para la comunidad mas importante de la UPIICSA que son los estudiantes, al usar esta aplicacion web los alumnos que tienen la posibilidad de llegar a la escuela en automovil podran llevar a compañeros como acompañantes de hacia la UPIICSA, y de esta forma traera varios beneficios tanto al conductor como al acompañante. <a style="color:#48D1CC" class="warning" href="barra.html"> conoce mas acerca de los beneficios.</a> </p>
	            </div>
	            <div class="col-sm-3">
	             	<ul>
	                	<li><h5>Siguenos en:</h5></li>
		                <div class='demopadding'>
		                 	<a href="https://www.facebook.com/groups/1037551816320058/"><li class='icon social fb'><i class='fa fa-facebook'></i></li></a>
		                  	<li class='icon social tw'><i class='fa fa-twitter'></i></li>
		                  	<li class='icon social in'><i class='fa fa-linkedin'></i></li>
		                </div> 
	              	</ul>
	            </div>

	            <div class="col-sm-3">
	              	<ul>
		                <li><h5>Desarrollado por:</h5></li>
		                <li>Caro</li>
		                <li>Charly</li>
		                <li><a href="https://mx.linkedin.com/in/fausto-hernández-693536126">Fausto Hernández Ortiz</a></li>
		                <li>Felipe</li>
		                <li>Migue</li>
	              	</ul>
	            </div>
            </div><!--end div row1-->
        </div><!--end div container-->  
        <div class="row row-eq-height footer2">

          	<div class="col-sm-4  col-xs-5 text-left" >
            	<h6>Copyright &copy; 2016 UPIICAR</h6>
          	</div>
          	<div id="color-a-privacidad" class="col-sm-4 col-xs-7 text-center">
            	<a href="privacidad.html"><h6>Privacidad</h6></a>
          	</div>
          	<div class="col-sm-1 col-xs-2">
          		
          	</div>
          	<div id="color-a" class="col-sm-3 text-center">
            	<a href="condiciones.html"><h6>Condiciones</h6></a>
          	</div>
        </div><!--end footer 2-->
    </footer><!--end footer-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script type="text/javascript">
    function ocultarperf() {
    	document.getElementById('info1').className = "perfocult";
    	document.getElementById('prf').className = " ";
    }

    function verperf() {
    	document.getElementById('info1').className = "profile-content verperf";
    	document.getElementById('prf').className = "active";
    }

    function ocultarbus() {
    	document.getElementById('info2').className = "busocult";
    	document.getElementById('prf2').className = " ";
    }

    function verbus() {
    	document.getElementById('info2').className = "profile-content verbus";
    	document.getElementById('prf2').className = "active";
    }

    function ocultarcomp() {
    	document.getElementById('info3').className = "compocult";
    	document.getElementById('prf3').className = " ";
    }

    function vercomp() {
    	document.getElementById('info3').className = "profile-content vercomp";
    	document.getElementById('prf3').className = "active";
    }

    </script>
</body>
</html>