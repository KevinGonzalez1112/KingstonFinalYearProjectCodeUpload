<?php

    require_once ("../model/dataAccess.php");
    require_once("../model/duplicateDocumentsRequest.php");
    require_once("../model/documentPaymentDetails.php");

    session_start();

    if (isset($_REQUEST["vehicleRegistrationNumber"]))
    {
        $nationalIdNumber = $_SESSION["national_id_number"];
        $documentType = $_REQUEST["documentType"];
        $vehicleRegistration = $_REQUEST["vehicleRegistrationNumber"];
        $reasonForDuplicate = $_REQUEST["reasonForDuplicate"];

        if ($_REQUEST["documentType"] == "registration")
        {
            $documentFee = 25.00;
        }
        else if ($_REQUEST["documentType"] == "roadworthiness")
        {
            $documentFee = 22.00;
        }

        // Creates a new object
        // This makes it possible to assign all variables to an object 
        // This object can then be added to the database
        $newDuplicateDocumentRequest = new DuplicateDocumentsRequest();

        // Assign the variables to the object
        $newDuplicateDocumentRequest->nationalIdNumber = htmlentities($nationalIdNumber);
        $newDuplicateDocumentRequest->documentType = htmlentities($documentType);
        $newDuplicateDocumentRequest->vehicleRegistration = htmlentities($vehicleRegistration);
        $newDuplicateDocumentRequest->reasonForDuplicate = htmlentities($reasonForDuplicate);
        $newDuplicateDocumentRequest->documentFee = $documentFee;
        $newDuplicateDocumentRequest->completedRequest = "False";

        $documentRequestId = addNewDuplicateDocumentRequest($newDuplicateDocumentRequest);
    }

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
        $newDocumentPaymentDetails->documentRequestId = $documentRequestId;
        $newDocumentPaymentDetails->cardName = htmlentities($cardName);
        $newDocumentPaymentDetails->cardNumber = htmlentities($cardNumber);
        $newDocumentPaymentDetails->cardExpiryDate = htmlentities($cardExpiryDate);
        $newDocumentPaymentDetails->cardSecurityCode = htmlentities($cardSecurityCode);

        addNewDuplicateDocumentPaymentDetails($newDocumentPaymentDetails);
    }

    require_once ("../view/duplicateDocuments_view.php");

?>