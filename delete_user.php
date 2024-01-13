<?php

session_start();

if ($_SESSION['role'] != "admin") {
    header('Location: index.php');
}


    require_once './includes/dbaccess.php';

// Check if user ID is provided in the URL
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $query = "DELETE FROM `users` WHERE `user_id` = ?";
    $stmt = $db_obj->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    //$conn->close();
/*
    // Establish a connection to the database
    require_once './includes/dbaccess.php';

    
    // SQL query to delete the user
    $query = "DELETE FROM users WHERE user_id = $userId";
    $result = $conn->query($query);
*/
    
    echo "Benutzer erfolgreich gelöscht.";
    header('Location: userverwaltung.php');
    exit();
    } else {
        echo "Fehler beim Löschen des Benutzers: ";
        header('Location: userverwaltung.php');

        exit();
    }

?>
