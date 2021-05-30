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
		$conductor = $_POST['conductor'];
		// $query = "SELECT * FROM usuario WHERE (usuario.CorrInstitu_Usuario='$correo')";

		// $resultado = $conexion -> query($query);

		$query = "SELECT * FROM conductor WHERE (conductor.CorrInstitu_Conductor = '$conductor')";

		$resultado = $conexion -> query($query);

		$row=$resultado->fetch_assoc();

		$ocupado = (int)$row['Ocupados'] - 1;

		// echo $ocupado . " ". $conductor;

		$query2 = "UPDATE usuario SET usuario.ID_Conductor = '0', usuario.Aceptacion = 'rechazado' WHERE (usuario.CorrInstitu_Usuario = '$correo')";

		$resultado2 = $conexion -> query($query2);


		if($ocupado >= 0){
		$query3 = "UPDATE conductor SET conductor.Ocupados = $ocupado WHERE (conductor.CorrInstitu_Conductor = '$conductor')";

		$resultado3 = $conexion -> query($query3);
		// echo "entro";
		} 

		// $conductor = $row4['CorrInstitu_Conductor'];

		//  echo '<br><br><br><br>'.$conductor;
?>

		<script>
			window.location="perfusu.php";
		</script>