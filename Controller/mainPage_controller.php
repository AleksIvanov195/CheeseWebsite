<?php
    
    require_once "../Model/Cheese.php";
    require_once "../Model/Person.php";
    require_once "../Model/Customer.php";
    require_once "../Model/Manager.php";
    require_once "../Model/dataAccess.php";
    require_once "addToBasket_controller.php";
    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }
    

    $allCheeses = getAllCheeses(); 
    $types = array();
    $origins = array();
    $name = $types = $origins = $strength = "";
    $priceRange = array(0.001,1000); //Make sure there is always a valid range for min and max price per gram (filters)


    if(empty($_REQUEST["weight"])) 
    {   
        //status = please enter valid weigth e.g. 1.5
        
    }
    else
    {
        addToBasket($_REQUEST["cheeseId"], $_REQUEST["weight"]);
    }

    //print_r(getBasketItems());
    //$basketItems = getBasketItems();
    
    //Filters
    foreach($allCheeses as $cheese)
    {
        $uniqueTypes[] = $cheese->type;
        $uniqueOrigins[] = $cheese->origin;
        $uniqueStrengths[] = $cheese->strength;
        sort($uniqueStrengths);
    }
    
    if(isset($_REQUEST["search"])) //if user entered a name
    {
        $name = $_REQUEST["search"]; //get the entered name
    }

    if(isset($_REQUEST["cheeseType"])) //if the user selected a cheese type from the checkboxes
    {
        $types = $_REQUEST["cheeseType"]; //get the selected cheese types
    }

    if(isset($_REQUEST["cheeseOrigin"])) //if the user selected origin from the checkboxes
    {
        $origins = $_REQUEST["cheeseOrigin"]; //get all the selected origins
    }
    
    if(isset($_REQUEST["cheeseStrength"])) //if the user selected strength from the checkboxes
    {
        $strength = $_REQUEST["cheeseStrength"]; //get all the selected strengths
    }
    if(isset($_REQUEST["minPrice"]) || isset($_REQUEST["maxPrice"])) 
    {
        if(empty($_REQUEST["minPrice"]))//if min price input is empty
        {
            //use the default value set at the start
        }
        else
        {
            $priceRange[0] = $_REQUEST["minPrice"]; //else set it to what the user entered
        }
        
        if(empty($_REQUEST["maxPrice"]))//if max price input is empty
        {
            //use the default value set at the start
        }
        else
        {
            $priceRange[1] = $_REQUEST["maxPrice"];//else set it to what the user entered
        } 
        
    }


    if(!empty($types) || !empty($origins) || !empty($name) || !empty($strength) || !empty($priceRange)) //if any is true
    {
        $results = getFilteredCheeses($name,$types, $origins, $strength, $priceRange); //then get the cheeses based on the selected filters and name
    }
    else
    {
        $results = getAllCheeses(); //else display all cheeses
    }



    require_once "../index.php";
?>