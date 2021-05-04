<?php
    include "..\db\database.php";
    $data = json_decode(file_get_contents('php://input'), true);
    $gameID = $data['gameID'];
    // $playerID = $data['playerID'];
    // $displayName = $data['displayName'];
    $areSet = isset($gameID);
    if ($areSet) {
        startGame($gameID);
    }  
?>