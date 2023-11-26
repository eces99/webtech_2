<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login_page.php');
}


$file_content = file_get_contents("./reservations.txt");
$serialized_arrays = explode("}", $file_content);
$reservations = [];

// Loop through each serialized string and unserialize it
foreach ($serialized_arrays as $serialized_array) {
    if (!empty($serialized_array)) {
        // Attempt to unserialize the data
        $unserialized_data = unserialize($serialized_array . '}');

        // Check if unserialization was successful and if the unserialized data is an array
        if ($unserialized_data !== false && is_array($unserialized_data)) {
            $reservations[] = $unserialized_data;
        }
    }
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
    <title>Ihre Reservierungen</title>
</head>

<body>
    <?php include("./navbar.php"); ?>
    <div class="bg-image" style="background-image: url('https://images.unsplash.com/photo-1503017964658-e2ff5a583c8e?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); height: 100vh; background-repeat: no-repeat; background-size: cover; background-position:center;">
    <div class="container">
        <div class="display-4 text-bold row justify-content-center mt-4 mb-2">Ihre Reservierungen</div>
        <div class="table-responsive">
            <?php if (!empty($reservations)) { ?>
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th>Anreise</th>
                            <th>Abreise</th>
                            <th>Zimmer Type</th>
                            <th>Services: Frühstück</th>
                            <th>Services: Park</th>
                            <th>Services: Tiere</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reservations as $reservation) { ?>
                            <tr>
                                <td><?php echo $reservation['anreise'] ?></td>
                                <td><?php echo $reservation['abreise'] ?></td>
                                <td><?php echo $reservation['room'] ?></td>
                                <td><?php echo $reservation['breakfast'] ?></td>
                                <td><?php echo $reservation['park'] ?></td>
                                <td><?php echo $reservation['tiere'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <p>Keine Reservierungen gefunden.</p>
            <?php } ?>
        </div>
    </div>
    </div>

    <?php include './footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>