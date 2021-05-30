<?php
	require('conexion.php');

		if(!isset($_COOKIE['user'])){?>
		<script>
			window.location="login.html";
		</script>
<?php } 

	if(isset($_POST['agrega_comment_con'])){
	$comment=$_POST['agrega_comment_con'];
	$correo = $_COOKIE['user'];
	$query = "UPDATE conductor SET MiniBiblio_Conductor = '$comment' WHERE (conductor.CorrInstitu_Conductor = '$correo')";

	$resultado = $conexion -> query($query);
	}

	if (isset($_POST['agrega_comment_usu'])){
	$comment=$_POST['agrega_comment_usu']; 
	$correo = $_COOKIE['user'];
	$query = "UPDATE usuario SET MiniBiblio_Usuario = '$comment' WHERE (usuario.CorrInstitu_Usuario = '$correo')";

	$resultado = $conexion -> query($query);
	}

		if($_COOKIE['perfil']=='conductor'){?>  
		<script>
			window.location="perfcon.php";
		</script>
<?php  } if($_COOKIE['perfil']=='usuario'){?>  
		<script>
			window.location="perfusu.php";
		</script>
<?php  }  ?>