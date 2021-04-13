<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Solimar Kwa and Michael Asare">
  <meta name="description" content="Chain Reaction Home Screen">
  <meta name="keywords" content="Chain Reaction, Game Show, Game Show Chain Reaction, Home Chain Reaction">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <!-- required scripts for IE -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <title> Chain Reaction Home </title>

  <link rel="stylesheet" href="..\css\main.css">

  
</head>

<body>
  <header>
    <?php include('../php/navbar.php'); ?>

  </header>


  <div class="container">
    <div class="row">
      <div class="row-md-2">
        <h3>Rules</h3>
        <p> Requirements: Two teams of three players
          Before the game begins, one team will be determined to go first
          Seven words, stacked upon one another will be the crux of the game
          The top word and bottom word of the chain will be shown as starting points for the game
          Any given word in the chain is generally related to the word above and below it
          Teams take turns attempting to guess the empty words in the chain
          During every turn, only one person on the team can actually guess, no others on the team may aid in the
          guessing of the word
          The turns rotate from player to player, forming a cycle
          For every turn, a team player can decide to either guess the “above” word or the “below” word
          Above meaning above the bottommost completed word, and vice versa for below
          After choosing above or below, the team player may either ask for a letter, or not at all
          Once given or not given a letter, a team player may guess the word at hand
          If the guessed word is wrong, then the turn will restart, with the other team now having a turn
          If the guessed word is correct, the word is completed, the guessing team will gain points, and have another
          turn
          Note: If asking for a letter will complete said word, the guessing team’s turn will immediately end, and no
          points will be awarded to either team
          This cycle will continue until all words have been completed

        </p>
      </div>
      <div class="row-md-4">
        <h3>Become a Member for Custom Game Play</h3>
        <p>Access to creating your own game!
        </p>
      </div>

    </div>
  </div>



    <div class="footer">
          <h6 class="text-uppercase font-weight-bold">Contact</h6>
          <p> Solimar Kwa <br />
            swk3st@virginia.edu </p>
          <p> Michael Asare <br />
            msa8wsy@virginia.edu </p>
    </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
    crossorigin="anonymous"></script>


</body>

</html>