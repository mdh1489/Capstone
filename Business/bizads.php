<?php
session_start();
include("../dbase.txt");
if(!isset($_SESSION['name'])){ //if login in session is not set
header("Location: ../login.html");}
mysql_select_db("huneycuttmd1", $goLocaldb);
$ads = array();
$query = "select adID from ad where busID = '" . $_SESSION[businessID] . "';";
$result = @mysql_query($query) or die(mysql_error()); 
?>
<!--
	bizPortal
-->
<html>
	<head>
		<title>Biz Portal</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="bizportal.php" class="logo"><strong>Home</strong></a>
					<nav id="nav">
						<a href="bizportal.php">Home</a>
						<a href="bizaccount.php">My Account</a>
						<a href="../signout.php">Sign out</a>
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
							echo "<th>NewsLetters</th>";
						echo "</tr>";
					echo "</thead>";
					echo "<tbody>";
					$business = array();
					echo "<tr>";
					echo "<td>WHAT</td>";
					echo "<td>WHEN</td>";
					echo "<td>Delete?</td>";
					echo "</tr>";
					while($row = mysql_fetch_array($result)) $ads[] = $row;
					rsort($ads);
						foreach($ads as $value)
						{
							$adID = $value['adID'];
							echo "<tr>";
							$query = "select Name from business where business_ID = (select busID from ad where AdID ='" . $adID . "');";
							$business = @mysql_fetch_array(@mysql_query($query)); 
							$adText = @mysql_fetch_array(@mysql_query("select text from ad where adID = '" . $adID . "';"));
							$datePost = @mysql_fetch_array(@mysql_query("select date from ad where adID = '" . $adID . "';")); 
							echo "<td>" . $adText[0] . "</td>";
							echo "<td>" . $datePost[0] . "</td>";
							echo '<form method="post" action="bizadDelete.php" align = "left">';
							echo '<input type="hidden" name="adID" id="adID" value="' . $adID .'" placeholder="Email" />';
							echo '<ul class="actions" >';
							echo '<td><input type=' .'"submit"'. 'value ="' . X . '" placeholder="password"/></td>';
							echo '</ul>';
							echo '</form>';
							echo "</tr>";
						}
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
		<script src="../assets/js/jquery.min.js"></script>
		<script src="../assets/js/skel.min.js"></script>
		<script src="../assets/js/util.js"></script>
		<script src="../assets/js/main.js"></script>
		<script src="../assets/js/js/util.js"></script>

	</body>
</html>