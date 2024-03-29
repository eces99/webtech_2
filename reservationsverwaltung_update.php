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
            <h1 class="display-3 text-center pt-4" style="font-weight:bold; color:white;">Reservierungen</h1>
        </div>
        <div class="container">
            <div class="table-responsive">
                <table class="table">
                    <th>Anreise</th>
                    <th>Abreise</th>
                    <th>Zimmertyp</th>
                    <th>Frühstück</th>
                    <th>Parking</th>
                    <th>Tiere</th>
                    <th>Status</th>
                    <th>UserId</th> <!-- change to visible for only admins? -->
                    <th>Benutzer</th>
                    <th>Erstellt am</th>
                    <?php
                    include_once "./includes/dbaccess.php";


                    $reservationId = $_GET['reservation_id'];

                    // Fetch the specific reservation based on the ID
                    $query = "SELECT * FROM `reservations` JOIN `users` ON reservations.uid_fk = users.user_id WHERE reservation_id = ?";
                    $stmt = $db_obj->prepare($query);
                    $stmt->bind_param("i", $reservationId);
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

                        echo "<td>";
                        echo "<form method='post'>";
                        echo "<div class='form-group'>";
                        echo "<select class='form-select' aria-label='status' name='reservation_status'>";
                        echo "<option " . ($res['reservation_status'] == "neu" ? "selected" : "") . " value='neu'>neu</option>";
                        echo "<option " . ($res['reservation_status'] == "bestätigt" ? "selected" : "") . " value='bestätigt'>bestätigt</option>";
                        echo "<option " . ($res['reservation_status'] == "storniert" ? "selected" : "") . " value='storniert'>storniert</option>";
                        echo "</select>";
                        echo "</div>";
                        echo "<button type='submit' class='btn btn-primary'>Okay</button>";
                        echo "</form>";
                        echo "</td>";

                        // Inside the while loop, after you output the reservation data
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $newStatus = $_POST["reservation_status"];
                            $reservationId = $res['reservation_id']; // Assuming you have a reservation_id field in your database

                            // Update the reservation status in the database
                            $updateQuery = "UPDATE reservations SET reservation_status = ? WHERE reservation_id = ?";
                            $stmtUpdate = $db_obj->prepare($updateQuery);
                            $stmtUpdate->bind_param("si", $newStatus, $reservationId);
                            $stmtUpdate->execute();
                            echo"<meta http-equiv='refresh' content='0'>";
                         
                        }


                        echo "<td>" . $res['uid_fk'] . "</td>";
                        echo "<td>" . $res['lastname'] . " " . $res['vorname'] . "</td>";
                        echo "<td>" . $res['erstellt_am'] . "</td>";
                        echo "</tr>";
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