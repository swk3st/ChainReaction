<!-- Form that you fill out to add a new chain to your Inventory -->
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Solimar Kwa and Michael Asare">
    <title> Add Chain - Chain Reaction </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="..\..\css\inventory.css">
    <link rel="stylesheet" href="..\..\css\gameplay.css">
</head>

<header>
  <?php include('../php/navbar.php'); ?>
</header>


<body>
<h1> Add New Chain </h1>
<div class="form-container">
  <form action="../../php/chaininventory.php" method="post">
      <label for="word1">Header Word:</label>
      <input type="text" id="word1" name="word1" required/>
      <br/>
      <label for="word2">Word One:</label>
      <input type="text" id="word2" name="word2" required/>
      <br/>
      <label for="word3">Word Two:</label>
      <input type="text" id="word3" name="word3" required/>
      <br/>
      <label for="word4">Word Three:</label>
      <input type="text" id="word4" name="word4" required/>
      <br/>
      <label for="word5">Word Four:</label>
      <input type="text" id="word5" name="word5" required/>
      <br/>
      <label for="word6">Word Five:</label>
      <input type="text" id="word6" name="word6" required/>
      <br/>
      <label for="word7">Footer Word:</label>
      <input type="text" id="word7" name="word7" required/>
      <br/>
      <input type="hidden" id="action" name="action" value="add"/>
      <input type="hidden" id="playerID" name="playerID" value="<?php echo $_SESSION["playerID"]?>"/>
      <br/>
      <input type="submit" value="Submit"/>
  </form>
</div>
</body>
</html>