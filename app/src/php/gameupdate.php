<?php
    include "..\db\database.php";
    if (isset($_POST['guessType']))
    {
        $game_ID = $_POST['gameID'];
        $player_ID = $_POST['playerID'];
        if($_POST['guessType'] == 'correct') {
            correctGuessPlayer($game_ID, $player_ID)
        } else {
            incorrectGuessPlayer($game_ID, $player_ID);
        }
    }
?>