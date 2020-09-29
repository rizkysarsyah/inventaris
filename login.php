<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="au theme template">
	<meta name="author" content="Hau Nguyen">
	<meta name="keywords" content="au theme template">

	<!-- Title Page-->
	<title>Login - Inventaris</title>

	<!-- Fontfaces CSS-->
	<link href="assets/css/font-face.css" rel="stylesheet" media="all">
	<link href="assets/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
	<link href="assets/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
	<link href="assets/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

	<!-- Bootstrap CSS-->
	<link href="assets/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

	<!-- Vendor CSS-->
	<link href="assets/animsition/animsition.min.css" rel="stylesheet" media="all">
	<link href="assets/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
	<link href="assets/wow/animate.css" rel="stylesheet" media="all">
	<link href="assets/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
	<link href="assets/slick/slick.css" rel="stylesheet" media="all">
	<link href="assets/select2/select2.min.css" rel="stylesheet" media="all">
	<link href="assets/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

	<!-- Main CSS-->
	<link href="assets/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="">
	<div class="container">
		<div class="col col-md-5 mx-auto mt-5">
			<div class="card ">
				<div class="card-body">
					<div class="text-center">
						<a class="navbar-brand" href="">
							<img src="images/logo.png" width="300">
						</a>
						<br><br>
						<?php include 'alert.php'; ?>
					</div>
					<form method="POST" action="config/login_cek.php">
						<div class="form-group mt-3" >
							<input class="form-control form-control-md" id="username" name="username" type="text" placeholder="Username" required="">
						</div>
						<div class="form-group">
							<input class="form-control form-control-md" id="password" name="password" type="password" placeholder="Password" required>
						</div>
						<button type="submit" class="btn btn-primary btn-block mt-4" name="login">Login</button>
					</form>
				</div>
			</div>
		</div>


		<!-- Jquery JS-->
		<script src="assets/jquery-3.2.1.min.js"></script>
		<!-- Bootstrap JS-->
		<script src="assets/bootstrap-4.1/popper.min.js"></script>
		<script src="assets/bootstrap-4.1/bootstrap.min.js"></script>
		<!-- Vendor JS       -->
		<script src="assets/slick/slick.min.js">
		</script>
		<script src="assets/wow/wow.min.js"></script>
		<script src="assets/animsition/animsition.min.js"></script>
		<script src="assets/bootstrap-progressbar/bootstrap-progressbar.min.js">
		</script>
		<script src="assets/counter-up/jquery.waypoints.min.js"></script>
		<script src="assets/counter-up/jquery.counterup.min.js">
		</script>
		<script src="assets/circle-progress/circle-progress.min.js"></script>
		<script src="assets/perfect-scrollbar/perfect-scrollbar.js"></script>
		<script src="assets/chartjs/Chart.bundle.min.js"></script>
		<script src="assets/select2/select2.min.js">
		</script>

		<!-- Main JS-->
		<script src="assets/js/main.js"></script>

		<footer>
			<div class="footer-copyright text-center py-3">© 2020 Copyright:
				<a href="https://instagram.com/rizkysarsyah"> rizkysarsyah</a>
			</div>
			<!-- Copyright -->

		</footer>
	</body>
	</html>
<!-- end document-->