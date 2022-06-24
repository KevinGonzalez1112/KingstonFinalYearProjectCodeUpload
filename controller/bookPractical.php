<?php

    require_once ("../model/dataAccess.php");
    require_once ("../model/customerBookingsTestDetails.php");
    require_once ("../model/bookingPaymentDetails.php");

    session_start();

    $practicalBookingTestSlot = getPracticalBookingAvailableSlots();
    
    //
    // Adding to Customer Practical Bookings Test Details Table
    //

    if (isset($_REQUEST["testCategory"]))
    {
        // Requests the input from the text input boxes in the view
        $nationalIdNumber = $_SESSION["national_id_number"];
        $testType = "Practical";
        $testCategory = $_REQUEST["testCategory"];
        $testBookingSlot = $_REQUEST["practicalBookingSlot"];

        if ($_REQUEST["testCategory"] == "A")
        {
            $testFees = "43.00";
        }
        else if ($_REQUEST["testCategory"] == "B")
        {
            $testFees = "43.00";
        }
        else if ($_REQUEST["testCategory"] == "C")
        {
            $testFees = "75.00";
        }
        else if ($_REQUEST["testCategory"] == "D")
        {
            $testFees = "75.00";
        }
        else if ($_REQUEST["testCategory"] == "B+E")
        {
            $testFees = "65.00";
        }
        else if ($_REQUEST["testCategory"] == "C+E")
        {
            $testFees = "75.00";
        }
        else if ($_REQUEST["testCategory"] == "D+E")
        {
            $testFees = "75.00";
        }
        else if ($_REQUEST["testCategory"] == "F-J")
        {
            $testFees = "65.00";
        }
        else if ($_REQUEST["testCategory"] == "PSV 8+1 Seat")
        {
            $testFees = "65.00";
        }
        else if ($_REQUEST["testCategory"] == "PSV over 8 seats")
        {
            $testFees = "75.00";
        }
            
        // Creates a new object
        // This makes it possible to assign all variables to an object 
        // This object can then be added to the database
        $newPracticalBookingTestDetails = new CustomerBookingsTestDetails();

        // Assign the variables to the object
        $newPracticalBookingTestDetails->testDetailsId = $testBookingSlot;
        $newPracticalBookingTestDetails->nationalIdNumber = htmlentities($nationalIdNumber);
        $newPracticalBookingTestDetails->testType = htmlentities($testType);
        $newPracticalBookingTestDetails->testCategory = htmlentities($testCategory);
        $newPracticalBookingTestDetails->testFees = $testFees;

        addNewPracticalBookingTestDetails($newPracticalBookingTestDetails);
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

        addNewPracticalBookingPaymentDetails($newBookingPaymentDetails);
    }

    require_once ("../view/bookPractical_view.php");

?>
