<?php
session_start();


// Sicherstellen, dass der Benutzer angemeldet ist, bevor auf diese Seite zugegriffen wird.
// Falls nicht, wird der Benutzer zur Login-Seite weitergeleitet.

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
    <title>Reservationsverwaltung</title>
</head>

<body>
    <?php include("./includes/navbar.php"); ?>
    <div class="bg-image" style="background-image: url('https://images.unsplash.com/photo-1503017964658-e2ff5a583c8e?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); height: 100vh; background-repeat: no-repeat; background-size: cover; background-position:center;">
        <div class="bg-image">
            <?php
            include_once "./includes/dbaccess.php";
            if (isset($_GET['user_id'])) {
                $user_id = $_GET['user_id'];
                $query = "SELECT `vorname`, `lastname` FROM `users` WHERE `user_id` = ?";
                $stmt = $db_obj->prepare($query);
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $user = $result->fetch_assoc();
                echo '<h1 class="display-3 text-center pt-4" style="font-weight:bold; color:white;">Reservierungen von ' . $user["vorname"] . ' ' . $user["lastname"]  . '</h1>';
            } else { ?>
                <h1 class="display-3 text-center pt-4" style="font-weight:bold; color:white;">Reservierungen</h1>
            <?php } ?>
        </div>
        <div class="container">
                <!-- Form to filter -->
                <div class="row">
                    <div class="col-8">
                <form method="get">
                    <select class="form-select" aria-label="filter" name="filter">
                        <option selected disabled value="">Reservierungen filtern nach:</option>
                        <option <?php if (isset($_GET["filter"]) && $_GET["filter"] == "neu") echo "selected"; ?> value="neu">neu</option>
                        <option <?php if (isset($_GET["filter"]) && $_GET["filter"] == "bestätigt") echo "selected"; ?> value="bestätigt">bestätigt</option>
                        <option <?php if (isset($_GET["filter"]) && $_GET["filter"] == "storniert") echo "selected"; ?> value="storniert">storniert</option>
                    </select>
                    <?php if (isset($_GET["user_id"])) { // Add hidden input to store $_GET["user_id"] in order to  filter reservations from a specific user
                        echo '<input type="text" name="user_id" value="' . $_GET["user_id"] . '" hidden>';
                    } ?>
                    </div>
                    <div class="col-4">
                    <button class="btn btn-primary" type="submit">filtern</button>
                </form>
            </div>
            </div>
                </br>

                <div class="table-responsive">
                    <table class="table">
                    <?php
                    if (isset($_GET['user_id'])) {
                        // Display reservations from specific user
                        if (isset($_GET["filter"])) { // query with filter
                            $query = "SELECT  * FROM `reservations` JOIN `users` on reservations.uid_fk=users.user_id WHERE `users`.`user_id` = ? AND `reservations`.`reservation_status` = ?";
                            $stmt = $db_obj->prepare($query);
                            $stmt->bind_param("is", $user_id, $_GET['filter']);
                        } else { // query without filter
                            $query = "SELECT  * FROM `reservations` JOIN `users` on reservations.uid_fk=users.user_id WHERE `users`.`user_id` = ?";
                            $stmt = $db_obj->prepare($query);
                            $stmt->bind_param("i", $user_id);
                        }

                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            echo '<th>Anreise</th>
                            <th>Abreise</th>
                            <th>Zimmertyp</th>
                            <th>Frühstück</th>
                            <th>Parking</th>
                            <th>Tiere</th>
                            <th>Status</th>
                            <th>UserId</th> <!-- change to visible for only admins? -->
                            <th>Preis</th>
                            <th>Erstellt am</th>
                            <th>Update status</th>';

                            while ($res = $result->fetch_assoc()) {
                                // Inside the while loop
                                if ($res['uid_fk'] == $_GET['user_id']) {
                                    echo "<tr>";
                                    echo "<td>" . $res['arrival_date'] . "</td>";
                                    echo "<td>" . $res['departure_date'] . "</td>";
                                    echo "<td>" . $res['room_type'] . "</td>";
                                    echo "<td>" . $res['breakfast_service'] . "</td>";
                                    echo "<td>" . $res['parking_service'] . "</td>";
                                    echo "<td>" . $res['pets_service'] . "</td>";
                                    echo "<td>" . $res['reservation_status'] . "</td>";
                                    echo "<td>" . $res['uid_fk'] . "</td>";
                                    echo "<td>" . $res['price'] . "€</td>";
                                    echo "<td>" . $res['erstellt_am'] . "</td>";
                                    echo "<td><a href='reservationsverwaltung_update.php?reservation_id=" . $res['reservation_id'] . "'>Update</a></td>";
                                    echo "</tr>";
                                }
                            }
                        } else {
                            echo "Keine Reservierungen von " . $user["vorname"] . ' ' . $user["lastname"]  . " vorhanden!";
                        }
                    } else {
                        // Display all reservations
                        if (isset($_GET["filter"])) { // query with filter
                            $query = "SELECT  * FROM `reservations` JOIN `users` on reservations.uid_fk=users.user_id WHERE `reservations`.`reservation_status` = ?";
                            $stmt = $db_obj->prepare($query);
                            $stmt->bind_param("s", $_GET['filter']);
                        } else {  // query without filter
                            $query = "SELECT  * FROM `reservations` JOIN `users` on reservations.uid_fk=users.user_id";
                            $stmt = $db_obj->prepare($query);
                        }

                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            echo '<th>Anreise</th>
                            <th>Abreise</th>
                            <th>Zimmertyp</th>
                            <th>Frühstück</th>
                            <th>Parking</th>
                            <th>Tiere</th>
                            <th>Status</th>
                            <th>UserId</th> <!-- change to visible for only admins? -->
                            <th>Benutzer</th>
                            <th>Preis</th>
                            <th>Erstellt am</th>
                            <th>Update status</th>';

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
                                echo "<td>" . $res['uid_fk'] . "</td>";
                                echo "<td>" . $res['lastname'] . " " . $res['vorname'] . "</td>";
                                echo "<td>" . $res['price'] . "€</td>";
                                echo "<td>" . $res['erstellt_am'] . "</td>";
                                echo "<td><a href='reservationsverwaltung_update.php?reservation_id=" . $res['reservation_id'] . "'>Update</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "Keine Reservierungen vorhanden!";
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <?php include './includes/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>