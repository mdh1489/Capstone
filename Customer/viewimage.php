<?php
session_start();
include("../dbase.txt");
if(!isset($_SESSION['name'])){ //if login in session is not set
header("Location: ../login.html");}
mysql_select_db("huneycuttmd1", $goLocaldb);
$pic = $_POST['pic'];
$biz = $_POST['biz'];
$bizID = $_POST['bizID'];
?>
<html>
	<head>
		<title>Customer Portal</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="inner">
				<?php
					echo '<a href="custportal.php" class="logo"><strong> Welcome '. $_SESSION['name']. '</strong></a>';
					?>
					<nav id="nav">
						<a href="custaccount.php">My Account</a>
						<a href="../signout.php">Sign out</a>
						<a href="about.html">About</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>
		<!-- Form -->
		<?php
		echo '<br>';
		echo '<form method="post" action="viewBiz.php" align="center">';
		echo '<input type="hidden" name="busID" id="busID"" value="'. $bizID .'"/>';
			echo '<ul class="actions">
					<li><input type="submit" value="'.$biz.'" /></li>
					</ul>';
		echo '</form>';
		echo '<div class="table-wrapper" align = "center">';
			echo '<table align = "center">';
				echo "<tbody>";
					echo '<tr align = "center">';
						echo '<td><img align="center" src="'.$pic.'" alt="" height="500" width="500"></td>';
					echo "</tr>";
					echo "</tbody>";
				echo "<tfoot>";
					echo "<tr>";
						echo '<td align="center" colspan=" . "1" ."></td>';
					echo "</tr>";
				echo "</tfoot>";
			echo "</table>";
		echo "</div>";
				?>
		<div class="copyright" align="center">
			&copy; MikeHuneycutt <a href="https://student.cs.appstate.edu/huneycuttmd1">More</a>.
		</div>

	</footer>

	<!-- Scripts -->
		<script src="../assets/js/jquery.min.js"></script>
		<script src="../assets/js/skel.min.js"></script>
		<script src="../assets/js/util.js"></script>
		<script src="../assets/js/main.js"></script>
		<script src="../assets/js/js/util.js"></script>

	</body>
</html>
