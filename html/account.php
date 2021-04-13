<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="/resources/chainreactionlogo.png">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Solimar Kwa and Michael Asare">
    <meta name="description" content="Account for Logged In User.">
    <meta name="keywords" content="Game, Online Game, Chain Reaction">

    <title> Chain Reaction Account </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="..\css\login.css">
    <link rel="stylesheet" href="..\css\gameplay.css">

</head>

<?php
 include('../php/navbar.php');

  include "../db/database.php";
  // session_start();
  // $_SESSION["playerID"] = "aaaaaaaaaa";
  $data = playerInfo($_SESSION["playerID"]);
  if (isset($_POST["displayName"])) {
    $_SESSION["displayName"] = $_POST["displayName"];
    if(isset($POST["remember"])) {
      setcookie("displayName", $_POST["displayName"], time() + (60 * 5), "/");
    }
  }
  else if(isset($_COOKIE["displayName"])) {
    $_SESSION["displayName"] = $_COOKIE["displayName"];
  } else {
    $_SESSION["displayName"] = $data[0]["email"];
  }
  $earnings = $data[0]["earnings"];
  $guesses = $data[0]["guesses"];
  $correct = $data[0]["correct"];
  $percent = 0.0;
  if ($guesses != 0) {
    $percent = bcdiv($correct, $guesses, 4);
  }
  $percentage = strval($percent * 100) . "%";
?>

<header>

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
      <a class="navbar-brand" href="home.html">Chain Reaction</a>


      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="roomcodeplay.html">Play</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="normalcreate.html"> Create </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="account.html"> Account</a>
          </li>
        </ul>
      </div>
    </nav>

  </header>

<body>
<div class="account-container">
  <h1> <?php echo $_SESSION["displayName"]; ?> </h1>
  <div class="stats-container">
    <p> Career Earnings: <?php echo strval($earnings); ?> </p>&nbsp;&nbsp;&nbsp;&nbsp;
    <p> Guesses: <?php echo strval($guesses); ?> </p>&nbsp;&nbsp;&nbsp;&nbsp;
    <p> Correct Guesses: <?php echo strval($correct); ?> </p>&nbsp;&nbsp;&nbsp;&nbsp;
    <p> Percent Guessed Correct: <?php echo $percentage; ?> </p>
  </div>
</div>
<form class="change-display-name-container" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <label for="displayName">Change Display Name? </label>
  <input type="text" id="displayName" name="displayName">
  <div>
    <label for="remember">Remember?</label>
    <input type="checkbox" id="remember" name="remember">
  </div>
  <div>
    <input type="submit" value="Submit">
  </div>
</form>
</body>