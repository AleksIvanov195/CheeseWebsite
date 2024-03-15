$(document).ready(initialisePage);

function initialisePage()
{
  $("input#searchButton").click(ajaxGetFilteredCheeses);
  $('input[type=checkbox]').change(ajaxGetFilteredCheeses);

}
function ajaxGetCheesesByName()
{
    
    var name = $('input[name="search"]').val();
    $.get("../WebServices/getFilteredCheese_service.php?search="+name, ajaxCallback);
}

function ajaxGetFilteredCheeses()
{
    // Get all the selected filters
    var name = $('input[name="search"]').val();
    //.map() creates new array with the results of a function, the function return the value of each element in cheeseType[]
    //so it creates an array of the values of each checked checkbox and then converts this from a jQuery object to a standard js array. 
    var types = $('input[name="cheeseType[]"]:checked').map(function() { return this.value; }).get();
    var origins = $('input[name="cheeseOrigin[]"]:checked').map(function() { return this.value; }).get();
    var strength = $('input[name="cheeseStrength[]"]:checked').map(function() { return this.value; }).get();
    var minPrice = $('input[name="minPrice"]').val();
    var maxPrice = $('input[name="maxPrice"]').val();
    $.get("../WebServices/getFilteredCheese_service.php?search="+name+"&cheeseType="+types+"&cheeseOrigin="+origins+"&cheeseStrength="+strength+"&minPrice="+minPrice+"&maxPrice="+maxPrice, ajaxCallback);

}
function ajaxCallback(results)
{
    console.log(results);
    $("main").empty();
    if(results.length===0)
    {
        $("main").append('<p style="color:red;"> No results</p>');
    }
    else
    {
        console.log(results.length);
        for (var i = 0; i < results.length; i++)
        {
        var cheese = results[i];
        //$("div#results").append(cheese.name);
        var card = '<div class="card"><div class="cardBody"><h3>' + 
            cheese.name + '</h3><p>Type: ' + 
            cheese.type + '</p><p>Origin: ' + 
            cheese.origin + '</p><p>Strength: ' + 
            cheese.strength + '</p><p>Price: £' + 
            cheese.pricePerGram + 
            '/g</p><p><form action="mainPage_controller.php"><input type="hidden" name="cheeseId" value="' + cheese.id + 
            '" />Weight in grams:<input name="weight" type="number" min="100" max="20000" /><input type="submit" value="Add to Basket" style="background-color:"/></form></p></div></div>';
            $("main").append(card);
        }
    }
}