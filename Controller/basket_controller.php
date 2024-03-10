<?php

    require_once "addToBasket_controller.php";
    

    //if delete is clicked, remove the item
    if (isset($_REQUEST["delete"]))
    {
        basketDeleteItem($_REQUEST["itemNumber"]);
        
    }

    //if update is clicked, update the item
    if (isset($_REQUEST["update"]) && isset($_REQUEST["itemNumber"]) && isset($_REQUEST["weight"]))
    {
        getBasketItems()[$_REQUEST["itemNumber"]]->weight = $_REQUEST["weight"];
        
    }

    
    
    /*function updateBasket()
    {
        

    }*/


    require_once "../View/basket.php";
?>