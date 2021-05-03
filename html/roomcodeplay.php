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

</header>

</header>

<body>
  <div class="codeplay-container">
    <img src="../resources/chainreactionlogo.png" alt="Chain Reaction Retro Logo" width="400"
    height="160">
  <form action=#>
    <input class="code-text" type="text" id="input-code" name="room-code">
  </form>
  <!-- <a href="waitingroom.php"> -->
    <button class="big-button" id="join">JOIN!</button>
  <!-- </a> -->
  <p id="error"></p>
</div>
</body>

<script type="module">
  import { requestGame, playerJoin, requestPlayerID, requestDisplayName } from "../js/request.js";
  let button = document.getElementById("join");
  let input = document.getElementById("input-code");
  let playerID;
  let displayName;
  requestPlayerID().then((data) => {
    playerID = data;
  });
  requestDisplayName().then((data) => {
    displayName = data;
  });
  const buttonHandler = () => {
    let gameID = input.value;
    requestGame(gameID).then((data) => {
      let gameData = data[0];
      let errorMessage = data[1];
      if (errorMessage == '') {
        playerJoin(gameID, playerID, displayName).then(() => {
          // location.href = "./waitingroom.php?" + gameID; 
        });
      } else {
        let errorPar = document.getElementById("error");
        errorPar.innerHTML = errorMessage; 
      }
    });
  }
  button.onclick = buttonHandler;
</script>
</html>