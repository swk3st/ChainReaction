<DOCTYPE HTML!>
<html>

<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
header('Access-Control-Max-Age: 1000');  
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');

    // include "..\db\database.php";
include getcwd() . '/../db/database.php';

$chains = allChains('random');
$chainID;
if (count($chains) != 0) {
    $ind = array_rand($chains);
    $chainID = $chains[$ind]['chain_id'];
    echo ($chainID);
    header("Location: ./creategame.php?chainID=$chainID");
}
?>
</html>