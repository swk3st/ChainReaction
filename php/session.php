<?php

    // Call this function when the user is beginning their session
    function login($email, $pwd) {
        include "../db/database.php";
        session_start();
        $returnCode = [false, "Something went wrong."];
        $playerInfo = getPlayerID($email);
        if (count($playerInfo) == 0) { 
            $returnCode[1] = "Couldn't Find A User with the email " . $email;
            return $returnCode;
        }
        $player_id = $playerInfo[0]["player_id"];
        if (!checkPwd($player_id, $pwd)) {
            $returnCode[1] = "The password you entered does not match the password with the email " . $email;
            return $returnCode; 
        }
        $_SESSION["playerID"] = $player_id;
        $returnCode[0] = true;
        $returnCode[1] = "";
        return $returnCode;
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