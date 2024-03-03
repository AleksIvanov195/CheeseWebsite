<!doctype html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../styles.css" />
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
            
                <form method = "post" action = "mainPage_controller.php">
                    <input name = "search" placeholder="Search for cheese">
                    <input type = "submit" value = "Search"/>
                        <br></br>
                        <p style = "margin-bottom: -40px; font-weight: bold">Cheese Type</p>
                        <br></br>

                        <?php foreach(array_unique($uniqueTypes) as $type):?>
                        <ul style = "margin-left: -30px; margin-bottom: -10px;">             
                            <input type="checkbox" name="cheeseType[]" value="<?= $type?>"> 
                            <label for="<?= $type?>"><?= $type?></label>  
                        </ul>
                        <?php endforeach?> 

                        
                        <p style = "margin-bottom: -40px; font-weight: bold">Country of Origin</p>
                        <br></br>

                        <?php foreach(array_unique($uniqueOrigins) as $origin):?>
                        <ul style = "margin-left: -30px; margin-bottom: -10px">
                        <input type="checkbox" name="cheeseOrigin[]" value="<?= $origin?> "> 
                        <label for="<?= $origin?>"><?= $origin?></label>         
                        </ul>
                        <?php endforeach?>

                        
                        <p style = "margin-bottom: -40px; font-weight: bold">Cheese Strength</p>
                        <br></br>

                        <?php foreach(array_unique($uniqueStrengths) as $strength):?>
                        <ul style = "margin-left: -30px; margin-bottom: -10px">
                        <input type="checkbox"name="cheeseStrength[]" value="<?= $strength?>"> 
                        <label for="<?= $strength?>"><?= $strength?></label> 
                        </ul> 
                        <?php endforeach?> 
                         
                        
                        <p style = "margin-bottom: -30px; font-weight: bold">Price per gram</p>
                        <br></br>
                        <input type="text" name="minPrice" placeholder="Min Price" style="width: 30%;">
                        <input type="text" name="maxPrice" placeholder="Max Price" style="width: 30%;">                 
                </form>
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
                        
                            <p><form action="mainPage_controller.php">
                                <input type ="hidden"name="cheeseId" value="<?= $cheese->id?>" />
                                <input name="weight" type = "number"  min="100" max="20000"/>
                                <br></br>
                                <input type="submit" value="Add to Basket" style="background-color:"/>
                                </form></p>
                            </div>
                        </div>  
                <?php endforeach ?>
                <?php endif?> 
                 
                </main>  

    
        </body>
        
</html>
