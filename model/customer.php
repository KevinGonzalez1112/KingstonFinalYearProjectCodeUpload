<?php 

    class Customer
    {
        // Declaring variables to be used in practical bookings class
        private $customer_id;
        private $national_id_number;
        private $first_name;
        private $surname;
        private $date_of_birth;
        private $place_of_birth;
        private $address;
        private $email_address;
        private $home_telephone; 
        private $work_telephone; 

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