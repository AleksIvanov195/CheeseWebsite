<?php
    class Manager extends Person
    {
        private $managerId;
        private $department; 
        private $salary; 
        private $startDate;
        

        public function __get($attribute)
        {
            return $this->$attribute;
            
        }
        public function __set($attribute, $value)
        {
            $this->$attribute = $value;
        }

        #[Override]
        public function setInfo($managerInfo, $personInfo)
        {
            $this->managerId = $managerInfo->id;
            $this->salary = $managerInfo->salary;
            $this->department = $managerInfo->department;
            $this->startDate = $managerInfo->startDate;

            $this->id = $personInfo->id;
            $this->firstName = $personInfo->firstName;
            $this->lastName = $personInfo->lastName;
            $this->email = $personInfo->email;
            $this->address = $personInfo->address;
            $this->contactNumber = $personInfo->contactNumber;
            $this->password = $personInfo->password;
            $this->role = $personInfo->role;


        }

    }
?>