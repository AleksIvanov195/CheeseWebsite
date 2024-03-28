<?php

$db_name = "test";
$db_username = "Aleksandar";
$db_password = "1234";
$pdo = new PDO("mysql:host=localhost;dbname=test",
                "Aleksandar",
                "1234",
                [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
                //PDO provides data access, we can issue SQL statements.


    function getAllPeople()
    {
        global $pdo;
        $statement = $pdo->prepare("SELECT * FROM Person");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS,"Person");
        return $results;
    }
    function getAllManagers()
    {
        global $pdo;
        $statement = $pdo->prepare("SELECT * FROM Person INNER JOIN Manager ON Person.id = Manager.personId");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS,"Manager");
        return $results;

    }
    function getAllCustomers()
    {
        global $pdo;
        $statement = $pdo->prepare("SELECT * FROM Person INNER JOIN Customer ON Person.id = Customer.personId");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS,"Customer");
        return $results;

    }
    //Takes customer object as parameter
    function registerCustomer($customer)
    {
        global $pdo;
        //Check if email already exists
        $checkEmail = $pdo->prepare("SELECT * FROM Person WHERE email = ?");
        $checkEmail->execute([$customer->email]);
        $user = $checkEmail->fetch();
    
        if (!empty($user)) 
        {
            return "Email already registered.";
        } 
        else 
        {
            $statement = $pdo->prepare("INSERT INTO Person (firstName, lastName, email, address, contactNumber, password, role)
                                        VALUES (?, ?, ?, ?, ?, ?, ?)");
            $statement->execute([$customer->firstName, $customer->lastName, 
                                $customer->email, $customer->address, $customer->contactNumber, $customer->password, "Customer"]); 
            $personId = $pdo->lastInsertId();
            $statement = $pdo->prepare("INSERT INTO Customer (personId, registeredDate) VALUES (?, ?)");
            $statement->execute([$personId, $customer->registeredDate]);    
        }
    }
    function getCustomerInfo($id)
    {
        global $pdo;
        $statement = $pdo->prepare("SELECT * FROM Customer WHERE personId = ?");
        $statement->execute([$id]);
        $statement->setFetchMode(PDO::FETCH_CLASS, "Customer");
        $user = $statement->fetch();
        return $user;
    }
    function getManagerInfo($id)
    {
        global $pdo;
        $statement = $pdo->prepare("SELECT * FROM Manager WHERE personId = ?");
        $statement->execute([$id]);
        $statement->setFetchMode(PDO::FETCH_CLASS, "Manager");
        $user = $statement->fetch();
        return $user;
    }
    function getPerson($email, $password)
    {
        global $pdo;
        $statement = $pdo->prepare("SELECT * FROM Person WHERE email = ?");
        $statement->execute([$email]);
        $statement->setFetchMode(PDO::FETCH_CLASS, "Person");
        $user = $statement->fetch();
        //Password valid
        if ($user && password_verify($password, $user->password)) 
        {
            //Get manager info
            if ($user->role == "Manager")
            {
                $managerInfo = getManagerInfo($user->id);
                $m = new Manager();
                $m->setInfo($managerInfo, $user);
                return $m;       
            }
            //Get customer info
            else if($user->role == "Customer")
            {
                $customerInfo = getCustomerInfo($user->id);
                $c = new Customer();
                $c->setInfo($customerInfo, $user);
                return $c;   
            }
            
        }  
        //Wrong password  
        else 
        {
            return null;
        }
    }
    function addNewCheese($cheeseObject)
    {
        global $pdo;
        $statement = $pdo->prepare("INSERT INTO Cheese (name, type , origin, strength, pricePerGram) VALUES(?,?,?,?,?)");
        $statement->execute([$cheeseObject->name, $cheeseObject ->type, $cheeseObject->origin, $cheeseObject->strength, $cheeseObject->pricePerGram]);
    }
    function getAllCheeses()
    {
        global $pdo;
        $statement = $pdo->prepare("SELECT * FROM Cheese");
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS,"Cheese");
        return $results;

    }
    function getCheeseById($id)
    {
        global $pdo;
        $statement = $pdo->prepare("SELECT * FROM Cheese WHERE id = ?");
        $statement->execute([$id]);
        $result = $statement->fetchObject("Cheese"); //will fetch only 1 cheese matching the id
        return $result;        
    }

    function updateCheese($cheeseObject)
    {
        global $pdo;
        $statement = $pdo->prepare("UPDATE Cheese SET name = ?, type = ?, origin = ?, strength = ?, pricePerGram = ? WHERE id = ?");
        $statement->execute([$cheeseObject->name, $cheeseObject ->type, $cheeseObject->origin, $cheeseObject->strength, $cheeseObject->pricePerGram, $cheeseObject->id,]);
    }
    function deleteCheese($id)
    {
        global $pdo;
        $statement = $pdo->prepare("DELETE FROM Cheese WHERE id = ?");
        $statement->execute([$id]);
        // Check if a row was deleted (cheese was deleted)
        if ($statement->rowCount() > 0) 
        {
            return "Success! Cheese with ID " . $id . " has been deleted.";
        } 
        else 
        {
            return "Cheese with this ID doesn't exist";
        }
    }
    function getFilteredCheeses($name,$types, $origins, $strength, $priceRange)
    {
        global $pdo;
        //this is the query i will be executing, the 1=1 is always true, so i can just use AND and not worry about if something is the first where condition
        $query = "SELECT * FROM Cheese WHERE 1=1";

        if(!empty($name))
        {
            $query .= " AND name = ?";
            $params[] = $name;
        }

        if(!empty($types))//if the array is not empty
        {
            //To not get the error:
            //Uncaught TypeError: count(): Argument #1 ($value) must be of type Countable|array in the JSON File
            if(!is_array($types))
            {
                $types = explode(",", $types);
            }
            $placeholders = str_repeat('?,', count($types) - 1) . '?'; //str_repeat concatenate "?," to the string, number of times in this case it is the size of $types array - 1, because otherwise another "," will be printed which will cause an error
            $query .= " AND type IN ($placeholders)"; //concatenate to the query the " AND type IN ($placeholders)" condition
            //the query will look like something like this if type has 3 values: SELECT * FROM Cheese WHERE 1=1 AND type IN(?, ?, ?)
            if(!empty($params)) //this checks if the array $params has any values, because if it doesn't it will error due to $params not being an array in array_merge();
            {
                $params = array_merge($params, $types);
            }
            else //if array $params doesn't have value then add this to it.
            {
                $params = $types;
            }

            
        }

        if(!empty($origins))
        {
            if(!is_array($origins))
            {
                $origins = explode(",", $origins);
            }
            $placeholders = str_repeat('?,', count($origins) - 1) . '?';
            $query .= " AND origin IN ($placeholders)";
            //the query will look like something like this if origin has 2 values: SELECT * FROM Cheese WHERE 1=1 AND origin IN(?, ?)
            if(!empty($params))//this checks if the array $params has any values, because if it doesn't it will error due to $params not being an array in array_merge();
            {
                $params = array_merge($params, $origins);
            }
            else//if array $params doesn't have value then add this to it.
            {
                $params = $origins;
            }
                  
        }
        if(!empty($strength))
        {
            if(!is_array($strength))
            {
                $strength = explode(",", $strength);
            }
            $placeholders = str_repeat('?,', count($strength) - 1) . '?';
            $query .= " AND strength IN ($placeholders)";
            
            if(!empty($params))
            {
                $params = array_merge($params, $strength);
            }
            else
            {
                $params = $strength;
            }
        }
        if(!empty($priceRange))
        {
            $query .= " AND pricePerGram BETWEEN ? and ?"; 
            if(!empty($params))
            {
                $params = array_merge($params, $priceRange);
            }
            else
            {
                $params = $priceRange;
            }
            //print_r($priceRange);

        }

        $statement = $pdo->prepare($query);//the query might look something like this: SELECT * FROM Cheese WHERE 1=1 AND type IN(?,?,?) AND origin IN (?,?)
        $statement->execute($params);//it will execute query with these hard,soft,blue,england,USA replacing the question marks
        $results = $statement->fetchAll(PDO::FETCH_CLASS,"Cheese");
        return $results;
    }

    function placeOrder($order)
    {
        global $pdo;
        $statement = $pdo->prepare("INSERT INTO `Order` (personId, orderedItems, orderDate, shippingAddress) VALUES(?,?,?,?)");
        //To convert the array of items into a storable string
        $orderedItems = serialize($order->orderedItems);
        $statement->execute([$order->personId, $orderedItems, $order->orderDate, $order->shippingAddress]);
    }

      
?>                