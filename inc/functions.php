<?php

// General Functions:
function getHeader(){
	global $siteName;
	echo "
	<header id='topnav'>
		<div class='topbar-main'>
			<div class='container'>
				<div class='topbar-left'>
					<a href='/?page=dashboard' class='logo'>
						<i class='fa fa-soccer-ball-o'></i>
						<span>$siteName</span>
					</a>
				</div>

				<div class='menu-extras'>
					<ul class='nav navbar-nav pull-right'>
						<li class='nav-item'>
							<a class='navbar-toggle'>
								<div class='lines'>
									<span></span>
									<span></span>
									<span></span>
								</div>
							</a>
						</li>

						<li class='nav-item dropdown notification-list'>
							<a class='nav-link dropdown-toggle arrow-none waves-effect waves-light nav-user' data-toggle='dropdown' href='#' role='button'
							   aria-haspopup='false' aria-expanded='false'>
								<img src='assets/images/users/avatar-1.png' alt='user' class='img-circle'>
							</a>

							<div class='dropdown-menu dropdown-menu-right dropdown-arrow profile-dropdown ' aria-labelledby='Preview'>
								<div class='dropdown-item noti-title'>
									<h5 class='text-overflow'><small>My Account</small> </h5>
								</div>

								<a href='/?page=settings' class='dropdown-item notify-item'>
									<i class='zmdi zmdi-settings'></i> <span>Settings</span>
								</a>

								<a href='/?page=logout' class='dropdown-item notify-item'>
									<i class='zmdi zmdi-power'></i> <span>Logout</span>
								</a>
							</div>
						</li>
					</ul>
				</div>
				<div class='clearfix'></div>
			</div>
		</div>

		<div class='navbar-custom'>
			<div class='container'>
				<div id='navigation'>
					<ul class='navigation-menu'>
						<li><a href='/?page=dashboard'><i class='zmdi zmdi-view-dashboard'></i><span> Dashboard</span></a></li>
						<li><a href='/?page=news'><i class='fa fa-newspaper-o'></i><span> News Feed</span></a></li>
						<li><a href='/?page=football'><i class='fa fa-soccer-ball-o'></i><span> Predictions</span></a></li>
						<li><a href='/?page=score'><i class='zmdi zmdi-star-outline'></i><span> Live score</span></a></li>
						<li><a href='/?page=subscriptions'><i class='zmdi zmdi-money-box'></i><span> Subscriptions</span></a></li>
						<li><a href='/?page=support'><i class='zmdi zmdi-help-outline'></i><span> Support</span></a></li>
						".AdminPanelAccess()."
					</ul>
				</div>
			</div>
		</div>
	</header>
	";
}

function AdminPanelAccess(){
	global $UID;
	if(CheckAdmin($UID) == 1){
		return "
		<li class='has-submenu'>
			<a href='#'><i class='fa fa-user-secret'></i><span> Administration panel</span></a>
			<ul class='submenu'>
				<li><a href='/?page=general-management'>General management</a></li>
				<li><a href='/?page=user-management'>User management</a></li>
				<li><a href='/?page=manage-predictions'>Manage predictions</a></li>
				<li><a href='/?page=manage-subscriptions'>Manage subscriptions</a></li>
				<li><a href='/?page=manage-news'>Manage news</a></li>
				<li><a href='/?page=log-center'>Log center</a></li>
				<li><a href='/?page=support-center'>Support center</a></li>
			</ul>
		</li>
		";
	}
}

function IssetPage(){
	if(!isset($_GET['page'])){
		header("Location: /?page=login");
	}
}

function isLoggedin(){
	if(isset($_SESSION['UID'])){
		header("Location: /?page=dashboard");
	}
}

function checkLoggedIn(){
	if(!isset($_SESSION['UID'])){
		header("Location: /?page=login");
	}
}

function CheckAdmin($user){
	global $pdo;
	if(Logged() == 1){
		if(GetData($user, 'admin') == 1){
			return 1;
		}
		else{
			return 0;
		}
	}
}

function Logged(){
	if(isset($_SESSION['UID'])){
		return 1;
	}
	else{
		return 0;
	}
}

function GetIP(){
	$ip = $_SERVER['REMOTE_ADDR'];
	return $ip;
}

function GetHost(){
	return gethostbyaddr(GetIP());
}

function Browsers(){
	$u_agent = $_SERVER['HTTP_USER_AGENT'];
	$bname = 'Unknown';
	$platform = 'Unknown';
	$version= "";

	if(preg_match('/linux/i', $u_agent)){
		$platform = 'Linux';
	}
	elseif(preg_match('/macintosh|mac os x/i', $u_agent)){
		$platform = 'Mac';
	}
	elseif(preg_match('/windows|win32/i', $u_agent)){
		$platform = 'Windows';
	}
	if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)){
		$bname = 'Internet Explorer';
		$ub = "MSIE";
	}
	elseif(preg_match('/Firefox/i',$u_agent)){
		$bname = 'Mozilla Firefox';
		$ub = "Firefox";
	}
	elseif(preg_match('/Chrome/i',$u_agent)){
		$bname = 'Google Chrome';
		$ub = "Chrome";
	}
	elseif(preg_match('/Safari/i',$u_agent)){
		$bname = 'Apple Safari';
		$ub = "Safari";
	}
	elseif(preg_match('/Opera/i',$u_agent)){
		$bname = 'Opera';
		$ub = "Opera";
	}
	elseif(preg_match('/Netscape/i',$u_agent)){
		$bname = 'Netscape';
		$ub = "Netscape";
	}

	$known = array('Version', $ub, 'other');
	$pattern = '#(?<browser>' . join('|', $known) .
	')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
	if (!preg_match_all($pattern, $u_agent, $matches)){}
	$i = count($matches['browser']);

	if ($i != 1){
		if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
			$version= $matches['version'][0];
		}
		else{
			$version= $matches['version'][1];
		}
	}
	else{
		$version= $matches['version'][0];
	}

	if ($version == null || $version == "") {$version = "?";}
	return array(
		'userAgent' => $u_agent,
		'name'      => $bname,
		'version'   => $version,
		'platform'  => $platform,
		'pattern'   => $pattern
	);
}

function GetBrowser(){
	$ua = Browsers();
	return $browser_name = "" . $ua['name'] . " (" .$ua['platform'] . ")";
}

function GetTimezone(){
	return date_default_timezone_set('Europe/Amsterdam');
	return setlocale (LC_ALL, "no_NO.utf8");
}

function GDate($type){
	switch($type){
		case 1:{
			$date = date('m/d/Y');
			return $date;
		}
		break;

		case 2:{
			$date = date('m/d/Y (H:i)');
			return $date;
		}
		break;

		case 3:{
			$date = date('j F Y');
			return $date;
		}
		break;
	}
}

function GetMessage($subject, $message, $type){
	switch($type){
		case 1:{ //  Error
			echo "
			<div class='alert alert-danger' id='message'>
				<strong>$subject</strong> $message
			</div>
			";
		}
		break;

		case 2:{ // Warning
			echo "
			<div class='alert alert-warning' id='message'>
				<strong>$subject</strong> $message
			</div>
			";
		}
		break;

		case 3:{ // Success
			echo "
			<div class='alert alert-success' id='message'>
				<strong>$subject</strong> $message
			</div>
			";
		}
		break;

		case 4:{ // Error (without fadeout)
			echo "
			<div class='alert alert-danger'>
				<strong>$subject</strong> $message
			</div>
			";
		}
		break;

		case 5:{ // Warning (without fadeout)
			echo "
			<div class='alert alert-warning'>
				<strong>$subject</strong> $message
			</div>
			";
		}
		break;

		case 6:{ // Success (without fadeout)
			echo "
			<div class='alert alert-success'>
				<strong>$subject</strong> $message
			</div>
			";
		}
		break;
	}
}

// 2FA Functions:
function check2FA(){
	global $UID, $pdo, $siteName, $devContact;
	$query = $pdo->prepare("SELECT * FROM accounts WHERE id = :UID");
	$query->execute(array(':UID' => $UID));

	while($row = $query->fetch(PDO::FETCH_ASSOC)){
		$authKey = $row['auth_key'];

		if($authKey == "0"){
			echo "
			<p class='text-muted font-13 m-b-30'>2FA is an optional but highly recommended security feature. 2FA is an extra layer of security that requires not only a password and username but also something that only, and only, that user has on them, i.e. a piece of information only they should know or have immediately to hand - such as a physical token. Using a username and password together with a piece of information that only the user knows makes it harder for potential intruders to gain access and steal that person's personal data or identity.<br></br>

			SMS is one of the more common ways to get these codes, but SMS is inherently insecure. It’s too easy to intercept SMS messages, which means someone with the know-how could get not just your password, but your two-factor codes as well—leaving your accounts vulnerable. That’s why we recommend using an authentication app. Instead of sending you a code when you try to log in, these apps are constantly generating new codes that are only valid for about 30 seconds each. When you’re logging into an account and prompted for a code, you can just open your authentcation app, grab the most recent code, and paste it in. We recommend using <strong>Authy</strong> or <strong>Google Authenticator</strong> to manage your 2FA tokens.</p>

			<div class='row text-xs-center m-t-30'>
				<div class='col-xs-12'>
					<form action='' method='POST'>
						<button type='submit' name='enable_2fa' class='btn btn-primary waves-effect waves-light btn-lg'>Enable 2FA</button>
					</form>
				</div>
			</div>
			";
		}
		elseif($authKey !== "0" && $authKey !== "NV"){
			echo "
			<p class='text-muted font-13 m-b-30'>You have currently enabled two-factor authentication. You can either verify or disable your 2FA code below.</p>

			<div class='row text-xs-center m-t-30'>
				<div class='col-xs-12'>
					<form action='' method='POST'>
						<input name='secret' id='code' class='form-control form-control-lg m-b-20' type='text' placeholder='Enter your 2FA code'>
						<button type='submit' name='enable_2fa' class='btn btn-success waves-effect waves-light btn-lg'>Verify code</button>
						<button type='submit' name='enable_2fa' class='btn btn-danger waves-effect waves-light btn-lg'>Disable 2FA</button>
					</form>
				</div>
			</div>
			";
		}
		elseif($authKey == "NV"){
			if(isset($_GET['secret']) && $_GET['secret'] !== ''){
				$secret = $_GET['secret'];
				require_once($_SERVER['DOCUMENT_ROOT'].'/inc/2fa/2fa.php');
				$ga = new PHPGangsta_GoogleAuthenticator();
				$qrCodeUrl = $ga->getQRCodeGoogleUrl($siteName, $secret);
				echo "Please scan the QR-code below using your 2FA phone app and verify your code to complete the setup.";
				echo "<center><br><img src='$qrCodeUrl'></center>";
				echo "
				<div class='row text-xs-center m-t-30'>
					<div class='col-xs-12'>
						<form action='' method='POST'>
							<input name='code' id='code' class='form-control form-control-lg m-b-20' type='text' placeholder='Enter your 2FA code' autofocus>
							<button type='submit' name='verifyCode' class='btn btn-success waves-effect waves-light btn-lg'>Verify code</button>
						</form>
					</div>
				</div>
				";
			}
			else{
				echo "Your 2FA configuration is not complete. Please contact our support team and ask for a 2FA reset.";
			}
		}
	}
}

function Generate2FA(){
	global $siteName, $UID, $pdo;
	$query = $pdo->prepare("SELECT * FROM accounts WHERE id = :UID");
	$query->execute(array(':UID' => $UID));

	while($row = $query->fetch(PDO::FETCH_ASSOC)){
		$authKey = $row['auth_key'];

		if($authKey == "0"){
			require_once($_SERVER['DOCUMENT_ROOT'].'/inc/2fa/2fa.php');
			$ga = new PHPGangsta_GoogleAuthenticator();
			$secret = $ga->createSecret();
			$query2 = $pdo->prepare("UPDATE accounts SET auth_key = :NV WHERE id = :UID");
			$query2->execute(array(':NV' => 'NV', ':UID' => $UID)); // NV = Not Verified
			echo '<script>window.location=\'?page=settings&secret='.$secret.'\'</script>';
		}
	}
}

function Verify2FA(){
	global $pdo, $UID;
	if(isset($_GET['secret']) && $_GET['secret'] !== ''){
		$secret = $_GET['secret'];

		if($_POST['code'] !== ''){
			$code = $_POST['code'];
			require_once($_SERVER['DOCUMENT_ROOT'].'/inc/2fa/2fa.php');
			$ga = new PHPGangsta_GoogleAuthenticator();
			$checkResult = $ga->verifyCode($secret, $code, 2);

			if($checkResult){
				$query = $pdo->prepare("UPDATE accounts SET auth_key = :secret WHERE id = :UID");
				$query->execute(array(':secret' => $secret, ':UID' => $UID));

				GetMessage("Hurray!", "You have successfully activated 2FA.", 3);
				Logs(1, "Activated 2FA login");
			}
			else{
				GetMessage("Oh snap!", "The code you entered is not correct. Please try again!", 1);
			}
		}
		else{
			GetMessage("Oh snap!", "Make sure you fill out all the fields below!", 1);
		}
	}
}

// Email Functions:
function sendMail($mail_subject, $mail_recipient, $mail_message){
	global $from_email;
	global $siteName;
	require($_SERVER['DOCUMENT_ROOT'].'/inc/phpmailer/class.phpmailer.php');
	include($_SERVER['DOCUMENT_ROOT'].'/inc/mailer.php');

	$sender = $from_email;
	$replyto = $from_email;
	$subject = $mail_subject;
	$recipient = $mail_recipient;

	$message = $mail_message;

	$mail->SetFrom($sender, $siteName);
	$mail->AddReplyTo($replyto, $siteName);
	$mail->Subject = $subject;
	$mail->MsgHTML($message);
	$mail->AddAddress($recipient, $siteName);

	$result = $mail->Send();
	return $result;
	unset($mail);
}

// Database Functions:
function GetData($input, $state){
	global $pdo;
	if(Logged() == 1){
		$query = $pdo->prepare("SELECT * FROM accounts WHERE id = :input");
		$query->execute(array(':input' => $input));

		if($query->rowCount() > 0){
			while($row = $query->fetch(PDO::FETCH_ASSOC)){
				return $row[$state];
			}
		}
		else{
			return 0;
		}
	}
}

function GetUserId($input){
	global $pdo;
	if(Logged() == 1){
		$query = $pdo->prepare("SELECT * FROM accounts WHERE username = :input");
		$query->execute(array(':input' => $input));

		if($query->rowCount() > 0){
			while($row = $query->fetch(PDO::FETCH_ASSOC)){
				return $row['id'];
			}
		}
		else{
			return 0;
		}
	}
}

function Logs($type, $input){
	// Type 1: User logs
	// Type 2: Admin logs
	global $pdo;
	global $UID;
	$query = $pdo->prepare("INSERT INTO logs (uid, type, date, IP, browser, hostname, log)
	VALUES (:uid, :type, :date, :IP, :browser, :hostname, :log)");
	$query->execute(array(
	':uid' => $_SESSION['UID'],
	':type' => $type,
	':date' => GDate(2),
	':IP' => GetIP(),
	':browser' => GetBrowser(),
	':hostname' => GetHost(),
	':log' => $input
	));
}

function EmailExists($input){
	global $pdo;
	$query = $pdo->prepare("SELECT * FROM accounts WHERE email = :input");
	$query->execute(array(':input' => $input));

	if($query->rowCount() > 0){
		return 1;
	}
	else{
		return 0;
	}
}

function UserLogin(){
	global $pdo;
	if($_POST['email'] !== '' AND $_POST['password'] !== ''){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password = hash('whirlpool', $password);
		$password = strtoupper($password);

		$query = $pdo->prepare("SELECT * FROM accounts WHERE email = :email");
		$query->execute(array(':email' => $email));

		if($query->rowCount() > 0){
			while($row = $query->fetch(PDO::FETCH_ASSOC))
			{
				$user_ID = $row['id'];
				$query2 = $pdo->prepare("SELECT * FROM accounts WHERE email = :email AND password = :password");
				$query2->execute(array(':email' => $email, ':password' => $password));

				if($query2->rowCount() > 0){
					$_SESSION['UID'] = $user_ID;
					Logs(1, "Successfully logged in");
					echo '<script>window.location=\'?page=dashboard\'</script>';
				}
				else{
					GetMessage("Oops!", "Looks like your login credentials are incorrect.", 1);
				}
			}
		}
		else{
			GetMessage("Oops!", "Your account does not exist in our database!", 1);
		}
	}
	else{
		GetMessage("Oh snap!", "Make sure you fill out all the fields below!", 1);
	}
}

function UserRegister(){
	global $pdo;
	global $siteName;
	if($_POST['email'] !== '' AND $_POST['password'] !== '' AND $_POST['username'] !== '' AND $_POST['rep_password'] !== ''){
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password = hash('whirlpool', $password);
		$password = strtoupper($password);
		$rep_password = $_POST['rep_password'];
		$rep_password = hash('whirlpool', $rep_password);
		$rep_password = strtoupper($rep_password);

		if(EmailExists($email) == 0){
			if($password == $rep_password){
				$query = $pdo->prepare("INSERT INTO accounts (email, password, username, regdate) VALUES (:email, :password, :username, :regdate)");
				$query->execute(array(
				':email' => $email,
				':password' => $password,
				':username' => $username,
				':regdate' => GDate(3)
				));

				$query2 = $pdo->prepare("SELECT * FROM accounts WHERE email = :email");
				$query2->execute(array(':email' => $email));

				while($row = $query2->fetch(PDO::FETCH_ASSOC)){
					$_SESSION['UID'] = $row['id'];
					Logs(1, "Registered an account");
				}

				GetMessage("Hell yeah!", "You have successfully registered your account. Please wait a few seconds...", 3);
				echo '<script>setTimeout("window.location=\'?page=dashboard\'",4500)</script>';
			}
			else{
				GetMessage("Uh, awkward!", "Your passwords does not match!", 1);
			}
		}
		else{
			GetMessage("Damn!", "The email you entered is already registered. Please select another one.", 1);
		}
	}
	else{
		GetMessage("Oh snap!", "Make sure you fill out all the fields below!", 1);
	}
}

function readShoutBox(){
	global $pdo;
	global $siteName;
	$query = $pdo->prepare("SELECT * FROM shoutbox");
	$query->execute();

	if($query->rowCount() > 0){
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			$user_ID = $row['uid'];
			$message = $row['message'];
			$date = $row['date'];

			if(CheckAdmin($user_ID) == 1){
				echo "
				<div class='inbox-item'>
					<div class='inbox-item-img'><img src='assets/images/users/avatar-1.png' class='img-circle' alt=''></div>
					<p class='inbox-item-author'><font color='red'>".GetData($user_ID, 'username')."</font></p>
					<p class='inbox-item-text'>$message</p>
					<p class='inbox-item-date'>$date</p>
				</div>
				";
			}
			else{
				echo "
				<div class='inbox-item'>
					<div class='inbox-item-img'><img src='assets/images/users/avatar-1.png' class='img-circle' alt=''></div>
					<p class='inbox-item-author'>".GetData($user_ID, 'username')."</p>
					<p class='inbox-item-text'>$message</p>
					<p class='inbox-item-date'>$date</p>
				</div>
				";
			}
		}
	}
	else{
		echo "
		<div class='inbox-item'>
			<div class='inbox-item-img'><img src='assets/images/users/avatar-1.png' class='img-circle' alt=''></div>
			<p class='inbox-item-author'><font color='red'>System administrator</font></p>
			<p class='inbox-item-text'>The shoutbox has been pruned.</p>
		</div>
		";
	}
}

function sendShoutBox(){
	echo "This function has been disabled until further notice.";
	// global $pdo;
	// global $UID;
	// $message = $_POST['message'];

	// if($message !== '')
	// {
		// $query = $pdo->prepare("INSERT INTO shoutbox (uid, message, date) VALUES (:uid, :message, :date)");
		// $query->execute(array(':uid' => $UID, ':message' => $message, ':date' => GDate(2)));
	// }
}

function GetLiveScore(){
	global $pdo;
	$query = $pdo->prepare("SELECT * FROM settings");
	$query->execute();

	while($row = $query->fetch(PDO::FETCH_ASSOC)){
		$api_secret = $row['api_secret'];
		$api_key = $row['api_key'];

		$api = "http://livescore-api.com/api-client/scores/live.json?key=$api_key&secret=$api_secret";

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $api);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_TIMEOUT,120);
		$results = curl_exec($curl);
		$array = json_decode($results, true);

		if($array['success'] == 1){
			foreach($array['data']['match'] as $key => $value){
				echo "
				<tr>
					<td>".$value['league_name']."</td>
					<td>".$value['home_name']."</td>
					<td>".$value['away_name']."</td>
					<td><strong>".$value['score']."</strong></td>
					<td>".MatchTime($value['time'])."</td>
				</tr>
				";
			}
		}
		else{
			echo "<strong>API Error:</strong> Failed to load the live scores data. Please inform the website developer!<br></br>";
		}
	}
}

function MatchTime($time){
	if($time == 'HT'){
		return "<span class='label label-primary'>Half Time</span>";
	}
	elseif($time == 'FT'){
		return "<span class='label label-success'>Full Time</span>";
	}
	elseif(is_numeric($time) || strpos($time, '+')){
		if($time == 1){
			return "<span class='label label-default'>$time minute</span>";
		}
		else{
			return "<span class='label label-default'>$time minutes</span>";
		}
	}
	else{
		return "<span class='label label-warning'>Starts at $time</span>";
	}
}

function GetPredictionStatus($status){
	if($status == 1){
		return "<span class='label label-success'>Correct</span>";
	}
	elseif($status == 2){
		return "<span class='label label-danger'>Incorrect</span>";
	}
	elseif($status == 0){
		return "<span class='label label-warning'>Pending</span>";
	}
}

function GetSettings($type){
	global $pdo;
	switch($type){
		case 1:{ // API key
			$query = $pdo->prepare("SELECT * FROM settings");
			$query->execute();

			while($row = $query->fetch(PDO::FETCH_ASSOC)){
				echo $row['api_key'];
			}
		}
		break;

		case 2:{ // Secret key
			$query = $pdo->prepare("SELECT * FROM settings");
			$query->execute();

			while($row = $query->fetch(PDO::FETCH_ASSOC)){
				echo $row['api_secret'];
			}
		}
		break;

		case 3:{ // PayPal address
			$query = $pdo->prepare("SELECT * FROM settings");
			$query->execute();

			while($row = $query->fetch(PDO::FETCH_ASSOC)){
				echo $row['paypal'];
			}
		}
		break;

		case 4:{ // Bitcoins address
			$query = $pdo->prepare("SELECT * FROM settings");
			$query->execute();

			while($row = $query->fetch(PDO::FETCH_ASSOC)){
				echo $row['bitcoins'];
			}
		}
		break;
	}
}

function GetStats($type){
	global $pdo;
	switch($type){
		case 1:{
			$query = $pdo->prepare("SELECT * FROM predictions");
			$query->execute();
			echo $query->rowCount();
		}
		break;

		case 2:{
			//
		}
		break;
	}
}

function GetUserLogs($type){
	global $pdo;
	$query = $pdo->prepare("SELECT * FROM logs WHERE type = :type");
	$query->execute(array(':type' => $type));

	if($query->rowCount() > 0){
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			$user_ID = $row['uid'];
			$date = $row['date'];
			$ip = $row['ip'];
			$browser = $row['browser'];
			$hostname = $row['hostname'];
			$log = $row['log'];

			echo "
			<tr>
				<td>$date</td>
				<td title='User ID: $user_ID'>".GetData($user_ID, 'username')."</td>
				<td title='Hostname: $hostname'>$ip</td>
				<td>$browser</td>
				<td>$log</td>
			</tr>
			";
		}
	}
}

function GetPayLogs(){
	global $pdo;
	$query = $pdo->prepare("SELECT * FROM paylogs");
	$query->execute();

	if($query->rowCount() > 0){
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			$user_ID = $row['uid'];
			$date = $row['date'];
			$ip = $row['ip'];
			$browser = $row['browser'];
			$hostname = $row['hostname'];
			$sender = $row['sender'];
			$recipient = $row['recipient'];
			$amount = $row['amount'];

			echo "
			<tr>
				<td>$date</td>
				<td title='User ID: $user_ID'>".GetData($user_ID, 'username')."</td>
				<td title='Hostname: $hostname'>$ip</td>
				<td>$browser</td>
				<td>$$amount USD</td>
				<td>$sender</td>
				<td>$recipient</td>
			</tr>
			";
		}
	}
}

function GetLastBackup(){
	global $pdo;
	$query = $pdo->prepare("SELECT * FROM settings");
	$query->execute();

	while($row = $query->fetch(PDO::FETCH_ASSOC)){
		echo $row['last_backup'];
	}
}

function BackupDatabase(){
	global $pdo;
	global $database_name;
	global $password;
	global $user;
	$filename = ''.date('j-F-Y__H:i').'.sql';
	$result = exec("mysqldump $database_name --password=$password --user=$user --single-transaction >db_backups/".$filename);

	$query = $pdo->prepare("UPDATE settings SET last_backup = :last_backup");
	$query->execute(array(':last_backup' => GDate(1)));

	Logs(2, "Took a backup of the database");
	GetMessage("Hurray!", "The database backup was successful.", 3);
}

function GetPredictions($type){
	global $pdo;
	if(isset($_GET['correct'])){
		$correct = $_GET['correct'];
		$query = $pdo->prepare("UPDATE predictions SET status = :status WHERE id = :correct");
		$query->execute(array(':status' => 1, ':correct' => $correct));

		Logs(2, "Changed a prediction status");
		header("Location: /?page=manage-predictions");
	}

	if(isset($_GET['incorrect'])){
		$incorrect = $_GET['incorrect'];
		$query = $pdo->prepare("UPDATE predictions SET status = :status WHERE id = :incorrect");
		$query->execute(array(':status' => 2, ':incorrect' => $incorrect));

		Logs(2, "Changed a prediction status");
		header("Location: /?page=manage-predictions");
	}

	if(isset($_GET['delete'])){
		$delete = $_GET['delete'];
		$query = $pdo->prepare("DELETE FROM predictions WHERE id = :id");
		$query->execute(array(':id' => $delete));

		Logs(2, "Deleted a football prediction");
		header("Location: /?page=manage-predictions");
	}

	$query2 = $pdo->prepare("SELECT * FROM predictions");
	$query2->execute();

	if($query2->rowCount() > 0){
		while($row = $query2->fetch(PDO::FETCH_ASSOC)){
			$id = $row['id'];
			$league = $row['league'];
			$home = $row['home'];
			$away = $row['away'];
			$score = $row['score'];
			$status = $row['status'];

			switch($type){
				case 1:{ // For admins
					echo "
					<tr>
						<td>$league</td>
						<td>$home</td>
						<td>$away</td>
						<td><strong>$score</strong></td>
						<td>".GetPredictionStatus($status)."</td>
						<td>
							<a href='/?page=manage-predictions&correct=$id' data-toggle='tooltip' data-placement='top' title='Set status to CORRECT'>
								<span class='label label-success'>X</span>
							</a>

							<a href='/?page=manage-predictions&incorrect=$id' data-toggle='tooltip' data-placement='top' title='Set status to INCORRECT'>
								<span class='label label-warning'>X</span>
							</a>

							<a href='/?page=manage-predictions&delete=$id' data-toggle='tooltip' data-placement='top' title='Delete prediction'>
								<span class='label label-danger'>X</span>
							</a>
						</td>
					</tr>
					";
				}
				break;

				case 2:{ // For non-admins
					echo "
					<tr>
						<td>$league</td>
						<td>$home</td>
						<td>$away</td>
						<td><strong>$score</strong></td>
						<td>".GetPredictionStatus($status)."</td>
					</tr>
					";
				}
				break;
			}
		}
	}
}

function UpdateAPI(){
	global $pdo;
	if($_POST['apikey'] !== '' AND $_POST['secret'] !== ''){
		$apikey = $_POST['apikey'];
		$secret = $_POST['secret'];

		$query = $pdo->prepare("UPDATE settings SET api_key = :api_key, api_secret = :api_secret");
		$query->execute(array(':api_key' => $apikey, ':api_secret' => $secret));

		Logs(2, "Updated the live score API");
		GetMessage("Success!", "The live score API has been updated.", 3);
	}
	else{
		GetMessage("Oh snap!", "Make sure you fill out all the fields below!", 1);
	}
}

function UpdatePayment(){
	global $pdo;
	if($_POST['paypal'] !== '' AND $_POST['bitcoins'] !== ''){
		$paypal = $_POST['paypal'];
		$bitcoins = $_POST['bitcoins'];

		$query = $pdo->prepare("UPDATE settings SET paypal = :paypal, bitcoins = :bitcoins");
		$query->execute(array(':paypal' => $paypal, ':bitcoins' => $bitcoins));

		Logs(2, "Updated payment info");
		GetMessage("Success!", "The payment info has been updated.", 3);
	}
	else{
		GetMessage("Oh snap!", "Make sure you fill out all the fields below!", 1);
	}
}

function ClearShoutbox(){
	global $pdo;
	$query = $pdo->prepare("TRUNCATE TABLE shoutbox");
	$query->execute();

	Logs(2, "Pruned the shoutbox");
	GetMessage("Hurray!", "You have successfully pruned the shoutbox.", 3);
}

function ClearUserLogs(){
	global $pdo;
	$query = $pdo->prepare("DELETE FROM logs WHERE type = :type");
	$query->execute(array(':type' => 1));

	Logs(2, "Deleted all user logs");
	GetMessage("Hurray!", "You have successfully deleted all user logs.", 3);
}

function ClearAdminLogs(){
	global $pdo;
	$query = $pdo->prepare("DELETE FROM logs WHERE type = :type");
	$query->execute(array(':type' => 2));

	Logs(2, "Deleted all admin logs");
	GetMessage("Hurray!", "You have successfully deleted all admin logs.", 3);
}

function UnbanAll(){
	global $pdo;
	$query = $pdo->prepare("UPDATE accounts SET banned = :zero WHERE banned = :one");
	$query->execute(array(':zero' => 0, ':one' => 1));

	Logs(2, "Removed all bans");
	GetMessage("Success!", "You have successfully removed all bans.", 3);
}

function BanUser(){
	global $pdo;
	global $siteName;

	if($_POST['ban_username'] !== ''){
		$username = $_POST['ban_username'];
		$query = $pdo->prepare("SELECT * FROM accounts WHERE username = :username");
		$query->execute(array(':username' => $username));

		if($query->rowCount() > 0){
			$query2 = $pdo->prepare("UPDATE accounts SET banned = :banned WHERE username = :username");
			$query2->execute(array(':banned' => 1, ':username' => $username));

			Logs(2, "Banned $username");
			GetMessage("Success!", "You have banned $username from $siteName.", 3);
		}
		else{
			GetMessage("Oops!", "Username was not found in the database.", 1);
		}
	}
	else{
		GetMessage("Oh snap!", "Make sure you fill out all the fields below!", 1);
	}
}

function UnbanUser(){
	global $pdo;
	global $siteName;

	if($_POST['ban_username'] !== ''){
		$username = $_POST['ban_username'];
		$query = $pdo->prepare("SELECT * FROM accounts WHERE username = :username");
		$query->execute(array(':username' => $username));

		if($query->rowCount() > 0){
			$query2 = $pdo->prepare("UPDATE accounts SET banned = :banned WHERE username = :username");
			$query2->execute(array(':banned' => 0, ':username' => $username));

			Logs(2, "Unbanned $username");
			GetMessage("Success!", "You have unbanned $username.", 3);
		}
		else{
			GetMessage("Oops!", "Username was not found in the database.", 1);
		}
	}
	else{
		GetMessage("Oh snap!", "Make sure you fill out all the fields below!", 1);
	}
}

function DeleteAllBackups(){
	echo "This function is in development.";
}

function NewPrediction($type){
	global $pdo;
	switch($type){
		case 1:{
			if($_POST['league'] !== '' AND $_POST['home'] !== '' AND $_POST['away'] !== '' AND $_POST['score'] !== ''){
				$league = $_POST['league'];
				$home = $_POST['home'];
				$away = $_POST['away'];
				$score = $_POST['score'];

				$query = $pdo->prepare("INSERT INTO predictions (league, home, away, score) VALUES (:league, :home, :away, :score)");
				$query->execute(array(':league' => $league, ':home' => $home, ':away' => $away, ':score' => $score));

				Logs(2, "Added a new football prediction");
				GetMessage("Success!", "You have added a new football prediction.", 3);
			}
			else{
				GetMessage("Oh snap!", "Make sure you fill out all the fields below!", 1);
			}
		}
		break;

		case 2:{
			// Basketball
		}
		break;
	}
}

function GetPlanPrice($type){
	global $pdo;
	$query = $pdo->prepare("SELECT * FROM subscriptions WHERE id = :id");
	$query->execute(array(':id' => $type));

	while($row = $query->fetch(PDO::FETCH_ASSOC)){
		echo $row['price'];
	}
}

function GetPlanDays($type){
	global $pdo;
	$query = $pdo->prepare("SELECT * FROM subscriptions WHERE id = :id");
	$query->execute(array(':id' => $type));

	while($row = $query->fetch(PDO::FETCH_ASSOC)){
		echo $row['days'];
	}
}

function UpdatePlan($type){
	global $pdo;
	switch($type){
		case 1:{
			if($_POST['price1'] !== '' AND $_POST['days1'] !== ''){
				$price1 = $_POST['price1'];
				$days1 = $_POST['days1'];

				$query = $pdo->prepare("UPDATE subscriptions SET price = :price, days = :days WHERE id = :id");
				$query->execute(array(':price' => $price1, ':days' => $days1, ':id' => $type));

				Logs(2, "Updated subscription plan 1");
				GetMessage("Success!", "You have updated subscription plan 1.", 3);
			}
			else{
				GetMessage("Oh snap!", "Make sure you fill out all the fields below!", 1);
			}
		}
		break;

		case 2:{
			if($_POST['price2'] !== '' AND $_POST['days2'] !== ''){
				$price2 = $_POST['price2'];
				$days2 = $_POST['days2'];

				$query = $pdo->prepare("UPDATE subscriptions SET price = :price, days = :days WHERE id = :id");
				$query->execute(array(':price' => $price2, ':days' => $days2, ':id' => $type));

				Logs(2, "Updated subscription plan 2");
				GetMessage("Success!", "You have updated subscription plan 2.", 3);
			}
			else{
				GetMessage("Oh snap!", "Make sure you fill out all the fields below!", 1);
			}
		}
		break;

		case 3:{
			if($_POST['price3'] !== '' AND $_POST['days3'] !== ''){
				$price3 = $_POST['price3'];
				$days3 = $_POST['days3'];

				$query = $pdo->prepare("UPDATE subscriptions SET price = :price, days = :days WHERE id = :id");
				$query->execute(array(':price' => $price3, ':days' => $days3, ':id' => $type));

				Logs(2, "Updated subscription plan 3");
				GetMessage("Success!", "You have updated subscription plan 3.", 3);
			}
			else{
				GetMessage("Oh snap!", "Make sure you fill out all the fields below!", 1);
			}
		}
		break;
	}
}

function CheckIfBanned(){
	if(Logged() == 1){
		global $UID;
		global $pdo;
		global $siteName;
		if(GetData($UID, 'banned') == 1){
			echo "<title>Denied Access!</title>";
			echo "Your account is banned from $siteName. Please contact an administrator if you have any questions regarding your ban.";
			die();
		}
		else{
			return 0;
		}
	}
}

function CheckBanned($user){
	global $pdo;
	if(GetData($user, 'banned') == 1){
		return "Yes";
	}
	else{
		return "No";
	}
}

function Memberlist(){
	global $pdo;
	$query = $pdo->prepare("SELECT * FROM accounts");
	$query->execute();

	while($row = $query->fetch(PDO::FETCH_ASSOC)){
		$user_ID = $row['id'];
		$username = $row['username'];
		$email = $row['email'];
		$regdate = $row['regdate'];
		$referrals = $row['referrals'];
		$expiry = $row['expiry'];

		echo "
		<tr>
			<td title='User ID: $user_ID'>$username</td>
			<td>$email</td>
			<td>$regdate</td>
			<td>$expiry days</td>
			<td>$referrals</td>
			<td>".CheckBanned($user_ID)."</td>
		</tr>
		";
	}
}

function FindUser(){
	global $pdo;
	if($_POST['edit_username'] !== ''){
		$username = $_POST['edit_username'];
		$query = $pdo->prepare("SELECT * FROM accounts WHERE username = :username");
		$query->execute(array(':username' => $username));

		if($query->rowCount() > 0){
			$userId = GetUserId($username);
			echo '<script>window.location=\'?page=edit-profile&uid='.$userId.'\'</script>';
		}
		else{
			GetMessage("Oops!", "Username was not found in the database.", 1);
		}
	}
	else{
		GetMessage("Oh snap!", "Make sure you fill out all the fields below!", 1);
	}
}

function EditUser($getId){
	global $pdo;
	if($_POST['username'] !== '' AND $_POST['email'] !== '' AND $_POST['days'] !== ''){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$days = $_POST['days'];
		$checkbox = $_POST['checkbox'];

		$query = $pdo->prepare("UPDATE accounts SET username = :username, email = :email, expiry = :days, admin = :admin WHERE id = :id");
		$query->execute(array(':username' => $username, ':email' => $email, ':days' => $days, ':admin' => $checkbox, ':id' => $getId));

		Logs(2, "Edited $username's account");
		GetMessage("Success!", "You have edited $username's account. Please wait...", 3);
		echo '<script>setTimeout("window.location=\'?page=user-management\'",4500)</script>';
	}
	else{
		GetMessage("Oh snap!", "Make sure you fill out all the fields below!", 1);
	}
}

?>
