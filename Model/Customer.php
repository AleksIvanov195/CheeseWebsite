<?php
class Customer extends Person
{
    private $registeredDate;

    public function __get($attribute)
    {
        return $this->$attribute;
        
    }
    public function __set($attribute, $value)
    {
        $this->$attribute = $value;

    }
    //Takes the "Person" object info returned by the dataaccess and the customerinfo object.
    #[Override]
    public function setInfo($customerInfo, $personInfo)
    {
        $this->registeredDate = $customerInfo->registeredDate;

        $this->id = $personInfo->id;
        $this->firstName = $personInfo->firstName;
        $this->lastName = $personInfo->lastName;
        $this->email = $personInfo->email;
        $this->address = $personInfo->address;
        $this->contactNumber = $personInfo->contactNumber;
        $this->password = $personInfo->password;
        $this->role = $personInfo->role;


    }
    public function setCustomerInfo($firstName, $lastName, $email, $address, $contactNumber, $password, $registeredDate)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->address = $address;
        $this->contactNumber = $contactNumber;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->registeredDate = $registeredDate;
    }
}




?>