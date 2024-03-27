<!doctype html>
<html>
    <head>
    <title>Cheeses View</title>
    <html lang="en-UK">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cheeses view</title>
    </head>
    <body>
        <table>
            All cheeses
            <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Origin</th>
                        <th>Strength</th>
                        <th>Price Per Gram</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($results as $cheese):?>
                        <tr>
                            <td><?= $cheese->id?></td>
                            <td><?= $cheese->name?></td>
                            <td><?= $cheese->origin?></td>
                            <td><?= $cheese->strength?></td>
                            <td><?= $cheese->pricePerGram?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
         </table>
        

     </body> 
     </html>