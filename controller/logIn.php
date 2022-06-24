<?php

    require_once ("../model/dataAccess.php");

    if (isset($_REQUEST["userId"]))
    {
        $userId = $_REQUEST["userId"];
        $password = $_REQUEST["passwordInput"];

        $logInSuccesful = customerLogIn($userId, $password);

        if ($logInSuccesful == true)
        {
            session_start();

            // Assign userId to a session variable so this can be used later to get the user profile
            $_SESSION["national_id_number"] = $userId;

            // Navigate the user to the home page
            header("location: homePage.php");
        }
        else
        {
            echo '<script> alert("Invalid Username or Password.") </script>';
        }
    }

    require_once ("../view/logIn_view.php");

?>


