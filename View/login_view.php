<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../Css/login.css" />
    </head>
    <body>
        <div class = "header">
                <h1> Cheese Website </h1>
        </div>
        <div class = "box">
        <h2>Log in</h2>
            <form method = "post" action = "login_controller.php">
            <label for="email">Email: </label>
                <input name = "email" placeholder="Email" required>
            <label for="password">Password: </label>
                <input type ="password" name = "password" placeholder="Password">
                <input type = "submit" value = "Log In"/>
            </form>
            <h5><a href="register_controller.php">No account? Register now!</a><h5>
            <h5><a href="mainPage_controller.php">Return to Home</a><h5>

            <?php if(!empty($errorMessage)):?>     
                    <p style="color:red"><?= $errorMessage?></p>            
            <?php endif?>
        </div>
    </body>
    </html>
    