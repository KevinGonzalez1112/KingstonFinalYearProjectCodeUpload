<?php 

    class TheoryBookings
    {
        // Declaring variables to be used in theory bookings class
        private $bookingId;
        private $idNumber;
        private $firstName;
        private $surname;
        private $dateOfBirth;
        private $placeOfBirth;
        private $address;
        private $email;
        private $homeTelephone; 
        private $workTelephone; 

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