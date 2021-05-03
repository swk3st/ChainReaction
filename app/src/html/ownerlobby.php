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
        $start = time() + $_POST['start'] * 1000;
        $cooldown = $_POST['cooldown'] * 1000;
        $time = $start + $_POST['time'] * 1000;
        $chain_id = $_POST['chainID'];
        $owner_id = $_SESSION['playerID'];
        $display_name = $_SESSION['displayName'];
        $game_id = createGame($owner_id, $display_name, $start, $time, $cooldown, $chain_id);
    ?>

</header>

</header>

<body>
<h1>Game Lobby Code: <?php echo $game_id?></h1>
</body>
</html>