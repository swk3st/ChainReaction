<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Solimar Kwa and Michael Asare">
    <title> Chain Reaction! </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/button.css">
    <link rel="stylesheet" href="../css/gameplay.css">

</head>

<header>

<header>
    <?php include('../php/navbar.php'); ?>
    <?php
        include "../db/database.php";
        $start = time() + $_POST['start'] * 60;
        $cooldown = $_POST['cooldown'];
        $time = $start + $_POST['time'] * 60;
        $chain_id = $_POST['chainID'];
        $owner_id = $_SESSION['playerID'];
        $display_name = $_SESSION['displayName'];
        $game_id = createGame($owner_id, $display_name, $start, $time, $cooldown, $chain_id);
    ?>

</header>

</header>

<body>
<h1>Owner Room</h1>
<h2 id='timer' style='text-align: center;'></h2>
<div class="waiting-room-container">
    <h2 id='code' class='<?php if (isset($game_id)) echo $game_id?>'>Game Code: <?php if (isset($game_id)) echo $game_id?></h2>
    <br/>
    <button id="start-button" class='big-button'>START!<button>
</div>

<script type='module'>
    import { requestGame, startGame } from '../js/request.js';
    let codeElem = document.getElementById('code');
    let gameId = codeElem.getAttribute('class');
    let countdown = -1;
    if (gameId != undefined) {
        requestGame(gameId).then((gameData) => {
            let data = gameData[0][0];
            let date = new Date();
            countdown = parseInt(data['start']) - Math.round(Date.now()/1000);
        });
    }
    let timer = document.getElementById("timer");
    let cycle = 1000;
    let started = false;
    let startButton = document.getElementById('start-button');
    let force = false;
    startButton.addEventListener('click', () => {
        force = true;
    });
    var ticker = setInterval(function () {
        timer.innerHTML = countdown;
        countdown-= 1;
        if (countdown <= 0 || force) {
            startGame(gameId);
            started = true;
        }
        if (started) {
            clearInterval(ticker);
        }
    }, cycle);
</script>
</body>
</html>