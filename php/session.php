<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
header('Access-Control-Max-Age: 1000');  
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');

    // include "../db/database.php";
    include getcwd() . '/../db/database.php';
    // Call this function when the user is beginning their session
    function login($email, $pwd) {
        startSession();
        $returnCode = [false, "Something went wrong."];
        $playerInfo = getPlayerID($email);
        if (count($playerInfo) == 0) { 
            $returnCode[1] = "No Users Found With Email " . $email;
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
        startSession();
        $_SESSION = array();
        session_destroy();
    }

    // Call this function to get playerID
    function retrievePlayerID($email) {
        return getPlayerID($email)[0]["player_id"];
    }


    function startSession() {
        if(session_id() == '') {
            session_start();
        }
    }
?>