<?php 

	require_once './connect.php';

	$id = $_GET['id'];
	$sql = "UPDATE orders SET status_id=2 WHERE id='$id' ";
	$result = mysqli_query($conn, $sql);


	header("location: ../views/orders.php");















?>