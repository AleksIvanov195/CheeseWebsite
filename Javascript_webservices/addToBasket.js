$(document).ready(initialisePage);
function initialisePage()
{
  $('input[name="addToBasket"]').click(ajaxAddToBasket);
}
function ajaxAddToBasket()
{
    //The clicked button ID is the ID of the cheese inside the card, where the button is clicked.
    var cheeseId = $(this).attr('id');
    //The id of each cheese and weight input element is id#<cheeseid> and weight#<cheeseid>
    //Therefore I can use the ID of the input button to get the correct cheese and add it to the basket.
    var id = $('#id' + cheeseId).val();
    var weight = $('#weight' + cheeseId).val();   
    $.get("../WebServices/addToBasket_service.php?id=" + id + "&weight=" + weight, ajaxAddToBasketCallBack);
}


function ajaxAddToBasketCallBack(result)
{
    console.log("Added");
    updateBasketSize(result);
}

function updateBasketSize(result)
{
  $("#basket").text('Basket Size: ' + result);
}

