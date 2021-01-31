<?php
	include('includes/db_connection.php');
	extract($_REQUEST);
	$sql = "INSERT INTO game(game_code) VALUES ('".$_REQUEST["game_code"]."')";
	if($conn->query($sql)){
		header("location: index.php?code=$game_code");
	}
	else{
		header("location: new.php");
	}
?>