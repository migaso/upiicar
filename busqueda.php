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
		$cp = $_GET['cp'];
		$del = $_GET['del'];

		$correo = $_COOKIE['user'];
		// echo "<br><br><br>".$cp.$del;

		if($cp != "" and $del != ""){
		$query = "SELECT * FROM conductor WHERE (conductor.CP='$cp' or conductor.Delegacion='$del')";
		$resultado = $conexion -> query($query);
		}
		if($del != ""){
		$query = "SELECT * FROM conductor WHERE (conductor.Delegacion='$del')";
		$resultado = $conexion -> query($query);
		}
		if($cp != ""){
		$query = "SELECT * FROM conductor WHERE (conductor.CP='$cp')";
		$resultado = $conexion -> query($query);
		}

		
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
  	<meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Busqueda</title>
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
		                                        <p class="text-left"><strong></strong></p>
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
	
	<?php $incremento = 0;
	while($row=$resultado->fetch_assoc()){ $incremento = $incremento + 1;?>

	<div class="container">
		<div class="row">
						   					
						   			<br><br><br>
						   			<div class="col-md-4 col-sm-4 col-xs-4">
						   				<p><strong>Nombre:</strong></p>
						   			</div>
						   			<div class="col-md-3 col-sm-3 col-xs-3">
						   				<p><strong>Origen:</strong></p>
						   			</div>
						   			<div class="col-md-5 col-sm-5 col-xs-5">
						   				<p><strong>Asientos Ocupados:</strong></p>
						   			</div>
						   					
						   		</div>
						   		 <div class=" margin-bottom-busqueda"><!-- Bloque de busqueda -->
							   		<div class="row fondo-busqueda">
						   				<div class="col-md-4 col-sm-4 col-xs-4">
							   				<p><?php echo $row['ApPaterno_Conductor'].' '.$row['ApMaterno_Conductor'].' '.$row['Nombre_Conductor'];?></p>
							   			</div>
							   			<div class="col-md-3 col-sm-3 col-xs-3">
							   				<p><?php echo $row['Delegacion'];?></p>
							   			</div>
							   			<div class="col-md-5 col-sm-5 col-xs-5">
							   				<p><?php echo $row['Ocupados'];?></p>
							   			</div>
						   				<div class="container-fluid ">


											<div class="col-md-6 ">
												<div class="templatemo-contact-map" id="map-canvas"> </div>  
													<label for="mapa">Ruta:</label>
													<div class="map-responsive">
													<?php echo $row['Ruta'];?>

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
											        <td><?php echo $row['Lunes'];?></td>
											        <td><?php echo $row['Martes'];?></td>
											        <td><?php echo $row['Miercoles'];?></td>
											        <td><?php echo $row['Jueves'];?></td>
											        <td><?php echo $row['Viernes'];?></td>

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
												    	<li>Telefono: <?php echo $row['Tel_Conductor'];?></li>
												    	<li>Correo: <?php echo $row['CorrInstitu_Conductor'];?></li>
												    	<li>FaceBook: <?php echo $row['URLFace_Conductor'];?></li>
												    </ul>
												    </p>
												    <a class="btn btn-block btn-orange" href="#" role="button" onclick="document.form_ini<?php echo $incremento;?>.submit();">Enviar Solicitud</a></p>
												</div>

							   				</div>
						   				</div>
						   			</div><!-- Fin row de busqueda -->
						   		</div><!-- Bloque de busqueda -->
						   </div><!-- Fin container-fluid -->
						</div><!-- Fin margen --> 
	
						<form name="form_ini<?php echo $incremento;?>" style="display: hidden" action="elegir.php" method="post">
						<input type="hidden" name="conductor" value="<?php echo $row['ID_Conductor'];?>">
						</form>

	</div>
	<?php }?>
	
</body>
</html>