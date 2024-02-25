<?php
    require_once "../Model/dataAccess.php";
    require_once "../Model/Person.php";
    require_once "../Model/Customer.php";

    if(!empty($_REQUEST["username"]) && !empty($_REQUEST["password"]))
    {
        $results = getCustomer($_REQUEST["username"], $_REQUEST["password"]);
    }







    require_once "../View/login_view.php";

?>