<?php

    session_start();

    require_once ("../model/dataAccess.php");
    require_once ("../model/customer.php");

    getUserProfile($_SESSION["national_id_number"]);

    require_once ("../view/homePage_view.php");

?>

