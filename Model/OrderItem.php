<?php
class OrderItem {
    private $cheese;    // The cheese (as object)
    private $quantity;  // the quantity of the cheese ordered
    

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