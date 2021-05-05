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
    <link rel='stylesheet' href='../css/watchroom.css'>

</head>

<header>
    <?php include('../php/navbar.php'); ?>

</header>


<body>
    <h1>Watch Room!</h1>
    <div class='watch-room-container'>
        <div class='half'>
            <table class='in-game nice-table'>
                <tr>
                    <th>Display Name</th><th>Real Time Payout</th>
                </tr>
                <tr>
                    <td>Bradley ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddMartin</td><td>44</td>
                </tr>
            </table>
        </div>
        <div class='half'>
            <div class='heads-up nice-table'>
                <p>Watch others payouts while they are in the midst of playing!</p>
                <p>Note: Only <em>in progress</em> games will be shown. Please</p>
                <p>go to the match history for this game to see the other scores.<p>
                <button class='big-button'>Match History</button>
            </div>
        </div>

    </div>
</body>
</html>