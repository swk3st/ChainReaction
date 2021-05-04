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
    <button id='above-button'>Grab an Above Letter</button>
    <button id='below-button'>Grab a Below Letter</button>
    <label for="above-field"><button id='above-guess'>Guess Above</button></label>
    <input type="text" id="above-field" name="above-field">
    <label for="below-field"><button id='below-guess'>Guess Below</button></label>
    <input type="text" id="below-field" name="below-field">

    <script type='module' src='../js/gameplay.js'></script>
</body>
</html>