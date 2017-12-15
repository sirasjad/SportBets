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

	<title>Manage subscriptions - <?php echo $siteName; ?></title>
</head>

<body>
	<?php getHeader(); ?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Manage subscriptions</h4>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 col-sm-6 col-xs-12 col-xl-4">
					<div class="card-box">
						<?php if(isset($_POST['package1'])) { UpdatePlan(1); } ?>

						<h4 class="header-title m-t-0">Package 1</h4>
						<p class="text-muted font-13 m-b-30">Please make sure the information is correct before you submit.</p>

						<div class="row text-xs-center m-t-30">
							<div class="col-xs-12">
								<form action='' method='POST'>
									<label>Price (USD):</label>
									<input name='price1' id='price1' class="form-control form-control-lg m-b-20" type='text' value='<?php GetPlanPrice(1); ?>'>

									<label>Subscription days:</label>
									<input name='days1' id='days1' class="form-control form-control-lg m-b-20" type='text' value='<?php GetPlanDays(1); ?>'>

									<button type='submit' name='package1' class="btn btn-primary waves-effect waves-light btn-lg">Update Package</button>
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-6 col-xs-12 col-xl-4">
					<div class="card-box">
						<?php if(isset($_POST['package2'])) { UpdatePlan(2); } ?>

						<h4 class="header-title m-t-0">Package 2</h4>
						<p class="text-muted font-13 m-b-30">Please make sure the information is correct before you submit.</p>

						<div class="row text-xs-center m-t-30">
							<div class="col-xs-12">
								<form action='' method='POST'>
									<label>Price (USD):</label>
									<input name='price2' id='price2' class="form-control form-control-lg m-b-20" type='text' value='<?php GetPlanPrice(2); ?>'>

									<label>Subscription days:</label>
									<input name='days2' id='days2' class="form-control form-control-lg m-b-20" type='text' value='<?php GetPlanDays(2); ?>'>

									<button type='submit' name='package2' class="btn btn-purple waves-effect waves-light btn-lg">Update Package</button>
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-6 col-xs-12 col-xl-4">
					<div class="card-box">
						<?php if(isset($_POST['package3'])) { UpdatePlan(3); } ?>

						<h4 class="header-title m-t-0">Package 3</h4>
						<p class="text-muted font-13 m-b-30">Please make sure the information is correct before you submit.</p>

						<div class="row text-xs-center m-t-30">
							<div class="col-xs-12">
								<form action='' method='POST'>
									<label>Price (USD):</label>
									<input name='price3' id='price3' class="form-control form-control-lg m-b-20" type='text' value='<?php GetPlanPrice(3); ?>'>

									<label>Subscription days:</label>
									<input name='days3' id='days3' class="form-control form-control-lg m-b-20" type='text' value='<?php GetPlanDays(3); ?>'>

									<button type='submit' name='package3' class="btn btn-warning waves-effect waves-light btn-lg">Update Package</button>
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
