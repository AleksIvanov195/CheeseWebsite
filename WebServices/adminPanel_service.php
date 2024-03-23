<?php
    
    require_once "../Model/Cheese.php";
    require_once "../Model/DataAccess.php";

    if($_REQUEST["action"] == "add" && isset($_REQUEST["cheeseName"]) && isset($_REQUEST["cheeseType"]) && isset($_REQUEST["cheeseOrigin"]) && isset($_REQUEST["cheeseStrength"]) && isset($_REQUEST["cheesePrice"]))
    {
        $cheese = new Cheese();
        $cheese->setCheeseDetails(0, htmlentities($_REQUEST["cheeseName"]),htmlentities($_REQUEST["cheeseType"]),
        htmlentities($_REQUEST["cheeseOrigin"]), htmlentities($_REQUEST["cheeseStrength"]), htmlentities($_REQUEST["cheesePrice"])); 
        addNewCheese($cheese);
        //Send back a string containing the name
        echo $cheese->name;
    }
    else if($_REQUEST["action"] == "delete" && isset($_REQUEST["id"]))
    {
        //Send back a string sent by the dataAccess function
        echo deleteCheese($_REQUEST["id"]);

    }
    else if($_REQUEST["action"] == "getCheese" && isset($_REQUEST["id"]))
    {
        //Specifying the content type for this case only.
        header('Content-Type: application/json');   
        $results = getCheeseById($_REQUEST["id"]);
        echo json_encode($results);
    }
    else if($_REQUEST["action"] == "update" && isset($_REQUEST["cheeseName"]) && isset($_REQUEST["id"])&& isset($_REQUEST["cheeseType"]) && isset($_REQUEST["cheeseOrigin"]) && isset($_REQUEST["cheeseStrength"]) && isset($_REQUEST["cheesePrice"]))
    {
        $cheese = new Cheese();
        $cheese->setCheeseDetails(htmlentities($_REQUEST["id"]),htmlentities($_REQUEST["cheeseName"]),htmlentities($_REQUEST["cheeseType"]),
        htmlentities($_REQUEST["cheeseOrigin"]), htmlentities($_REQUEST["cheeseStrength"]), htmlentities($_REQUEST["cheesePrice"])); 
        updateCheese($cheese);

        
    }
    else
    {
        echo "Error invalid request.";
    }



?>