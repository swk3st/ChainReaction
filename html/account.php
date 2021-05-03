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

<header>
  <?php include('../php/navbar.php'); ?>
</header>

<?php

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
  } else if(!isset($_SESSION["displayName"])) {
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

  header("location:http://localhost:9001?earnings=$earnings&guesses=$guessess&correct=$correct&percent=$percent") 
  ?>


