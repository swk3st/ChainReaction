<?php
    include "..\db\database.php";
    if (isset($_GET['gameID'])) {
        $data = [gameInfo($_GET['gameID']), gameStatus($_GET['gameID'])];
        echo json_encode($data);
    }
?>