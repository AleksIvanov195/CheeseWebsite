<?php
    require_once "../Model/Cheese.php";
    require_once "../Model/dataAccess.php";
    require_once "../Model/OrderedItem.php";
    require_once "../phputils/basketUtils.php";

    if(isset($_REQUEST["id"]) && isset($_REQUEST["weight"]))
    {
        //Gets item id and weight and calls the addToBasket function. 
        addToBasket($_REQUEST["id"], (int)$_REQUEST["weight"]);
        //Return the number of items, to be displayed.
        echo getBasketItemCount();
        
    }  
?>