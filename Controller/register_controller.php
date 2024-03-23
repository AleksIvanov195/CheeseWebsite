<?php
    require_once "../Model/dataAccess.php";
    $status = false;

    if(!empty($_REQUEST["firstName"]) && !empty($_REQUEST["lastName"]) && 
    !empty($_REQUEST["email"]) && !empty($_REQUEST["address"]) 
        && !empty($_REQUEST["phoneNumber"]) && !empty($_REQUEST["password"]))
    {
        registerCustomer(htmlentities($_REQUEST["firstName"]), htmlentities($_REQUEST["lastName"]), 
        htmlentities($_REQUEST["email"]), htmlentities($_REQUEST["address"]), htmlentities($_REQUEST["phoneNumber"]), htmlentities($_REQUEST["password"]));
        $status = "Customer has been added";
    }
    else
    {
        $status = "";
    }


require_once "../View/register_view.php";
?>