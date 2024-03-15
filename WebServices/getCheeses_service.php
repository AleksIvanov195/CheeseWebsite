<?php
header('Content-Type: application/json');
require_once "../Model/cheese.php";
require_once "../Model/dataAccess.php";

  $names = getAllCheeses();
  //Cheese class implements JsonSerializable, each php object cheese is converted into JSON
  echo json_encode($names);

?>
