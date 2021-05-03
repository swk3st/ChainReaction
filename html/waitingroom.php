
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Solimar Kwa and Michael Asare">
    <title> Waiting Room </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="..\css\button.css">
    <link rel="stylesheet" href="..\css\gameplay.css">
</head>

<body>

<header>
    <?php include('../php/navbar.php'); ?>

</header>

<h1 id="waitingText"> WAITING... </h1>
<h2 id='timer' style='text-align: center;'></h2>
<div class="waiting-room-container">
    <h2 id='code' class='<?php if (isset($_GET['gameID'])) echo $_GET['gameID']?>'>Game Code: <?php if (isset($_GET['gameID'])) echo $_GET['gameID']?></h2>
</div>
<script type='module'>
    import { requestGame, requestStatus, requestPlayerID } from '../js/request.js';
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
    var arr = [" WAITING ", " WAITING. ", " WAITING.. ", " WAITING... "];
    var count = 0;
    var element = document.getElementById("waitingText");
    let timer = document.getElementById("timer");
    var interval = setInterval(function () {
        element.innerHTML = arr[count];
        count++;
        if(count > arr.length - 1) {
            count = 0;
        }
    }, 1000);
    let cycle = 1000;
    var ticker = setInterval(function () {
        timer.innerHTML = countdown;
        countdown-= 1;
        requestStatus(gameId).then((data) => {
            console.log(data);
            if (data == 'started') {
                requestPlayerID().then((id) => {
                    let playerId = id;
                    location.href = './gameplay?gameID=' + gameId + "&playerID=" + playerId;
                })
            }
        });
    }, cycle);
</script>
</body>
</html>