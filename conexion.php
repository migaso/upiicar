<?php 

// $conexion= new mysqli("localhost","root","psw","BDs");
$conexion= new mysqli("localhost","root","root","db_upiicar");

if(mysqli_connect_errno()){
	echo 'Conexion fallida:',mysqli_connect_error();
	exit();
}

 ?>