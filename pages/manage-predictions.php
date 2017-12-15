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

	<title>Manage predictions - <?php echo $siteName; ?></title>
</head>

<body>
	<?php getHeader(); ?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Manage predictions</h4>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-lg-12 col-xl-12">
					<div class="card-box">
						<h4 class="header-title m-t-0 m-b-30">Assign Football Predictions</h4>
						<div class="table-responsive">
							<table class="table table-bordered m-b-0">
								<thead>
									<tr>
										<th>League</th>
										<th>Home Team</th>
										<th>Away Team</th>
										<th>Predicted Score</th>
										<th style="width:7%">Status</th>
										<th style="width:8%"></th>
									</tr>
								</thead>

								<tbody>
									<?php GetPredictions(1); ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 col-sm-6 col-xs-12 col-xl-6">
					<div class="card-box">
						<?php if(isset($_POST['add'])) { NewPrediction(1); } ?>

						<h4 class="header-title m-t-0">New Football Prediction</h4>
						<p class="text-muted font-13 m-b-30">You can post a new football prediction here. Click the "Delete" button above if you want to make changes.</p>

						<div class="row text-xs-center m-t-30">
							<div class="col-xs-12">
								<form action='' method='POST'>
									<input name='league' id='league' class='form-control form-control-lg m-b-20' type='text' placeholder='League'>
									<input name='home' id='home' class="form-control form-control-lg m-b-20" type='text' placeholder='Home Team'>
									<input name='away' id='away' class="form-control form-control-lg m-b-20" type='text' placeholder='Away Team'>
									<input name='score' id='score' class="form-control form-control-lg m-b-20" type='text' placeholder='Predicted Score'>

									<button type='submit' name='add' class="btn btn-primary waves-effect waves-light btn-lg">Add New Prediction</button>
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-6 col-xs-12 col-xl-6">
					<div class="card-box">
						<h4 class="header-title m-t-0">New Basketball Prediction (In Development)</h4>
						<p class="text-muted font-13 m-b-30">You can post a new basketball prediction here. Click the "Delete" button above if you want to make changes.</p>

						<div class="row text-xs-center m-t-30">
							<div class="col-xs-12">
								<form action='' method='POST'>
									<input name='league_b' id='league_b' class='form-control form-control-lg m-b-20' type='text' placeholder='League'>
									<input name='home_b' id='home_b' class="form-control form-control-lg m-b-20" type='text' placeholder='Home Team'>
									<input name='away_b' id='away_b' class="form-control form-control-lg m-b-20" type='text' placeholder='Away Team'>
									<input name='score_b' id='score_b' class="form-control form-control-lg m-b-20" type='text' placeholder='Predicted Score'>

									<button type='submit' name='add_b' class="btn btn-primary waves-effect waves-light btn-lg">Add New Prediction</button>
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
	<script src="assets/js/modernizr.min.js"></script>
	<script src="assets/plugins/morris/morris.min.js"></script>
	<script src="assets/plugins/raphael/raphael-min.js"></script>
	<script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
	<script src="assets/plugins/counterup/jquery.counterup.min.js"></script>
	<script src="assets/js/jquery.core.js"></script>
	<script src="assets/js/jquery.app.js"></script>
	<script src="assets/pages/jquery.dashboard.js"></script>

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
