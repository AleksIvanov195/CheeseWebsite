$(document).ready(initialisePage);

function initialisePage()
{
    $("input[name='weight']").keyup(enforceMinAndMax);
}
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
