<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Solimar Kwa and Michael Asare">
    <title> Game Play </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="..\css\button.css">
    <link rel="stylesheet" href="..\css\gameplay.css">

</head>
  <header>
    <?php include('../php/navbar.php'); ?>

  </header>

<body>
<h1> C-H-A-I-N--R-E-A-C-T-I-O-N </h1>
<div class="gameplay-container">
    <div class="round-number">
        <p>Round Number: 2</p>
    </div>
    <div class="scoreboard">
        <p>Score: Team 1: <b>3400</b> Team 2: <b>1300</b></p>
    </div>
    <div class="team-grouping">
        <h2>Team 1</h2>
        <p>>Katie</p>
        <p>Stephen</p>
        <p>Liam</p>
    </div>
    <div class="chain chain-table">
        <table>
            <tr><td>Word 1</td></tr>
            <tr><td>.</td></tr>
            <tr><td>.</td></tr>
            <tr><td>.</td></tr>
            <tr><td>.</td></tr>
            <tr><td>.</td></tr>
            <tr><td>Word 7</td></tr>
        </table>
    </div>
    <div class=guess-selection>
        <form action=#>
            <input type="radio" name="dir" value="above" id="above">
            <label for="above">ABOVE</label><br>
            <input type="radio" name="dir" value="below" id="below">
            <label for="below">BELOW</label><br><br>
            <button class="optional-button" type="button">Grab Letter?</button><br><br>
            <input type="text" value="">
        </form>
    </div>
</div>
</body>
</html>