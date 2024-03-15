<?php
    require_once "../Model/Cheese.php";
    require_once "../Model/dataAccess.php";
    require_once "../Model/OrderedItem.php";
    if(session_status() == PHP_SESSION_NONE)
    {
        // session has not started
        session_start();
    }
    //Add to basket
    function addToBasket($cheeseId, $weight) 
    {
        $cheese = getCheeseById($cheeseId); 
        $item = new OrderedItem($cheese, $weight);   
        $_SESSION["basket"][] = $item;       
    }
    //Get basket items from the session
    function getBasketItems() 
    {
        if(!empty($_SESSION["basket"]))
        {
            return $_SESSION["basket"];
        }
        
    }

    function basketDeleteItem($index)
    {
        unset($_SESSION["basket"][$index]);
    }


?>