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
<title>Homepage</title>
</head>
<body>
        <?php include_once "./inc/navbar.php" ?> 
        <div class="bg-image-hp" style="background-image: url('./Images/bg_imgs/bg_img_2.jpg'); height: 100vh; background-size: cover;">
                <div class="welcome-header">
                        <h1 class="display-1" style="color: white; text-align: center; padding-top: 10rem; font-weight:500;">Welcome to Casa Valle 
                        <?php
                                if(isset($_SESSION["user"])){ 
                                $username = $_SESSION["user"];
                                echo '<span style="font-style: italic; color:brown;">' . $username . '</span>';
                        ?>
                                      
                        </h1>
                        <?php } ?>
                </div>
        </div>  

        <?php include_once './inc/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


