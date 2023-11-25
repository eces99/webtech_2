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
    <title>Zimmer & Angebote</title>
</head>
<body>
    <?php include './navbar.php' ?>
    
    <div class="bg-image" style="background-image: url('./room_imgs/bg_rooms.jpg'); background-position:center; background-size:cover; background-repeat:no-repeat; height:100%;">
        <div class="container">
        <div class="row row-cols-1 row-cols-md-2 g-4 pt-4 pb-4">
            <div class="col">
                <div class="card">
                <img src="./room_imgs/single/single_room.jpg" class="card-img-top" alt="Single Zimmer">
                <div class="card-body">
                    <h5 class="card-title">Single Zimmer</h5>
                    <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium reiciendis impedit at quis vitae eveniet vero sint molestiae ullam, sequi, aspernatur porro odit ex voluptates iste, ipsum suscipit eligendi aliquid!</p>
                </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                <img src="./room_imgs/double/double_bedroom.jpg" class="card-img-top" alt="Double Zimmer">
                <div class="card-body">
                    <h5 class="card-title">Double Zimmer</h5>
                    <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium reiciendis impedit at quis vitae eveniet vero sint molestiae ullam, sequi, aspernatur porro odit ex voluptates iste, ipsum suscipit eligendi aliquid!</p>
                </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                <img src="./room_imgs/suite/suite_bedroom.jpg" class="card-img-top" alt="Suite">
                <div class="card-body">
                    <h5 class="card-title">Suite Zimmer</h5>
                    <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium reiciendis impedit at quis vitae eveniet vero sint molestiae ullam, sequi, aspernatur porro odit ex voluptates iste, ipsum suscipit eligendi aliquid!</p>
                </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                <img src="./room_imgs/spa/spa_1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Spa & Massage Services</h5>
                    <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium reiciendis impedit at quis vitae eveniet vero sint molestiae ullam, sequi, aspernatur porro odit ex voluptates iste, ipsum suscipit eligendi aliquid!</p>
                </div>
                </div>
            </div>
            </div>
        </div>    
    </div>

    <?php include './footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>