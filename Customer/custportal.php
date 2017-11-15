<?php
session_start();
include("../dbase.txt");
if(!isset($_SESSION['name'])){ //if login in session is not set
header("Location: ../login.html");}
mysql_select_db("huneycuttmd1", $goLocaldb);
$customerZip = @mysql_fetch_array(@mysql_query("select zipCode from customer where email= '" . $_SESSION['email'] . "';"));
$_SESSION['zip'];
$ads = array();
$query = "select adID from ad where zipCo = '" . $_SESSION['zip'] . "';";
$cityq = "select city from zip where zipCode = '" . $_SESSION['zip'] . "';";
$stateq = "select state from zip where zipCode = '" . $_SESSION['zip'] . "';";
$bizs = array();
$bizq = "select business_ID from business where zipCode = '" . $_SESSION[zip] . "';";
$bizresult = @mysql_query($bizq) or die(mysql_error()); 
$result = @mysql_query($query) or die(mysql_error()); 
$cityresult = @mysql_fetch_array(@mysql_query($cityq)) or die(mysql_error()); 
$stateresult = @mysql_fetch_array(@mysql_query($stateq)) or die(mysql_error()); 
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
	<body class="subpage" align="center" style="margin: auto;">

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
		<?php
		echo '<h3>Now visiting '.$cityresult[0].', '.$stateresult[0].' </h3>';
		echo '<h2>Change Zip?</h2>';
		echo '	<div class="table-wrapper" align = "center">
				<table align = "center">
				<form method="post" action="filterZip.php" width="10" >
					<input type="text"  name="zip" id="zip" value="'. $_SESSION['zip'] .'" placeholder="'. $_SESSION['zip'] .'" style="width: 82px;" required/>
				<!-- Break -->
				<br>
					<ul class="actions" align="center">
						<input type="submit" value="Submit" />
					</ul>
		</form>
		</div>';
		echo '<div class="table-wrapper" align = "center">';
			echo '<table align = "center">';
				echo "<thead>";
					echo "<tr>";
						echo "<h2>NewsLetters</h2>";
					echo "</tr>";
				echo "</thead>";
				echo "<tbody>";
				$business = array();
				while($row = mysql_fetch_array($result)) $ads[] = $row;
				rsort($ads);
				if(!empty($ads))
				{
					echo "<tr>";
					echo "<td>IMAGE</td>";
					echo "<td>WHO</td>";
					echo "<td>WHAT</td>";
					echo "<td>WHEN</td>";
					echo "</tr>";
					foreach($ads as $value)
					{
						$adID = $value['adID'];
						echo "<tr>";
						$query = "select Name from business where business_ID = (select busID from ad where AdID ='" . $adID . "');";
						$bizID = "select business_ID from business where business_ID = (select busID from ad where AdID ='" . $adID . "');";
						$business = @mysql_fetch_array(@mysql_query($query)); 
						$bizIDs = @mysql_fetch_array(@mysql_query($bizID)); 
						$querypic = "select adpic from ad where AdID ='" . $adID . "';";
						$adText = @mysql_fetch_array(@mysql_query("select text from ad where adID = '" . $adID . "';"));
						$datePost = @mysql_fetch_array(@mysql_query("select date from ad where adID = '" . $adID . "';")); 
						$pic = @mysql_fetch_array(@mysql_query($querypic)); 
						if(!empty($pic[0]))
						{
							echo '<form method="post" action="viewimage.php" align="center">';
							echo '<input type="hidden" name="pic" id="pic"" value="'. $pic[0] .'"/>';
							echo '<input type="hidden" name="biz" id="biz"" value="'. $business[0] .'"/>';
							echo '<input type="hidden" name="bizID" id="bizOD"" value="'. $bizIDs[0] .'"/>';
							echo '<td><input type="image" align="center" src="'.$pic[0].'" alt="'.$pic[0].'" height="50" width="50"></td>';
							echo '</form>';
						}
						else
						{
							echo '<form method="post" action="viewimage.php" align="center">';
							echo '<input type="hidden" name="pic" id="pic"" value="../images/default.png"/>';
							echo '<input type="hidden" name="biz" id="biz"" value="'. $business[0] .'"/>';
							echo '<input type="hidden" name="bizID" id="bizOD"" value="'. $bizIDs[0] .'"/>';
							echo '<td><input type="image" align="center" src="../images/default.png" alt="../images/default.png" height="50" width="50"></td>';
							echo '</form>';
						}
						echo "<td><h1>" . $business[0] . "</h1></td>";
						echo "<td><h1>" . $adText[0] . "</h1></td>";
						echo "<td><h1>" . $datePost[0] . "</h1></td>";
						echo "</tr>";
					}
					echo "</tbody>";
						echo "<tfoot>";
							echo "<tr>";
								echo "<td colspan=" . "4" ."></td>";
							echo "</tr>";
						echo "</tfoot>";
				}
				else
				{
					echo '<td>There are currently no news for ' . $_SESSION['zip'] . '</td>';
					echo '<td></td>';
					echo '<td></td>';
				}
				echo "</tbody>";
			echo "</table>";
		echo "</div>";
		?>
		<!--Displays the businesses-->
		<?php
		echo '<div class="table-wrapper" align = "center">';
			echo '<table align = "center">';
				echo "<thead >";
					echo "<tr>";
						echo "<h2>Businesses</h2>";
					echo "</tr>";
				echo "</thead>";
				echo '<tbody align = "center">';
				$biz = array();
				while($row = mysql_fetch_array($bizresult)) $bizs[] = $row;
				rsort($bizs);
				if(!empty($bizs))
				{
					echo "<figure>";
					foreach($bizs as $value)
					{
						$BizID = $value['business_ID'];
						$bizquery = "select Name from business where business_ID = " . $BizID . ";";
						$bizphq = "select busPic from business where business_ID = " . $BizID . ";";
						$biz = @mysql_fetch_array(@mysql_query($bizquery)); 
						$bizImage = @mysql_fetch_array(@mysql_query($bizphq)) or die(mysql_error()) ;
						echo '<td>';
						echo '<form method="post" action="viewBiz.php" align = "center">';
						echo '<input type="hidden" name="busID" id="busID" value="'. $BizID .'"/>';
						echo '<input type="image" src="'.$bizImage[0].'" alt="'.$bizImage[0].'" height="50" width="50">';		
						echo '<h1>'. $biz[0] .'</h1>';
						echo '</form>';
						echo '</td>';
					}
					echo '</figure>';
				}
				else
				{
					echo '<td>There are currently no businesses listed for ' . $_SESSION['zip'] . '</td>';
					echo '<td></td>';
					echo '<td></td>';
				}
				echo "</tbody>";
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
