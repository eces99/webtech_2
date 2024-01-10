<?php

session_start();

if ($_SESSION['role'] != "admin") {
    header('Location: index.php');
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
    <title>Userverwaltung</title>

</head>

<body>
    <!--Navbar-->
    <header>
        <?php include_once './includes/navbar.php' ?>
    </header>
    <div class="bg-image" style="background-image: url('https://images.unsplash.com/photo-1586967440896-732b8ef262f9?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); height: 100%; background-repeat: no-repeat; background-size: cover;">
        <h1 class="display-3 text-center pt-4" style="font-weight:bold; color:white;">Userverwaltung</h1>
    </div>

    <div class="container">
        <div class="row">
            <table class="table table-hover">
                <th>Rolle</th>
                <th>Anrede</th>
                <th>Vorname</th>
                <th>Nachname</th>
                <th>E-Mail</th>
                <th>Username</th>
                <th>Passwort</th>
                <th>Status</th>
                <?php
                include_once "./includes/dbaccess.php";

                $query = "SELECT * FROM `users`";
                $stmt = $db_obj->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();
                while ($user = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $user['role'] . "</td>";
                    echo "<td>" . $user['anrede'] . "</td>";
                    echo "<td>" . $user['vorname'] . "</td>";
                    echo "<td>" . $user['lastname'] . "</td>";
                    echo "<td>" . $user['email'] . "</td>";
                    echo "<td>" . $user['username'] . "</td>";
                    echo "<td>" . $user['password'] . "</td>";
                    echo "<td>" . $user['status'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>


    <?php include './includes/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>