<?php session_start(); /* Starts the session */
if (isset($_COOKIE["logincookie"])) {
        $login_session_duration = $_COOKIE["logincookie"];
    } else {
        $login_session_duration = 3600; // 1 hour
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
                <style>
                        .carousel-caption {
                        position: absolute;
                        top: 50%;
                        transform: translateY(-50%);
                        }

                        .welcome-header {
                        text-align: center;
                        }

                        .welcome-header h1 {
                        color: white;
                        font-weight: 500;
                        }

                        .welcome-header span {
                        font-style: italic;
                        color: brown;
                        }

                        .carousel-item img {
                        width: 100%;
                        height: 100vh;
                        object-fit: cover;
                        }

                </style>
                <title>Homepage</title>
        </head>
<body>
<?php include_once "./includes/navbar.php" ?> 
        <!--<div class="bg-image-hp" style="background-image: url('https://images.unsplash.com/photo-1596436889106-be35e843f974?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); height: 100vh; background-size: cover;">-->

        <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1596436889106-be35e843f974?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid" alt="...">
                <div class="carousel-caption">
                <div class="welcome-header">
                        <h1 class="display-1" style="color: white; font-weight:500;">Welcome to Casa Valle 
                        <?php
                                if(isset($_SESSION["user"])){ 
                                $username = $_SESSION["user"];
                                echo '<span style="font-style: italic; color:brown;">' . $username . '</span>';
                        ?>
                                
                        </h1>
                        <?php } ?>
                </div>
                </div>
                </div>
                <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1562790351-d273a961e0e9?q=80&w=1965&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid" alt="...">
                <div class="carousel-caption">
                <div class="welcome-header">
                        <h1 class="display-1" style="color: white; font-weight:500;">Welcome to Casa Valle 
                        <?php
                                if(isset($_SESSION["user"])){ 
                                $username = $_SESSION["user"];
                                echo '<span style="font-style: italic; color:brown;">' . $username . '</span>';
                        ?>
                                
                        </h1>
                        <?php } ?>
                </div>
                </div>
                </div>
                <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid" alt="...">
                <div class="carousel-caption">
                <div class="welcome-header">
                        <h1 class="display-1" style="color: white; font-weight:500;">Welcome to Casa Valle 
                        <?php
                                if(isset($_SESSION["user"])){ 
                                $username = $_SESSION["user"];
                                echo '<span style="font-style: italic; color:brown;">' . $username . '</span>';
                        ?>
                                
                        </h1>
                        <?php } ?>
                </div>
                </div>
                </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
                </div>
        

        <?php include_once './includes/footer.php' ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


