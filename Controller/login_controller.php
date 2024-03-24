<?php
    require_once "../Model/Person.php";
    require_once "../Model/Customer.php";
    require_once "../Model/Manager.php";
    require_once "../Model/dataAccess.php";

    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }
    
    if(!empty($_REQUEST["email"]) && !empty($_REQUEST["password"]))
    {
        $results = getPerson($_REQUEST["email"], $_REQUEST["password"]);
        if(empty($results))
        {
            $errorMessage = "Wrong email or password, please try again.";
        }
        else
        {
            require_once "../Model/Cheese.php";
            $_SESSION["user"] = $results;
            $results = getAllCheeses();
            foreach($results as $cheese)
            {
                $uniqueTypes[] = $cheese->type;
                $uniqueOrigins[] = $cheese->origin;
                $uniqueStrengths[] = $cheese->strength;
                sort($uniqueStrengths);
            }
            require_once "../index.php";
            //header("Location: mainPage_controller.php");
        }

    }

    if(!isset($_SESSION["user"]))
    {
        require_once "../View/login_view.php";
    }


?>