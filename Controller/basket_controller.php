<?php
    require_once "../Model/Person.php";
    require_once "../Model/Customer.php";
    require_once "../Model/Manager.php";
    require_once "../Model/Cheese.php";
    require_once "../Model/dataAccess.php";
    require_once "../Model/OrderedItem.php";
    require_once "../phputils/basketUtils.php";
    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }
    

    //if delete is clicked, remove the item
    if (isset($_REQUEST["delete"]))
    {
        basketDeleteItem($_REQUEST["itemNumber"]);
        
    }

    //if update is clicked, update the item
    if (isset($_REQUEST["update"]) && isset($_REQUEST["itemNumber"]) && isset($_REQUEST["weight"]))
    {
        getBasketItems()[$_REQUEST["itemNumber"]]->setWeight($_REQUEST["weight"]);
    }

    require_once "../View/basket.php";
?>