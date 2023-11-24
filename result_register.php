<?php
    
    if(isset($_POST["register"])){

        $anrede = ($_POST["anrede"]); 
        $vorname = $_POST["vorname"];
        $lastname = $_POST["lastname"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $pass_2 = $_POST["password_2"];

        if(empty($username)){
            echo"Your email is not valid! Please check again!";
        }
        elseif(empty($pass)){
            echo"You missed to type in your password!";
        }
        else{
            echo"Thank you for registering. Please valid your email.";
        }
    }
    

    ?>