<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>Meine Reservierungen</title>
</head>
<body>   
    <?php include("./navbar.php"); ?>
    <div class="container">
    <div class="display-4 text-bold row justify-content-center mt-4 mb-2">Your Reservations</div>
        <div class="table-responsive">
            <table class="table table-success table-striped">
                    <?php if (isset($_SESSION['reservations']) && count($_SESSION['reservations']) > 0) { ?>
                    <tr>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Room Type</th>
                        <th>Services</th>
                        <th>Services</th>
                        <th>Services</th>
                    </tr>
                    <?php foreach ($_SESSION['reservations'] as $reservation) { ?>
                    <tr>
                        <td><?php echo $reservation['anreise'] ?></td>
                        <td><?php echo $reservation['abreise'] ?></td>
                        <td><?php echo $reservation['room'] ?></td>
                        <td><?php echo $reservation['breakfast'] ?></td>
                        <td><?php echo $reservation['park'] ?> </td>
                        <td><?php echo $reservation['tiere'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <p>No reservations found.</p>
    <?php } ?>
</div>

<?php include './footer.php' ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>