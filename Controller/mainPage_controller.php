<?php
    require_once "../Model/Cheese.php";
    require_once "../Model/dataAccess.php";

    $allCheeses = getAllCheeses(); // I am using this variable in the html to creater filters for each cheese. It is more efficient to just store all the cheeses in a variable and then use it whenever i need it.
    $types = array();
    $origins = array();
    $name = ""; 

    foreach($allCheeses as $cheese)
    {
        $uniqueTypes[] = $cheese->type;
        $uniqueOrigins[] = $cheese->origin;
    }

    if(isset($_REQUEST["search"]))
    {
        $name = $_REQUEST["search"];
    }

    if(isset($_REQUEST["cheeseType"]))
    {
        $types = $_REQUEST["cheeseType"];
    }

    if(isset($_REQUEST["cheeseOrigin"]))
    {
        $origins = $_REQUEST["cheeseOrigin"];
    }

    if(!empty($types) || !empty($origins) || !empty($name))
    {
        $results = getFilteredCheeses($name,$types, $origins);
    }
    else
    {
        $results = getAllCheeses();
    }

   /* //for each cheeseType selected by the user, return cheeses based on the cheese type selected.
    if(isset($_REQUEST["cheeseType"]))
    {
        $types = $_REQUEST["cheeseType"];
        $results = [];

        //makes sure that if multiple checkboxes are selected, all cheeses with the selected types are returned.
        foreach($types as $type)
        {
            $cheese = getCheeseByType($type);
            $results = array_merge($results,$cheese);                
        }


    }
    if(isset($_REQUEST["cheeseOrigin"]))
    {
        $origins = $_REQUEST["cheeseOrigin"];
        $results = [];

        //makes sure that if multiple checkboxes are selected, all cheeses with the selected origins are returned.
        foreach($origins as $origin)
        {
            $cheese = getCheeseByOrigin($origin);
            $results = array_merge($results,$cheese);                
        }


    }*/

    require_once "../index.php";
?>