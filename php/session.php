<?php

    // Call this function when the user is beginning their session
    function login($email, $pwd) {
        include "../db/database.php";
        session_start();
        $playerInfo = getPlayerID($email);
        if (count($playerInfo) == 0) { 
            return false;
        }
        $player_id = $playerInfo[0]["player_id"];
        if (!checkPwd($player_id, $pwd)) {
           return false; 
        }
        $_SESSION["playerID"] = $player_id;
        return true;
    }

    // Call this function when the user is ending their session
    function logout() {
        session_start();
        $_SESSION = array();
        session_destroy();
    }

    // Call this function to get playerID
    function retrievePlayerID($email) {
        include "../db/database.php";
        return getPlayerID($email)[0]["player_id"];
    }

?>