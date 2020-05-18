<?php
	include('connection/connection.php');
	$id=$_GET['id'];
	mysqli_query($conn,"delete from organization where id='$id'");
	header('location:organization.php');

?>
