<!doctype html>
<html>
    <head>
    <title>Home Page: Purchase the best Cheeses</title>
    <html lang="en-UK">
    <link rel="stylesheet" type="text/css" href="../Css/nav.css" />
    <link rel="stylesheet" type="text/css" href="../Css/styles.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript" src="//code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../Javascript_webservices/addToBasket.js"></script>
    <script type="text/javascript" src="../Javascript_webservices/filterCheeses.js"></script>
    <script type="text/javascript" src="../mainPage.js"></script>
    
    </head>
        <body>
            <nav>
                    <a href="mainPage_controller.php">Home</a>            
                    <?php if (empty($_SESSION["user"])):?>
                        <a href ="login_controller.php">Log in</a>
                    <?php else:?>
                        <h2 style ="color:white">Hello, <?=$_SESSION["user"]->firstName ?></h2>
                        <?php if ($_SESSION["user"]->role == "Manager"):?>
                            <a href ="adminPanel_controller.php">Admin Panel</a>
                        <?php endif?>
                    <?php endif?>   
                    <?php if(!empty($_SESSION["basket"])):?>
                        <a id ="basket" href="basket_controller.php">Basket (<?= count($_SESSION["basket"])?>)</a>
                    <?php else:?>
                        <a id ="basket" href="basket_controller.php">Basket</a>
                    <?php endif?>
            </nav>
            <div class = "filters" aria-label="Filter Section">
          
                    <div class="searchContainer">
                        <input name = "search" placeholder="Search for cheese" aria-label="Search for cheese">
                        <input id = "searchButton" type = "submit" value = "Search" aria-label="Go"/>
                    </div>
                        <p style = "margin-bottom: -40px; font-weight: bold" aria-label="Cheese Types">Cheese Type</p>
                        <br></br>

                        
                        <ul style = "margin-left: -30px; margin-bottom: -10px;" aria-label="Cheese Types"> 
                        <?php foreach(array_unique($uniqueTypes) as $type):?>            
                            <label>
                                <input type="checkbox" name="cheeseType[]" value="<?= $type?>"> 
                                <?= $type?>
                            </label>
                            <?php endforeach?> 
                        </ul>
                        

                        
                        <p style = "margin-bottom: -40px; font-weight: bold">Country of Origin</p>
                        <br></br>

                        <ul style = "margin-left: -30px; margin-bottom: -10px" aria-label="Cheese Origin">
                        <?php foreach(array_unique($uniqueOrigins) as $origin):?>
                            <label>
                                <input type="checkbox" name="cheeseOrigin[]" value="<?= $origin?> "> 
                                <?= $origin?>
                            </label> 
                            <?php endforeach?>        
                        </ul>
                        

                        
                        <p style = "margin-bottom: -40px; font-weight: bold">Cheese Strength</p>
                        <br></br>

                        <ul style = "margin-left: -30px; margin-bottom: -10px" aria-label="Cheese Strength">
                        <?php foreach(array_unique($uniqueStrengths) as $strength):?>
                            <label>
                                <input type="checkbox"name="cheeseStrength[]" value="<?= $strength?>"> 
                                <?= $strength?>
                            </label> 
                            <?php endforeach?> 
                        </ul> 

                         
                        
                        <p style = "margin-bottom: -30px; font-weight: bold">Price per gram</p>
                        <br></br>
                        <input type = "number" name="minPrice" placeholder="Min Price" style="width: 30%;" aria-label="Minimum Price">
                        <input type = "number" name="maxPrice" placeholder="Max Price" style="width: 30%;" aria-label="Maximum Price">
                        <input id = "searchButton" type = "submit" value = "Go" aria-label="Go"/>                 
                
            </div>

            <main>
            <?php if(empty($results)):?>
              <p style="color:red;"> No results</p>
            <?php else:?>
                <?php foreach($results as $cheese):?>
                    <div class = "card">
                        <div class = "cardBody">
                            <h3 aria-label="Cheese Name"><?= $cheese->name?></h3>
                            
                            <p>Type: <?= $cheese->type?></p>
                            <p>Origin: <?= $cheese->origin?></p>
                            <p>Strength: <?= $cheese->strength?></p>
                            <p>Price: £<?= $cheese->pricePerGram?>/g</p>
                        
                            <p>
                                <input id ="id<?= $cheese->id?>" type ="hidden" name="cheeseId" value="<?= $cheese->id?>" />
                                Weight in grams:
                                <input id = "weight<?= $cheese->id?>" name="weight" type = "number"  min="100" max="20000" placeholder="min:100g" aria-label="Weight in grams"/>
                                
                                <input id="<?= $cheese->id?>" name = "addToBasket" type="submit" value="Add to Basket" aria-label="Add To Basket" />
                                </p>
                            </div>
                        </div>  
                <?php endforeach ?>
                <?php endif?> 
                 
                </main>  

    
        </body>
        
</html>
