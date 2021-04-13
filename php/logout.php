<!-- <?php
session_start();
$_SESSION = array();
unset($_SESSION['playerid']);
session_destroy();
header("Location: ../html/home.php");
?> -->

<?php
session_start();
unset($_SESSION["playerid"]);
header("Location: ../html/home.php");
?>