<?php
    require_once "../Model/Cheese.php";
    require_once "../Model/dataAccess.php";
    require_once "../Model/OrderedItem.php";
    session_start();

    /*if(!isset($_SESSION["basket"])) 
    { 
        $_SESSION["basket"] = [];
    }
    if(isset($_REQUEST["cheeseId"])) 
    {
        $cheeseId = $_REQUEST["cheeseId"];
        $cheeseObjects = getCheeseById($cheeseId);
        $_SESSION["basket"] = array_merge($_SESSION["basket"], $cheeseObjects);
    }*/
   function addToBasket($cheeseId, $weigth) 
    {
        $cheeseObjects = getCheeseById($cheeseId);
        //$_SESSION["basket"] = array_merge($_SESSION["basket"], $cheeseObjects);
        foreach($cheeseObjects as $cheese)
        {

            $item = new OrderedItem($cheese, $weigth);
        }
        $_SESSION["basket"][] = $item;
        
    }

    function getBasketItems() 
    {
        if(!empty($_SESSION["basket"]))
        {
            return $_SESSION["basket"];
        }
        
    }


?>