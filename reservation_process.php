<?php
session_start();

// Process form data
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$roomType = $_POST['room_type'];
$services = isset($_POST['services']) ? implode(", ", $_POST['services']) : "";

// Store reservation data in the session
$reservation = [
    'checkin' => $checkin,
    'checkout' => $checkout,
    'room_type' => $roomType,
    'services' => $services,
];

$_SESSION['reservations'][] = $reservation;

echo "Reservation successful!";

// Optionally, you can redirect the user to a confirmation page
// header("Location: confirmation.php");
// exit();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>