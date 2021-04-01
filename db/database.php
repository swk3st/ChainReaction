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

function trimWords($words) {
    for ($i = 0; $i < count($words); $i++) {
        $words[$i] = trim($words[$i]);
    }
    return $words;
}

function insertChain($player_id, $words) {
    global $db;
    connect();
    $words = trimWords($words);
    $first_sql = "INSERT INTO chain (word1, word2, word3, word4, word5, word6, word7) VALUES (:word1, :word2, :word3, :word4, :word5, :word6, :word7)";
    $first_statement = $db->prepare($first_sql);
    for($i = 0; $i < count($words); $i++) {
        $bind = ":word" . strval(($i + 1));
        $first_statement->bindParam($bind, $words[$i]);
    }
    $first_statement->execute();
}
// echo randCode();
// insertChain(3, array("hi", "my","name", "is", "brad", "and", "pace"));
?>