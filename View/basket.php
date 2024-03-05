<!doctype html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../basket.css" />
    
    
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

            <main>
            <?php if(!empty(getBasketItems())):?>
                <?php foreach(getBasketItems() as $index => $item):?>
                <div class = "card">
                    <div class = "header">
                        <h3><?= $item->cheese->name?></h3>
                    </div>

                    <div class = "cardBody">
                    <!-- Instead of form AJAX can be used here -->
                    
                        <form method="post" action ="basket_controller.php"> 
                            <input type = "hidden"value="<?=$index?>" name = "itemNumber">          
                            <p>Type: <?= $item->cheese->type?></p>
                            <p>Origin: <?= $item->cheese->origin?></p>
                            <p>Strength: <?= $item->cheese->strength?></p>
                            <p>Price Per Gram: £<span class = "pricePerGram"><?= $item->cheese->pricePerGram?></span></p>
                            <p>Selected Weight: <input class="weight" name = "weight" type ="number" min="100" max="20000" onkeyup="enforceMinMax(this)" value="<?= $item->weight?>">g.</input></p>
                            <p>Total Price: £<span name = "totalPrice"class = "totalPrice" ><?= $item->totalPrice?></span></p>
                            <button type ="submit">update</button>
                            <button type ="submit" name ="delete">Remove Item</button>
                        </form>
                    </div>
                </div>
                       
            
                <?php endforeach?>
                <?php endif?>
                   
            </main>

        <div class="purchaseCard">
            <p>Total price: £<span id ="total">0.00</span></p>
            <script src="../basket.js"></script>
             

        </div>
        
        

        </body>

    
</html>