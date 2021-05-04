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

  <title> Chain Reaction Home </title>
  <link rel="stylesheet" href="..\css\main.css">
  </head>

<body>
  <header>
    <?php include('../php/navbar.php'); ?>
  </header>

  <div class="top-banner container">
      <div class="row">
        <div class="col-md-4">
        <h1> Welcome to Chain Reaction! </h1>
        <h2> Where it all started </h2>
        <p> This website is based off of the game show "Chain Reaction". With the first episode airing in 1980, "Chain Reaction" is a popular word puzzle game where players compete to form chains composed of two-word phrases. </p>
        </div>

        <div class="col-md-4">
        <iframe width="540" height="295" src="https://www.youtube.com/embed/QCdJ1_WY1dA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
  </div>


  <div class="container">
    <div class="row">
      <div class="row-md-2">


      <h1> Players: </h1> <p> 4-6 players</p>
      <h1> Goal: </h1> <p>The goal of the game is to guess all the <strong>seven </strong>words in the chain and the team with the highest amount of correct guesses win! These words are associated with the word directly before and after it.&nbsp;</p>
      <p>For example,</p>
      <ol>
          <li>Crack</li>
          <li>Open</li>
          <li>Sesame</li>
          <li>Street</li>
          <li>Smart</li>
          <li>Cookie</li>
          <li>Monster</li>
      </ol>
      <p>Notice how the second word &ldquo;Open&rdquo; can be associated with the top word &ldquo;Crack&rdquo; and the bottom word &ldquo;Sesame&rdquo;. For each game you are automatically given the 1st and 7th word, and you have to guess to complete the chain!</p>
      <h1>Rules of the Game:</h1>
      <ul>
      <li aria-level="1">Teams take turns attempting to guess the empty words in the chain. During every turn, only one person on the team can actually guess, no others on the team may aid in the guessing of the word. The turns rotate from player to player, forming a cycle.&nbsp;</li>
      <li aria-level="1">For every turn, a team player can decide to either guess the &ldquo;above&rdquo; word or the &ldquo;below&rdquo; word. Above meaning above the bottommost completed word, and vice versa for below.&nbsp;</li>
      <li aria-level="1">After choosing above or below, the team player may either ask for a letter, or not at all. Once given or not given a letter, a team player may guess the word at hand.
      <ul>
      <li aria-level="3">Note: If asking for a letter will complete said word, the guessing team&rsquo;s turn will immediately end, and no points will be awarded to either team.This cycle will continue until all words have been completed</li>
      </ul>
      </li>
      <ul>
      <li aria-level="2">If the guessed word is wrong, then the turn will restart, with the other team now having a turn.</li>
      <li aria-level="2">If the guessed word is correct, the word is completed, the guessing team will gain points, and have another turn.</li>
      </ul>
      </ul>
      <h1>Perks of having an account:</h1>
      <ul>
      <li aria-level="1">Keep track of your game stats</li>
      <ul>
      <li aria-level="2">Career earnings</li>
      <li aria-level="2">Career guesses</li>
      <li aria-level="2">Career percentage of correct guesses</li>
      </ul>
      <li aria-level="1">See how you compare against other friends</li>
      <li aria-level="1">Create your own chains</li>
      </ul>
      <h1>How to Play:</h1>
      <ul>
      <li aria-level="1">Go to &ldquo;Play&rdquo; and insert the room code that your friends are playing with. In order to generate a room code, you will need to create an account but users can still play without an account!&nbsp;</li>
      </ul>    

      <h1> Advanced Insight Into the Game:</h1>
<ul>
<li aria-level="1">Game Creator:</li>
<ul>
<li aria-level="2">This user will 'deploy' a chain of their choosing</li>
<li aria-level="2">They will set the total time for the chain (we'll recommend a time)</li>
<li aria-level="2">They will set the cooldown time (we'll recommend a time)</li>
<li aria-level="2">They will set the time when the lobby will close</li>
<li aria-level="2">They will press deploy, and a game code will be created</li>
<li aria-level="2">They will be able to see who is in the game</li>
</ul>
<li aria-level="1">Friend joining a game:</li>
<ul>
<li aria-level="2">This user can be a guest user, no account needed!</li>
<li aria-level="2">They will need to use a game code to join a game</li>
<ul>
<li aria-level="3">Important: make sure its a code actually in play</li>
</ul>
<li aria-level="2">They will be moved to a waiting room, with the other players</li>
<li aria-level="2">They will be able to see who else in the room (see display names)</li>
<li aria-level="2">They will see the timer counting down</li>
<li aria-level="2">They will see the game code they are in as well and who is the owner of the game</li>
<li aria-level="2">The game will then start till the timer reaches 0</li>
<li aria-level="2">After the game has been started, no one will be able to use the game code again to enter</li>
</ul>
</ul>
<ul>
<li aria-level="1">Game start (player pov):</li>
<ul>
<li aria-level="2">Each player can either ask for a letter or guess a word</li>
<li aria-level="2">There will be a cooldown between letter guesses</li>
<ul>
<li aria-level="3">This is determined by the owner at the beginning</li>
</ul>
<li aria-level="2">There will be a timer to finish the game</li>
<ul>
<li aria-level="3">This is determined by the owner at the beginning</li>
</ul>
<li aria-level="2">The maximum number of points = sum of characters per word for all 5 words * 10,000</li>
<li aria-level="2">Each second of thinking reduces the points by a flat amount</li>
<ul>
<li aria-level="3">If they are 100 seconds to play then, each second will reduce your score by 1% of the maximum points</li>
<li aria-level="3">If they are 50 seconds to play, then each second will reduce your score by 2% of the maximum points</li>
</ul>
<li aria-level="2">The penalty for asking for a letter = 5x penalty for each second</li>
<li aria-level="2">The score</a> will be whatever is remaining from max points - penalties</li>
<li aria-level="2">The payout will be % of characters gotten * score</li>
<li aria-level="2">The game will end when a player either runs out of points or they are finished</li>
<li aria-level="2">Once finished, they&rsquo;ll be able to see your final payout</li>
<li aria-level="2">Once the lobby is finished, they&rsquo;ll be shown a final leaderboard</li>
<li aria-level="2">A player can leave the game whenever, but it will not count towards their personal leaderboard</li>
</ul>
<li aria-level="1">Game Start (owner pov):</li>
<ul>
<li aria-level="2">They will see the current payouts of each player</li>
<li aria-level="2">They will see the timer counting down</li>
<li aria-level="2">They will see the final leaderboard</li>
</ul>
</ul>
    </div>



    <div class="footer">
          <h6 class="text-uppercase font-weight-bold">Contact</h6>
          <p> Michael Asare | msa8wsy@virginia.edu </p>
            <p> Solimar Kwa | swk3st@virginia.edu </p>
    </div>

   

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
    crossorigin="anonymous"></script>


</body>

</html>