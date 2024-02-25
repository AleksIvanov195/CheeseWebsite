<!doctype html>
<html>
    <head>

    </head>
        <body>
        <nav>
            <ul>
            <li><a href="mainPage_controller.php">Home</a></li>
            <li><a href="#news">News</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="basket_controller.php">Basket</a></li>
            </ul>
            </nav>
            <?php foreach(getBasketItems() as $items):?>
                <tr>
                                <td><?= $items->cheese->id?></td>
                                <td><?= $items->cheese->name?></td>
                                <td><?= $items->cheese->type?></td>
                                <td><?= $items->cheese->origin?></td>
                                <td><?= $items->cheese->strength?></td>
                                <td><?= $items->cheese->pricePerGram?></td>
                                <td><?= $items->weight?></td>
                                
                            </tr>
                        <?php endforeach?>




        </body>
    
</html>