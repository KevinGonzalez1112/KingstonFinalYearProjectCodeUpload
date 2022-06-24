<?php

    require_once ("../model/dataAccess.php");
    require_once ("../model/documentRequest.php");
    require_once ("../model/documentPaymentDetails.php");

    session_start();

    //
    // Adding to Customer Requested Documents Table 
    //

    if (isset($_REQUEST["testCategory"]))
    {
        // Requests the input from the text input boxes in the view
        $firstName = $_REQUEST["firstName"];
        $surname = $_REQUEST["surname"];
        $idNumber = $_REQUEST["idNumber"];
        $dateOfBirth = $_REQUEST["dateOfBirth"];
        $placeOfBirth = $_REQUEST["placeOfBirth"];
        $address = $_REQUEST["address"];
        $email = $_REQUEST["email"];
        $homeTelephone = $_REQUEST["homeTelephone"];
        $workTelephone = $_REQUEST["workTelephone"];

        // Creates a new object
        // This makes it possible to assign all variables to an object 
        // This object can then be added to the database
        $newDocumentRequest = new DocumentRequest();

        // Assign the variables to the object 
        $newDocumentRequest->nationalIdNumber = htmlentities($idNumber);
        $newDocumentRequest->documentType = $_REQUEST["testCategory"];
        $newDocumentRequest->completedRequest = "False";
        $newDocumentRequest->documentFee = 15;

        // Calls the function to add the object to the database
        $documentRequestId = addNewCustomerDocumentRequest($newDocumentRequest);
    }

    //
    // Adding to Documents Payment Details Table 
    //

    if (isset($_REQUEST["cardName"]))
    {
        // Requests the input from the text boxes in the view 
        $cardName = $_REQUEST["cardName"];
        $cardNumber = $_REQUEST["cardNumber"];
        $cardExpiryDate = $_REQUEST["cardExpiryDate"];
        $cardSecurityCode = $_REQUEST["cardSecurityCode"];

        // Creates a new object
        // This makes it possible to assign all variables to an object 
        // This object can then be added to the database
        $newDocumentPaymentDetails = new DocumentPaymentDetails();

        // Assign the variables to the object
        $newDocumentPaymentDetails->bookingId = $documentRequestId;
        $newDocumentPaymentDetails->cardName = htmlentities($cardName);
        $newDocumentPaymentDetails->cardNumber = htmlentities($cardNumber);
        $newDocumentPaymentDetails->cardExpiryDate = htmlentities($cardExpiryDate);
        $newDocumentPaymentDetails->cardSecurityCode = htmlentities($cardSecurityCode);

        addNewDocumentPaymentDetails($newDocumentPaymentDetails);
    }

    require_once ("../view/learnersLicence_view.php");

?>