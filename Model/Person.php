<?php
  class Person
 {
    protected $id;
    protected $firstName;
    protected $lastName;
    protected $email;
    protected $address;
    protected $contactNumber;
    protected $password;
    protected $role;
    


    public function __get($attribute) 
    {
        return $this->$attribute;
    }

    public function __set($attribute, $value) 
    {
        $this->$attribute = $value;
    } 
    public function setInfo($parameterOne, $parameterTwo)
    {

    }

 }

?>