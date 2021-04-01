<?php

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

    $db = NULL;

/** connect to the database **/
function connect () {
    global $username, $password, $dbname, $host, $dsn, $db;
    if(!isset($db)) {
        try 
        {
            $db = new PDO($dsn, $username, $password);   
            echo "<p>You are connected to the database</p>";
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
            echo "<p>Error message: $error_message </p>";
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

function exists_string($table, $attribute, $value) {
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

function new_id($table, $attribute) {
    $id = randCode();
    while(exists_string($table, $attribute, $id)) {
        //dangerous loop, what if fills up? we will assume it will never fill up
        $id = randCode();
    }
    return $id;
}

function insertChain($player_id, $words) {

    global $db;
    connect();

    $words = trimWords($words);
    $chain_id = new_id("chain", "chain_id");

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
    $second_statement->bindParam("player_id", $player_id);
    $second_statement->bindParam("chain_id", $chain_id);
    $second_statement->execute();
}

?>