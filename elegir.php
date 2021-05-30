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
		$id_conductor = $_POST['conductor'];

		$correo = $_COOKIE['user'];
		// echo "<br><br><br>".$cp.$del;

		if($id_conductor != "" and $correo != ""){
		$query = "UPDATE usuario SET usuario.ID_Conductor = '$id_conductor', usuario.Aceptacion = 'espera' WHERE (usuario.CorrInstitu_Usuario = '$correo')";
		$resultado = $conexion -> query($query);?>

		<script>
			window.close();
		</script>

<?php } ?>