<?php
class Cheese implements JsonSerializable
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
    //Prefered to use setter for the details, as it provides more flexibility
    function setCheeseDetails($id, $name, $type, $origin, $strength, $pricePerGram)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->origin=$origin;
        $this->strength=$strength;
        $this->pricePerGram=$pricePerGram;
    }
    function jsonSerialize()
    {
        return get_object_vars($this);
    }
}