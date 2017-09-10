function registerUser()
{
	var email = document.getElementById('email').value;
	var username = document.getElementById('username').value;
	var password = document.getElementById('password').value;
	var rep_password = document.getElementById('rep_password').value;
	var dataString='email='+email + '&username='+username + '&password='+password + '&rep_password='+rep_password;
	
	$.ajax(
	{
		type:"post",
		url: "/?page=ajax&function=register",
		data:dataString,
		cache:false,
		success: function(html)
		{
			$('#ajax').html(html);
		}
	});
	return false;
}