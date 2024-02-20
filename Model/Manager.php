<?php
    class Manager extends Person
    {
        private $managerId;
        private $deparment; 
        private $salary; 
        private $startDate;
        
        /*public function __construct($id, $firstName, $lastName,$email, $address, $contactNumber, $password, $role,$managerId, $department,$salary,$startDate) 
        {
            parent::__construct($id, $firstName, $lastName, $email, $address, $contactNumber, $password,$role); //call parent constructor
            $this->managerId = $managerId;
            $this->department = $department;
            $this->salary = $salary;
            $this->startDate = $startDate;
        }*/
        function __get($attribute)
        {
            return $this->$attribute;
            
        }
        function __set($attribute, $value)
        {
            $this->$attribute = $value;
        }
    }
?>