<?php
include('../db/database.php');

session_start();

if(!isset($_SESSION['playerID'])){
    include("location:guestnavbar.php"); 
} 
else{
    include("location:usernavbar.php");
}
?>

