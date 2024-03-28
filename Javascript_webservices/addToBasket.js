$(document).ready(initialisePage);
function initialisePage()
{
  //When addToBasket button is clicked
  $('input[name="addToBasket"]').click(ajaxAddToBasket);
}
function ajaxAddToBasket()
{
  //The clicked button ID is the ID of the cheese inside the card, where the button is clicked.
  var cheeseId = $(this).attr('id');
  //The id of each cheese and weight input element is id#<cheeseid> and weight#<cheeseid>
    //Therefore I can use the ID of the input button to get the correct cheese and add it to the basket.
  var weight = $('#weight' + cheeseId).val();
  //Cheese cannot be added if there is no value entered.
  if(weight >= 100)
  {
    var id = $('#id' + cheeseId).val();
    $.get("../WebServices/addToBasket_service.php?id=" + id + "&weight=" + weight, ajaxAddToBasketCallBack);
  }
}

//The result of the ajax request.
function ajaxAddToBasketCallBack(result)
{
    //console.log("Added");
    updateBasketSize(result);
}
//Update the basket size
function updateBasketSize(result)
{
  $("#basket").text('Basket ('+result.replace(/ /g,'')+')');
}

