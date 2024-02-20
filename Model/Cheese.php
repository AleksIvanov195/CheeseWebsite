<?php
class Cheese
{
    private $id;
    private $name;
    private $type; //hard or soft
    private $origin;
    private $strength; // 1-5
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