<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Doodle Mate</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body class="bg-warning">
	<div class="bg-primary shadow text-center text-white p-3">
        <h1><b>Doodle Mate</b></h1>
    </div>
	<div class="row p-5">
	<div class="col-md-4 mt-2 bg-white text-center shadow-md rounded offset-md-4 pt-4">
		<img src="images/logo.png" height="30" width="30" />
		<form class="pl-5 pr-5 pb-5 pt-3 text-left" method="POST" action="check.php">
			<div class="form-group">
				<label>Game Code</label>
				<input type="text" name="game_code" class="form-control" placeholder="Enter Game Code" value="<?=isset($_REQUEST['code'])? $_REQUEST['code']:''?>" />
			</div>
			<div class="form-group">
				<label>Doodler's Name</label>
				<input type="text" name="username" class="form-control" placeholder="Username" required>
			</div>
			<div class="form-group text-center">
				<input type="submit" class="btn text-white bg-warning btn-lg rounded-pill pl-5 pr-5" name="submit" value="Login"/>
			</div>
			<div class="text-center">
				<small><a href="new.php">Create New Game</a></small>
			</div>
		</form>
	</div>
</div>
</body>
</html>