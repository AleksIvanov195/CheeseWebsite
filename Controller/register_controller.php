<?php
    require_once "../Model/Person.php";
    require_once "../Model/Customer.php";
    require_once "../Model/dataAccess.php";
    $status = false;
    
    if(!empty($_REQUEST["firstName"]) && !empty($_REQUEST["lastName"]) && 
    !empty($_REQUEST["email"]) && !empty($_REQUEST["address"]) 
        && !empty($_REQUEST["contactNumber"]) && !empty($_REQUEST["password"]))
    {
        $customer = new Customer();
        $customer->setCustomerInfo(htmlentities($_REQUEST["firstName"]),htmlentities($_REQUEST["lastName"]),htmlentities($_REQUEST["email"]), 
        htmlentities($_REQUEST["address"]), htmlentities($_REQUEST["contactNumber"]), $_REQUEST["password"], date('Y-m-d'));
        $registrationResult = registerCustomer($customer);
        //print_r($registrationResult);
        if(!empty($registrationResult))
        {
            //If something is returned, an error will be displayed.
            $status = false;     
        }
        else
        {
            //On Success require the login view
            $status = true;
            require_once "../View/login_view.php";
        }

    }
    if(!$status)
    {
        require_once "../View/register_view.php";
    }



?>