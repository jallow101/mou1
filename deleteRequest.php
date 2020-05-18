<?php
	include('connection/connection.php');
	$id=$_GET['id'];
	mysqli_query($conn,"delete from request where id='$id'");
	header('location:request.php');

?>
