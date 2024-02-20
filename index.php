<!doctype html>
<html>
    <head>

    </head>
        <body>
            <form method = "post" action = "mainPage_controller.php">
                <input name = "search" placeholder="Search for cheese">
                <input type = "submit" value = "Search"/>
                    <br></br>
                    Cheese Type:
                    <?php foreach(array_unique($uniqueTypes) as $type):?>   
                    <input type="checkbox" id="<?= $type?>" name="cheeseType[]" value="<?= $type?>"> 
                    <label for="<?= $type?>"><?= $type?></label>
                    <?php endforeach?> 
                    <br></br>
                    Country of Origin:
                    <?php foreach(array_unique($uniqueOrigins) as $origin):?>
                     <input type="checkbox" id="<?= $origin?>" name="cheeseOrigin[]" value="<?= $origin?>"> 
                     <label for="<?= $origin?>"><?= $origin?></label>  
                     <?php endforeach?>                
            </form>
        <table>
            <thead>
                <th>Cheese ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Origin</th>
                <th>Strength</th>
                <th>Price Per Gram</th>
            </thead>
            <tbody>
            <?php foreach($results as $cheese):?>
                <tr>
                    <td><?= $cheese->id?></td>
                    <td><?= $cheese->name?></td>
                    <td><?= $cheese->type?></td>
                    <td><?= $cheese->origin?></td>
                    <td><?= $cheese->strength?></td>
                    <td><?= $cheese->pricePerGram?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </body>
        
</html>
