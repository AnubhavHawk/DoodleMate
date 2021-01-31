<?php
    session_start();
    if(!isset($_SESSION['game_code'])){
        header('location: index.php?login=false');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Doodle Mate</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body onload="init()">
    <input type="hidden" id="score-column" value="<?=$_SESSION['score']?>" />
    <input type="hidden" id="my-id" value="<?=$_SESSION['me']?>" />
    <input type="hidden" id="p1" value="<?=$_SESSION['p1']?>" />
    <input type="hidden" id="p2" value="<?=$_SESSION['p2']?>" />
    <input type="hidden" id="game_code" value="<?=$_SESSION['game_code']?>" />
    <div class="bg-primary shadow text-center text-white p-3">
        <h1><b>Doodle Mate</b></h1>
    </div>
    <div class="mt-2 pl-4 pr-4">
        <h4 class="text-left m-4">Draw: <u id="object-name">Cat</u></h4>
        <div class="text-center">
            <canvas class="rounded" id="can"></canvas>
            <span  class="d-flex justify-content-center align-items-center">
                <span class="d-flex justify-content-around align-items-center">
                    <b class="m-1">Drawing controls:</b>
                    <div title="Pencil, for drawing" id="black" class="color-control bg-dark m-1" onclick="color(this)"><i class="fas fa-pencil-alt"></i></div>
                    <div title="Eraser, for earsing" id="white" class="color-control m-1" onclick="color(this)"><i class="fas fa-eraser"></i></div>
                </span>
                <span class="badge badge-danger rounded-pill pl-2 pr-2 m-1" onclick="erase()" id="clr-btn">Clear</span>
            </span>
            <div>
                <span>
                    <a class="btn btn-outline-warning btn-expand pl-5 pr-5" id="submit-btn">Submit Now</a>
                </span>
            </div>
        </div>
    </div>
    <div class="me-container rounded text-center border border-success">
        <b class="text-capitalize" id="p1-name"><?=$_SESSION['p1']?>:</b>
        <span id="me" class="rounded"></span>
        <span id="my-score">0pts</span>
    </div>
    <div class="leave text-center mt-5">
        <button class="mt-5 btn btn-danger" id="leave-btn">Leave game</button>
    </div>
    <div id="remote-container" class="text-center border rounded">
        <b class="text-capitalize" id="p2-name"><?=$_SESSION['p2']?>:</b>
        <span id="other-score">0pts</span>
    </div>
    <script src="https://cdn.agora.io/sdk/release/AgoraRTCSDK-3.4.0.js"></script>
    <script src="./scripts/drawing.js"></script>
    <script src="./scripts/script.js"></script>
    <script src="./scripts/player.js"></script>
</body>
</html>