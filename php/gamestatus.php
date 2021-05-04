<?php
    include "..\db\database.php";
    $gameID = $_GET['gameID'];
    if (isset($gameID)) {
        echo json_encode(currentGameStatus($gameID));
    }
?>