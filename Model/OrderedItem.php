<?php
//Used to store the info of what the user added to the basket
class OrderedItem 
{
    private $cheese;    // The cheese (as object)
    private $weight;  // the specified weight by the user 
    private $totalPrice; //total price weight * price per gram
    

    function __construct($cheese, $weight) 
    {
        $this->cheese = $cheese;
        $this->weight = $weight;
        $this->totalPrice = number_format($weight * $cheese->pricePerGram, 2, '.', '');
        
        
    }
    function __get($attribute)
    {
        return $this->$attribute;
    }

    function __set($attribute, $value)
    {
        $this->$attribute = $value;
    }

    function setTotalPrice($weight, $price)
    {
        $this->totalPrice = $weight * $price; 
    }
    function setWeight($weight)
    {
        $this->weight = $weight;
        $this->setTotalPrice($weight, $this->cheese->pricePerGram);
    }
}

?>