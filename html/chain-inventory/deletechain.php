<!-- Form that you fill out to update a chain already in your Inventory -->
<!-- Form that you fill out to add a new chain to your Inventory -->
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Solimar Kwa and Michael Asare">
    <title> Delete Chain - Chain Reaction </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="..\..\css\inventory.css">
    <link rel="stylesheet" href="..\..\css\gameplay.css">
</head>


<body>
  <header>
  <?php include('../../php/navbar.php'); ?>
  </header>
<h1> Delete Chain? </h1>
<div class="form-container">
  <form action="../../php/chaininventory.php" method="post">
        <ul>
            <li><?php if(isset($_GET["word1"])) echo $_GET["word1"]?></li>
            <li><?php if(isset($_GET["word2"])) echo $_GET["word2"]?></li>
            <li><?php if(isset($_GET["word3"])) echo $_GET["word3"]?></li>
            <li><?php if(isset($_GET["word4"])) echo $_GET["word4"]?></li>
            <li><?php if(isset($_GET["word5"])) echo $_GET["word5"]?></li>
            <li><?php if(isset($_GET["word6"])) echo $_GET["word6"]?></li>
            <li><?php if(isset($_GET["word7"])) echo $_GET["word7"]?></li>
        </ul>
        <input type="hidden" id="action" name="action" value="remove"/>
        <input type="hidden" id="chainID" name="chainID" value="<?php if (isset($_GET["chainID"])) echo $_GET["chainID"]?>"/>
        <br/>
        <button><a href="./inventory.php">No</a></button>
        <input type="submit" value="Yes"/>
  </form>
</div>
</body>
</html>