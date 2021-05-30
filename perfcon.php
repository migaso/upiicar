<?php 
	require('conexion.php');

	if(!isset($_COOKIE['user'])){?>
		<script>
			window.location="login.html";
		</script>
<?php } if($_COOKIE['perfil']!='conductor'){?>  

		<script>
			window.location="perfusu.php";
		</script>
<?php  }
		$correo = $_COOKIE['user'];
		$query = "SELECT * FROM conductor INNER JOIN auto ON conductor.ID_Auto=auto.ID_Auto WHERE (conductor.CorrInstitu_Conductor = '$correo')";
		$query2 = "SELECT * FROM conductor INNER JOIN usuario ON conductor.ID_Conductor=usuario.ID_Conductor WHERE (conductor.CorrInstitu_Conductor = '$correo')";
		// $query = "SELECT * FROM auto WHERE (auto.ID_Auto='$correo')";
		$resultado = $conexion -> query($query);
		$resultado2 = $conexion -> query($query2);
?>

<!--  <!DOCTYPE html>
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
	<title>Perfil Conductor</title>
		
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
		                                        $row=$resultado->fetch_assoc();
		                                        echo $row['ApPaterno_Conductor'].' '.$row['ApMaterno_Conductor'].' '.$row['Nombre_Conductor'];?></strong></p>
		                                        <p class="text-left small"><?php echo $correo; ?></p>
		     
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
								<?php echo $row['ApPaterno_Conductor'].' '.$row['ApMaterno_Conductor'].' '.$row['Nombre_Conductor']; ?>
							</div>
							<div class="profile-usertitle-job">
								Conductor	
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
									<a href="#" onclick="verperf(); ocultarbus(); ocultarcomp(); ocultarsol();" >
									<i class="glyphicon glyphicon-user"></i>
									Perfil </a>
								</li>
								<li id="prf2" class="" >
									<a href="#"  onclick="ocultarperf(); verbus(); ocultarcomp(); ocultarsol();" >
									<i class="glyphicon glyphicon-wrench"></i>
									Automovil </a>
								</li>
								<li id="prf3" class="" >
									<a href="#" onclick="ocultarperf(); ocultarbus(); vercomp(); ocultarsol();" >
									<i class="glyphicon glyphicon-road"></i>
									Mi ruta y horario</a>
								</li>
								<li id="prf4" class="" >
									<a href="#" onclick="ocultarperf(); ocultarbus(); ocultarcomp(); versol();" >
									<i class="glyphicon glyphicon-envelope"></i>
									Solicitudes de acompañantes </a>
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
						   				<p><strong>Nombre</strong>    <?php echo $row['Nombre_Conductor']; ?></p>
						   			</div>
						   			
						   			<div class="col-md-4 col-sm-4 green">
						   				<p><?php echo $row['ApPaterno_Conductor'].' '.$row['ApMaterno_Conductor'];?></p>
						   			</div>

						   			<!-- <div class="col-md-4 col-sm-4 blue">
						   				<p><strong>Carrera</strong>    MiCarrera</p>
						   			</div -->
						   		</div>
						   		<div class="divider"></div>
						   		<div class="row is-flex">
						   			<div class="col-md-6 col-sm-6 red">
						   				<p><strong>Correo Institucional </strong><?php echo $_COOKIE['user'];?></p>
						   			</div>
						   		

						   			<div class="col-md-6 col-sm-6 blue">
						   				<p><strong>Telefono</strong> <?php echo $row['Tel_Conductor']; ?></p>
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
						   				<p><strong>Acerca de ti.</strong></p>
						   				<div class="container-fluid">
										  <form name="form_ini" action="descripcion.php" method="post">
										    <div class="form-group">
										      <label for="comment"><?php echo $row['MiniBiblio_Conductor'];  ?></label>
										      <br><br>
										      <textarea class="form-control" rows="5" name="agrega_comment_con" id="comment" placeholder="Escribe una breve descripción sobre tu semestre, carrera o lo que desees dar a conocer, este texto se mostrara a tus acompañantes." required data-validation-required-message="coloca tu mensaje."></textarea>
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






					<div id="info2" class="profile-content busocult tipo-texto">
					
					   <div class="container-fluid">
					   		<div class="text-center">
					   			<h2>Automovil</h2>
					   		</div>
					   		<div class="divider1"></div>
					   </div>
					   <div class="margen-info">
						   <div class="container-fluid  ">
						   		<div class="row ">
						   			<div class="col-md-12 col-sm-12 ">
						   				<p><strong>Informacion general del automovil</strong></p>
						   			</div>
					   				
						   				
						   		</div>
						   		<div class="divider"></div>
						   		<div class="row is-flex">
						   			<div class="col-md-4 col-sm-4 red">
						   				<p><strong>Marca</strong>    <?php echo $row['Marca_Auto']; ?></p>
						   			</div>
						   			
						   			<div class="col-md-4 col-sm-4 green">
						   				<p><strong>Modelo</strong>    <?php echo $row['Modelo_Auto']; ?></p>
						   			</div>

						   			<div class="col-md-4 col-sm-4 blue">
						   				<p><strong>Color</strong>    <?php echo $row['Color_Auto']?></p>
						   			</div>
						   		</div>
						   		<div class="divider"></div>
						   		<div class="row is-flex">
						   			<div class="col-md-6 col-sm-6 red">
						   				<p><strong>Numero de placa</strong>    <?php echo $row['NoPlacas_Auto']?></p>
						   			</div>
						   		

						   			<div class="col-md-6 col-sm-6 blue">
						   				<p><strong>Numero de asientos</strong> <?php echo $row['NoAsientos_Auto']; ?></p>
						   			</div>
						   		</div>
						   		<!--
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
										  <form>
										    <div class="form-group">
										      <label for="comment">Escribe una breve descripción sobre tu semestre, carrera o lo que quieras, este texto sera tu introduccion con tu companero conductor:</label>
										      <textarea class="form-control" rows="5" id="comment"></textarea>
										      	<p><a class="btn btn-block btn-orange" href="#" role="button" type="submit" value="Buscar">Buscar</a></p>
										    </div>
										  </form>
										</div>
						   			</div>	
						   		</div> --><!-- Se pueden anadir posteriormente mas campos  -->
						   	
						   </div>
						</div>
		            </div><!--Fin info 2-->


		            <div id="info3" class="profile-content busocult tipo-texto">
					
					   <div class="container-fluid">
					   		<div class="text-center">
					   			<h2>Mi ruta y horario</h2>
					   		</div>
					   		<div class="divider1"></div>
					   </div>
	

					   <div class="margen-info">
						   <div class="container-fluid ">
					   			<div class=" margin-bottom-busqueda2"><!--Bloque de busqueda-->
						   		
						   		
							   		<div class="row  fondo-busqueda">
							   			<div class="col-md-6 col-sm-6 col-xs-12 ">
											<div class="templatemo-contact-map" id="map-canvas"> </div>  
												<label for="mapa">Ruta:</label>
												<div class="map-responsive">
													<?php echo $row['Ruta'];?>
												</div>
											
											<div class="clearfix"></div>
										</div>
							   		

							   			<div class="col-md-6 col-sm-6 col-xs-12  ">
							   				<div class="container-fluid ">
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
											        <td><?php echo $row['Lunes'];?></td>
											        <td><?php echo $row['Martes'];?></td>
											        <td><?php echo $row['Miercoles'];?></td>
											        <td><?php echo $row['Jueves'];?></td>
											        <td><?php echo $row['Viernes'];?></td>

											      </tr>
					
											    </tbody>
											    </table>
											    <div class="row">
											    	<br>
											    	<p class="text-center"><strong>Desvio maximo de ruta: </strong> 10 min</p>
											  	
											    </div>

											</div>
							   			</div>
							   		</div><!--Fin row fondo busqueda-->
							   	  
								</div><!--Fin margin bottom busqueda2-->
							</div><!--Fin container-fluid-->
						</div><!--Fin Margin info -->
		            </div><!--Fin info 2-->



		            <div id="info4" class="profile-content solocult">
<?php $incremento = 0; 
	  while ($row2=$resultado2->fetch_assoc()){

			$incremento = 1 + $incremento;
			if($row2['Aceptacion']=='espera'){ ?>
					<div class="container-fluid">
					   		<div class="text-center">
					   			<h2>Nueva Solicitud de acompa&ntildeante</h2>
					    	</div>
					   		<div class="divider1"></div><!--Linea divisioria-->
					    </div>
					    <div class="margen-info">
					    
	            			<div class="container-fluid">
		            			<div class=" margin-bottom-busqueda"><!--Bloque de busqueda-->
							   		<div class="row fondo-busqueda">
						   				<div class="col-md-6 col-sm-6 col-xs-6">
							   				<p><strong>Nombre: </strong><?php echo $row2['ApPaterno_Usuario'].' '.$row2['ApMaterno_Usuario'].' '.$row2['Nombre_Usuario'];?></p>
							   			</div>
							   			<div class="col-md-6 col-sm-6 col-xs-6">
							   				 <p><strong>Origen: </strong> <?php echo $row['Delegacion'];?></p>
							   			</div>
							  
						   				<div class="container-fluid ">


											<div class="col-md-4 col-sm-4 col-xs-12 center-block">
												<div class="templatemo-contact-map" id="map-canvas"> </div>  
													<img src="images/icono-usuario.jpg" class="img-responsive  " alt="usuario">
												
												<div class="clearfix"></div>
											</div>
							   				<div class="col-md-8 col-sm-8 col-xs-12 center-block ">
							   					<div class="tam-imagen-busqueda profile-userpic2  ">
							   						<p><strong>Descripcion:</strong><br>
							   						<?php echo $row2['MiniBiblio_Usuario'];?>

							   						</p>
													
													<p><strong>Contacto:</strong><br>
												    <ul>
												    	<li>Telefono: <?php echo $row2['Tel_Usuario'];?></li>
												    	<li>Correo:<?php echo $row2['CorrInstitu_Usuario'];?></li>
												    	<li>FaceBook: <?php echo $row2['URLFace_Usuario'];?></li>
												    </ul>
												    </p>
												    <div class="row">
												    	<div class="col-md-6 col-sm-6 col-xs-6">
												    		<button class="btn btn-block btn-orange" href="#" role="button" onclick="document.form<?php echo $incremento; ?>.submit();return false">Aceptar Solicitud</button>
												    	</div>
												    	<div class="col-md-6 col-sm-6 col-xs-6">	
												     		<button class="btn btn-block btn-green" href="#" role="button" onclick="document.forn<?php echo $incremento;?>.submit();return false">Declinar Solicitud</button>
												    	</div>
												    </div>

										
												</div>

							   				</div>
						   				</div>
						   			</div><!--Fin row de busqueda-->
						   		</div><!--Bloque de busqueda-->
					   		</div><!--Fin container fluid-->
					   	</div><!--Fin margin-info -->
		           <?php } if($row2['Aceptacion']=='aceptado'){?>
		           <div class="container-fluid">
					   		<div class="text-center">
					   			<h2>Acompañante</h2>
					    	</div>
					   		<div class="divider1"></div><!--Linea divisioria-->
					    </div>
		           <div class="margen-info">
	            			<div class="container-fluid">
		            			<div class=" margin-bottom-busqueda"><!--Bloque de busqueda-->
							   		<div class="row fondo-busqueda">
						   				<div class="col-md-6 col-sm-6 col-xs-6">
							   				<p><strong>Nombre: </strong><?php echo $row2['ApPaterno_Usuario'].' '.$row2['ApMaterno_Usuario'].' '.$row2['Nombre_Usuario'];?></p>
							   			</div>
							   			<div class="col-md-6 col-sm-6 col-xs-6">
							   				 <p><strong>Origen: </strong> <?php echo $row['Delegacion'];?></p>
							   			</div>
							  
						   				<div class="container-fluid ">


											<div class="col-md-4 col-sm-4 col-xs-12 center-block">
												<div class="templatemo-contact-map" id="map-canvas"> </div>  
													<img src="images/icono-usuario.jpg" class="img-responsive  " alt="usuario">
												
												<div class="clearfix"></div>
											</div>
							   				<div class="col-md-8 col-sm-8 col-xs-12 center-block ">
							   					<div class="tam-imagen-busqueda profile-userpic2  ">
							   						<p><strong>Descripcion:</strong><br>
							   						<?php echo $row2['MiniBiblio_Usuario'];?>

							   						</p>
													
													<p><strong>Contacto:</strong><br>
												    <ul>
												    	<li>Telefono: <?php echo $row2['Tel_Usuario'];?></li>
												    	<li>Correo: <?php echo $row2['CorrInstitu_Usuario'];?></li>
												    	<li>FaceBook: <?php echo $row2['URLFace_Usuario'];?></li>
												    </ul>
												    </p>
												    <div class="row">
												    	<div class="col-md-6 col-sm-6 col-xs-6">	
												     		<p><a class="btn btn-block btn-green" href="#" role="button" onclick="document.fora<?php echo $incremento;?>.submit();return false">Declinar Solicitud</a></p>
												    	</div>
												    </div>

										
												</div>

							   				</div>
						   				</div>
						   			</div><!--Fin row de busqueda-->
						   		</div><!--Bloque de busqueda-->
					   		</div><!--Fin container fluid-->
					   	</div><!--Fin margin-info -->
					<?php }?> 
		<form style="display: hidden" name="form<?php echo $incremento;?>" action="aceptar.php" method="post">
  		<input type="hidden" name="usuario" value="<?php echo $row2['CorrInstitu_Usuario'];?>">
		</form>
		<form style="display: hidden" name="forn<?php echo $incremento;?>" action="rechazar.php" method="post">
  		<input type="hidden" name="usuario" value="<?php echo $row2['CorrInstitu_Usuario'];?>">
		</form>
		<form style="display: hidden" name="fora<?php echo $incremento;?>" action="rechazar.php" method="post">
  		<input type="hidden" name="acompanante" value="<?php echo $row2['CorrInstitu_Usuario'];?>">
		</form>
		<?php }?>
		           </div><!--Fin info4-->
				</div>
			</div>
		</div><!--container -->

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

    function ocultarsol() {
    	document.getElementById('info4').className = "solocult";
    	document.getElementById('prf4').className = " ";
    }

    function versol() {
    	document.getElementById('info4').className = "profile-content versol";
    	document.getElementById('prf4').className = "active";
    }

    // function acepta(){
    // 	var correo = document.getElementById('usuario_correo').innerHTML;
    // 	document.getElementById('usuario').value = correo;
    // 	document.form2.submit();
    // }
    </script>
</body>
</html>