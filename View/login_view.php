<!doctype html>
<html>
    <head>

    </head>
    <body>
        <form method = "post" action = "login_controller.php">
            
            <input name = "username" placeholder="Username">
            <input name = "password" placeholder="Password">
            <input type = "submit" value = "Search"/>
        </form>
        <a href="register_controller.php">No account? Register now!</a>

        <?php if(!empty($results)):?>
            
                <p><?= $results->firstName?></p>
                <p><?= $results->lastName?></p>
                <p><?= $results->address?></p>
                
                <?php endif?>

    </body>
    </html>