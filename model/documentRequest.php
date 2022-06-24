<?php 

    class DocumentRequest
    {
        // Declaring variables to be used in practical bookings class
        private $documentRequestId;
        private $nationalIdNumber;
        private $documentType;
        private $completedRequest;

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