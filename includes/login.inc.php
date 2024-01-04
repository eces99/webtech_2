<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];


    if (isset($_POST["username"]) && isset($_POST["password"])) {
        require_once "dbaccess.php";

        try {
            // Create a new MySQLi connection
            $db_obj = new mysqli($host, $dbusername, $dbpassword, $dbname);

            // Check connection
            if ($db_obj->connect_error) {
                die("Connection failed: " . $db_obj->connect_error);
            }

            // Create a query and select using SQL statement
            $query = "SELECT `username`, `password` FROM `users` WHERE `username` = $username";

            $stmt = $db_obj->prepare($query);

            $stmt->execute();
            $stmt->bind_result($user_username, $user_password); // store selected data into variables

            // Close the statement and connection when done
            $stmt->close();
            $db_obj->close();

            if ($username == $user_username && hash('sha512', $password) == $user_password) {
                echo "Successful login!<br>";
                $_SESSION['user'] = $username;

                // Set a cookie for the username (you can set other cookie parameters as needed)
                setcookie('username', $username, time() + 3600, '/'); // Cookie expires in 1 hour

                header("Location: ../index.php");
                die();
            } else {
                echo "Invalid password!<br>";
            }

            header("Location: ../index.php");
            die();
        } catch (Exception $e) {
            die("Query failed: " . $e->getMessage());
        }
    } else {
        // If trying to access the page without pressing the submit button, send back to the index page
        header("Location: ../login_page.php");
    }
}
