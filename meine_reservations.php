<?php
session_start();


// Sicherstellen, dass der Benutzer angemeldet ist, bevor auf diese Seite zugegriffen wird.
// Falls nicht, wird der Benutzer zur Login-Seite weitergeleitet.

if (!isset($_SESSION['user'])) {
    header('Location: login_page.php');
}
require_once './includes/dbaccess.php';
$user_id = $_SESSION['uid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="./Images/Untitled-design.svg">
    <title>Ihre Reservierungen</title>
</head>

<body>
    <?php include("./includes/navbar.php"); ?>
    <div class="bg-image" style="background-image: url('https://images.unsplash.com/photo-1508615070457-7baeba4003ab?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); height: 100vh; background-repeat: no-repeat; background-size: cover; background-position:center;">
        <div class="bg-image">
            <h1 class="display-3 text-center pt-4" style="font-weight:bold; color:white;">Meine Reservierungen</h1>
        </div>
        <div class="container">
            <?php $query = "SELECT * FROM `reservations` WHERE `uid_fk`=$user_id";
                $stmt = $db_obj->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) { ?>
            <div class="table-responsive">
                <table class="table">
                    <th>Anreise</th>
                    <th>Abreise</th>
                    <th>Zimmertyp</th>
                    <th>Frühstück</th>
                    <th>Parking</th>
                    <th>Tiere</th>
                    <th>Status</th>
                    <th>Erstellt am</th>
                    <th>Preis</th>
                    <?php
                    $query = "SELECT * FROM `reservations` WHERE `uid_fk`=$user_id";
                    $stmt = $db_obj->prepare($query);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($res = $result->fetch_assoc()) {
                        // Inside the while loop
                        echo "<tr>";
                        echo "<td>" . $res['arrival_date'] . "</td>";
                        echo "<td>" . $res['departure_date'] . "</td>";
                        echo "<td>" . $res['room_type'] . "</td>";
                        echo "<td>" . $res['breakfast_service'] . "</td>";
                        echo "<td>" . $res['parking_service'] . "</td>";
                        echo "<td>" . $res['pets_service'] . "</td>";
                        echo "<td>" . $res['reservation_status'] . "</td>";
                        echo "<td>" . $res['erstellt_am'] . "</td>";
                        echo "<td>" . $res['price'] . "€</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
            <?php } else { echo "Keine Reservierungen vorhanden!";} ?>
        </div>
    </div>

    <?php include './includes/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>