<?php
session_start();

if (isset($_SESSION['reservations']) && count($_SESSION['reservations']) > 0) {
    echo "<h2>Your Reservations</h2>";
    echo "<table border='1'>
            <tr>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Room Type</th>
                <th>Services</th>
            </tr>";

    foreach ($_SESSION['reservations'] as $reservation) {
        echo "<tr>
                <td>" . $reservation['checkin'] . "</td>
                <td>" . $reservation['checkout'] . "</td>
                <td>" . $reservation['room_type'] . "</td>
                <td>" . $reservation['services'] . "</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No reservations found.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meine Reservierungen</title>
</head>
<body>
    
</body>
</html>