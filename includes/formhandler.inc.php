<!-- Creating a script goes in and submit our data to db-->

<?php
// Allow access only if the submit button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $anrede = $_POST["anrede"];
    $vorname = $_POST["vorname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (isset($_POST["invalidCheck"]) && isset($_POST["anrede"]) && (!empty(($_POST["vorname"]) && ($_POST["lastname"]) && ($_POST["username"]) && ($_POST["email"]) && ($_POST["password"]) && ($_POST["password_2"])))) {

        require_once "dbaccess.php";

        try {
            // Create a new MySQLi connection
            $db_obj = new mysqli($host, $dbusername, $dbpassword, $dbname);

            // Check connection
            if ($db_obj->connect_error) {
                die("Connection failed: " . $db_obj->connect_error);
            }

            // Create a query and insert into using SQL statement
            $query = "INSERT INTO `users` (`id`, `anrede`, `vorname`, `lastname`, `email`, `username`, `password`) VALUES (NULL, ?, ?, ?, ?, ?, ?)"; //placeholders

            $stmt = $db_obj->prepare($query);
            $stmt->bind_param("ssssss", $anrede, $vorname, $lastname, $email, $username, $password);

            $stmt->execute();

            // Close the statement and connection when done
            $stmt->close();
            $db_obj->close();

            header("Location: ../result_register.php");
            die();
        } catch (Exception $e) {
            die("Query failed: " . $e->getMessage());
        }
    } else {
        // If trying to access the page without pressing the submit button, send back to the index page
        header("Location: ../register_page.php");
    }
}
?>
