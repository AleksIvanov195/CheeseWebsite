<?php
    require_once "../Model/dataAccess.php";
    $status = false;

    if(!empty($_REQUEST["firstName"]) && !empty($_REQUEST["lastName"]) && 
    !empty($_REQUEST["email"]) && !empty($_REQUEST["address"]) 
        && !empty($_REQUEST["phoneNumber"]) && !empty($_REQUEST["password"]))
    {
        registerCustomer($_REQUEST["firstName"], $_REQUEST["lastName"], $_REQUEST["email"], $_REQUEST["address"], $_REQUEST["phoneNumber"], $_REQUEST["password"]);
        $status = "Customer has been added";
    }
    else
    {
        $status = "WTF";
    }


require_once "../View/register_view.php";
?>