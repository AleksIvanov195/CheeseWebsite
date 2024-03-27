<!doctype html>
<html>
    <head>
        <title>Log In Page</title>
        <html lang="en-UK">
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
                <input name = "email" placeholder="Email" required aria-label="Enter Email">
            <label for="password">Password: </label>
                <input type ="password" name = "password" placeholder="Password" aria-label="Enter Password">
                <input type = "submit" value = "Log In" aria-label="Click to log in"/>
            </form>
            <h5><a href="register_controller.php" aria-label="Click here if you don't have an account">No account? Register now!</a><h5>
            <h5><a href="mainPage_controller.php" aria-label="Click here to return to home page">Return to Home</a><h5>

            <?php if(!empty($errorMessage)):?>     
                    <p style="color:red"><?= $errorMessage?></p>            
            <?php endif?>
        </div>
    </body>
    </html>
    