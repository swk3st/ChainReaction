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



<body>
    </header>
        <?php include('../php/navbar.php'); ?>
        <?php
            // include "../db/database.php";
            include getcwd() . '/../db/database.php';
            $start = time() + $_POST['start'] * 60;
            $cooldown = $_POST['cooldown'];
            // $time = $start + $_POST['time'] * 60;
            $time = $_POST['time'] * 60;
            $chain_id = $_POST['chainID'];
            $owner_id = $_POST['playerID'];
            $display_name = $_POST['displayName'];
            $game_id = createGame($owner_id, $display_name, $start, $time, $cooldown, $chain_id);
        ?>
    </header>
    <h1>Owner Room</h1>
<h2 id='timer' style='text-align: center;'></h2>
<div class="waiting-room-container" id='wr'>
    <h2 id='code' class='<?php if (isset($game_id)) echo $game_id?>'>Game Code: <?php if (isset($game_id)) echo $game_id?></h2>
    <br/>
    <button id="start-button" class='big-button'>START!<button>
</div>

<script type='module'>
    import { requestGame, startGame, requestPlayers } from '../js/request.js';
    
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


    let lobby = [];

    var ticker = setInterval(function () {
        timer.innerHTML = countdown;
        countdown-= cycle/1000;
        if (countdown <= 0 || force) {
            startGame(gameId);
            started = true;
        }
        if (started) {
            clearInterval(ticker);
            location.href = `./watchroom.php?gameID=${gameId}`;
        }
        requestPlayers(gameId).then((players) => {
            if(!sameLobby(lobby, players)) {
                console.log('Update!');
                lobby = players;
                updateLobby(players);
            }
        });
    }, cycle);

    let sameLobby = (org, other) => {
        if (org.length != other.length) {
            return false;
        }
        return JSON.stringify(other.sort()) === JSON.stringify(other.sort());
    }


    let updateLobby = (newLobby) => {
        let waitingRoom = document.getElementById('wr');
        while (waitingRoom.lastChild.tagName != 'BUTTON') {
            waitingRoom.removeChild(waitingRoom.lastChild);
        }
        // while (waitingRoom.lastChild) {
        //     waitingRoom.removeChild(waitingRoom.lastChild);
        // }
        for (const player of newLobby) {
            const p = document.createElement('p');
            const displayName = player.display_name;
            const payout = player.payout;
            p.innerHTML = `${displayName}\t\t--\t\t${payout}`;
            waitingRoom.appendChild(p);
        }
    }

    
</script>
</body>
</html>