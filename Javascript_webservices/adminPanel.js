$(document).ready(initialisePage);

function initialisePage()
{
  $("input#addCheese").click(ajaxAddCheese);
  $("input#deleteCheese").click(ajaxDeleteCheese);
  $("input#updateCheese").click(ajaxUpdateCheese);
  $("input#findCheese").click(ajaxGetCheese);
  $("input#cheeseStrength").keyup(enforceMinAndMax);
  $("input").on("input",hideMessages);
}
//Functions
//When add cheese is clicked
function ajaxAddCheese()
{
  //Geting cheese info, no id is needed because it is generated automatically by the database
    var name = $("input#cheeseName").val();
    var type= $("input#cheeseType").val();
    var origin= $("input#cheeseOrigin").val();
    var strength= $("input#cheeseStrength").val();
    var pricePerGram= $("input#cheesePrice").val();
    
    //Check if any are empty
    if(!name|| !type || !origin || !strength || !pricePerGram)
    {
      $("p#confirmation").text("Fields cannot be empty!");
      $("p#confirmation").css({"display": "block","color": "red"});
      $('#addCheese').prop('disabled', true);
    }
    //If none are empty
    else
    {
      $("p#confirmation").css({"display": "none","color": "green"});
      $('#addCheese').prop('disabled', false);
      origin = capitalizeFirstLetter(origin);
      name = capitalizeFirstLetter(name);
      type = capitalizeFirstLetter(type);
      //Send the request
      $.get("../WebServices/adminPanel_service.php?action=add&cheeseName="+name+"&cheeseType="+type+"&cheeseOrigin="+origin+"&cheeseStrength="+ strength+ "&cheesePrice="+ pricePerGram, ajaxAddCheeseCallBack)


    }   
}
// When delete cheese is clicked
function ajaxDeleteCheese()
{
  var id = $("input#cheeseIdDelete").val();
  if(!id)
    {
      $("p#deletionMessage").text("Fields cannot be empty!");
      $("p#deletionMessage").css({"display": "block", "color": "red"});
      $('#deleteCheese').prop('disabled', true);
    }
    else
    {
      $('#deleteCheese').prop('disabled', false);
      if (confirm("Are you sure you want to delete cheese with ID: "+id+"?")) 
      {
        // User clicked ok
        $.get("../WebServices/adminPanel_service.php?action=delete&id="+id, ajaxDeleteCheeseCallBack);
      } 
      else 
      {
        // User clicked cancel or closed the dialog
        // Do nothing 
      }
    }

}
//This is currently used for the "update", however it can be re-used anywhere where we need to get the cheese
function ajaxGetCheese()
{
  var id = $("input#cheeseUpdate").val();
  $.get("../WebServices/adminPanel_service.php?action=getCheese&id="+id, ajaxGetCheeseCallBack);
}
//When update cheese is clicked
function ajaxUpdateCheese()
{
  var id = $("input#cheeseUpdate").val();
  var name = $("input#cheeseNameUpdate").val();
  var type = $("input#cheeseTypeUpdate").val();
  var origin = $("input#cheeseOriginUpdate").val();
  var strength = $("input#cheeseStrengthUpdate").val();
  var price = $("input#cheesePriceUpdate").val();
  
  $.get("../WebServices/adminPanel_service.php?action=update&cheeseName="+name+"&id="+id+"&cheeseType="+type+"&cheeseOrigin="+origin+"&cheeseStrength="+ strength+ "&cheesePrice="+ price, ajaxUpdateCheeseCallBack);
}

//AJAX callbacks
function ajaxAddCheeseCallBack(result)
{
    $("p#confirmation").text(result +" has been added.");
    $("p#confirmation").css("display", "block");
    $("input#cheeseName").val("");
    $("input#cheeseType").val("");
    $("input#cheeseOrigin").val("");
    $("input#cheeseStrength").val("");
    $("input#cheesePrice").val("");

}
function ajaxDeleteCheeseCallBack(result)
{
    //console.log(result);
    $("p#deletionMessage").text(result);
    $("p#deletionMessage").css({"display": "block", "color": "green"});
    $("input#cheeseIdDelete").val("");
}
function ajaxGetCheeseCallBack(result)
{
  //console.log(result);
  $("div#displayDetails").css({"display":"flex", "flex-direction" : "column"});
  $("input#cheeseNameUpdate").val(result.name);
  $("input#cheeseTypeUpdate").val(result.type);
  $("input#cheeseOriginUpdate").val(result.origin);
  $("input#cheeseStrengthUpdate").val(result.strength);
  $("input#cheesePriceUpdate").val(result.pricePerGram);
  
}
function ajaxUpdateCheeseCallBack(result)
{
  alert("Cheese succesfully updated!");
}


//User interface management

function enforceMinAndMax()
{
  if ($(this).val() < 1 || $(this).val() > 5) 
  {
    $('#addCheese').prop('disabled', true);
    $("#error").text("Cheese Strength must be between 1 and 5.");
    $("#error").css("display", "block");
    $(this).val("");
  }
  else
  {
    $('#addCheese').prop('disabled', false);
    $("#error").css("display", "none");
  }
}

function capitalizeFirstLetter(string) 
{
  return string.charAt(0).toUpperCase() + string.slice(1);
}

function hideMessages()
{
  //To not crowd the screen with text
  $("p#deletionMessage").css("display", "none");
  $("p#confirmation").css("display", "none");
  
  //Fixes a case where after an error the buttons are disabled even if the correct information is entered.
  $('#deleteCheese').prop('disabled', false);
  $('#addCheese').prop('disabled', false);

}

