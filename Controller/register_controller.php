<?php
    require_once "../Model/dataAccess.php";
    $status = false;

    if(!empty($_REQUEST["firstName"]) && !empty($_REQUEST["lastName"]) && 
    !empty($_REQUEST["email"]) && !empty($_REQUEST["address"]) 
        && !empty($_REQUEST["phoneNumber"]) && !empty($_REQUEST["password"]))
    {
        $registrationResult = registerCustomer(htmlentities($_REQUEST["firstName"]), htmlentities($_REQUEST["lastName"]), 
        htmlentities($_REQUEST["email"]), htmlentities($_REQUEST["address"]), htmlentities($_REQUEST["phoneNumber"]), htmlentities($_REQUEST["password"]));
        if(!empty($registrationResult))
        {
            $status = false;     
        }
        else
        {
            $status = true;
            require_once "../View/login_view.php";
        }

    }
    if(!$status)
    {
        require_once "../View/register_view.php";
    }



?>