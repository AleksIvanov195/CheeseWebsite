$(document).ready(initialisePage);

function initialisePage()
{
    $('input[name="weight"]').change(enforceMinAndMax);
}
//Forcing min value of 100 and max value of 20000.
function enforceMinAndMax()
{
  var value = $(this).val();
  if (value < 100) 
  {
    $(this).val(100);
  }
  else if (value > 20000)
  {
    $(this).val(20000);
  }
}
