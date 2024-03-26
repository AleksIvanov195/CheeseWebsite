<!doctype html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../Css/basket.css" />
    <link rel="stylesheet" type="text/css" href="../Css/nav.css" />
    
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
            <h2 class ="header">Basket Items</h2>
            <main>
            <?php if(!empty(getBasketItems())):?>
                 <!-- for each item  get its index in the array and the item -->
                <?php foreach(getBasketItems() as $index => $item):?>
                <div class = "card">
                    <div class = "cardHeader">
                        <h3><?= $item->cheese->name?></h3>
                    </div>
                    
                        <div class = "cardBody">
                            <form method="post" action ="basket_controller.php"> 
                                <!-- Item number tells me where the item is stored in the basket array -->
                                <input type = "hidden"value="<?=$index?>" name = "itemNumber" readonly>          
                                <div class = "formText">
                                    <p>Type: <?= $item->cheese->type?></p>
                                    <p>Origin: <?= $item->cheese->origin?></p>
                                    <p>Strength: <?= $item->cheese->strength?></p>
                                    <p>Price Per Gram: £<span class = "pricePerGram"><?= $item->cheese->pricePerGram?></span></p>
                                    <p>Selected Weight: <input class="weight" name = "weight" type ="number" min="100" max="20000" onchange="enforceMinMax(this)" value="<?= $item->weight?>">g.</input></p>
                                    <p>Total Price: £<span name = "totalPrice"class = "totalPrice" ><?= $item->totalPrice?></span></p>
                                </div>
                                <div class = "formButtons">
                                    <input type ="submit" name = "update" value ="Update weight"/>
                                    <input type ="submit" name ="delete" value ="Remove Item"/>
                                </div>
                            </form>
                        </div>
                    
                </div>
                       
            
                <?php endforeach?>
                <?php endif?>
                   
            </main>
            <div class="purchaseCard">
                        
                    <h1>Total price: £<span id ="total">0.00</span></h1>
                    <?php if(empty($_SESSION["user"])):?>  
                        <h2>Please <a href = "../Controller/login_controller.php">Log In</a> to place your order!</h2>
                    <?php elseif(!empty($message)):?>
                        <h2 style="color:green"><?=$message?></h2>
                    <?php elseif(empty(getBasketItems())):?>
                        <h2>Please add Items to your basket to place a order!</h2>
                    <?php else:?>
                        <form method="post" action ="../Controller/placeOrder_controller.php"> 
                            <input style ="width:200px;height: 50px"type ="submit" name = "placeOrder" value ="Place Order"/>
                        </form>
                    <?php endif?>
                    <script src="../basket.js"></script>
       
            </div>
        
        

        </body>

    
</html>