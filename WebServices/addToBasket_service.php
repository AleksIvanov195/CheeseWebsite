<?php
    require_once "../Model/Cheese.php";
    require_once "../Model/dataAccess.php";
    require_once "../Model/OrderedItem.php";
    if(session_status() == PHP_SESSION_NONE)
    {
        // session has not started
        session_start();
    }
if(isset($_REQUEST["id"]) && isset($_REQUEST["weight"]))
{
    $cheese = getCheeseById($_REQUEST["id"]);
    $item = new OrderedItem($cheese, (int)$_REQUEST["weight"]); 
    $_SESSION["basket"][] = $item;
    echo count($_SESSION["basket"]);
    
}  
?>