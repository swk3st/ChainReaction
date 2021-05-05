<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
header('Access-Control-Max-Age: 1000');  
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');

    include "..\db\database.php";
    $gameID = $_GET['gameID'];
    if (isset($gameID)) {
        echo json_encode(currentGameStatus($gameID));
    }
?>