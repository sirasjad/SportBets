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

	<title>Settings - <?php echo $siteName; ?></title>
</head>

<body>
	<?php getHeader(); ?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Account settings</h4>
				</div>
			</div>

			<div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12 col-xl-6">
					<div class="card-box">
						<?php if(isset($_POST['api'])) { UpdateAPI(); } ?>

						<h4 class="header-title m-t-0">Change email address</h4>
						<p class="text-muted font-13 m-b-30">You can change your account's email address here. Please verify and make sure your email address is correct.</p>

						<div class="row text-xs-center m-t-30">
							<div class="col-xs-12">
								<form action='' method='POST'>
									<label>Current email address:</label>
									<input name='apikey' id='apikey' class='form-control form-control-lg m-b-20' type='text' value='<?php echo getData($UID, 'email'); ?>' disabled>

									<label>New email address:</label>
									<input name='secret' id='secret' class="form-control form-control-lg m-b-20" type='text' placeholder='New email address'>

									<button type='submit' name='change_email' class="btn btn-primary waves-effect waves-light btn-lg">Update</button>
								</form>
							</div>
						</div>
					</div>
				</div>

        <div class="col-md-12 col-sm-6 col-xs-12 col-xl-6">
					<div class="card-box">
						<?php if(isset($_POST['api'])) { UpdateAPI(); } ?>

						<h4 class="header-title m-t-0">Change password</h4>
						<p class="text-muted font-13 m-b-30">You can change your account password here. Please verify and make sure your new password is correct.</p>

						<div class="row text-xs-center m-t-30">
							<div class="col-xs-12">
								<form action='' method='POST'>
                  <label>Current password:</label>
									<input name='apikey' id='apikey' class='form-control form-control-lg m-b-20' type='text' placeholder='Current password'>

                  <label>New password:</label>
									<input name='apikey' id='apikey' class='form-control form-control-lg m-b-20' type='text' placeholder='New password'>

									<button type='submit' name='change_password' class="btn btn-primary waves-effect waves-light btn-lg">Update</button>
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-6 col-xs-12 col-xl-6">
					<div class="card-box">
						<?php if(isset($_POST['api'])) { UpdateAPI(); } ?>

						<h4 class="header-title m-t-0">Change username</h4>
						<p class="text-muted font-13 m-b-30">You can change your username here. Please verify and make sure your new username is correct.</p>

						<div class="row text-xs-center m-t-30">
							<div class="col-xs-12">
								<form action='' method='POST'>
									<label>Current username:</label>
									<input name='apikey' id='apikey' class='form-control form-control-lg m-b-20' type='text' value='<?php echo getData($UID, 'username'); ?>' disabled>

									<label>New username:</label>
									<input name='secret' id='secret' class="form-control form-control-lg m-b-20" type='text' placeholder='New username'>

									<button type='submit' name='change_username' class="btn btn-primary waves-effect waves-light btn-lg">Update</button>
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-6 col-xs-12 col-xl-6">
					<div class="card-box">
						<h4 class='header-title m-t-0'>Two-factor Authentication</h4>
						<?php
							if(isset($_POST['enable_2fa'])){
								Generate2FA();
							}
							if(isset($_POST['verifyCode'])){
								Verify2FA();
							}
							Check2FA();
						?>
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
