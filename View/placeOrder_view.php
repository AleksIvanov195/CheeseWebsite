<!doctype html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../Css/placeOrder.css" />
    </head>


    <body>
        <div class = "header">
            <h1>Place Order</h1>
        </div>
        <div class="box">
            <section>
                <h2>Order details</h2>
                <p> MEOW: <?= $total?></p>
                <a href = "basket_controller.php"> Return to Basket </a>
            </section>

            <section>
            <h2>Personal details</h2>
            <label for="firstName">First Name: </label>
                <input type = "text" name = "firstName" value = "<?= $_SESSION["user"]->firstName?>">
            <label for="firstName">Last Name: </label>
                <input type = "text" name = "lastName" value = "<?= $_SESSION["user"]->lastName?>"/>
            <label for="firstName">Email: </label>
                <input type = "text" name = "email"value = "<?= $_SESSION["user"]->email?>"/>
            <label for="firstName">Home Address: </label>
                <input type = "text" name = "address" value = "<?= $_SESSION["user"]->address?>"/>
            <label for="firstName">Contact Number: </label>
                <input type = "text" name = "contactNumber" value = "<?= $_SESSION["user"]->contactNumber?>"/>
            </section>
            <section>
            <!-- Will be handled by other team -->
            <h2>Payment details</h2>
                <input type = "text" placeholder = "Enter delivery address"/>
                <input type = "text" placeholder = "Card Number"/>
                <input type="month" id="expiryDate" name="expiry-date" min="2024-01">
                <input type = "text" placeholder = "CVV"/>
                <input type = "submit" value = "Confirm Details and Place Order"></input>
            </section>
        </div>
        
</body>
