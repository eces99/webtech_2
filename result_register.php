<?php

if (isset($_POST["register"])) {
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
    <?php include_once './includes/navbar.php' ?>
    <div class="bg-image" style="background-image: url('https://images.unsplash.com/photo-1586967440896-732b8ef262f9?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); height:100vh; background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <main>
                        <div class="display-10">Vielen Dank für die Registrierung! Bitte überprüfen Sie Ihr Postfach und bestätigen Sie Ihre E-Mail-Adresse! Klicken Sie <a href="./login_page.php">hier</a> um sich einzuloggen!</div>
                    </main>
                </div>
            </div>
        </div>
    </div>
    <?php include './includes/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>