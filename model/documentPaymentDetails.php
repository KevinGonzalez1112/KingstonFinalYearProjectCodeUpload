<?php 

    class DocumentPaymentDetails
    {
        // Declaring variables to be used in practical bookings class
        private $documentRequestId;
        private $cardName;
        private $cardNumber;
        private $cardExpiryDate;
        private $cardSecurityCode;

        // Global getter function
        function __get($name) 
        { 
            return $this->$name;
        }

        // Global setter function
        function __set($name,$value)
        {
            $this->$name=$value;
        }
    }

?>