<?php isLoggedin(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- CORE CSS -->
	<link href="assets/css/style.css" rel="stylesheet" type="text/css">

	<title>Register - <?php echo $name; ?></title>
</head>

<body>
	<div class="account-pages"></div>
	<div class="clearfix"></div>
	<div class="wrapper-page">
		<div class="account-bg">
			<div class="card-box m-b-0">
				<div class="text-xs-center m-t-20">
					<a href="/?page=login" class="logo">
						<i class="fa fa-soccer-ball-o"></i>
						<span><?php echo $name; ?></span>
					</a>
				</div>
				
				<div class="m-t-30 m-b-20">
					<div class="col-xs-12 text-xs-center">
						<h6 class="text-muted text-uppercase m-b-0 m-t-0">Account Registration</h6>
					</div>
					
					<form class="form-horizontal m-t-20" name="login">
						<div id="ajax"></div>
						<div class="form-group">
							<div class="col-xs-12">
								<input type='text' class='form-control' name='username' id='username' placeholder='Username' autofocus>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-xs-12">
								<input type='email' class='form-control' name='email' id='email' placeholder='Email address' autofocus>
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-12">
								<input type='password' class='form-control' name='password' id='password' placeholder='Password'>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-xs-12">
								<input type='password' class='form-control' name='rep_password' id='rep_password' placeholder='Repeat password'>
							</div>
						</div>

						<div class="form-group text-center m-t-30">
							<div class="col-xs-12">
								<button type='submit' class='btn btn-success btn-block waves-effect waves-light' onclick='return registerUser()'>Register an account</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- JAVASCRIPT -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/tether.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/waves.js"></script>
	<script src="assets/js/jquery.nicescroll.js"></script>
	<script src="assets/plugins/switchery/switchery.min.js"></script>
	<script src="assets/js/jquery.core.js"></script>
	<script src="assets/js/jquery.app.js"></script>
	<script src="assets/js/modernizr.min.js"></script>
	
	<script>
		var resizefunc = [];
	</script>
	
	<script type="text/javascript">
	$(document).ready(function()
	{
		setInterval(function(){
			$("#message").slideUp("slow");
		}, 6000);
	});
	</script>
	
	<!-- AJAX -->
	<script src="assets/ajax/register.js" type="text/javascript"></script>
	
</body>
</html>