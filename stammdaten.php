<?php
session_start();
$msg_anrede = $msg_vorname = $msg_lastname = $msg_username = $msg_email = $msg_password = $msg_password_2 = $msg_checkbox = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["anrede"])) {
        if ($_SESSION["updateAnrede"] != $_POST["anrede"]) {
            $msg_anrede = "Anrede wurde aktualisiert!";
        }
        $_SESSION["updateAnrede"] = $_POST["anrede"];
    }

    if (isset($_POST["vorname"])) {
        if ($_SESSION["updateVorname"] != $_POST["vorname"]) {
            $msg_vorname = "Vorname wurde aktualisiert!";
        }
        $_SESSION["updateVorname"] = $_POST["vorname"];
    }
    if (isset($_POST["lastname"])) {
        if ($_SESSION["updateNachname"] != $_POST["lastname"]) {
            $msg_lastname = "Nachname wurde aktualisiert!";
        }
        $_SESSION["updateNachname"] = $_POST["lastname"];
    }
    if (isset($_POST["username"])) {
        if ($_SESSION["updateUsername"] != $_POST["username"]) {
            $msg_username = "Benutzername wurde aktualisiert!";
        }
        $_SESSION["updateUsername"] = $_POST["username"];
    }

    if (isset($_POST["email"])) {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $msg_email = "Ungültige E-Mail-Adresse!";
        } else {
            if ($_SESSION["updateEmail"] != $_POST["email"]) {
                $msg_email = "Email wurde aktualisiert!";
            }
            $_SESSION["updateEmail"] = $_POST["email"];
        }
    }

    if (!empty($_POST["password"]) && !empty($_POST["password_2"])) {
        if ($_POST["password"] == $_SESSION["updatePassword_1"]) {
            $_SESSION["updatePassword_1"] = $_POST["password_2"];
            $msg_password = "<span class='text-success'> Passwort wurde aktualisiert! </span>";
        } else {
            $msg_password = "<span class='text-danger'> Altes Passwort stimmt nicht überein! </span>";
        }
    } else if (!empty($_POST["password"]) xor !empty($_POST["password_2"])) {
        $msg_password = "<span class='text-danger'> Bitte altes und neues Passwort angeben! </span>";
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
    <title>Login Page</title>

</head>

<body>
    <!--Navbar-->
    <header>
        <?php include_once './navbar.php' ?>
    </header>
    <div class="bg-image" style="background-image: url('https://images.unsplash.com/photo-1563209750-fb9498c83efd?q=80&w=1489&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); height: 100%; background-repeat: no-repeat; background-size: cover;">

        <div id="register_page" class="container">
            <div class="row justify-content-center">
                <div class="col-xxs-6 col-md-8 col-lg-6" id="box">
                    <div class="p-3 mb-2 bg-transparent text-dark">
                        <h1 class="h3 mb-3 font-weight-normal text-center">Meine Daten</h1>
                        <form action="" method="post">
                            <select class="form-select" aria-label="anrede" name="anrede">
                                <option disabled value="">Bitte wählen Sie den Anrede</option>

                                <option <?php if ($_SESSION["updateAnrede"] == "Herr") echo "selected"; ?> value="Herr">Herr</option>
                                <option <?php if ($_SESSION["updateAnrede"] == "2") echo "selected"; ?> value="2">Frau</option>
                                <option <?php if ($_SESSION["updateAnrede"] == "3") echo "selected"; ?> value="3">Transgender</option>
                                <option <?php if ($_SESSION["updateAnrede"] == "4") echo "selected"; ?> value="4">Non-binary/non-conforming</option>
                                <option <?php if ($_SESSION["updateAnrede"] == "5") echo "selected"; ?> value="5">Keine Antwort</option>
                            </select>
                            <?php echo "<span class='text-success'> $msg_anrede </span>" ?>
                            <br>
                            <div class="form-group">
                                <label for="vorname">Vorname</label>
                                <input type="text" class="form-control" name="vorname" id="vorname" value="<?php echo $_SESSION["updateVorname"] ?>">
                            </div>
                            <?php echo "<span class='text-success'> $msg_vorname </span>" ?>
                            <br>
                            <div class="form-group">
                                <label for="lastname">Nachname</label>
                                <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $_SESSION["updateNachname"] ?>">
                            </div>
                            <?php echo "<span class='text-success'> $msg_lastname </span>" ?><br>
                            <div class="form-group">
                                <label for="email">E-mail Adresse</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="example@email.com" value="<?php echo $_SESSION["updateEmail"] ?>">
                            </div>
                            <?php echo "<span class='text-success'> $msg_email </span>" ?>
                            <br>
                            <div class="form-group">
                                <label for="username">Benutzername</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Gewünschter Benutzername" value="<?php echo $_SESSION["updateUsername"] ?>">
                            </div>
                            <?php echo "<span class='text-success'> $msg_username </span>" ?>
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
                            <?php echo $msg_password; ?>
                            <br>
                            <div class="col-12">
                                <button class="btn btn-dark" type="submit" name="register">Formular abschicken</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include './footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>