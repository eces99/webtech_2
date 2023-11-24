<?php
    
    if(isset($_POST["login"])){

        $username = filter_input(INPUT_POST, "username", 
                        FILTER_VALIDATE_EMAIL);
        $pass = $_POST["password"];

        if(empty($username)){
            echo"Your email is not valid! Please check again!";
        }
        elseif(empty($pass)){
            echo"You missed to type in your password!";
        }
        else{
            echo"Welcome to Casa Valle!";
        }
    }
    

    ?>
