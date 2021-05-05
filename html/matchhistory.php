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
    <link rel='stylesheet' href='../css/matchhistory.css'>

</head>

<header>

<header>
    <?php include('../php/navbar.php'); ?>
    <?php
        // include '../db/database.php';
        include getcwd() . '/../db/database.php';
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
        <div class='match-history-container'>
            <div class='left-half'>
                <table class='nice-table match-history'>
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

            <div class='right-half'>
                <div class="chain-table">
                    <table>
                        <tr id='row1'><td id="word1">~</td></tr>
                        <tr id='row2'><td id="word2">~</td></tr>
                        <tr id='row3'><td id="word3">~</td></tr>
                        <tr id='row4'><td id="word4">~</td></tr>
                        <tr id='row5'><td id="word5">~</td></tr>
                        <tr id='row6'><td id="word6">~</td></tr>
                        <tr id='row7'><td id="word7">~</td></tr>
                    </table>
                </div>
            </div>
        </div>
</body>
</html>