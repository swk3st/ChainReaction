<?php
    include "..\db\database.php";
    if (isset($_GET['chainID'])) {
        $data = getChain($_GET['chainID']);
        echo json_encode($data);
    }
?>