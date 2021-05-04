<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Solimar Kwa and Michael Asare">
    <title> Chain Reaction Custom Create </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  
    <link rel="stylesheet" href="..\css\button.css">
    <link rel="stylesheet" href="..\css\gameplay.css">
    <link rel="stylesheet" href="..\css\chain.css">
</head>

<?php
  // session_start();
  // $_SESSION["playerID"] = "aaaaaaaaaa";
?>

<header>

  <?php include "../php/navbar.php" ?>

</header>

<body>
    <h1 class="big-title"> Custom Create </h1>
    <div>
      <!-- <a href="waitingroom.html"> -->
        <button id="use-button" class="direction-button use-chain">Use Chain</button>
      <!-- </a> -->
      <p id="chain-text" class="confirmation-chain">Word 1 - Word 2 - Word 3 - Word 4 - Word 5 - Word 6 - Word 7</p>
    </div>
    <div class="custom-create-container">
  <div class="left-select chain-table">
    <table>
      <tr><td id="left1">Word 1</td></tr>
      <tr><td id="left2">.</td></tr>
      <tr><td id="left3">L#</td></tr>
      <tr><td id="left4">.</td></tr>
      <tr><td id="left5">.</td></tr>
      <tr><td id="left6">.</td></tr>
      <tr><td id="left7">Word 7</td></tr>
    </table>
  </div>
  <div class="middle-select chain-table">
    <table>
      <tr><td id="mid1">Word 1</td></tr>
      <tr><td id="mid2">.</td></tr>
      <tr><td id="mid3">.</td></tr>
      <tr><td id="mid4">.</td></tr>
      <tr><td id="mid5">.</td></tr>
      <tr><td id="mid6">.</td></tr>
      <tr><td id="mid7">Word 7</td></tr>
    </table>
  </div>
  <div class="right-select chain-table">
    <table>
      <tr><td id="right1">Word 1</td></tr>
      <tr><td id="right2">.lol</td></tr>
      <tr><td id="right3">.this</td></tr>
      <tr><td id="right4">.is</td></tr>
      <tr><td id="right5">.fact</td></tr>
      <tr><td id="right6">.cap</td></tr>
      <tr><td id="right7">Word 7</td></tr>
    </table>
  </div>
  <button class="direction-button" id="rightBtn">←</button>
  <!-- <button class="direction-button">Chain Inventory</button> -->
  <a href="./chain-inventory/inventory.php"><button class="direction-button">Chain Inventory</button></a>
  <button class="direction-button" id="leftBtn">→</button>
</div>
<script type="module" src="../js/customcreate.js"></script>
</body>
</html>