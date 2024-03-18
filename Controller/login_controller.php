<?php
    require_once "../Model/dataAccess.php";
    require_once "../Model/Person.php";
    require_once "../Model/Customer.php";
    if(session_status() == PHP_SESSION_NONE)
    {
        // session has not started
        session_start();
    }

    if(!empty($_REQUEST["username"]) && !empty($_REQUEST["password"]))
    {
        $results = getPerson($_REQUEST["username"], $_REQUEST["password"]);
        $_SESSION["user"] = $results;

        header("Location: mainPage_controller.php");
    }


    require_once "../View/login_view.php";

?>