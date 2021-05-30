<?php 

// $conexion= new mysqli("localhost","root","psw","BDs");
$conexion= new mysqli("mysql11.000webhost.com","a2390697_admin","Upiicar1234","a2390697_UPIICAR");

if(mysqli_connect_errno()){
	echo 'Conexion fallida:',mysqli_connect_error();
	exit();
}

 ?>