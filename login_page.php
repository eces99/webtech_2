<?php
session_start();
$errorMsg = "";

// Hardcoded username and password
$hardcodedUsername = 'admin';
$hardcodedPassword = '123';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate username and password
    if ($username == $hardcodedUsername && $password == $hardcodedPassword) {
        $_SESSION['user'] = $username;

        // Set a cookie for the username (you can set other cookie parameters as needed)
        setcookie('username', $username, time() + 3600, '/'); // Cookie expires in 1 hour

        header('Location: index.php');
    } else {
        $errorMsg = "Ungültige benutzername oder passwort.";
    }
}
// Hardcoded stammdaten (echtes passwort und username wird nicht verändert, nur statische daten zum Zeigen)
$_SESSION["updateAnrede"] = "Herr";
$_SESSION["updateVorname"] = "Max";
$_SESSION["updateNachname"] = "Mustermann";
$_SESSION["updateUsername"] = "admin";
$_SESSION["updateEmail"] = "max.mustermann@muster.com";
$_SESSION["updatePassword_1"] = "123";
?>

<!-- ... (rest of the login form) ... -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="./Images/Untitled-design.svg">
    <title>Login Seite</title>

</head>

<body>

    <!--Navbar-->
    <?php include_once './inc/navbar.php' ?>

    <div class="bg-image" style="background-image: url('./Images/bg_imgs/bg_img_3.jpg'); height: 100vh; background-repeat: no-repeat; background-size: cover;">

        <div id="login_form" class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6 col-md-4" id="box">
                    <div class="p-3 mb-2 bg-transparent text-dark">
                        <h1 class="h3 mb-3 font-weight-normal text-center">Bitte einloggen</h1>
                        <!-- Display error message if present -->
                        <?php if (!empty($errorMsg)) : ?>
                            <p style="color: red;"><?php echo $errorMsg; ?></p>
                        <?php endif; ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ihre Benutzername</label>
                                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username" required>
                            </div><br>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Passwort</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                            </div>
                            <br>
                            
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Angemeldet bleiben</label>
                            </div><br>
                            <div class="btns">
                                <button type="submit" name="login" value="login" class="btn btn-dark">Einloggen</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once './inc/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>