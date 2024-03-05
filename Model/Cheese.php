<?php
class Cheese
{
    private $id;
    private $name;
    private $type; 
    private $origin;
    private $strength; 
    private $pricePerGram;


    function __get($attribute)
    {
        return $this->$attribute;
        
    }
    function __set($attribute, $value)
    {
        $this->$attribute = $value;

    }
}