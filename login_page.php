<?php

$errorMsg = $msg_uname = $msg_pass = $username = $password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Eingabe von Benutzername und Passwort ist für das Login erforderlich
    if (empty($_POST["username"])) {
        $msg_uname = "Benutzername ist benötigt!";
    } else {
        $username = ($_POST["username"]);
    }
    if (empty($_POST["password"])) {
        $msg_pass = "Passwort ist benötigt!";
    } else {
        $password = ($_POST["password"]);
    }
    if (!empty($username) && !empty($password)) {

        include_once "./includes/dbaccess.php";

        // Create a query and select using SQL statement
        $query = "SELECT `user_id`, `role`, `username`, `password`, `status` FROM `users` WHERE `username` = ?";

        $stmt = $db_obj->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            if (hash('sha512', $password) == $user["password"]) {
                if ($user["status"] != "inaktiv") {
                    session_start();
                    $_SESSION['user'] = $user["username"];
                    $_SESSION['uid'] = $user["user_id"];
                    $_SESSION['role'] = $user["role"];

                    // Set a cookie for the username (you can set other cookie parameters as needed)
                    setcookie('username', $username, time() + 3600, '/'); // Cookie expires in 1 hour

                    header("Location: index.php");
                    die();
                } else {
                    $errorMsg = "Sie sind inaktiv, bitte kontaktieren Sie uns!";
                }
            } else {
                $errorMsg = "Ungültiges Passwort!";
            }
        }
    }
}
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
    <?php include_once './includes/navbar.php' ?>

    <div class="bg-image" style="background-image: url('https://images.unsplash.com/photo-1508615070457-7baeba4003ab?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-position:center; background-size:cover; background-repeat:no-repeat; height:100vh;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block mt-5 pt-3">
                                <img src="https://images.unsplash.com/photo-1582719508461-905c673771fd?q=80&w=1925&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="res" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 align-items-center">
                                <div class="body p-4 p-lg-5 text-black">
                                    <h1 class="h3 mb-3 font-weight-normal text-center">Login</h1>
                                    <form method="post">
                                        <div class="form-group mt-4">
                                            <label for="exampleInputEmail1">Ihr Benutzername</label>
                                            <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username" value="<?php if (isset($_POST["username"])) echo $_POST["username"] ?>" autofocus>
                                        </div>
                                        <?php echo "<span class='error_msg'> $msg_uname </span>" ?>

                                        <br>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Passwort</label>
                                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                        </div>
                                        <?php echo "<span class='error_msg'> $msg_pass </span>" ?>

                                        <br>
                                        <!-- Display error message if present -->
                                        <?php if (!empty($errorMsg)) : ?>
                                            <p style="color: red;"><?php echo $errorMsg; ?></p>
                                        <?php endif; ?>
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
            </div>
        </div>
    </div>

    <?php include_once './includes/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>