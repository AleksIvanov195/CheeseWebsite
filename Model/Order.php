<?php
class Order
{
    private $orderId;
    private $customerId; //id of the customer
    private $orderDate;
    private $orderedItems; //an array of type OrderItem containg each ordered cheese
    private $status; //is it shipped? delivered? pending?
    private $shippingAddress; //where is it going


    function __get($attribute)
    {
        return $this->$attribute;
        
    }
    function __set($attribute, $value)
    {
        $this->$attribute = $value;

    }
}