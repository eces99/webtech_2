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
<title>Homepage</title>
</head>
<body>
        <?php include_once "./navbar.php" ?> 
        <div class="bg-image-hp" style="background-image: url('https://images.unsplash.com/photo-1596436889106-be35e843f974?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); height: 100vh; background-size: cover;">
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

        <?php include_once './footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


