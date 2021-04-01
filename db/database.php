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
        return false;
    }
}


?>