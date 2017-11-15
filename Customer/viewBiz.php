<?php
session_start();
include("../dbase.txt");
if(!isset($_SESSION['name'])){ //if login in session is not set
header("Location: ../login.html");}
mysql_select_db("huneycuttmd1", $goLocaldb);
$bizName = "select Name from business where business_ID = '" . $_POST[busID] . "';";
$bizAddress = "select address from business where business_ID = '" . $_POST[busID] . "';";
$bizPic = "select busPic from business where business_ID = '" . $_POST[busID] . "';";
$bizTelephone = "select telephone from business where business_ID = '" . $_POST[busID] . "';";
$Sunday = @mysql_fetch_array(@mysql_query("select Sunhours from business where business_ID= '" . $_POST[busID] . "';"));
$Monday = @mysql_fetch_array(@mysql_query("select Monhours from business where business_ID= '" . $_POST[busID] . "';"));
$Tuesday = @mysql_fetch_array(@mysql_query("select Tueshours from business where business_ID= '" . $_POST[busID] . "';"));
$Wednesday = @mysql_fetch_array(@mysql_query("select Wedhours from business where business_ID= '" . $_POST[busID] . "';"));
$Thursday = @mysql_fetch_array(@mysql_query("select Thurshours from business where business_ID= '" . $_POST[busID] . "';"));
$Friday = @mysql_fetch_array(@mysql_query("select Frihours from business where business_ID= '" . $_POST[busID] . "';"));
$Saturday = @mysql_fetch_array(@mysql_query("select Sathours from business where business_ID= '" . $_POST[busID] . "';"));
$bizresultName = @mysql_fetch_array(@mysql_query($bizName)) or die(mysql_error()); 
$bizresultAddress = @mysql_fetch_array(@mysql_query($bizAddress)); 
$bizresultPic = @mysql_fetch_array(@mysql_query($bizPic)); 
$bizresultTele = @mysql_fetch_array(@mysql_query($bizTelephone)); 
$_HoursArray = array($Sunday[0], $Monday[0], $Tuesday[0], $Wednesday[0], $Thursday[0], $Friday[0], $Saturday[0]);
?>
<html>
	<head>
		<title>Business Checkout</title>
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
			<?php
			echo "<h2>" . $bizresultName[0]. "</h2>";
			echo '<div class="table-wrapper" align = "center">';
			echo '<table align = "center">';
				echo "<tbody>";
					echo '<tr align = "center">';
						echo '<td><img src="'. $bizresultPic[0] .'" alt="'. $bizresultPic[0] .'"></td>';
					echo "</tr>";
					echo "<tr>";
						echo "<td>Address:   " . $bizresultAddress[0] . "</td>";
					echo "</tr>";
					echo "<tr>";
						echo '<td>Telephone:   '. $bizresultTele[0] .'</td>';
					echo "</tr>";
				echo "</tbody>";
				echo "<tfoot>";
					echo "<tr>";
						echo '<td align="center" colspan=" . "1" ."></td>';
					echo "</tr>";
				echo "</tfoot>";
			echo "</table>";
		echo "</div>";
		/**Hours*/
		echo "<h2>Hours</h2>";
		echo '<div class="table-wrapper" align = "center">';
			echo '<table align = "center">';
				echo "<tbody>";
					echo '<tr>';
					    echo '<td>Sunday</td>';
						echo '<td>'.$_HoursArray[0].'</td>';
					echo "</tr>";
					echo "<tr>";
						echo '<td>Monday</td>';
						echo '<td>'.$_HoursArray[1].'</td>';
					echo "</tr>";
					echo "<tr>";
						echo '<td>Tuesday</td>';
						echo '<td>'.$_HoursArray[2].'</td>';
					echo "</tr>";
					echo "<tr>";
						echo '<td>Wednesday</td>';
						echo '<td>'.$_HoursArray[3].'</td>';
					echo "</tr>";
					echo "<tr>";
						echo '<td>Thursday</td>';
						echo '<td>'.$_HoursArray[4].'</td>';
					echo "</tr>";
					echo "<tr>";
						echo '<td>Friday</td>';
						echo '<td>'.$_HoursArray[5].'</td>';
					echo "</tr>";
					echo "<tr>";
						echo '<td>Saturday</td>';
						echo '<td>'.$_HoursArray[6].'</td>';
					echo "</tr>";
				echo "</tbody>";
				echo "<tfoot>";
					echo "<tr>";
						echo '<td align="center" colspan=" . "2" ."></td>';
					echo "</tr>";
				echo "</tfoot>";
			echo "</table>";
		echo "</div>";
		?>
		</body>
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

</html>