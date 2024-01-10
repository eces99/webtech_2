<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login_page.php');
}

$msg_anrede = $msg_vorname = $msg_lastname = $msg_email = $msg_username = $msg_password = '';

require_once './includes/dbaccess.php';

$query = "SELECT `anrede`, `vorname`, `lastname`, `email`, `username`, `password` FROM `users` WHERE `user_id` = ?";
$stmt = $db_obj->prepare($query);
$stmt->bind_param("i", $_SESSION['uid']);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$user_anrede = $user['anrede'];
$user_vorname = $user['vorname'];
$user_lastname = $user['lastname'];
$user_email = $user['email'];
$user_username = $user['username'];
$user_password = $user['password'];



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["anrede"])) {
        if ($user_anrede != $_POST["anrede"]) {
            $newquery = "UPDATE `users` SET `anrede` = ? WHERE `users`.`user_id` = ?";
            $stmt = $db_obj->prepare($newquery);
            $stmt->bind_param("si", $_POST["anrede"], $_SESSION['uid']);
            $stmt->execute();

            $user_anrede = $_POST["anrede"];
            $msg_anrede = "Anrede wurde aktualisiert!";
        }
    }

    if (isset($_POST["vorname"])) {
        if ($user_vorname != $_POST["vorname"]) {

            $newquery = "UPDATE `users` SET `vorname` = ? WHERE `users`.`user_id` = ?";
            $stmt = $db_obj->prepare($newquery);
            $stmt->bind_param("si", $_POST["vorname"], $_SESSION['uid']);
            $stmt->execute();

            $user_vorname = $_POST["vorname"];
            $msg_vorname = "Vorname wurde aktualisiert!";
        }
    }

    if (isset($_POST["lastname"])) {
        if ($user_lastname != $_POST["lastname"]) {

            $newquery = "UPDATE `users` SET `lastname` = ? WHERE `users`.`user_id` = ?";
            $stmt = $db_obj->prepare($newquery);
            $stmt->bind_param("si", $_POST["lastname"], $_SESSION['uid']);
            $stmt->execute();

            $user_lastname = $_POST["lastname"];

            $msg_lastname = "Nachname wurde aktualisiert!";
        }
    }

    if (isset($_POST["email"])) {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $msg_email = "Ungültige E-Mail-Adresse!";
        } else {
            if ($user_email != $_POST["email"]) {
                $newquery = "UPDATE `users` SET `email` = ? WHERE `users`.`user_id` = ?";
                $stmt = $db_obj->prepare($newquery);
                $stmt->bind_param("si", $_POST["email"], $_SESSION['uid']);

                if ($stmt->execute()) {
                    $user_email = $_POST["email"];
                    $msg_email = "<span class='text-success'>Email wurde aktualisiert!</span>";
                } else {
                    if ($db_obj->errno === 1062) { // error code 1062 means duplicate entry in unique
                        $msg_email = "<span class='text-danger'>Email has already been taken!</span>";
                    }
                    die($db_obj->error . " " . $db_obj->errno);
                }
            }
        }
    }

    if (isset($_POST["username"])) {
        if ($user_username != $_POST["username"]) {
            $newquery = "UPDATE `users` SET `username` = ? WHERE `users`.`user_id` = ?";
            $stmt = $db_obj->prepare($newquery);
            $stmt->bind_param("si", $_POST["username"], $_SESSION['uid']);

            if ($stmt->execute()) {
                $user_username = $_POST["username"];
                $msg_username = "<span class='text-success'>Username wurde aktualisiert!</span>";
            } else {
                if ($db_obj->errno === 1062) { // error code 1062 means duplicate entry in unique
                    $msg_username = "<span class='text-success'>Username has already been taken</span>";
                }
                die($db_obj->error . " " . $db_obj->errno);
            }
        }
    }

    if (!empty($_POST["password"]) && !empty($_POST["password_2"])) { // Check if
        $hashpassword_old = hash('sha512', $_POST["password"]);

        if ($hashpassword_old == $user_password) { // Check if old password is correct
            if ($_POST["password_2"] == $_POST["password_3"]) { // Check if new password is entered correctly twice
                $hashpassword_new = hash('sha512', $_POST["password_2"]);
                $newquery = "UPDATE `users` SET `password` = ? WHERE `users`.`user_id` = ?";
                $stmt = $db_obj->prepare($newquery);
                $stmt->bind_param("si", $hashpassword_new, $_SESSION['uid']);
                $stmt->execute();
                $msg_password = "<span class='text-success'>Passwort wurde aktualisiert!</span>";
            } else {
                $msg_password = "<span class='text-danger'>Neues Passwort erneut korrekt eingeben!</span>";
            }
        } else {
            $msg_password = "<span class='text-danger'>Altes Passwort stimmt nicht überein!</span>";
        }
    } else if (!empty($_POST["password"]) || !empty($_POST["password_2"]) || !empty($_POST["password_3"])) {
        $msg_password = "<span class='text-danger'>Bitte altes und neues Passwort angeben!</span>";
    }
}

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
    <title>Login Page</title>

</head>

<body>
    <!--Navbar-->
    <header>
        <?php include_once './includes/navbar.php' ?>
    </header>
    <div class="bg-image" style="background-image: url('https://images.unsplash.com/photo-1490122417551-6ee9691429d0?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); height: 100%; background-repeat: no-repeat; background-size: cover; background-position:center;">
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"><?php echo $user_vorname . " " . $user_lastname ?></span><span class="text-black-50"><?php echo $user_email ?></span><span> </span></div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profileinstellungen</h4>
                        </div>
                        <div class="row mt-3">
                            <form action="" method="post">
                                <select class="form-select" aria-label="anrede" name="anrede">
                                    <option disabled value="">Bitte wählen Sie den Anrede</option>

                                    <option <?php if ($user_anrede == "Herr") echo "selected"; ?> value="Herr">Herr</option>
                                    <option <?php if ($user_anrede == "Frau") echo "selected"; ?> value="Frau">Frau</option>
                                    <option <?php if ($user_anrede == "Transgender") echo "selected"; ?> value="Transgender">Transgender</option>
                                    <option <?php if ($user_anrede == "Non-binary/non-conforming") echo "selected"; ?> value="Non-binary/non-conforming">Non-binary/non-conforming</option>
                                    <option <?php if ($user_anrede == "Keine Antwort") echo "selected"; ?> value="Keine Antwort">Keine Antwort</option>
                                </select>
                                <?php echo "<span class='text-success'> $msg_anrede </span>" ?>
                                <br>
                                <div class="form-group">
                                    <label for="vorname">Vorname</label>
                                    <input type="text" class="form-control" name="vorname" id="vorname" value="<?php echo $user_vorname ?>">
                                </div>
                                <?php echo "<span class='text-success'> $msg_vorname </span>" ?>
                                <br>
                                <div class="form-group">
                                    <label for="lastname">Nachname</label>
                                    <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $user_lastname ?>">
                                </div>
                                <?php echo "<span class='text-success'> $msg_lastname </span>" ?><br>
                                <div class="form-group">
                                    <label for="email">E-mail Adresse</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="example@email.com" value="<?php echo $user_email ?>">
                                </div>
                                <?php echo $msg_email; ?>
                                <br>
                                <div class="form-group">
                                    <label for="username">Benutzername</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Gewünschter Benutzername" value="<?php echo $user_username ?>">
                                </div>
                                <?php echo $msg_username; ?>
                                <br>
                                <div class="form-group">
                                    <label for="password">Altes Passwort</label>
                                    <input type="password" class="form-control" name="password" id="password" value="">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="password_2">Neues Passwort</label>
                                    <input type="password" class="form-control" name="password_2" id="password_2" value="">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="password_3">Neues Passwort bestätigen</label>
                                    <input type="password" class="form-control" name="password_3" id="password_3" value="">
                                </div>
                                <?php echo $msg_password; ?>
                                <br>
                                <div class="col-12">
                                    <button class="btn btn-dark" type="submit" name="register">Änderungen speichern</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include './includes/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>