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
    <h1> Create A Game! </h1>
  <div class="form-container">
  <form action="./ownerlobby.php" method="post">
    <label for="time">Total Time (minutes)</label>
    </br>
    <input type="number" id="time" name="time" min="0" max='10' required/>
    </br>
    </br>
    <label for="cooldown">Cooldown (seconds)</label>
    </br>
    <input type="number" id="cooldown" name="cooldown" min="0" required/>
    </br>
    </br>
    <label for="cooldown">Lobby Duration (minutes)</label>
    </br>
    <input type="number" id="start" name="start" min="0" max='10'required/>
    </br>
    </br>
    <input type="hidden" id="chainID" name="chainID" value="<?php echo $_GET['chainID']?>"/>
    <input type="submit" value="Submit"/>
  </form>
  </div>
</body>
</html>