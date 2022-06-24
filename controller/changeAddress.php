<?php 

    require_once ("../model/dataAccess.php");

    session_start();

    if (isset($_REQUEST["address"]))
    {
        $newAddress = htmlentities($_REQUEST["address"]);

        changeRegisteredAddress($newAddress);
    }

    require_once ("../view/changeAddress_view.php");

?>

