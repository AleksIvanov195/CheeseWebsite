<?php
class OrderedItem {
    private $cheese;    // The cheese (as object)
    private $weight;  // the specified weight by the user 
    

    function __construct($cheese, $weight) 
    {
        $this->cheese = $cheese;
        $this->weight = $weight;
    }
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