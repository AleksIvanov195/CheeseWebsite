<?php
//Used in admin page, if admin wants to see cheeses IDs.
require_once "../Model/Cheese.php";

require_once "../Model/dataAccess.php";


    $results = getAllCheeses();

require_once "../View/getCheeses_view.php";

?>