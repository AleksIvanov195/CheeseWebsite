let weights = document.getElementsByClassName("weight");
for (let i = 0; i < weights.length; i++) 
{
    //Set event listiner to each input field, when user changes value it will call updateTotal function
    weights[i].addEventListener("input", updateTotal);
}
updateTotal();

//Update total
function updateTotal() 
{
    let total = 0;
    //Get all basket items as list.
    let items = document.getElementsByClassName("cardBody");
    //for each item
    for (let i = 0; i < items.length; i++) 
    {
        //For the item, get it's weight
        let weight = parseFloat(items[i].getElementsByClassName("weight")[0].value);
        //For the item, get it's pricePerGram
        let pricePerGram = parseFloat(items[i].getElementsByClassName("pricePerGram")[0].innerText);
        let totalPrice = weight * pricePerGram;
        //Item get it's totalPrice and change text to the new totalPrice
        items[i].getElementsByClassName("totalPrice")[0].innerText = totalPrice.toFixed(2);
        total += totalPrice;
    }
    //Change the total price of the basket.
    document.getElementById("total").innerHTML = total.toFixed(2);

}

function enforceMinMax(input)
{
    if(input.value > 20000)
    {
        input.value='20000';
    }
    else if(input.value<100)
    {
        input.value='100';
    }
} 



