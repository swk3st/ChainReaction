<?php
    if (isset($_GET['var'])) {
        echo json_encode($_SESSION[$_GET['var']]);
    }
?>