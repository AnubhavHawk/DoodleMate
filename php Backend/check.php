<?php
	session_start();
	echo "<pre>";
	print_r($_REQUEST);
	include('includes/db_connection.php');
	extract($_REQUEST);
	$sql = "SELECT * FROM game WHERE game_code = '$game_code'";
	echo $sql;
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
		print_r($row);
		if($row['player1_id'] != '' && $row['player2_id'] != ''){
			$f = 1;
		}
		if($row['player1_id'] == '' && $row['player2_id'] == ''){
			$sql = "UPDATE game SET player1_id = '$username' WHERE game_code = '$game_code'";
		}
		else if($row['player2_id'] == ''){
			$sql = "UPDATE game SET player2_id = '$username' WHERE game_code = '$game_code'";
		}
		$conn->query($sql);
		$sql = "SELECT * FROM game WHERE game_code = '$game_code'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$p1 = $row['player1_id'];
		$p2 = $row['player2_id'];

		$_SESSION['p1'] = $p1;
		$_SESSION['p2'] = $p2;
		$_SESSION['me'] = $username;
		$_SESSION['score'] = $username == $p1 ? 1 : 2;
		$_SESSION['game_code'] = $game_code;
		if($f){
			header('location: new.php?expired=1');
		}
		else{
			header('location: game.php');
		}
	}
	else{
		header('location: index.php?fail=1');
	}
?>