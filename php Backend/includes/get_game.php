<?php
	include('db_connection.php');
	extract($_REQUEST);
	$sql = "SELECT * FROM game WHERE game_code = '$game_code'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	print_r(json_encode($row));
?>