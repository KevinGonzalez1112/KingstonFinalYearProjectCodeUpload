<?php 

    class TheoryBookingsTestDetails
    {
        // Declaring variables to be used in practical bookings class
        private $testDetailsId;
        private $bookingId;
        private $testType;
        private $testCategory;
        private $testDate;
        private $testTime;

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