<?php 
include 'connection.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = mysqli_query($conn,"delete from people where id = $id");
	if ($query) {
		header('location:list-poeple.php');
		# code...
	}
	else{
		echo 'Xóa thất bại !';
	}
	# code...
}
// SINH VIEN thực hiện xóa

// chuyển  hướng về trang danh sách sản phẩm
?>