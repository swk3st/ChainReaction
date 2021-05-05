<?php
session_start();
$_SESSION = array();
unset($_SESSION['playerid']);
session_destroy();
header("Location: ../html/home.php");
?> 
