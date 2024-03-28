<?php
    require_once "../Model/Person.php";
    require_once "../Model/Customer.php";
    require_once "../Model/Manager.php";
    require_once "../Model/dataAccess.php";

    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }
    
    $loggedin = false;
    //Used not empty to ensure no empty strings
    if(!empty($_REQUEST["email"]) && !empty($_REQUEST["password"]))
    {
        //Gets the person
        $results = getPerson($_REQUEST["email"], $_REQUEST["password"]);
        //If it is empty
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
            $loggedin = true;
            require_once "../index.php";
        }

    }

    if(!$loggedin)
    {
        require_once "../View/login_view.php";
    }


?>