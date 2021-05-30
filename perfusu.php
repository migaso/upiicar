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

		$row=$resultado->fetch_assoc();

		$conductor = $row['ID_Conductor'];

		$query2 = "SELECT * FROM conductor WHERE (conductor.ID_Conductor = '$conductor')";

		$resultado2 = $conexion -> query($query2);

		$row4=$resultado2->fetch_assoc();

		// $conductor = $row4['CorrInstitu_Conductor'];

		//  echo '<br><br><br><br>'.$conductor;
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
	<link href="https://fonts.googleapis.com/css?family=Raleway"  type='text/css' rel="stylesheet">
	
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
						</div><!--End Menu-->
						
					</div><!--End Side bar-->
				</div><!--End column 3-->
				
				<div class="col-md-9"><!-- Bloque de Informacion -->
		            <div id="info1" class="profile-content verperf tipo-texto">
					
					   <div class="container-fluid">
					   		<div class="text-center">
					   			<h2>Perfil</h2>
					   		</div>
					   		<div class="divider1"></div>
					   </div>
					   <div class="margen-info">
						   <div class="container-fluid  ">
						   		<div class="row ">
						   			<div class="col-md-12 col-sm-12 ">
						   				<p><strong>Informacion general</strong></p>
						   			</div>
					   				
						   				
						   		</div>
						   		<div class="divider"></div>
						   		<div class="row is-flex">
						   			<div class="col-md-4 col-sm-4 red">
						   				<p><strong>Nombre</strong>    <?php echo $row['Nombre_Usuario']; ?></p>
						   			</div>
						   			
						   			<div class="col-md-4 col-sm-4 green">
						   				<p><?php echo $row['ApPaterno_Usuario'].' '.$row['ApMaterno_Usuario'];?></p>
						   			</div>

						   			<!-- <div class="col-md-4 col-sm-4 blue">
						   				<p><strong>Carrera</strong>    MiCarrera</p>
						   			</div> -->
						   		</div>
						   		<div class="divider"></div>
						   		<div class="row is-flex">
						   			<div class="col-md-6 col-sm-6 red">
						   				<p><strong>Correo Institucional </strong><?php echo $_COOKIE['user'];?></p>
						   			</div>
						   		

						   			<div class="col-md-6 col-sm-6 blue">
						   				<p><strong>Telefono</strong> <?php echo $row['Tel_Usuario']; ?></p>
						   			</div>
						   		</div>
						   		<div class="divider"></div>
				   				<div class="row ">
						   			<div class="col-md-12 col-sm-12 ">
						   				<p><strong>Redes Sociales</strong></p>
						   			</div>	
						   		</div>

						   		<div class="divider"></div>
						   		<div class="row is-flex">
						   			<div class="col-md-6 col-sm-6 red">
						   				<p><strong>FaceBook </strong>    MiFaceBook</p>
						   			</div>
						   		

						   			<div class="col-md-6 col-sm-6 blue">
						   				<p><strong>Instagram</strong> MiInstagram</p>
						   			</div>
						   		</div>
						   		<div class="divider"></div>
						   		<div class="row ">
						   			<div class="col-md-12 col-sm-12 ">
						   				<p><strong>Escribe algo acerca de ti.</strong></p>
						   				<div class="container-fluid">
										  <form name="form_ini" action="descripcion.php" method="post">
										    <div class="form-group">
										      <label for="comment"><?php echo $row['MiniBiblio_Usuario'];  ?></label>
										      <br><br>
										      <textarea class="form-control" rows="5" name="agrega_comment_usu" id="comment" placeholder="Escribe una breve descripción sobre tu semestre, carrera o lo que desees dar a conocer, este texto se mostrara a tus companeros." required data-validation-required-message="coloca tu mensaje."></textarea>
										      <br>
										      	 <button class="btn btn-block btn-orange" href="#" role="button" type="submit">Guardar</button>
										    </div>
										  </form>
										</div>
						   			</div>	
						   		</div>
						   	
						   </div>
						</div>
		            </div><!--Fin info 1-->


		         

		            <div id="info2" class="profile-content busocult">
					    <div class="container-fluid">
					   		<div class="text-center">
					   			<h2>Busqueda de conductores</h2>
					   		</div>
					   		<div class="divider1"></div><!--Linea divisioria-->
					    </div>
					    <br>
					    <div class="margen-info">
						    <div class="container-fluid  ">

						   		<div class="row is-flex center-block" >
						   			
						   			<form name="form" id="form" method="get">

							   			<div class="col-md-6 col-sm-6 col-xs-12 c red">
							   				  
									    	<p>Delegacion/Mun <input type="text" name="dele-mun" id="del" placeholder="del/mun"></p>
							   			</div>
							   		
							   			<div class="col-md-6 col-sm-6 col-xs-12 blue">
							   				<p>Codigo Postal <input type="text" name="cp" id="cp" placeholder="CP"></p>
							   			</div>

							   			<div class="col-md-12 col-sm-12 col-xs-12 blue text-center ">
							   				
							   				<a class="btn btn-block btn-orange" href="#" type="button" onclick="Abrir_ventana('busqueda.php');" value="Buscar">Buscar</a>
										<!-- <input class="btn btn-block btn-orange" type="submit" name="da"> -->
							   				</div>

						   			</form>
						   		</div>
						   </div><!-- Fin container-fluid -->
						</div><!-- Fin margen  -->
		            </div><!--Fin info 2-->

		            <div id="info3" class="profile-content compocult"><!--omienzo info 3-->
		            	<div class="container-fluid">
					   		<div class="text-center">
					   			<h2>Companero conductor elegido</h2>
					   		</div>
					   		<div class="divider1"></div><!--Linea divisioria-->
					    </div>
					    <br>
					    <div class="margen-info">
						    <div class="container-fluid  ">


					
				   		<div class=" margin-bottom-busqueda"><!--Bloque de busqueda-->
								   		<div class="row fondo-busqueda">
							   				<div class="col-md-6 col-sm-6 col-xs-6">
								   				<p><?php 
		                                        echo $row4['ApPaterno_Conductor'].' '.$row4['ApMaterno_Conductor'].' '.$row4['Nombre_Conductor'];?></p>
								   			</div>
								   			<div class="col-md-6 col-sm-6 col-xs-6">
								   				<p>Delegacion: <?php 
		                                        echo $row4['Delegacion'];?></p>
								   			</div>
								   	
							   				<div class="container-fluid ">


												<div class="col-md-6 ">
													<div class="templatemo-contact-map" id="map-canvas"> </div>  
														<label for="mapa">Ruta:</label>
														<div class="map-responsive">
															<?php 
		                                        echo $row4['Ruta'];?>
														</div>
														<p class="text-center"><strong>Desvio maximo de ruta: </strong> 10 min</p>
																	
													<br>
												    <label for="horario">Horario:</label>           
												    <table class="table table-bordered" id="horario">
												    <thead>
												        <tr>
												        <th>L</th>
												        <th>M</th>
												        <th>Mi</th>
												        <th>J</th>
												        <th>V</th>
												      </tr>
												    </thead>
												    <tbody>
												      <tr>
												      <td><?php 
		                                        	echo $row4['Lunes'];?></td>
												        <td><?php 
		                                        echo $row4['Martes'];?></td>
												        <td><?php 
		                                        echo $row4['Miercoles'];?></td>
												        <td><?php 
		                                        echo $row4['Jueves'];?></td>
												        <td><?php 
		                                        echo $row4['Viernes'];?></td>

												      </tr>
						
												    </tbody>
												    </table>
												 
													
													<div class="clearfix"></div>
												</div>
								   				<div class="col-md-6 center-block ">
								   					<div class="tam-imagen-busqueda profile-userpic2  ">
														<img src="images/icono-usuario.jpg" class="img-responsive  " alt="usuario">
														<br>

														<p><strong>Contacto:</strong><br>
													    <ul>
													    	<li>Telefono: <?php 
		                                        echo $row4['Tel_Conductor'];?></li>
													    	<li>Correo: <?php 
		                                        echo $row4['CorrInstitu_Conductor'];?></li>
													    	<li>FaceBook: <?php 
		                                        echo $row4['URLFace_Conductor'];?></li>
													    </ul>
													    </p>
												
													</div>

								   				</div>
							   				</div>
							   			</div><!--Fin row de busqueda-->
							   		</div><!--Bloque de busqueda-->
						   		   		<div class="row">
						   					
						   			<div class="col-md-4 col-sm-4 col-xs-4">
						   				<p><a class="btn btn-block btn-orange" href="#" role="button" value="Buscar" onclick="document.form2.submit();return false">Dejar de viajar con <?php 
		                                        echo $row4['ApPaterno_Conductor'].' '.$row4['ApMaterno_Conductor'].' '.$row4['Nombre_Conductor'];?>	</a></p>
						   			</div>
						   			<div class="col-md-3 col-sm-3 col-xs-3">
						   				<p><strong>Estado: <?php echo $row['Aceptacion'];?></strong></p>
						   			</div>
						   			<!-- <div class="col-md-5 col-sm-5 col-xs-5">
						   				<p><strong>Estatus:</strong> Activo/Pendiente/Desactivado</p>
						   			</div> -->
						   					
						   		</div>
						   </div><!--Fin container-fluid-->
						</div><!--Fin margen -->
		            </div><!--Fin info3-->
				</div><!--Fin de bloque de informacion -->
			</div><!--Fin row profile-->
		</div><!--Fin container fluid general-->

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
		                <li><a href="https://facebook.com/migue.tapping">Miguel Angel Galvan Soria</a></li>
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

    <form style="display: hidden" name="form2" action="quitar.php" method="post">
  		<input type="hidden" name="conductor" value="<?php echo $row4['CorrInstitu_Conductor'];?>">
	</form>

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

    function Abrir_ventana(pagina) {
			var opciones="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=800,height=350,top=50,left=400";

			var cp = document.getElementById("cp").value;
			var del = document.getElementById("del").value;
   			var pagina2 = pagina +"?cp="+ cp + "&del=" + del;
  			window.open(pagina2,"",opciones);
	}	
    	
    </script>
</body>
</html>