<?php
session_start();
include("../dbase.txt");
mysql_select_db("huneycuttmd1", $goLocaldb);
if(!isset($_SESSION['name'])){ //if login in session is not set
header("Location: ../login.html");}
$industry= "select industryID, industryType from industry";
$indresult = @mysql_query($industry) or die ("Error Connecting");
$customerFname = @mysql_fetch_array(@mysql_query("select fname from customer where customer_ID= '" . $_SESSION[custID] . "';"));
$customerLname = @mysql_fetch_array(@mysql_query("select lname from customer where customer_ID= '" . $_SESSION[custID] . "';"));
$customerZip = @mysql_fetch_array(@mysql_query("select zipCode from customer where customer_ID= '" . $_SESSION[custID] . "';"));
$customerInd = @mysql_fetch_array(@mysql_query("select industry from customer where customer_ID= '" . $_SESSION[custID] . "';"));
$customerEmail = @mysql_fetch_array(@mysql_query("select email from customer where customer_ID= '" . $_SESSION[custID] . "';"));
$_custArray = array($customerZip[0], $customerInd[0], $customerEmail[0], $customerFname[0], $customerLname[0]);
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
				<?php
					echo '<a href="custportal.php" class="logo"><strong> Welcome '. $_SESSION['name']. '</strong></a>';
				?>
					<nav id="nav">
						<a href="custportal.php">Home</a>
						<a href="../signout.php">Sign out</a>
						<a href="about.html">About</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>
		<!-- Generates the account information -->
		<?php
		echo '<form method="post" action="CustupdateAccountInfo.php" align = "center">';
		echo '<input type="hidden" name="email" id="email" value="'. $_custArray[2] . '"</td>';
		echo '<div class="table-wrapper" align = "center">';
			echo "<table>";
				echo "<thead>";
					echo "<tr>";
						echo "<h2>Account Information</h2>";
					echo "</tr>";
				echo "</thead>";
				echo "<tbody>";
					echo "<tr>";
						echo "<td>Name</td>";
						echo "<td>" . $_custArray[3] . " " . $_custArray[4] . "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>Zip Code</td>";
						echo '<td> <input type="text" name="zip" id="zip" value="'. $_custArray[0] .'" placeholder="'. $_custArray[0] .'" required/></td>';
					echo "</tr>";
					echo "<tr>";
						echo "<td>Industry</td>";
						echo "<td>" . $_custArray[1] . "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>Email</td>";
						echo '<td>'. $_custArray[2] . '';
					echo "</tr>";
				echo "</tbody>";
				echo "<tfoot>";
					echo "<tr>";
						echo "<td colspan=" . "2" ."></td>";
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
		<div class="copyright" align="center">
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