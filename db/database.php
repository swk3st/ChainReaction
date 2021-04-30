<?php

    $db = NULL;

/** connect to the database **/
function connect () {
    global $db;
    if(!isset($db)) {
        try 
        {
        /******************************/
        // connecting to GCP cloud SQL instance

            $username = 'root';
        // $password = 'your-root-password';
            $password = 'chainreaction';

        // $dbname = 'your-database-name';
            $dbname = 'chain_reaction';

        // if PHP is on GCP standard App Engine, use instance name to connect
        // $host = 'instance-connection-name';
        // $host = 'db';

        // if PHP is hosted somewhere else (non-GCP), use public IP address to connect
        // $host = "public-IP-address-to-cloud-instance";
            $host = "34.86.237.81";


        /******************************/
        // connecting to DB on XAMPP (local)

        // $username = 'your-username';
        // $password = 'your-password';
        // $host = 'localhost:3306';
        // $dbname = 'your-database-name';


        /******************************/

            $dsn = "mysql:host=$host;dbname=$dbname";
            $db = new PDO($dsn, $username, $password);   
            // echo "<p>You are connected to the database</p>";
            return true;
        }
        catch (PDOException $e)     // handle a PDO exception (errors thrown by the PDO library)
        {
            // Call a method from any object, 
            // use the object's name followed by -> and then method's name
            // All exception objects provide a getMessage() method that returns the error message 
            $error_message = $e->getMessage();        
            echo "<p>An error occurred while connecting to the database: $error_message </p>";
        }
        catch (Exception $e)       // handle any type of exception
        {
            $error_message = $e->getMessage();
            // echo "<p>Error message: $error_message </p>";
        }
    }
    return false;
}

function randCode() {
    $characters = "abcdefghijklmnopqrstuvwxyz0123456789";
    $code = "";
    $chars = 0;
    while($chars < 10) {
        $index = mt_rand(0, strlen($characters) - 1);
        $code .= $characters[$index];
        $chars++;
    }
    return $code;
}

function existsString($table, $attribute, $value) {
    global $db;
    connect();
    $sql = "SELECT * FROM  $table  WHERE $attribute = :v";
    $statement = $db->prepare($sql);
    $statement->bindParam(":v", $value);
    $statement->execute();
    return $statement->rowCount() != 0;
}

function trimWords($words) {
    for ($i = 0; $i < count($words); $i++) {
        $words[$i] = trim($words[$i]);
    }
    return $words;
}

function generateID($table, $attribute) {
    $id = randCode();
    while(existsString($table, $attribute, $id)) {
        //dangerous loop, what if fills up? we will assume it will never fill up
        $id = randCode();
    }
    return $id;
}

function encrypt($plain_text) {
    return $plain_text;
}

function decrypt($encrypted_text) {
    return $encrypted_text;
}

function insertPlayer($email, $pwd, $fname, $lname) {

    global $db;
    connect();

    $player_id = generateID("player", "player_id");
    $encrypted_pwd = encrypt($pwd);

    $sql = "INSERT INTO player (player_id, email, encrypted_pwd, earnings, guesses, correct, firstname, lastname) VALUES (:player_id, :email, :encrypted_pwd, :earnings, :guesses, :correct, :fname, :lname)";
    $statement = $db->prepare($sql);
    $statement->bindParam(":player_id", $player_id);
    $statement->bindParam(":email", $email);
    $statement->bindParam(":encrypted_pwd", $encrypted_pwd);
    $statement->bindValue(":earnings", 0);
    $statement->bindValue(":guesses", 0);
    $statement->bindValue(":correct", 0);
    $statement->bindParam(":fname", $fname);
    $statement->bindParam(":lname", $lname);
    $statement->execute();

    return $player_id;
}

function checkPwd($player_id, $pwd) {
    global $db;
    connect();

    $sql = "SELECT encrypted_pwd FROM  player  WHERE player_id = :player_id";
    $statement = $db->prepare($sql);
    $statement->bindParam(":player_id", $player_id);
    $statement->execute();
    $result = $statement->fetchAll();
    $retrived_pwd = $result[0]["encrypted_pwd"];
    return strcmp(encrypt($pwd), $retrived_pwd) == 0;
}

function getPlayerID($email) {
    global $db;
    connect();
    $sql = "SELECT player_id FROM player WHERE email = :email";
    $statement = $db->prepare($sql);
    $statement->bindParam(":email", $email);
    $statement->execute();
    $result = $statement->fetchAll();
    return $result;
}

function checkUserExists($email)
{
    global $db;
    connect();

    // $sql = "SELECT count(*) FROM player WHERE email= :email";

    // $statement = $db->prepare($sql);
    // $statement->bindParam(":email", $email);
    // $results = $statement->execute();
    // $user_exists = 0;
    // $statement->bindValue($user_exists);
    // if ($results) {
    //     $statement->fetch();
    //     return $user_exists == 1;
    // }
    // $statement->close();
    // return false;

    $sql = "SELECT player_id FROM player WHERE email = :email";
    $statement = $db->prepare($sql);
    $statement->bindParam(":email", $email);
    $statement->execute();
    return $statement->rowCount() != 0;
}

function removePlayer($player_id) {

    global $db;
    connect();

    $sql = "DELETE FROM player WHERE player_id = :player_id";
    $statement = $db->prepare($sql);
    $statement->bindParam(":player_id", $player_id);
    $statement->execute();

    return $player_id;
}


function insertChain($player_id, $words) {

    global $db;
    connect();

    $words = trimWords($words);
    $chain_id = generateID("chain", "chain_id");

    $first_sql = "INSERT INTO chain (chain_id, word1, word2, word3, word4, word5, word6, word7) VALUES (:chain_id, :word1, :word2, :word3, :word4, :word5, :word6, :word7)";
    $first_statement = $db->prepare($first_sql);
    $first_statement->bindParam(":chain_id", $chain_id);
    for($i = 0; $i < count($words); $i++) {
        $bind = ":word" . strval(($i + 1));
        $first_statement->bindParam($bind, $words[$i]);
    }
    $first_statement->execute();
    
    
    $second_sql = "INSERT INTO owns (player_id, chain_id) VALUES (:player_id, :chain_id)";
    $second_statement = $db->prepare($second_sql);
    $second_statement->bindParam(":player_id", $player_id);
    $second_statement->bindParam(":chain_id", $chain_id);
    $second_statement->execute();

    return $chain_id;
}

function updateChain($chain_id, $words) {

    global $db;
    connect();

    for($i = 0; $i < count($words); $i++) {
        $word_tag = "word" . strval($i + 1);
        $sql = "UPDATE chain SET " . $word_tag . " = :word WHERE chain_id = :chain_id";
        $statement = $db->prepare($sql);
        $statement->bindParam(":word", $words[$i]);
        $statement->bindParam(":chain_id", $chain_id);
        $statement->execute(); 
    }
}


function removeChain($chain_id) {

    global $db;
    connect();

    $first_sql = "DELETE FROM owns WHERE chain_id = :chain_id";
    $first_statement = $db->prepare($first_sql);
    $first_statement->bindParam(":chain_id", $chain_id);
    $first_statement->execute();

    $second_sql = "DELETE FROM chain WHERE chain_id = :chain_id";
    $second_statement = $db->prepare($second_sql);
    $second_statement->bindParam(":chain_id", $chain_id);

    $second_statement->execute();  

    return $chain_id;
    
}

function allChains($player_id) {

    global $db;
    connect();

    $sql = "SELECT chain_id, word1, word2, word3, word4, word5, word6, word7 FROM owns NATURAL JOIN chain WHERE player_id = :player_id";
    $statement = $db->prepare($sql);
    $statement->bindParam(":player_id", $player_id);
    $statement->execute();
    $result = $statement->fetchAll();
    return $result;

    // Format of result:
    // Array ( 
    //     [0] => Array ( 
    //         [chain_id] => 2o8oh0wcno [0] => 2o8oh0wcno 
    //         [word1] => hi [1] => hi 
    //         [word2] => my [2] => my 
    //         [word3] => name [3] => name 
    //         [word4] => is [4] => is 
    //         [word5] => brad [5] => brad 
    //         [word6] => and [6] => and 
    //         [word7] => pace [7] => pace )
    //     [1] => Array ( 
    //         [chain_id] => hahahahaha [0] => hahahahaha 
    //         [word1] => hi [1] => hi 
    //         [word2] => my [2] => my 
    //         [word3] => name [3] => name 
    //         [word4] => is [4] => is 
    //         [word5] => michael [5] => michael 
    //         [word6] => and [6] => and 
    //         [word7] => a [7] => a ) )
}

function checkChainOwnership($player_id, $chain_id) {
    global $db;
    connect();
    $sql = "SELECT * FROM  owns  WHERE player_id = :p AND chain_id = :c";
    $statement = $db->prepare($sql);
    $statement->bindParam(":p", $player_id);
    $statement->bindParam(":c", $chain_id);
    $statement->execute();
    return $statement->rowCount() != 0;
}


function countPlayers($game_id) {
    global $db;
    connect();
    $sql = "SELECT * FROM playing WHERE game_id = :g";
    $statement = $db->prepare($sql);
    $statement->bindParam(":g", $game_id);
    $statement->execute();
    return $statement->rowCount();
}

function playerInfo($player_id) {
    global $db;
    connect();
    $sql = "SELECT * FROM player WHERE player_id = :p";
    $statement = $db->prepare($sql);
    $statement->bindParam(":p", $player_id);
    $statement->execute();
    $result = $statement->fetchAll();
    return $result;
}

function createCustomGame($owner_id, $chain_id) {
    createGame($owner_id, $chain_id);
}

function createRandomGame($owner_id) {
    $chain_id = "lol"; // randomly pick a pre created chain
    createGame($owner_id, $chain_id);
}

function createGame($owner_id, $chain_id) {
    global $db;
    connect();
    $sql = "INSERT INTO game (game_id, chain_id, owner_id, game_status, current_team) 
        VALUES (:g, :c, :o, :s, :t)";
    $statement = $db->prepare($sql);
    $game_id = generateID("game", "game_id");
    $statement->bindParam(":g", $game_id);
    $statement->bindParam(":c", $chain_id);
    $statement->bindParam(":o", $owner_id);
    $statement->bindValue(":s", "waiting");
    $statement->bindValue(":t", 1);
    $statement->execute();
    initalizeTeams($game_id);
}

function initalizeTeams($game_id) {
    createTeam($game_id, 1);
    createTeam($game_id, 2);
}

function createTeam($game_id, $team_num) {
    global $db;
    connect();
    $sql = "INSERT INTO teams (game_id, team_num, turn) VALUES (:g, :n, :turn)";
    $statement = $db->prepare($sql);
    $statement->bindParam(":g", $game_id);
    $statement->bindParam(":n", $team_num);
    $statement->bindValue(":turn", 0);
    $statement->execute();
}

function playerCount($game_id) {
    global $db;
    connect();
    $sql = "SELECT COUNT(player_id) FROM teams WHERE game_id = :g GROUP BY team_num"
    $statement = $db->prepare($sql);
    $statement->bindParam(":g", $game_id);
    $statement->execute();
    return $statement->fetchAll();
}

function newPlayerJoin($game_id, $player_id) {
    global $db;
    connect();
    $counts = playerCount($game_id);
    $team1Count = $counts[0][0];
    $team2Count = $counts[1][0];
    if ($team1Count == $team2Count) {
        playerJoin($game_id, $player_id, 0);
    } else {
        playerJoin($game_id, $player_id, 1);
    }
}

function playerJoin($game_id, $player_id, $team_num) {
    global $db;
    connect();
    $sql = "INSERT INTO playerData(game_id, team_num, player_id, correct, guesses, earnings) 
        VALUES (:game_id, :team_num, :p, :c, :g, :e)";
    $statement = $db->prepare();
    $statement->bindParam(":game_id", $game_id);
    $statement->bindParam(":team_num", $team_num);
    $statement->bindParam(":p", $player_id);
    $statement->bindValue(":c", 0);
    $statement->bindValue(":g", 0);
    $statement->bindValue(":e", 0);
    $statement->execute();
}

function getTeam($game_id, $player_id) {

}

function getOwner($game_id) {
    global $db;
    connect();
    $sql = ""
}

function switchTeams($game_id, $player_id, $team_num) {

}
?>