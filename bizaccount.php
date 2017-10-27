<?php
session_start();
include("dbase.txt");
mysql_select_db("huneycuttmd1", $goLocaldb);
if(!isset($_SESSION['name'])){ //if login in session is not set
header("Location: login.html");}
$businessZip = @mysql_fetch_array(@mysql_query("select zipCode from business where name= '" . $_SESSION[name] . "';"));
$businessTel = @mysql_fetch_array(@mysql_query("select telephone from business where name= '" . $_SESSION[name] . "';"));
$businessAdd = @mysql_fetch_array(@mysql_query("select address from business where name= '" . $_SESSION[name] . "';"));
$businessEmail = @mysql_fetch_array(@mysql_query("select email from business where name= '" . $_SESSION[name] . "';"));
$_bizArray = array($businessZip[0], $businessTel[0], $businessAdd[0], $businessEmail[0]);
?>
<!--
	bizPortal
-->
<html>
	<head>
		<title>My Account</title>
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
						<a href="bizads.php">Ad Management</a>
						<a href="signout.php">Sign out</a>
						<a href="about.html">About</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>
		<!-- Generates the account information -->
		<?php
		echo "<div class=" . "table-wrapper" . ">";
			echo "<table>";
				echo "<thead>";
					echo "<tr>";
						echo "<th>Account Information</th>";
					echo "</tr>";
				echo "</thead>";
				echo "<tbody>";
					echo "<tr>";
						echo "<td>Business Name</td>";
						echo "<td>" . $_SESSION['name'] . "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>Zip Code</td>";
						echo "<td>" . $_bizArray[0] . "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>Address</td>";
						echo "<td>" . $_bizArray[2] . "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>Telephone Number</td>";
						echo "<td>" . $_bizArray[1] . "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>Email</td>";
						echo "<td>" . $_bizArray[3] . "</td>";
					echo "</tr>";
				echo "</tbody>";
				echo "<tfoot>";
					echo "<tr>";
						echo "<td colspan=" . "2" ."></td>";
					echo "</tr>";
				echo "</tfoot>";
			echo "</table>";
		echo "</div>";
		?>
		<!-- Generates the hours -->
		<?php
		echo "<div class=" . "table-wrapper" . ">";
			echo "<table>";
				echo "<thead>";
					echo "<tr>";
						echo "<th>Hours</th>";
					echo "</tr>";
				echo "</thead>";
				echo "<tbody>";
					echo "<tr>";
						echo "<td>Sunday</td>";
						echo "<td></td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>Monday</td>";
						echo "<td></td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>Tuesday</td>";
						echo "<td></td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>Wednesday</td>";
						echo "<td></td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>Thursday</td>";
						echo "<td></td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>Friday</td>";
						echo "<td></td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>Saturday</td>";
						echo "<td></td>";
					echo "</tr>";
				echo "</tbody>";
				echo "<tfoot>";
					echo "<tr>";
						echo "<td colspan=" . "2" ."></td>";
					echo "</tr>";
				echo "</tfoot>";
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