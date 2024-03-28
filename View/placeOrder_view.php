<!doctype html>
<html>
    <head>
    <title>Place Order Page</title>
    <html lang="en-UK">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../Css/placeOrder.css" />
    </head>


    <body>
        
        <div class = "header">
            <h1>Place Order</h1>
        </div>
        <div class="box">
            <section>
                <h2>Order details</h2>
                <p> Total for this order: £<?= $total?></p>
                <a href = "basket_controller.php"> Return to Basket </a>
            </section>

            <section>
            <h2>Personal details</h2>
            <label for="firstName">First Name: </label>
                <input type = "text" name = "firstName" value = "<?= $_SESSION["user"]->firstName?>" aria-label="Enter First Name" required/>
            <label for="lastName">Last Name: </label>
                <input type = "text" name = "lastName" value = "<?= $_SESSION["user"]->lastName?>" aria-label="Enter Last Name"required/>
            <label for="email">Email: </label>
                <input type = "text" name = "email"value = "<?= $_SESSION["user"]->email?>" aria-label="Enter Email"required/>
            <label for="address">Home Address: </label>
                <input type = "text" name = "address" value = "<?= $_SESSION["user"]->address?>" aria-label="Enter your home address"required/>
            <label for="contactNumber">Contact Number: </label>
                <input type = "number" name = "contactNumber" value = "<?= $_SESSION["user"]->contactNumber?> "aria-label="Enter contact number"required/>
            </section>
            <section>
            <!-- Will be handled by other team -->
            <h2>Payment details</h2>
            <form method="post" action ="placeOrder_controller.php"> 
            <label for="shippingAddress">Shipping Address: </label>
                <input type = "text" value = "<?= $_SESSION["user"]->address?>" name ="shippingAddress" aria-label="Enter Shipping address"required/>
            <label for="cardNumber">Card Number: </label>
                <input type = "number" placeholder = "Card Number" name ="cardNumber" aria-label="Enter Card Number" required/>
            <label for="expiryDate">Card Expiry Date: </label> 
                <input type="month" id="expiryDate" name="expiryDate" min="2024-01" aria-label="Enter Card Expiry Date"required/>
            <label for="CVV">CVV Number: </label>
                <input type = "number" placeholder = "CVV" name ="CVV" aria-label="Enter Card CVV"required/>
                <input type = "submit" value = "Confirm Details and Place Order" name ="placeOrder"/>
            </form>
            </section>
        </div>
        
</body>
