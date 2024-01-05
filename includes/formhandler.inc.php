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
    $role = 'anonym';
    $profile_photo = ''; // You should replace this with the actual blob data when handling file uploads.

    $hashpassword = hash('sha512', $password); // hashed password with hash512 algorithm


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
            $query = "INSERT INTO `users`(`user_id`, `role`, `anrede`, `vorname`, `lastname`, `email`, `username`, `password`, `profile_photo`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"; //placeholders

            // Check query for errors (f.e. duplicate entries for unique usernames/emails)
            $stmt = $db_obj->stmt_init();
            if (!$stmt->prepare($query)) {
                die("SQL error: " . $db_obj->error);
            }

            $stmt = $db_obj->prepare($query);
            $stmt->bind_param("isssssssb", $user_id, $role, $anrede, $vorname, $lastname, $email, $username, $hashpassword, $profile_photo);

            if ($stmt->execute()) {
                // Close the statement and connection when done
                $stmt->close();
                $db_obj->close();

                header("Location: ../result_register.php");
                die();
            } else {
                if ($db_obj->errno === 1062) { // error code 1062 for duplicate entries in unique
                    die("Username already exists/Email has already been taken");
                }
                die($db_obj->error . " " . $db_obj->errno);
            }
        } catch (Exception $e) {
            die("Query failed: " . $e->getMessage());
        }
    } else {
        // If trying to access the page without pressing the submit button, send back to the index page
        header("Location: ../register_page.php");
    }
}
?>