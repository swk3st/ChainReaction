<?php
    include "..\db\database.php";
    if (isset($_GET['gameID'])) {
        echo json_encode(currentGameStatus($_GET['gameID']));
    }
?>