<?php
session_start();
if(!isset($_SESSION['name'])){ //if login in session is not set
header("Location: login.html");
}
include("dbase.txt");
mysql_select_db("huneycuttmd1", $goLocaldb);
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
						<a href="bizportal.php">Home</a>
						<a href="bizaccount.php">My Account</a>
						<a href="signout.php">Sign out</a>
						<a href="about.html">About</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>
		<!-- Form -->
        <!-- <h3>Customer Signup</h3>-->
		<?php
		echo "<h4>Current News</h4>";
		echo "<div class=" . "table-wrapper" . ">";
			echo "<table>";
				echo "<thead>";
					echo "<tr>";
						echo "<th>Date</th>";
						echo "<th>Text</th>";
					echo "</tr>";
				echo "</thead>";
				echo "<tbody>";
					echo "<tr>";
						echo "<td>Item 1</td>";
						echo "<td>Ante turpis integer aliquet porttitor.</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>Item 2</td>";
						echo "<td>Vis ac commodo adipiscing arcu aliquet.</td>";
				echo "</tbody>";
			echo "</table>";
		echo "</div>";
		?>

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