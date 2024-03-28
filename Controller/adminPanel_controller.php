<?php  
    require_once "../Model/Person.php";
    require_once "../Model/Manager.php";
    require_once "../Model/Cheese.php";
    require_once "../Model/dataAccess.php";
    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }
    //If the user is not an admin, they will be redirected to the mainpage
    if (empty($_SESSION["user"]) || $_SESSION["user"]->role != "Manager")
    {
        //Data needed for the main page to function properly
        $results = getAllCheeses();
        foreach($results as $cheese)
        {
            $uniqueTypes[] = $cheese->type;
            $uniqueOrigins[] = $cheese->origin;
            $uniqueStrengths[] = $cheese->strength;
            sort($uniqueStrengths);
        }
        require_once "../index.php";
    }
    else
    {
        require_once "../View/adminPanel_view.php";
    }
    
?>