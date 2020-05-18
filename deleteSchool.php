<?php
	include('connection/connection.php');
	$id=$_GET['id'];
	mysqli_query($conn,"delete from school where id='$id'");
	header('location:school.php');

?>
