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
    <link rel="icon" href="./Images/Untitled-design.svg">
    <title>Zimmer & Angebote</title>
</head>

<body>
    <?php include './includes/navbar.php' ?>

    <div class="bg-image" style="background-image: url('https://images.unsplash.com/photo-1508615070457-7baeba4003ab?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-position:center; background-size:cover; background-repeat:no-repeat; height:100%;">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 g-4 pt-4 pb-5">
                <!-- Single Room Card -->
                <div class="col">
                    <div class="card">
                        <img src="./room_imgs/single/single_room.jpg" class="card-img-top" alt="Single Zimmer">
                        <div class="card-body">
                            <h5 class="card-title">Einzelzimmer</h5>
                            <p class="card-text">Unser komfortables Einzelzimmer bietet alles, was Sie für einen angenehmen Aufenthalt benötigen. Mit einem gemütlichen Bett, einem gut ausgestatteten Arbeitsbereich und modernen Annehmlichkeiten ist dieses Zimmer ideal für Alleinreisende. Genießen Sie die Ruhe und Privatsphäre während Ihres Aufenthalts in unserem gemütlichen Einzelzimmer.</p>
                        </div>
                        <button class="btn btn-light" <?php if (!(isset($_SESSION["user"]))) { ?>data-bs-toggle="modal" data-bs-target="#Modal" <?php } else { ?> onclick="location.href='./reservation_process.php'" <?php } ?>>
                            Jetzt Buchen
                        </button>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="ModalLabel">Login erforderlich</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Bitte <a href="./login_page.php">loggen</a> Sie sich ein, um fortzufahren. Falls Sie noch kein Konto haben, können Sie sich hier <a href="./register_page.php">registrieren</a>.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Double Room Card -->
                <div class="col">
                    <div class="card">
                        <img src="./room_imgs/double/double_bedroom.jpg" class="card-img-top" alt="Double Zimmer">
                        <div class="card-body">
                            <h5 class="card-title">Doppelzimmer</h5>
                            <p class="card-text">Unser geräumiges Doppelzimmer ist perfekt für Paare oder Reisende, die etwas mehr Platz bevorzugen. Mit einem komfortablen Doppelbett, stilvollem Dekor und allen notwendigen Annehmlichkeiten ist dieses Zimmer ein gemütlicher Rückzugsort nach einem Tag voller Erkundungen. Entspannen Sie sich und genießen Sie die angenehme Atmosphäre unseres großzügigen Doppelzimmers.</p>
                        </div>
                        <button class="btn btn-light" <?php if (!(isset($_SESSION["user"]))) { ?>data-bs-toggle="modal" data-bs-target="#Modal" <?php } else { ?> onclick="location.href='./reservation_process.php'" <?php } ?>>
                            Jetzt Buchen
                        </button>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="ModalLabel">Login erforderlich</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Bitte <a href="./login_page.php">loggen</a> Sie sich ein, um fortzufahren. Falls Sie noch kein Konto haben, können Sie sich hier <a href="./register_page.php">registrieren</a>.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Suite Room Card -->
                <div class="col">
                    <div class="card">
                        <img src="./room_imgs/suite/suite_bedroom.jpg" class="card-img-top" alt="Suite">
                        <div class="card-body">
                            <h5 class="card-title">Familienzimmer</h5>
                            <p class="card-text">Unser Familienzimmer bietet nicht nur bequeme Schlafgelegenheiten, sondern auch einen separaten Wohnbereich für gemeinsame Momente. Mit kinderfreundlichen Annehmlichkeiten ist dieses Zimmer ideal für Familien, die eine entspannte Zeit in unserem Hotel verbringen möchten. Erleben Sie den Komfort und die Großzügigkeit unseres Familienzimmers.</p>
                        </div>
                        <button class="btn btn-light" <?php if (!(isset($_SESSION["user"]))) { ?>data-bs-toggle="modal" data-bs-target="#Modal" <?php } else { ?> onclick="location.href='./reservation_process.php'" <?php } ?>>
                            Jetzt Buchen
                        </button>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="ModalLabel">Login erforderlich</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Bitte <a href="./login_page.php">loggen</a> Sie sich ein, um fortzufahren. Falls Sie noch kein Konto haben, können Sie sich hier <a href="./register_page.php">registrieren</a>.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Services Card -->
                <div class="col">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1596178067639-5c6e68aea6dc?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="Spa">
                        <div class="card-body">
                            <h5 class="card-title">Pool-Suite</h5>
                            <p class="card-text">Erleben Sie Luxus pur in unserer Pool-Suite. Dieser Raum bietet nicht nur komfortable Unterkünfte, sondern auch einen exklusiven privaten Pool, der Ihnen die ultimative Erholung ermöglicht. Genießen Sie ungestörte Momente der Entspannung und erfrischen Sie sich in Ihrem eigenen Pool, ohne das Zimmer verlassen zu müssen. Ein einzigartiges Erlebnis für einen besonderen Aufenthalt.</p>
                        </div>
                        <button class="btn btn-light" <?php if (!(isset($_SESSION["user"]))) { ?>data-bs-toggle="modal" data-bs-target="#Modal" <?php } else { ?> onclick="location.href='./reservation_process.php'" <?php } ?>>
                            Jetzt Buchen
                        </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="ModalLabel">Login erforderlich</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bitte <a href="./login_page.php">loggen</a> Sie sich ein, um fortzufahren. Falls Sie noch kein Konto haben, können Sie sich hier <a href="./register_page.php">registrieren</a>.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include './includes/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>