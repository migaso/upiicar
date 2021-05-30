<?php 
	require('conexion.php');

	if(!isset($_COOKIE['user'])){?>
		<script>
			window.location="login.html";
		</script>
<?php } 
		if($_COOKIE['perfil']=='conductor'){
		$correou = $_POST['usuario'];
		$correoc = $_COOKIE['user'];
		$query = "UPDATE usuario SET usuario.Aceptacion = 'aceptado' WHERE (usuario.CorrInstitu_Usuario = '$correou')";
		$resultado = $conexion -> query($query);
		
		$query2 = "SELECT * FROM conductor WHERE (conductor.CorrInstitu_Conductor = '$correoc')";
		$resultado2 = $conexion -> query($query2);
		$row=$resultado2->fetch_assoc();
		$ocupado = 1 + (int)$row['Ocupados'];
		$auto = $row['ID_Auto'];

		// echo $ocupado." ".$auto;

		$query3 = "SELECT * FROM auto WHERE (auto.ID_Auto = '$auto')"; 
		$resultado3 = $conexion -> query($query3);
		$row2=$resultado3->fetch_assoc();
		$asientos = (int)$row2['NoAsientos_Auto'];

		// echo $asientos;

		if($asientos >= $ocupado and isset($_POST['usuario'])){
		$query4 = "UPDATE conductor SET conductor.Ocupados = $ocupado WHERE (conductor.CorrInstitu_Conductor = '$correoc')";

		$resultado4 = $conexion -> query($query4);

		}  
		if($asientos < $ocupado){?>
		<script> 
				alert('Tiene el numero maximo de usuarios'); 
				window.location="perfcon.php";
		</script>
<?php		}	?>  
		<script>
			window.location="perfcon.php";
		</script>
<?php  } if($_COOKIE['perfil']=='usuario'){?>  
		<script>
			window.location="perfusu.php";
		</script>
<?php  }  ?>