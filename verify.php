<?php 
	require('conexion.php');

	if(isset($_COOKIE['user'])){
		if($_COOKIE['perfil']=='conductor'):?>

		<script>
			window.location="perfcon.php";
		</script>

		<?php else:?>
		<script>
			window.location="perfusu.php";
		</script>
		<?php endif ?>
<?php }?>
	
		<script>
		window.location="login.html";
		</script>
