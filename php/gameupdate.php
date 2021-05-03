<?php
    include "..\db\database.php";
    if (isset($_POST['start']))
    {
        $game_ID = $_POST['gameID'];
        startGame($game_ID);
    }
?>