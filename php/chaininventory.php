<?php
    include "../db/database.php";
    
    $status = false;
    
    function add() {
        global $status;
        $status = true;
        return;
        $playerID = $_POST['playerID'];
        $words = [];
        for ($i = 1; $i <= 7; $i++) {
            $post_key = "word" . strval($i);
            push($words, $_POST[$post_key]);
        }
        insertChain($playerID, $words);
    }
    
    function update() {
        global $status;
        $status = true;
        $chainID = $_POST['chainID'];
        $words = [];
        for ($i = 1; $i <= 7; $i++) {
            $post_key = "word" . strval($i);
            push($words, $_POST[$post_key]);
        }
        $updates = [];
        $update_data = $POST["update"];
        $update_array = str_split($update_data);
        foreach ($update_array as $update_bit) {
            if ($update_bit == "1") {
                push($updates, true);
            } else {
                push($updates, false);
            }
        }
        updateChain($chainID, $words, $updates);
    }

    function remove() {
        global $status;
        $status = true;
        $chainID = $_POST['chainID'];
        // removeChain
    }

    function doAction($action) {
        if ($action == "add") {
            add();
        } else if ($action == "update") {
            update();
        } else if ($action == "remove") {
            delete();
        }
    }

    $action = $_POST['action'];
    doAction($action);
?>

<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="../resources/chainreactionlogo.png">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Solimar Kwa and Michael Asare">
    <meta name="description" content="Account for Logged In User.">
    <meta name="keywords" content="Game, Online Game, Chain Reaction">

    <title> Submission </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="..\css\login.css">
    <link rel="stylesheet" href="..\css\gameplay.css">

</head>

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
<h1> <?php
    global $status;
    if ($status) {
        echo "Success!";
    } else {
        echo "Oops.. Something failed in the process";
    }
    ?> </h1>
<a href="../html/chain-inventory/inventory.php"><button>Back</button></a>
</body>
</html>