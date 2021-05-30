<?php 
	function kill(){
	unset($_COOKIE["user"]);
	unset($_COOKIE["2"]);
	unset($_COOKIE["perfil"]);
	setcookie("user", null, -1, "/");
	setcookie("2", null, -1, "/");
	setcookie("perfil", null, -1, "/");
	 if(isset($_POST['recuerda'])){
	 unset($_COOKIE["1"]);
	 setcookie("1", null, -1, "/");
	 }
	}

	kill();
 ?>

 	<script>
 		window.location="index.html"
 	</script>