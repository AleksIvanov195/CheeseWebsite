<?php

  class Person
 {
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $address;
    private $contactNumber;
    private $password;
    
    

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