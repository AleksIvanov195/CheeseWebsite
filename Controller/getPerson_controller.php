<?php
require_once "../Model/Person.php";
require_once "../Model/Manager.php";
require_once "../Model/Customer.php";
require_once "../Model/dataAccess.php";


    $results = getAllPeople();




    $results = getAllManagers();




    $resultsCustomer = getAllCustomers();



require_once "../View/getPeople_view.php";

?>