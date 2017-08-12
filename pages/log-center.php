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
	<link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
	<link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
	<link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">

	<title>Log center - <?php echo $name; ?></title>
</head>

<body>
	<header id="topnav">
		<div class="topbar-main">
			<div class="container">
				<div class="topbar-left">
					<a href="/?page=dashboard" class="logo">
						<i class="fa fa-soccer-ball-o"></i>
						<span><?php echo $name; ?></span>
					</a>
				</div>

				<div class="menu-extras">
					<ul class="nav navbar-nav pull-right">
						<li class="nav-item">
							<a class="navbar-toggle">
								<div class="lines">
									<span></span>
									<span></span>
									<span></span>
								</div>
							</a>
						</li>

						<li class="nav-item dropdown notification-list">
							<a class="nav-link dropdown-toggle arrow-none waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
							   aria-haspopup="false" aria-expanded="false">
								<img src="assets/images/users/avatar-1.png" alt="user" class="img-circle">
							</a>
							
							<div class="dropdown-menu dropdown-menu-right dropdown-arrow profile-dropdown " aria-labelledby="Preview">
								<div class="dropdown-item noti-title">
									<h5 class="text-overflow"><small>My Account</small> </h5>
								</div>

								<a href="/?page=settings" class="dropdown-item notify-item">
									<i class="zmdi zmdi-settings"></i> <span>Settings</span>
								</a>

								<a href="/?page=logout" class="dropdown-item notify-item">
									<i class="zmdi zmdi-power"></i> <span>Logout</span>
								</a>
							</div>
						</li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

		<div class="navbar-custom">
			<div class="container">
				<div id="navigation">
					<ul class="navigation-menu">
						<li>
							<a href="/?page=dashboard"><i class="zmdi zmdi-view-dashboard"></i><span> Dashboard</span></a>
						</li>

						<li class="has-submenu">
							<a href="#"><i class="fa fa-soccer-ball-o"></i><span> Predictions</span></a>
							<ul class="submenu">
								<li><a href="/?page=football">Football</a></li>
								<li><a href="/?page=basketball">Basketball</a></li>
								<li><a href="/?page=ufc">UFC</a></li>
							</ul>
						</li>
						
						<li>
							<a href="/?page=score"><i class="zmdi zmdi-star-outline"></i><span> Live score</span></a>
						</li>
						
						<li>
							<a href="/?page=subscriptions"><i class="zmdi zmdi-money-box"></i><span> Subscriptions</span></a>
						</li>
						
						<li>
							<a href="/?page=support"><i class="zmdi zmdi-help-outline"></i><span> Support</span></a>
						</li>
						
						<?php AdminPanelAccess(); ?>
					</ul>
				</div>
			</div>
		</div>
	</header>

	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="page-title">Log center</h4>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-12 col-lg-12 col-xl-12">
					<div class="card-box table-responsive">
						<div class="col-md-6 col-xs-12 m-t-20">
							<ul class="nav nav-tabs m-b-10" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="user-logs" data-toggle="tab" href="#user" role="tab" aria-controls="user" aria-expanded="true">User Logs</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link" id="admin-logs" data-toggle="tab" href="#admin" role="tab" aria-controls="admin">Admin Logs</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link" id="payment-logs" data-toggle="tab" href="#payment" role="tab" aria-controls="payment">Payment Logs</a>
								</li>
							</ul>
							
							<div class="tab-content" id="myTabContent">
								<div role="tabpanel" class="tab-pane fade in active" id="user" aria-labelledby="user-logs">
									<table id="datatable" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Date</th>
												<th>Username</th>
												<th>IP address</th>
												<th>Browser</th>
												<th>Log</th>
											</tr>
										</thead>

										<tbody>
											<?php GetUserLogs(1); ?>
										</tbody>
									</table>
								</div>
								
								<div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin-logs">
									<table id="datatable2" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Date</th>
												<th>Username</th>
												<th>IP address</th>
												<th>Browser</th>
												<th>Log</th>
											</tr>
										</thead>

										<tbody>
											<?php GetUserLogs(2); ?>
										</tbody>
									</table>
								</div>
								
								<div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-logs">
									<table id="datatable3" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Date</th>
												<th>Username</th>
												<th>IP address</th>
												<th>Browser</th>
												<th>Amount</th>
												<th>Sender</th>
												<th>Recipient</th>
											</tr>
										</thead>

										<tbody>
											<?php GetPayLogs(); ?>
										</tbody>
									</table>
								</div>
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
							2017 &copy; <?php echo $name; ?> - All rights reserved. Design and coding by <?php echo $dev; ?>.
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
	<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
	<script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
	<script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
	<script src="assets/plugins/datatables/jszip.min.js"></script>
	<script src="assets/plugins/datatables/pdfmake.min.js"></script>
	<script src="assets/plugins/datatables/vfs_fonts.js"></script>
	<script src="assets/plugins/datatables/buttons.html5.min.js"></script>
	<script src="assets/plugins/datatables/buttons.print.min.js"></script>
	<script src="assets/plugins/datatables/buttons.colVis.min.js"></script>
	<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
	<script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
	
	<script>
		var resizefunc = [];
	</script>
	
	<script type="text/javascript">
		$(document).ready(function() {
			$('#datatable').DataTable();

			var table = $('#datatable-buttons').DataTable({
				lengthChange: false,
				buttons: ['copy', 'excel', 'pdf', 'colvis']
			});

			table.buttons().container()
					.appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
		} );

	</script>
	
	<script type="text/javascript">
		$(document).ready(function() {
			$('#datatable2').DataTable();

			var table = $('#datatable-buttons').DataTable({
				lengthChange: false,
				buttons: ['copy', 'excel', 'pdf', 'colvis']
			});

			table.buttons().container()
					.appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
		} );

	</script>
	
	<script type="text/javascript">
		$(document).ready(function() {
			$('#datatable3').DataTable();

			var table = $('#datatable-buttons').DataTable({
				lengthChange: false,
				buttons: ['copy', 'excel', 'pdf', 'colvis']
			});

			table.buttons().container()
					.appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
		} );

	</script>
	
	<script type="text/javascript">
		$('#datatable').dataTable({
		  aaSorting: [[0, 'desc']]
		});
	</script>
	
	<script type="text/javascript">
		$('#datatable2').dataTable({
		  aaSorting: [[0, 'desc']]
		});
	</script>
	
	<script type="text/javascript">
		$('#datatable3').dataTable({
		  aaSorting: [[0, 'desc']]
		});
	</script>

</body>
</html>