<!doctype html>
<html>
    <head>
    
    <link rel="stylesheet" type="text/css" href="../Css/styles.css" />
    <link rel="stylesheet" type="text/css" href="../Css/nav.css" />
    <script type="text/javascript" src="//code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../Javascript_webservices/filterCheeses.js"></script>
    <script type="text/javascript" src="../Javascript_webservices/addToBasket.js"></script>
    </head>
        <body>
            <nav>
                    <a href="mainPage_controller.php">Home</a>
                    <a href="#about">About</a>
                    <a href="#contact">Contact</a>
                    <?php if (empty($_SESSION["Username"])):?>
                        <a href ="login_controller.php">Hi, Log in</a>
                    <?php else:?>
                        <a>Hi, <?=$_SESSION["Username"] ?></a>
                    <?php endif?>   
                    <a href="basket_controller.php">Basket</a>
                
            </nav>
            <div class = "filters">
            
                
                    <div class="searchContainer">
                        <input name = "search" placeholder="Search for cheese">
                        <input id = "searchButton" type = "submit" value = "Search"/>
                    </div>
                        
                        <p style = "margin-bottom: -40px; font-weight: bold">Cheese Type</p>
                        <br></br>

                        <?php foreach(array_unique($uniqueTypes) as $type):?>
                        <ul style = "margin-left: -30px; margin-bottom: -10px;">             
                            <label>
                                <input type="checkbox" name="cheeseType[]" value="<?= $type?>"> 
                                <?= $type?>
                            </label>
                        </ul>
                        <?php endforeach?> 

                        
                        <p style = "margin-bottom: -40px; font-weight: bold">Country of Origin</p>
                        <br></br>

                        <?php foreach(array_unique($uniqueOrigins) as $origin):?>
                        <ul style = "margin-left: -30px; margin-bottom: -10px">
                            <label>
                                <input type="checkbox" name="cheeseOrigin[]" value="<?= $origin?> "> 
                                <?= $origin?>
                            </label>         
                        </ul>
                        <?php endforeach?>

                        
                        <p style = "margin-bottom: -40px; font-weight: bold">Cheese Strength</p>
                        <br></br>

                        <?php foreach(array_unique($uniqueStrengths) as $strength):?>
                        <ul style = "margin-left: -30px; margin-bottom: -10px">
                            <label>
                                <input type="checkbox"name="cheeseStrength[]" value="<?= $strength?>"> 
                                <?= $strength?>
                            </label> 
                        </ul> 
                        <?php endforeach?> 
                         
                        
                        <p style = "margin-bottom: -30px; font-weight: bold">Price per gram</p>
                        <br></br>
                        <input type = "number" name="minPrice" placeholder="Min Price" style="width: 30%;">
                        <input type = "number" name="maxPrice" placeholder="Max Price" style="width: 30%;">                 
                
            </div>

            <main>
            <?php if(empty($results)):?>
              <p style="color:red;"> No results</p>
            <?php else:?>
                <?php foreach($results as $cheese):?>
                    <div class = "card">
                        <div class = "cardBody">
                            <h3><?= $cheese->name?></h3>
                            
                            <p>Type: <?= $cheese->type?></p>
                            <p>Origin: <?= $cheese->origin?></p>
                            <p>Strength: <?= $cheese->strength?></p>
                            <p>Price: £<?= $cheese->pricePerGram?>/g</p>
                        
                            <p>
                                <input id ="id<?= $cheese->id?>" type ="hidden" name="cheeseId" value="<?= $cheese->id?>" />
                                Weight in grams:
                                <input id = "weight<?= $cheese->id?>" name="weight" type = "number"  min="100" max="20000"/>
                                
                                <input id="<?= $cheese->id?>" name = "addToBasket" type="submit" value="Add to Basket" style="background-color:"/>
                                </p>
                            </div>
                        </div>  
                <?php endforeach ?>
                <?php endif?> 
                 
                </main>  

    
        </body>
        
</html>
