<?php
class Order
{
    private $orderId;
    private $personId; //id of the person
    private $orderDate;
    private $orderedItems; //an array of type OrderItem containg each ordered cheese
    private $shippingAddress; //where is it going


    function __get($attribute)
    {
        return $this->$attribute;
        
    }
    function __set($attribute, $value)
    {
        $this->$attribute = $value;

    }
    function setDetails($personId, $date, $items, $address)
    {
        $this->personId = $personId;
        $this->orderDate = $date;
        $this->orderedItems = $items;
        $this->shippingAddress = $address;

    }
}