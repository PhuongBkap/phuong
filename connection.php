<?php  
	$server="localhost";
	$user = "root";
	$pass="";
	$database="phpbkap";
	$conn = @mysqli_connect('localhost','root','','phpbkap') or die("Kết nối thất bại: <b>".mysqli_connect_error()) ;
	mysqli_set_charset($conn,"utf8");
?>