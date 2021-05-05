<?php
// header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
header('Access-Control-Max-Age: 1000');  
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');

// include "..\db\database.php";
include getcwd() . '/../db/database.php';
$data = json_decode(file_get_contents('php://input'), true);
$gameID = $data['gameID'];
$playerID = $data['playerID'];
$displayName = $data['displayName'];
$payout = $data['payout'];
$areSet = isset($gameID) && isset($playerID) && isset($displayName) && isset($payout);
if ($areSet) {
    realTimeUpdate($gameID, $playerID, $displayName, $payout);
}  

?>