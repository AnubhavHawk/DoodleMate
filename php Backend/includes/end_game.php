<?php
	include('db_connection.php');
	extract($_REQUEST);
	$sql = "UPDATE game SET ended = 1 WHERE game_code = '$game_code'";
	if($conn->query($sql)){
		echo "1";
	}
	else
		echo "0";
?>