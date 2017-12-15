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

	<title>General management - <?php echo $siteName; ?></title>
</head>

<body>
	<?php getHeader(); ?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">General management</h4>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 col-sm-6 col-xs-12 col-xl-6">
					<div class="card-box">
						<?php if(isset($_POST['backup'])) { BackupDatabase(); } ?>

						<h4 class="header-title m-t-0">Backup Settings</h4>
						<p class="text-muted font-13 m-b-30">
							You can take a backup of the entire database here. The backup file will be stored on the server, and you need FTP access in order to download the file. Database backups take a lot of resources and might take a few minutes if the database is large, so please be patient. Please download the files onto your computer and delete the files from the server afterwards to avoid any possible security breaches. The database contains very important and personal data, and a lot can go wrong if it's in wrong hands. Be aware!
						</p>

						<div class="row text-xs-center m-t-30">
							<div class="col-xs-12">
								<form action='' method='POST'>
									<label>Date of last backup: <strong><?php GetLastBackup(); ?></strong></label><br>
									<button type='submit' name='backup' class='btn btn-success waves-effect waves-light btn-lg'>Backup Database</button>
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-6 col-xs-12 col-xl-6">
					<div class="card-box">
						<?php
							if(isset($_POST['shoutbox'])) { ClearShoutbox(); }
							if(isset($_POST['userlogs'])) { ClearUserLogs(); }
							if(isset($_POST['adminlogs'])) { ClearAdminLogs(); }
							if(isset($_POST['unban'])) { UnbanAll(); }
							if(isset($_POST['deletebackup'])) { DeleteAllBackups(); }
						?>

						<h4 class="header-title m-t-0">Global Settings</h4>
						<p class="text-muted font-13 m-b-30">
							Each and every button performs differently, so please make sure you click on the correct button. These actions cannot be reversed unless you have a database backup from a previous point. Only click once and wait for the task to complete, due to massive server loads and heavy resources.
						</p>

						<div class="row text-xs-center m-t-30">
							<div class="col-xs-12">
								<form action='' method='POST'>
									<button type='submit' name='shoutbox' class='btn btn-warning waves-effect waves-light btn-lg' data-toggle='tooltip' data-placement='top' title='Click here to permanently prune all messages in the shoutbox.'>Clear Shoutbox</button>

									<button type='submit' name='userlogs' class='btn btn-warning waves-effect waves-light btn-lg' data-toggle='tooltip' data-placement='top' title='Click here to permanently delete all user logs from the database.'>Clear User Logs</button>

									<button type='submit' name='adminlogs' class='btn btn-warning waves-effect waves-light btn-lg' data-toggle='tooltip' data-placement='top' title='Click here to permanently delete all admin logs from the database.'>Clear Admin Logs</button><br></br>

									<button type='submit' name='unban' class='btn btn-danger waves-effect waves-light btn-lg' data-toggle='tooltip' data-placement='top' title='Click here to unban all banned members from <?php echo $siteName; ?>.'>Clear All Bans</button>

									<button type='submit' name='deletebackup' class='btn btn-danger waves-effect waves-light btn-lg' data-toggle='tooltip' data-placement='top' title='This will delete all database backups from the storage folder.'>Delete All Backups</button>
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-6 col-xs-12 col-xl-6">
					<div class="card-box">
						<?php if(isset($_POST['api'])) { UpdateAPI(); } ?>

						<h4 class="header-title m-t-0">Live Score API Settings</h4>
						<p class="text-muted font-13 m-b-30">API keys are stored in the database. Make sure you enter the key without any spaces.</p>

						<div class="row text-xs-center m-t-30">
							<div class="col-xs-12">
								<form action='' method='POST'>
									<label>API key (livescore-api.com):</label>
									<input name='apikey' id='apikey' class='form-control form-control-lg m-b-20' type='text' value='<?php GetSettings(1); ?>'>

									<label>Secret Key (livescore-api.com):</label>
									<input name='secret' id='secret' class="form-control form-control-lg m-b-20" type='text' value='<?php GetSettings(2); ?>'>

									<button type='submit' name='api' class="btn btn-primary waves-effect waves-light btn-lg">Update API</button>
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-6 col-xs-12 col-xl-6">
					<div class="card-box">
						<?php if(isset($_POST['payment'])) { UpdatePayment(); } ?>

						<h4 class="header-title m-t-0">Payment Settings</h4>
						<p class="text-muted font-13 m-b-30">
							All subscription payments will go to the email address below. Please make sure it is correct.
						</p>

						<div class="row text-xs-center m-t-30">
							<div class="col-xs-12">
								<form action='' method='POST'>
									<label>PayPal email address:</label>
									<input name='paypal' id='paypal' class='form-control form-control-lg m-b-20' type='text' value='<?php GetSettings(3); ?>'>

									<label>Bitcoins wallet address:</label>
									<input name='bitcoins' id='bitcoins' class='form-control form-control-lg m-b-20' type='text' value='<?php GetSettings(4); ?>'>

									<button type='submit' name='payment' class='btn btn-primary waves-effect waves-light btn-lg'>Update Payments</button>
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
