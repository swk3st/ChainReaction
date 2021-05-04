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
    <link rel="stylesheet" href="..\css\gamescreen.css">
    <link rel="stylesheet" href="..\css\chain.css">



</head>
  <header>
    <?php include('../php/navbar.php'); ?>

  </header>

<body>
  <h2 id='clock'></h2>
    <div class='gameplay-container'>
      <div class='left-half'>
        <h2 id='score'></h2>
        <button id='above-letter'>Grab an Above Letter</button>
        <button id='below-letter'>Grab a Below Letter</button>
        <label for="above-field"><button id='above-guess'>Guess Above</button></label>
        <input type="text" id="above-field" name="above-field">
        <label for="below-field"><button id='below-guess'>Guess Below</button></label>
        <input type="text" id="below-field" name="below-field">
        <script type='module' src='../js/gameplay.js'></script>
      </div>
      <div class='right-half'>
      <div class="chain-table">
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
      </div>
    <div>
</body>
</html>