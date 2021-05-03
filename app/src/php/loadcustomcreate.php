<?php
    include "..\db\database.php";
    if (isset($_GET['playerID'])) {
        echo json_encode(allChains($_GET['playerID']));
    }
?>