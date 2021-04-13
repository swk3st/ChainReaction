<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Solimar Kwa and Michael Asare">
    <title> Create - Chain Reaction </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="..\css\button.css">
    <link rel="stylesheet" href="..\css\gameplay.css">
</head>

<body>

<header>
  <?php include('../php/navbar.php'); ?>

</header>

<h1> CREATE A GAME! </h1>
<div class="normal-create-container">
    <a href="waitingroom.php">
      <button type="button" class="big-button">RANDOM</button>
    </a>
    <div class="join-button">
      <a href="customcreate.php">
        <button type="button" class="big-button">CUSTOM</button>
      </a>
    </div>
</div>
</body>
</html>