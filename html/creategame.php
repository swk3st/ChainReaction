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
  <form>
    <label for="time">Enter A Total Time!</label>
    </br>
    <input type="number" id="time" name="time"/>
    </br>
    </br>
    <label for="cooldown">Enter A Cooldown Period Between Guesses!</label>
    </br>
    <input type="number" id="cooldown" name="cooldown"/>
    </br>
    </br>
    <input type="submit" value="Submit"/>
  </form>
  </div>
</body>
</html>