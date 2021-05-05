<?php
    include "..\db\database.php";
    $data = json_decode(file_get_contents('php://input'), true);
    $gameID = $data['gameID'];
    $playerID = $data['playerID'];
    $displayName = $data['displayName'];
    $areSet = isset($gameID) && isset($playerID) && isset($displayName);
    if ($areSet) {
        safeJoin($gameID, $playerID, $displayName);
    }  
?>