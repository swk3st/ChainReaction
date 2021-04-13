<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="/resources/chainreactionlogo.png">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Solimar Kwa and Michael Asare">
    <meta name="description" content="Login Screen for users.">
    <meta name="keywords" content="Game, Online Game, Login Chain Reaction, Chain Reaction">

    <title> Chain Reaction Login </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="..\css\login.css">

</head>

<header>
<?php include('../php/navbar.php'); ?>
  </header>

  <?php 
    include("../php/session.php");
    if(isset($_POST["email"])) {
      $email = $_POST['email'];
      $password = $_POST['pwd'];
      $error_msg = "";
      $state = login($email, $password);
      $player_id = NULL;
      // print_r($state);
      if($state[0]){
        $player_id = retrievePlayerID($email);
        if (isset($_POST["remember"])){
          setcookie("login", $player_id, time() + (60*60*2));
        }
          header("Location: ./account.php");
        } else {
            // header("login.html");
            $error_msg = $state[1];
        }
    }
  ?>
  
<body>

    <div class="center">
        <div class="user_card">
            <div class="logo_container">
                <img src="..\resources\chainreactionlogo.png" class="brand_logo" alt="Chain Reaction Retro Logo">
            </div>

<<<<<<< HEAD:html/login.html
            <form action="../html/account.html" >
                <label>Email:</label><input type="text" name="email" id="email" autofocus />
                <br>
                <label> Password:</label><input type="text" name="pwd" id="password" />
=======
            <p><?php if (isset($error_msg)) echo $error_msg ?></p>

            <form action="login.php" method="post">
                <label>Email:</label><input type="text" name="email" id="email" autofocus required />
                <br>
                <label> Password:</label><input type="text" name="pwd" id="pwd" required />
>>>>>>> dev:html/login.php


                <div class="checkbox">
                    <input type="checkbox" id="remember" name="remember">
                    <label>Remember me</label>
                </div>

                <button type="submit" value="Submit">Login</button>
                <button type="reset" value="Reset">Reset</button>
            </form>

            <div class="d-flex justify-content-center ">
                Don't have an account? <a href="#" class="ml-2">Sign Up</a>
            </div>

            <div class="d-flex justify-content-center">
                <a href="#">Forgot your password?</a>
            </div>
        </div>

    </div>


</body>

</html>
