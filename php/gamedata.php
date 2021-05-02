<?php
    include "..\db\database.php";
    if (isset($_GET['gameID'])) {
        echo json_encode(gameState($_GET['gameID']));
    }
?>