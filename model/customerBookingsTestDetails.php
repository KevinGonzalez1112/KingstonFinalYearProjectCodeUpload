<?php 

    class CustomerBookingsTestDetails
    {
        // Declaring variables to be used in practical bookings class
        private $testDetailsId;
        private $nationalIdNumber;
        private $testType;
        private $testCategory;
        private $testDate;
        private $testTime;
        private $testFees;

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

