<?php

$host = "localhost";
$dbname = "hotel";
$dbusername = "root";
$dbpassword = "spoilers123";

// try-catch block: creating a db connection object and if an error occurs, we can react to that
try {
    // Create a new MySQLi connection
    $db_obj = new mysqli($host, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($db_obj->connect_error) {
        die("Connection failed: " . $db_obj->connect_error);
    }

    // Optional: Set character set to utf8 (or any other desired character set)
    $db_obj->set_charset("utf8");
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Rest of your code goes here...

// Close the connection when done (if needed)
$db_obj->close();
?>
