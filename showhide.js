$('#orderbtn').click(function()
	{
	$('#orderdiv').show();
	$('#productsdiv').hide();
	$('#productsbtn').show();
	
	
	});
$('#productsbtn').click(function()
	{
	$('#orderdiv').hide();
	$('#productsdiv').show();
	$('#orderbtn').show();
	
	});