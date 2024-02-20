<?php
class Customer extends Person
{
    private $registeredDate;

    /*public function __construct($id, $firstName, $lastName, $email, $address, $contactNumber, $registeredDate, $password,$role) 
    {
        parent::__construct($id, $firstName, $lastName, $email, $address, $contactNumber, $password,$role); //call parent's (Person) constructor
        $this->registeredDate = $registeredDate; //unique attribute for customers
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