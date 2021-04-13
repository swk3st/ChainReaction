<?php
require('../db/database.php');
include(../php/session.php);

if(!isset($_SESSION['playerID'])){
header("location:guestnavbar.php"); 
} 
else{
    header("location:usernavbar.php")
}
?>