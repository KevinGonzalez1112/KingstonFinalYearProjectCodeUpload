<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Assign the variables for Database log in 
    $db_host = "localhost";
    $db_name = "db_kevin";
    $db_username = "kevin";
    $db_password = "eimeidew";
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ERRMODE_WARNING];

    // Gets the database from the server 
    $pdo = new PDO("mysql:host=localhost;dbname=$db_name","$db_username","$db_password",[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ERRMODE_WARNING]);

    // Creating the customer log in by grabbing their credentials already assigned in the database
    function customerLogIn($userId, $password)
    {
        global $pdo;
        $Statement = $pdo->prepare("SELECT log_in_id, national_id_number, password FROM customer_log_in_details WHERE national_id_number = '$userId'");
        $Statement->execute();
        $row = $Statement->fetch();

        $hashedPassword = password_hash($row["password"], PASSWORD_DEFAULT);

        if (password_verify($password, $hashedPassword))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function getUserProfile($userId)
    {
        global $pdo;
        $Statement = $pdo->prepare("SELECT national_id_number, first_name, surname, date_of_birth, place_of_birth, home_address, email_address, home_telephone, work_telephone FROM customer WHERE national_id_number = '$userId'");
        $Statement->execute();
        $customer = $Statement->fetch(PDO::FETCH_OBJ);

        // Assign the customers details to session variables to be used elsewhere in the website
        $_SESSION["first_name"] = $customer->first_name;
        $_SESSION["surname"] = $customer->surname;
        $_SESSION["date_of_birth"] = $customer->date_of_birth;
        $_SESSION["place_of_birth"] = $customer->place_of_birth;
        $_SESSION["address"] = $customer->home_address;
        $_SESSION["email_address"] = $customer->email_address;
        $_SESSION["home_telephone"] = $customer->home_telephone;
        $_SESSION["work_telephone"] = $customer->work_telephone;
    }

    function getPracticalBookingAvailableSlots()
    {
        global $pdo;
        $Statement = $pdo->prepare("SELECT test_details_id, national_id_number, test_type, test_category, 
        test_date, test_time, test_fees FROM customer_practical_bookings_test_details WHERE national_id_number IS NULL");
        $Statement->execute();
        $practicalBookingTestDetails = $Statement->fetchAll(PDO::FETCH_CLASS, 'CustomerBookingsTestDetails');

        return $practicalBookingTestDetails;
    }

    function getTheoryBookingAvailableSlots()
    {
        global $pdo;
        $Statement = $pdo->prepare("SELECT test_details_id, national_id_number, test_type, test_category, test_date, test_time, test_fees FROM customer_theory_bookings_test_details WHERE national_id_number IS NULL");
        $Statement->execute();
        $theoryBookingTestDetails = $Statement->fetchAll(PDO::FETCH_CLASS, 'CustomerBookingsTestDetails');

        return $theoryBookingTestDetails;
    }

    function addNewPracticalBookingTestDetails($newPracticalBookingTestDetails)
    {
        global $pdo;
        $Statement = $pdo->prepare("UPDATE customer_practical_bookings_test_details 
                                    SET national_id_number = '$newPracticalBookingTestDetails->nationalIdNumber', 
                                    test_type = '$newPracticalBookingTestDetails->testType',
                                    test_category = '$newPracticalBookingTestDetails->testCategory',
                                    test_fees = $newPracticalBookingTestDetails->testFees
                                    WHERE test_details_id = $newPracticalBookingTestDetails->testDetailsId"); 
        $Statement->execute();
    }

    function addNewTheoryBookingTestDetails($newTheoryBookingTestDetails)
    {
        global $pdo;
        $Statement = $pdo->prepare("UPDATE customer_theory_bookings_test_details 
                                    SET national_id_number = '$newTheoryBookingTestDetails->nationalIdNumber', 
                                    test_type = '$newTheoryBookingTestDetails->testType',
                                    test_category = '$newTheoryBookingTestDetails->testCategory',
                                    test_fees = $newTheoryBookingTestDetails->testFees
                                    WHERE test_details_id = $newTheoryBookingTestDetails->testDetailsId"); 
        $Statement->execute();
    }

    function addNewPracticalBookingPaymentDetails($newBookingPaymentDetails)
    {
        global $pdo;
        $Statement = $pdo->prepare("INSERT INTO practical_booking_payment_details (test_details_id, card_name, card_number, card_expiry_date, card_security_code) VALUES (?,?,?,?,?)");
        $Statement->execute([$newBookingPaymentDetails->testDetailsId,
                            $newBookingPaymentDetails->cardName,
                            $newBookingPaymentDetails->cardNumber,
                            $newBookingPaymentDetails->cardExpiryDate,
                            $newBookingPaymentDetails->cardSecurityCode]);
    }

    function addNewTheoryBookingPaymentDetails($newBookingPaymentDetails)
    {
        global $pdo;
        $Statement = $pdo->prepare("INSERT INTO theory_booking_payment_details (test_details_id, card_name, card_number, card_expiry_date, card_security_code) VALUES (?,?,?,?,?)");
        $Statement->execute([$newBookingPaymentDetails->testDetailsId,
                            $newBookingPaymentDetails->cardName,
                            $newBookingPaymentDetails->cardNumber,
                            $newBookingPaymentDetails->cardExpiryDate,
                            $newBookingPaymentDetails->cardSecurityCode]);
    }

    function addNewCustomerDocumentRequest($newDocumentRequest)
    {
        global $pdo;
        $Statement = $pdo->prepare("INSERT INTO customer_document_requests (national_id_number, document_type, completed_request, document_fees) VALUES (?,?,?,?)");
        $Statement->execute([$newDocumentRequest->nationalIdNumber,
                            $newDocumentRequest->documentType,
                            $newDocumentRequest->completedRequest,
                            $newDocumentRequest->documentFee]);
        
        $documentRequestId = $pdo->lastInsertId();

        return $documentRequestId;
    }

    function addNewDocumentPaymentDetails($newDocumentPaymentDetails)
    {
        global $pdo;
        $Statement = $pdo->prepare("INSERT INTO document_payment_details (document_request_id, card_name, card_number, card_expiry_date, card_security_code) VALUES (?,?,?,?,?)");
        $Statement->execute([$newDocumentPaymentDetails->bookingId, 
                            $newDocumentPaymentDetails->cardName,
                            $newDocumentPaymentDetails->cardNumber,
                            $newDocumentPaymentDetails->cardExpiryDate,
                            $newDocumentPaymentDetails->cardSecurityCode]);
    }

    function changeRegisteredAddress($newAddress)
    {
        $nationalId = $_SESSION["national_id_number"];

        global $pdo;
        $Statement = $pdo->prepare("UPDATE customer SET home_address = '$newAddress' WHERE national_id_number = '$nationalId'"); 
        $Statement->execute();
    }

    function addNewDuplicateDocumentRequest($newDuplicateDocumentRequest)
    {
        global $pdo;
        $Statement = $pdo->prepare("INSERT INTO duplicate_documents_requests (national_id_number, document_type, vehicle_registration, 
        reason_for_duplicate, duplication_fees, completed_request) VALUES (?,?,?,?,?,?)");
        $Statement->execute([$newDuplicateDocumentRequest->nationalIdNumber, 
                            $newDuplicateDocumentRequest->documentType,
                            $newDuplicateDocumentRequest->vehicleRegistration,
                            $newDuplicateDocumentRequest->reasonForDuplicate,
                            $newDuplicateDocumentRequest->documentFee,
                            $newDuplicateDocumentRequest->completedRequest]);

        $documentRequestId = $pdo->lastInsertId();

        return $documentRequestId;
    }

    function addNewDuplicateDocumentPaymentDetails($newDuplicateDocumentPaymentDetails)
    {
        global $pdo;
        $Statement = $pdo->prepare("INSERT INTO duplicate_documents_payment_details (document_request_id, card_name, card_number, card_expiry_date, card_security_code) VALUES (?,?,?,?,?)");
        $Statement->execute([$newDuplicateDocumentPaymentDetails->documentRequestId, 
                            $newDuplicateDocumentPaymentDetails->cardName,
                            $newDuplicateDocumentPaymentDetails->cardNumber,
                            $newDuplicateDocumentPaymentDetails->cardExpiryDate,
                            $newDuplicateDocumentPaymentDetails->cardSecurityCode]);
    }

?>