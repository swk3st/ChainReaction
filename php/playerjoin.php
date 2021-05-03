<?php
    include "..\db\database.php";
    if (isset($_POST['playerID']) && isset($_POST['gameID']) && isset($_POST['displayName'])) {
        allChains($_POST['gameID'], $_POST['playerID'], $_POST['displayName']);
    }
?>