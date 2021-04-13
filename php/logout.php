<?php
unset($_SESSION["playerID"])
session_destroy();
$_SESSION = array();
header("Location: login.php");
exit;
?>