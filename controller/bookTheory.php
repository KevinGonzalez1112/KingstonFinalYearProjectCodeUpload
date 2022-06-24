<?php

    require_once ("../model/dataAccess.php");
    require_once ("../model/customerBookingsTestDetails.php");
    require_once ("../model/bookingPaymentDetails.php");

    session_start();

    $theoryBookingTestSlot = getTheoryBookingAvailableSlots();

    //
    // Adding to Customer Practical Bookings Test Details Table
    //

    if (isset($_REQUEST["testCategory"]))
    {
        // Requests the input from the text input boxes in the view
        $nationalIdNumber = $_SESSION["national_id_number"];
        $testCategory = $_REQUEST["testCategory"];
        $testBookingSlot = $_REQUEST["theoryBookingSlot"];

        if ($_REQUEST["testCategory"] == "A")
        {
            $testFees = "17.00";
            $testType = "Theory";
            $testCategory = "A";
        }
        else if ($_REQUEST["testCategory"] == "B")
        {
            $testFees = "17.00";
            $testType = "Theory";
            $testCategory = "B";
        }
        else if ($_REQUEST["testCategory"] == "C+D")
        {
            $testFees = "40.00";
            $testType = "Theory";
            $testCategory = "C + D";
        }
        else if ($_REQUEST["testCategory"] == "C+D-CaseStudy")
        {
            $testFees = "40.00";
            $testType = "Case Study";
            $testCategory = "C + D";
        }
        else if ($_REQUEST["testCategory"] == "C+D-Practical")
        {
            $testFees = "25.00";
            $testType = "Practical";
            $testCategory = "C + D";
        }

        // Creates a new object
        // This makes it possible to assign all variables to an object 
        // This object can then be added to the database
        $newTheoryBookingTestDetails = new CustomerBookingsTestDetails();

        // Assign the variables to the object
        $newTheoryBookingTestDetails->testDetailsId = $testBookingSlot;
        $newTheoryBookingTestDetails->nationalIdNumber = htmlentities($nationalIdNumber);
        $newTheoryBookingTestDetails->testType = htmlentities($testType);
        $newTheoryBookingTestDetails->testCategory = htmlentities($testCategory);
        $newTheoryBookingTestDetails->testFees = htmlentities($testFees);

        addNewTheoryBookingTestDetails($newTheoryBookingTestDetails);
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
        $newBookingPaymentDetails = new BookingPaymentDetails();

        // Assign the variables to the object
        $newBookingPaymentDetails->testDetailsId = $testBookingSlot;
        $newBookingPaymentDetails->cardName = htmlentities($cardName);
        $newBookingPaymentDetails->cardNumber = htmlentities($cardNumber);
        $newBookingPaymentDetails->cardExpiryDate = htmlentities($cardExpiryDate);
        $newBookingPaymentDetails->cardSecurityCode = htmlentities($cardSecurityCode);

        addNewTheoryBookingPaymentDetails($newBookingPaymentDetails);
    }

    require_once ("../view/bookTheory_view.php");
?>