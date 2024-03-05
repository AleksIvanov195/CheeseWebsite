<?php
class Customer extends Person
{
    private $registeredDate;

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