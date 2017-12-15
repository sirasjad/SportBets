<?php checkLoggedIn(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- CORE CSS -->
	<link rel="stylesheet" href="assets/plugins/morris/morris.css">
	<link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet" type="text/css">

	<title>Edit profile - <?php echo $siteName; ?></title>
</head>

<body>
	<?php getHeader(); ?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Edit user profile</h4>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 col-sm-8 col-xs-12 col-xl-8">
					<div class="card-box">
						<?php if(isset($_GET['uid'])) { $getId = $_GET['uid']; } ?>
						<?php if(isset($_POST['edit-user'])) { EditUser($getId); } ?>

						<h4 class="header-title m-t-0"><?php echo getData($getId, 'username'); ?>'s Profile:</h4>
						<p class="text-muted font-13 m-b-30">Please keep in mind that any changes cannot be reverted upon submit, unless you keep an old database backup.</p>

						<div class="row text-xs m-t-30">
							<div class="col-xs-12">
								<form action='' method='POST'>
									<label>Username:</label>
									<input name='username' id='username' class='form-control form-control-lg m-b-20' type='text' value='<?php echo getData($getId, 'username'); ?>'>

									<label>Email address:</label>
									<input name='email' id='email' class="form-control form-control-lg m-b-20" type='email' value='<?php echo getData($getId, 'email'); ?>'>

									<label>Subscription days left:</label>
									<input name='days' id='days' class="form-control form-control-lg m-b-20" type='text' value='<?php echo getData($getId, 'expiry'); ?>'>

									<label>Members referred:</label>
									<input name='referrals' id='referrals' class="form-control form-control-lg m-b-20" type='text' value='<?php echo getData($getId, 'referrals'); ?>' disabled>

									<label>Registration date:</label>
									<input name='date' id='date' class="form-control form-control-lg m-b-20" type='text' value='<?php echo getData($getId, 'regdate'); ?>' disabled>

									<?php
									if(CheckAdmin($getId) == 1){
										echo "
										<label>Staff position:</label>
										<div class='checkbox checkbox-primary'>
											<input id='checkbox' name='checkbox' type='checkbox' value='1' checked>
											<label for='checkbox'>Administrator</label>
										</div>
										";
									}
									else{
										echo "
										<label>Staff position:</label>
										<div class='checkbox checkbox-primary'>
											<input id='checkbox' name='checkbox' type='checkbox' value='0'>
											<label for='checkbox'>Administrator</label>
										</div>
										";
									}
									?>

									<center><button type='submit' name='edit-user' class="btn btn-primary waves-effect waves-light btn-lg">Edit User</button></center>
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-4 col-xs-12 col-xl-4">
					<div class="card-box">
						<?php
							if(isset($_POST['shoutbox'])) { ClearShoutbox(); }
							if(isset($_POST['userlogs'])) { ClearUserLogs(); }
							if(isset($_POST['adminlogs'])) { ClearAdminLogs(); }
							if(isset($_POST['unban'])) { UnbanAll(); }
							if(isset($_POST['deletebackup'])) { DeleteAllBackups(); }
						?>

						<h4 class="header-title m-t-0">Quick Tasks</h4>
						<p class="text-muted font-13 m-b-30">These quick tasks will only apply to <?php echo getData($getId, 'username'); ?>'s account.</p>

						<div class="row text-xs-center m-t-30">
							<div class="col-xs-12">
								<form action='' method='POST'>
									<button type='submit' name='resetpass' class='btn btn-primary waves-effect waves-light btn-lg' data-toggle='tooltip' data-placement='top'
											title='Click here to reset the password.'>Reset Password</button>

									<button type='submit' name='reset2fa' class='btn btn-primary waves-effect waves-light btn-lg' data-toggle='tooltip' data-placement='top'
											title='Click here to reset the 2FA key.'>Reset 2FA code</button><br></br>

									<button type='submit' name='disableacc' class='btn btn-primary waves-effect waves-light btn-lg' data-toggle='tooltip' data-placement='top'
											title='Click here to suspend the user.'>Disable Account</button>

									<button type='submit' name='banacc' class='btn btn-primary waves-effect waves-light btn-lg' data-toggle='tooltip' data-placement='top'
											title='Click here to ban the user.'>Ban Account</button>
								</form>
							</div>
						</div>

						<h4 class="header-title m-t-0">2FA QR Code</h4>
						<div class="row text-xs-center m-t-30">
							<div class="col-xs-12">
								<form action='' method='POST'>
									<button type='submit' name='resetpass' class='btn btn-primary waves-effect waves-light btn-lg' data-toggle='tooltip' data-placement='top'
											title='Click here to reset the password.'>Reset Password</button>

									<button type='submit' name='reset2fa' class='btn btn-primary waves-effect waves-light btn-lg' data-toggle='tooltip' data-placement='top'
											title='Click here to reset the 2FA key.'>Reset 2FA code</button><br></br>

									<button type='submit' name='disableacc' class='btn btn-primary waves-effect waves-light btn-lg' data-toggle='tooltip' data-placement='top'
											title='Click here to suspend the user.'>Disable Account</button>

									<button type='submit' name='banacc' class='btn btn-primary waves-effect waves-light btn-lg' data-toggle='tooltip' data-placement='top'
											title='Click here to ban the user.'>Ban Account</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- FOOTER -->
			<footer class="footer text-right">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							2017 &copy; <?php echo $siteName; ?> - All rights reserved. Design and coding by <?php echo $devName; ?>.
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<!-- JAVASCRIPT -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/tether.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/waves.js"></script>
	<script src="assets/js/jquery.nicescroll.js"></script>
	<script src="assets/plugins/switchery/switchery.min.js"></script>
	<script src="assets/plugins/morris/morris.min.js"></script>
	<script src="assets/plugins/raphael/raphael-min.js"></script>
	<script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
	<script src="assets/plugins/counterup/jquery.counterup.min.js"></script>
	<script src="assets/plugins/chartist/dist/chartist.min.js"></script>
	<script src="assets/plugins/chartist/dist/chartist-plugin-tooltip.min.js"></script>
	<script src="assets/plugins/jquery-knob/jquery.knob.js"></script>
	<script src="assets/js/jquery.core.js"></script>
	<script src="assets/js/jquery.app.js"></script>
	<script src="assets/pages/jquery.chart-widgets.init.js"></script>

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

</body>
</html>
