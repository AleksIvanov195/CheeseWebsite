<?php
    require_once "../Model/Person.php";
    require_once "../Model/Customer.php";
    require_once "../Model/Manager.php";
    require_once "../Model/OrderedItem.php";
    require_once "../phputils/basketUtils.php";
    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

    $total = 0;
    foreach(getBasketItems() as $item)
    {
        $total += $item->totalPrice;
    }
    require_once "../View/placeOrder_view.php";



?>