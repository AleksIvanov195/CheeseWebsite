<?php
    
    require_once "../Model/Cheese.php";
    require_once "../Model/dataAccess.php";
    //If action is add
    if($_REQUEST["action"] == "add" && isset($_REQUEST["cheeseName"]) && isset($_REQUEST["cheeseType"]) && isset($_REQUEST["cheeseOrigin"]) && isset($_REQUEST["cheeseStrength"]) && isset($_REQUEST["cheesePrice"]))
    {
        $cheese = new Cheese();
        //First value is 0, as here the ID of the cheese doesn't matter, it will be automatically assigned by the database.
        $cheese->setCheeseDetails(0, htmlentities($_REQUEST["cheeseName"]),htmlentities($_REQUEST["cheeseType"]),
        htmlentities($_REQUEST["cheeseOrigin"]), htmlentities($_REQUEST["cheeseStrength"]), htmlentities($_REQUEST["cheesePrice"])); 
        addNewCheese($cheese);
        //Send back a string containing the name
        echo $cheese->name;
    }
    //If action is delete
    else if($_REQUEST["action"] == "delete" && isset($_REQUEST["id"]))
    {
        //Send back a string sent by the dataAccess function, cheese doesnt exist or confirmation messages.
        echo deleteCheese($_REQUEST["id"]);

    }
    //If action is getCheese
    else if($_REQUEST["action"] == "getCheese" && isset($_REQUEST["id"]))
    {
        //Specifying the content type for this case only to return a JSON representation of the cheese.
        header('Content-Type: application/json');   
        $results = getCheeseById($_REQUEST["id"]);
        echo json_encode($results);
    }
    //If action is update
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