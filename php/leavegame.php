<?php
    include "..\db\database.php";
    $data = json_decode(file_get_contents('php://input'), true);
    $gameID = $data['gameID'];
    $playerID = $data['playerID'];
    $areSet = isset($gameID) && isset($playerID);
    if ($areSet) {
        leaveGame($playerID, $gameID);
    }  
?>