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
    //A function which is used to set the details of Managers & Customers, usually used in the DataAccess.
    public function setInfo($parameterOne, $parameterTwo)
    {

    }

 }

?>