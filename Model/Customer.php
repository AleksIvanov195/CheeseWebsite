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
}




?>