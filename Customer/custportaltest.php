<?php
session_start();
include("../dbase.txt");
if(!isset($_SESSION['name'])){ //if login in session is not set
header("Location: ../login.html");}
mysql_select_db("huneycuttmd1", $goLocaldb);
$customerZip = @mysql_fetch_array(@mysql_query("select zipCode from customer where email= '" . $_SESSION['email'] . "';"));
$_SESSION['zip'] = $customerZip[0];
$ads = array();
$queryone = "select adID from ad where zipCo = '" . $_SESSION[zip] . "';";
$bizs = array();
$bizq = "select business_ID from business where zipCode = '" . $_SESSION[zip] . "';";
$bizresult = @mysql_query($bizq) or die(mysql_error()); 
$result = @mysql_query($queryone) or die(mysql_error()); 
print $ads[0];
?>
<!--
	custPortal
-->
<html>
	<head>
		<title>Customer Portal</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
	</head>
	<body>

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
        <!-- <h3>Customer Signup</h3>-->


		<section id="banner">
			<div class="inner">
				<header>
					<h1>BUSINESS!</h1>
				</header>
				<div class="flex ">
				<?php
				$biz = array();
				while($row = mysql_fetch_array($bizresult)) $bizs[] = $row;
				rsort($bizs);
				if(!empty($bizs))
				{
					foreach($bizs as $value)
					{
						$BizID = $value['business_ID'];
						$bizquery = "select Name from business where business_ID = " . $BizID . ";";
						$bizphq = "select busPic from business where business_ID = " . $BizID . ";";
						$biz = @mysql_fetch_array(@mysql_query($bizquery)) or die(mysql_error()); 
						$bizImage = @mysql_fetch_array(@mysql_query($bizphq)) or die(mysql_error()) ;

						echo '<div>';
						echo '<form method="post" action="viewBiz.php" align = "center">';
						echo '<input type="hidden" name="busID" id="busID" value="'. $BizID .'"/>';
						echo '<input type="image" src="'.$bizImage[0].'" alt="'.$bizImage[0].'" height="70" width="70">';		
						echo '<h2>'. $biz[0] .'</h2>';
						echo '</form>';
						echo '</div>';
					}
				}
				else
				{
					echo '<td>There are currently no businesses for ' . $_SESSION['zip'] . '</td>';
					echo '<td></td>';
					echo '<td></td>';
				}
				?>
				</div>
			</div>
		</section>
	<footer>
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
