<?php
session_start();
include("../dbase.txt");
mysql_select_db("huneycuttmd1", $goLocaldb);
if(!isset($_SESSION['name'])){ //if login in session is not set
header("Location: ../login.html");}
$businessZip = @mysql_fetch_array(@mysql_query("select zipCode from business where business_ID= '" . $_SESSION[businessID] . "';"));
$businessTel = @mysql_fetch_array(@mysql_query("select telephone from business where business_ID= '" . $_SESSION[businessID] . "';"));
$businessAdd = @mysql_fetch_array(@mysql_query("select address from business where business_ID= '" . $_SESSION[businessID] . "';"));
$businessEmail = @mysql_fetch_array(@mysql_query("select email from business where business_ID= '" . $_SESSION[businessID] . "';"));
$Sunday = @mysql_fetch_array(@mysql_query("select Sunhours from business where business_ID= '" . $_SESSION[businessID] . "';"));
$Monday = @mysql_fetch_array(@mysql_query("select Monhours from business where business_ID= '" . $_SESSION[businessID] . "';"));
$Tuesday = @mysql_fetch_array(@mysql_query("select Tueshours from business where business_ID= '" . $_SESSION[businessID] . "';"));
$Wednesday = @mysql_fetch_array(@mysql_query("select Wedhours from business where business_ID= '" . $_SESSION[businessID] . "';"));
$Thursday = @mysql_fetch_array(@mysql_query("select Thurshours from business where business_ID= '" . $_SESSION[businessID] . "';"));
$Friday = @mysql_fetch_array(@mysql_query("select Frihours from business where business_ID= '" . $_SESSION[businessID] . "';"));
$Saturday = @mysql_fetch_array(@mysql_query("select Sathours from business where business_ID= '" . $_SESSION[businessID] . "';"));
$_bizArray = array($businessZip[0], $businessTel[0], $businessAdd[0], $businessEmail[0]);
$_HoursArray = array($Sunday[0], $Monday[0], $Tuesday[0], $Wednesday[0], $Thursday[0], $Friday[0], $Saturday[0]);
?>
<!--
	bizPortal
-->
<html>
	<head>
		<title>My Account</title>
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
						<a href="../signout.php">Sign out</a>
						<a href="about.html">About</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>
		<!-- Generates the account information -->
		<?php
		echo '<form method="post" action="BizupdateAccountInfo.php" align = "center">';
		echo '<div class="table-wrapper" align = "center">';
			echo '<table align = "center">';
			echo '<h2> Account Info </h2>';
				echo "<tbody>";
					echo "<tr>";
						echo "<td>Business Name</td>";
						echo "<td>" . $_SESSION['name'] . "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>Zip Code</td>";
						echo '<td> <input type="text" name="zip" id="zip" value="'. $_bizArray[0] .'" placeholder="Text" required/></td>';
					echo "</tr>";
					echo "<tr>";
						echo "<td>Address</td>";
						echo '<td> <input type="text" name="add" id="add" value="'. $_bizArray[2] .'" placeholder="Text" required/></td>';
					echo "</tr>";
					echo "<tr>";
						echo "<td>Telephone Number</td>";
						echo '<td> <input type="text" name="telephone" id="text" value="'. $_bizArray[1] .'" placeholder="Text" required/></td>';
					echo "</tr>";
					echo "<tr>";
						echo "<td>Email</td>";
						echo '<input type="hidden" name="email" id="email" value="'. $_bizArray[3] .'"/>';
						echo "<td>" . $_bizArray[3] . "</td>";
					echo "</tr>";
				echo "</tbody>";
				echo "<tfoot>";
					echo "<tr>";
						echo '<td align="center" colspan=" . "1" ."></td>';
					echo "</tr>";
				echo "</tfoot>";
			echo "</table>";
		echo "</div>";
        echo '<ul class="actions">
			 <li><input type="submit" value="Submit" /></li>
			 <li><input type="reset" value="Reset" /></li>
			 </ul>';
		echo '</form>';
		?>
		<!-- Generates the hours -->
		<?php
		echo '<form method="post" action="updatebushours.php" align = "left">';
		echo '<div class="table-wrapper" align = "center">';
			echo '<input type="hidden" name="email" id="email" value="'. $_bizArray[3] .'"/>';
			echo "<table>";
				echo "<thead>";
					echo "<tr>";
						echo "<h2>Hours</h2>";
					echo "</tr>";
				echo "</thead>";
				echo "<tbody>";
					echo "<tr>";
						echo '<td> <input type="text" name="sunday" id="text" value="'.$_HoursArray[0].'" placeholder="Sunday Hours"/></td>';
					echo "</tr>";
					echo "<tr>";
						echo '<td> <input type="text" name="monday" id="text" value="'.$_HoursArray[1].'" placeholder="Monday Hours"/></td>';
					echo "</tr>";
					echo "<tr>";
						echo '<td> <input type="text" name="tuesday" id="text" value="'.$_HoursArray[2].'" placeholder="Tuesday Hours"/></td>';
					echo "</tr>";
					echo "<tr>";
						echo '<td> <input type="text" name="wednesday" id="text" value="'.$_HoursArray[3].'" placeholder="Wednesday Hours"/></td>';
					echo "</tr>";
					echo "<tr>";
						echo '<td> <input type="text" name="thursday" id="text" value="'.$_HoursArray[4].'" placeholder="Thursday Hours"/></td>';
					echo "</tr>";
					echo "<tr>";
						echo '<td> <input type="text" name="friday" id="text" value="'.$_HoursArray[5].'" placeholder="Friday Hours"/></td>';
					echo "</tr>";
					echo "<tr>";
						echo '<td> <input type="text" name="saturday" id="text" value="'.$_HoursArray[6].'" placeholder="Saturday Hours"/></td>';
					echo "</tr>";
				echo "</tbody>";
				echo "<tfoot>";
					echo "<tr>";
						echo "<td colspan=" . "1" ."></td>";
					echo "</tr>";
				echo "</tfoot>";
			echo "</table>";
		echo "</div>";
		echo '<ul class="actions" align = "center">
			 <li><input type="submit" value="Submit" /></li>
			 <li><input type="reset" value="Reset" /></li>
			 </ul>';
		echo '</form>';
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