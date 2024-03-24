<!doctype html>
<html>
    <head>

    </head>
    <body>
        <form method = "post" action = "login_controller.php">
            
            <input name = "email" placeholder="Email">
            <input name = "password" placeholder="Password">
            <input type = "submit" value = "Search"/>
        </form>
        <a href="register_controller.php">No account? Register now!</a>

        <?php if(!empty($errorMessage)):?>     
                <p><?= $errorMessage?></p>            
        <?php endif?>

    </body>
    </html>