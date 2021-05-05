<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Solimar Kwa and Michael Asare">
    <title> Game Play </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="..\css\button.css"> -->
    <link rel="stylesheet" href="..\css\gameplay.css">
    <link rel="stylesheet" href="..\css\gamescreen.css">
    <link rel="stylesheet" href="..\css\chain.css">



</head>
  <header>
    <?php include('../php/navbar.php'); ?>

  </header>

<body>
  <div class='info'>
    <h2 id='displayName'><?php echo $_SESSION['displayName']?><h2>
    <h2 id='status'></h2>
    <h2 id='score'></h2>
    <h2 id='clock'></h2>
  </div>
  <br/>
  <br/>
    <div class='gameplay-container'>
      <div class='left-half'>
        <button id='above-letter' class='game-button'>Grab an Above Letter</button>
        <label for="above-field"><button id='above-guess' class='game-button'>Guess Above</button></label>
        <input type="text" id="above-field" name="above-field">
        <button id='below-letter' class='game-button'>Grab a Below Letter</button>
        <label for="below-field"><button id='below-guess' class='game-button'>Guess Below</button></label>
        <input type="text" id="below-field" name="below-field">
        <script type='module' src='../js/gameplay.js'></script>
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
    <div>
</body>
</html>