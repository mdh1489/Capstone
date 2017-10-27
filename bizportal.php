<?php
session_start();
if(!isset($_SESSION['name'])){ //if login in session is not set
header("Location: login.html");
}
?>
<!--
	bizPortal
-->
<html>
	<head>
		<title>Biz Portal</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.html" class="logo"><strong>GoLocal</strong></a>
					<nav id="nav">
						<a href="bizaccount.php">My Account</a>
						<a href="bizads.php">Ad Management</a>
						<a href="login.html">Sign out</a>
						<a href="about.html">About</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>
		<!-- Form -->
        <!-- <h3>Customer Signup</h3>-->
		<div class="6u$ 12u$(xsmall)">
		<?php
		echo "<h3> Welcome ". $_SESSION['name'] . "</h3>"; 
		?>
		<a href="adcreate.php" class="button">Create News</a>

		<div class="copyright">
			&copy; MikeHuneycutt <a href="https://student.cs.appstate.edu/huneycuttmd1">More</a>.
		</div>


		</div>
	</footer>

	<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="assets/js/js/util.js"></script>

	</body>
</html>
