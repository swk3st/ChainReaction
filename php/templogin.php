<?php 
  include(../php/session.php);

  $email = $_POST['email'];
  $password = $_POST['password'];
  $state = login($email, $password);
  $player_id = NULL;
  if($state){
    $player_id = playerID($email);
    if (isset($_POST["remember"])){
        setcookie("login", $player_id, time() + (60*60*2));
    }
    header("account.php");
  } else {
    header("login.html");
  }
  ?>