<!doctype html>
<html>
    <head>

    </head>
    <body>
        <form method = "post" action = "register_controller.php">
            
            <input name = "firstName" placeholder="First Name"required>
            <input name = "lastName" placeholder="Last Name"required>
            <input name = "email" placeholder="Email"required>
            <input name = "address" placeholder="Address"required>
            <input name = "phoneNumber" placeholder="Phone Number"required>
            <input type="password"name = "password" placeholder="Password"required>
            <input type = "submit" value = "Search"/>
            <?php if($status):?>
                <p style="color: green"><?=$status?></p>
            <?php endif ?>
        </form>


    </body>
    </html>