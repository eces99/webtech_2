<?php

// Formularvalidierung und Verarbeitung der Benutzerregistrierungsdaten.


// Initialisierung von Fehlermeldungen und Eingabevariablen

$msg_anrede = $msg_vorname = $msg_lastname = $msg_username = $msg_email = $msg_password = $msg_password_2 = '';
$anrede = $vorname = $lastname = $username = $email = $password = $password_2 = $msg_checkbox = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST["anrede"])) {
        $msg_anrede = "Anrede ist benötigt!";
    } else {
        $anrede = test_input($_POST["anrede"]);
    }
    if (empty($_POST["vorname"])) {
        $msg_vorname = "Vorname ist benötigt!";
    } else {
        $vorname = test_input($_POST["vorname"]);
    }
    if (empty($_POST["lastname"])) {
        $msg_lastname = "Nachname ist benötigt!";
    } else {
        $lastname = test_input($_POST["lastname"]);
    }
    if (empty($_POST["username"])) {
        $msg_username = "Benutzername ist benötigt!";
    } else {
        $username = test_input($_POST["username"]);
    }
    if (empty($_POST["email"])) {
        $msg_email = "Email ist benötigt!";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $msg_email = "Ungültige E-Mail-Adresse!";
    } else {
        $email = test_input($_POST["email"]);
    }
    if (empty($_POST["password"])) {
        $msg_password = "Passwort ist benötigt";
    } else {
        $password = test_input($_POST["password"]);
    }
    if (empty($_POST["password_2"])) {
        $msg_password_2 = "Passwort nochmal angeben!";
    } elseif ($_POST["password"] !== $_POST["password_2"]) {
        $msg_password_2 = "Passwörter stimmen nicht überein!";
    }
    if (!isset($_POST["invalidCheck"])) {
        $msg_checkbox = "Sie müssen den Allgemeinen Geschäftsbedingungen zustimmen.";
    }

    $role = 'anonym';
    $profile_photo = ''; // You should replace this with the actual blob data when handling file uploads.

    $hashpassword = hash('sha512', $password); // hashed password with hash512 algorithm

    // Weiterleitung zur Ergebnisseite, wenn alle Validierungen erfolgreich sind
    if (isset($_POST["anrede"]) && isset($_POST["vorname"]) && isset($_POST["lastname"]) && isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password_2"]) && isset($_POST["invalidCheck"])) {

        require_once "./includes/dbaccess.php";

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

            header("Location: ./result_register.php");
            die();
        } else {
            if ($db_obj->errno === 1062) { // error code 1062 for duplicate entries in unique
                die("Username already exists/Email has already been taken");
            }
            die($db_obj->error . " " . $db_obj->errno);
        }
    } else {
        // If trying to access the page without pressing the submit button, send back to the index page
        //header("Location: ../register_page.php");
    }
}


// Diese Funktion bereinigt und validiert Eingabedaten.
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="./Images/Untitled-design.svg">
    <title>Registrierung</title>

</head>

<body>

    <!--Navbar-->
    <header>
        <?php include_once './includes/navbar.php' ?>
    </header>
    <div class="bg-image" style="background-image: url('https://images.unsplash.com/photo-1586967440896-732b8ef262f9?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); height: 100%; background-repeat: no-repeat; background-size: cover;">

        <div id="register_page" class="container">
            <div class="row justify-content-center">
                <div class="col-xxs-6 col-md-8 col-lg-6" id="box">
                    <div class="p-3 mb-2 bg-transparent text-dark">
                        <h1 class="h3 mb-3 font-weight-normal text-center">Anmeldeformular</h1>
                        <!--<form action="./includes/formhandler.inc.php" method="post">-->
                        <form method="post">
                            <select class="form-select" aria-label="anrede" name="anrede">
                                <option selected disabled value="">Bitte wählen Sie die Anrede</option>
                                <option value="Herr" <?php if (isset($_POST["anrede"])) {
                                                            if ($_POST["anrede"] == "Herr") {
                                                                echo "selected";
                                                            }
                                                        } ?>>Herr</option>
                                <option value="Frau" <?php if (isset($_POST["anrede"])) {
                                                            if ($_POST["anrede"] == "Frau") {
                                                                echo "selected";
                                                            }
                                                        } ?>>Frau</option>
                                <option value="Transgender" <?php if (isset($_POST["anrede"])) {
                                                                if ($_POST["anrede"] == "Transgender") {
                                                                    echo "selected";
                                                                }
                                                            } ?>>Transgender</option>
                                <option value="Non-binary/non-conforming" <?php if (isset($_POST["anrede"])) {
                                                                                if ($_POST["anrede"] == "Non-binary/non-conforming") {
                                                                                    echo "selected";
                                                                                }
                                                                            } ?>>Non-binary/non-conforming</option>
                                <option value="Keine Antwort" <?php if (isset($_POST["anrede"])) {
                                                                    if ($_POST["anrede"] == "Keine Antwort") {
                                                                        echo "selected";
                                                                    }
                                                                } ?>>Keine Antwort</option>
                            </select>
                            <?php echo "<span class='error_msg'> $msg_anrede </span>" ?>
                            <br>
                            <div class="form-group">
                                <label for="vorname">Vorname</label>
                                <input type="text" class="form-control" name="vorname" id="vorname" value="<?php if (isset($_POST["vorname"])) echo $_POST["vorname"] ?>">
                            </div>
                            <?php echo "<span class='error_msg'> $msg_vorname </span>" ?>
                            <br>
                            <div class="form-group">
                                <label for="lastname">Nachname</label>
                                <input type="text" class="form-control" name="lastname" id="lastname" value="<?php if (isset($_POST["lastname"])) echo $_POST["lastname"] ?>">
                            </div>
                            <?php echo "<span class='error_msg'> $msg_lastname </span>" ?><br>
                            <div class="form-group">
                                <label for="email">E-mail Adresse</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="example@email.com" value="<?php if (isset($_POST["email"])) echo $_POST["email"] ?>">
                            </div>
                            <?php echo "<span class='error_msg'> $msg_email </span>" ?>
                            <br>
                            <div class="form-group">
                                <label for="username">Benutzername</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Gewünschter Benutzername" value="<?php if (isset($_POST["username"])) echo $_POST["username"] ?>">
                            </div>
                            <?php echo "<span class='error_msg'> $msg_username </span>" ?>
                            <br>
                            <div class="form-group">
                                <label for="password">Passwort</label>
                                <input type="password" class="form-control" name="password" id="password" value="">
                            </div>
                            <?php echo "<span class='error_msg'> $msg_password </span>" ?>
                            <br>
                            <div class="form-group">
                                <label for="password_2">Passwort wiederholen</label>
                                <input type="password" class="form-control" name="password_2" id="password_2" value="">
                            </div>
                            <?php echo "<span class='error_msg'> $msg_password_2 </span>" ?>
                            <br>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="invalidCheck" name="invalidCheck" <?php if (isset($_POST["invalidCheck"])) echo "checked" ?>>
                                    <label class="form-check-label" for="invalidCheck">
                                        Ich stimme den Allgemeinen Geschäftsbedingungen zu.
                                    </label><br>
                                    <?php echo "<span class='error_msg'> $msg_checkbox </span>" ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-dark" type="submit" name="register">Formular abschicken</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include './includes/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>