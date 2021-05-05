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
        include '../db/database.php';
        $gameID = $_GET['gameID'];
        $players;
        $chainID;
        $gameInfo;
        if (isset($gameID)) {
            $players = gameHistory($gameID);
            $gameInfo = gameInfo($gameID);
            $chainID = $gameInfo[0]['chain_id'];
        }
    ?>
</header>

</header>

<body>
        <h1>Match History: <?php if (isset($gameID)) echo $gameID; ?></h1>
        <div id='match-history-container'>
            <div id='left-half'>
                <table class='nice-table'>
                    <tr>
                        <th>DISPLAY NAME</th>
                        <th>PAYOUT</th>
                    </tr>
                    <?php
                        if (isset($gameID)) {
                            foreach ($players as $player): ?>
                                <tr>
                                    <td><?=$player['display_name']?></td>
                                    <td><?=$player['payout']?></td>
                                </tr>
                            <?php endforeach;}?>
                </table>
            </div>

            <div id='right-half'>

            </div>
        </div>
        <div></div>
</body>
</html>