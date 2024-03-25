<!doctype html>
<html>
    <head>
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
                    <input name = "firstName" placeholder="First Name"required>
                <label for="lastName">Last Name: </label>
                    <input name = "lastName" placeholder="Last Name"required>
                <label for="email">Email: </label>
                    <input name = "email" placeholder="Email"required>
                <label for="address">Home Address: </label>
                    <input name = "address" placeholder="Address"required>
                <label for="phoneNumber">Phone Number: </label>
                    <input name = "phoneNumber" placeholder="Phone Number"required>
                <label for="password">Password: </label>
                    <input type="password"name = "password" placeholder="Password"required>
            </div>
            <input type = "submit" value = "Register"/>
            <?php if($status):?>
                <p style="color: green"><?=$status?></p>
            <?php endif ?>
        </form>
            <h5><a href="login_controller.php">Already Registered?!</a><h5>
            <h5><a href="mainPage_controller.php">Return to Home</a><h5>
                <?php if(!empty( $registrationResult)):?>
                    <p style="color:red"> <?=$registrationResult?></p>
                    <?php endif?>
    </div>


    </body>
    </html>