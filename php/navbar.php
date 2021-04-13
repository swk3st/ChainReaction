<?php
include('../db/database.php');

session_start();

if(!isset($_SESSION['playerID'])){
    include("guestnavbar.php");
} 
else{
    include("usernavbar.php");
}
?>

