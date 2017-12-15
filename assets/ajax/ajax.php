<?php
if(isset($_GET['function']))
{
	if($_GET['function'] !== '')
	{
		switch($_GET['function'])
		{
			case 'userlogin': UserLogin(); break;
			case 'register': UserRegister(); break;
			case 'shoutbox': sendShoutBox(); break;
		}
	}
	else
	{
		header('Location: /?page=login');
	}
}
else
{
	header('Location: /?page=login');
}

?>