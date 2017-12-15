function sendShoutBox()
{
	var message = document.getElementById('message').value;
	var dataString='message='+message;
	
	$.ajax(
	{
		type:"post",
		url: "/?page=ajax&function=shoutbox",
		data:dataString,
		cache:false,
		success: function(html)
		{
			$('#ajax').html(html);
		}
	});
	return false;
}