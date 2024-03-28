<?php
    require_once "../Model/Person.php";
    require_once "../Model/Customer.php";
    require_once "../Model/Manager.php";
    require_once "../Model/Cheese.php";
    require_once "../Model/Order.php";
    require_once "../Model/OrderedItem.php";
    require_once "../phputils/basketUtils.php";
    require_once "../Model/dataAccess.php";
    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }
    $total = 0;
    $orderPlaced=false;
    foreach(getBasketItems() as $item)
    {
        $total += $item->totalPrice;
    }
    if(isset($_REQUEST["placeOrder"])&& !empty($_REQUEST["shippingAddress"]))
    {
        $order = new Order();
        //Setting order details, also using htmlentities for the shipping address as that is what the user inputs in the database, XSS protection
        $order->setDetails($_SESSION["user"]->id, date("Y-m-d"), $_SESSION["basket"], htmlentities($_REQUEST["shippingAddress"]));
        placeOrder($order);
        $orderPlaced = true;
        unset($_SESSION["basket"]);
        $message = "Thanks for your order! Please add items to your basket to start a new order!";
        require_once "../View/basket.php";
    }
    //If order is not placed require the view
    if(!$orderPlaced)
    {
        require_once "../View/placeOrder_view.php";
    }



?>