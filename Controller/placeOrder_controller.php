<?php
    require_once "../Model/OrderedItem.php";
    require_once "../phputils/basketUtils.php";

    $total = 0;
    foreach(getBasketItems() as $item)
    {
        $total += $item->totalPrice;
    }
    require_once "../View/placeOrder_view.php";



?>