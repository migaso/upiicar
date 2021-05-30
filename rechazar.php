<?php 
	require('conexion.php');

	if(!isset($_COOKIE['user'])){?>
		<script>
			window.location="login.html";
		</script>
<?php } 
		if($_COOKIE['perfil']=='conductor'){

		if(isset($_POST['usuario']))
		$correo = $_POST['usuario'];
		if(isset($_POST['acompanante']))
		$correo = $_POST['acompanante'];
			
		$correoc = $_COOKIE['user'];
		// echo $correo." ".$correoc; 

		$query = "UPDATE usuario SET usuario.ID_Conductor = '0', usuario.Aceptacion = 'rechazado' WHERE (usuario.CorrInstitu_Usuario = '$correo')";

		$resultado = $conexion -> query($query);

		if(isset($_POST['acompanante'])){
		$query2 = "SELECT * FROM conductor WHERE (conductor.CorrInstitu_Conductor = '$correoc')";
		$resultado2 = $conexion -> query($query2);
		$row=$resultado2->fetch_assoc();
		$ocupado = (int)$row['Ocupados'] - 1;
		// $ocupado = 0;
		}
		
		// echo " ".$ocupado;

		if($ocupado >= 0 and isset($_POST['acompanante'])){
		$query3 = "UPDATE conductor SET conductor.Ocupados = $ocupado WHERE (conductor.CorrInstitu_Conductor = '$correoc')";

		$resultado3 = $conexion -> query($query3);
		// echo "entro";
		} 
		elseif($ocupado == -1 and isset($_POST['acompanante'])){
			echo "<script>alert('por el momento te has quedado sin acompanantes');</script>";
		}

		?>
		<script>
			window.location="perfcon.php";
		</script>
		
<?php  } if($_COOKIE['perfil']=='usuario'){?>  
		<script>
			window.location="perfusu.php";
		</script>
<?php  }  ?>