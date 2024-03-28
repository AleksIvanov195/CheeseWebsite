<!doctype html>
<html>
    <head>
    <title>Register Page</title>
    <html lang="en-UK">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../Css/register.css" />
    </head>
    <body>
    <div class = "header">
                <h1> Cheese Website </h1>
    </div>
    <div class = "box">
        <h2>Register</h2>
        <form method = "post" action = "register_controller.php">
            <div class="textInputs">
                <label for="firstName">First Name: </label>  
                    <input name = "firstName" placeholder="First Name"required aria-label="Enter First Name">
                <label for="lastName">Last Name: </label>
                    <input name = "lastName" placeholder="Last Name"required aria-label="Enter Last Name">
                <label for="email">Email: </label>
                    <input name = "email" placeholder="Email"required aria-label="Enter Email"> 
                <label for="address">Home Address: </label>
                    <input name = "address" placeholder="Address"required aria-label="Enter Home Address">
                <label for="phoneNumber">Phone Number: </label>
                    <input name = "phoneNumber" placeholder="Phone Number"required aria-label="Enter Phone Number" type="number">
                <label for="password">Password: </label>
                    <input type="password"name = "password" placeholder="Password"required aria-label="Enter Password">
            </div>
            <input type = "submit" value = "Register"aria-label="Click to register your account"/>
            <?php if($status):?>
                <p style="color: green"><?=$status?></p>
            <?php endif ?>
        </form>
            <h5><a href="login_controller.php" aria-label="Click here if you want to log in">Already Registered?</a><h5>
            <h5><a href="mainPage_controller.php" aria-label="Click to return to home page">Return to Home</a><h5>
                <?php if(!empty( $registrationResult)):?>
                    <p style="color:red"> <?=$registrationResult?></p>
                    <?php endif?>
    </div>


    </body>
    </html>