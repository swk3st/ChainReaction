<?php
include('../db/database.php');

if(!isset($_SESSION['playerID'])){
    header("location:guestnavbar.php"); 
} 
else{
    header("location:usernavbar.php");
}
?>

<?php if(!$_SESSION['playerID']) {
    header("location:guestnavbar.php"); 
      } else {
    header("location:usernavbar.php");
    } ?>