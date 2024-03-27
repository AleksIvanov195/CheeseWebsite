<!doctype html>
<html>
    <head>
    <title>Admin Panel</title>
    <html lang="en-UK">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../Css/adminPanel.css" />
    <script type="text/javascript" src="//code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../Javascript_webservices/adminPanel.js"></script>
    </head>
    
    <body>
    <nav>
    </nav>

        <div class = "header">
            <h1>Admin Panel</h1>
        </div>
        <div class = "box">
            <section>        
                <h2>Admin Details</h2>
                <p>Manager ID: <?= $_SESSION["user"]->managerId?></p>
                <p>Name: <?= $_SESSION["user"]->firstName?></p>
                <a href = "mainPage_controller.php"> Back to home </a>
            </section>
            <section>        
                    <h3>Add New Cheese</h3>
                    Cheese Name:
                    <input id = "cheeseName" type = "text"/>
                    Type:
                    <input id = "cheeseType" type = "text"/>
                    Origin Country:
                    <input id = "cheeseOrigin" type = "text"/>
                    Strength:
                    <input id = "cheeseStrength" type = "number" min="1" max ="5"/>
                    <p id="error" style="color:red; display:none;"></p>
                    Price Per Gram:
                    <input id = "cheesePrice" type = "number" placeholder="e.g. 0.03"/>           
                    <input type = "submit" id ="addCheese" value ="Add Cheese"/>
                    <p id="confirmation" style ="display:none; color:green"></p>
            </section>
            <section>           
                    <h3>Delete Existing Cheese</h3>
                    <p>Please enter cheese ID, to see all cheeses click <a href="getAllCheeses_controller.php"target="_blank"> here</a>.</p>
                    <input id = "cheeseIdDelete" type = "number"/>
                    <input type = "submit" id ="deleteCheese" value ="Submit"/>
                    <p id="deletionMessage" style="display:none; color:red">meow </p>

            </section>
            <section>           
                    <h3>Update Cheese Details</h3>
                    <p>Please enter cheese ID, to see all cheeses click <a href="getAllCheeses_controller.php" target="_blank"> here</a>.</p>
                    <input id = "cheeseUpdate" type = "text"/>
                    <input type = "submit" id ="findCheese" value ="Submit"/>

                    <div id="displayDetails" style ="display:none">
                        
                        Name:
                        <input id="cheeseNameUpdate" type ="text"/>
                        Type:
                        <input id="cheeseTypeUpdate"type ="text"/>
                        Origin:
                        <input id="cheeseOriginUpdate"type ="text"/>
                        Strength:
                        <input id="cheeseStrengthUpdate"type ="number"/>
                        PricePerGram:
                        <input id="cheesePriceUpdate"type ="number"/>
                        <input type = "submit" id ="updateCheese" value ="Update"/>
      
                    </div>

            </section>
            


            </div>
    </body>
</html>